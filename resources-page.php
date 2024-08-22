<?php 
	/**
	 * 	Template Name: Resources
	 * */

	
	get_header();

	$thumbnail_id = get_post_thumbnail_id();
	$thumbnail_url = wp_get_attachment_url($thumbnail_id);
?>
	<section class="inner_banner parallaxBg blog_banner d-flex align-items-center" style="background-image: url(<?php echo $thumbnail_url; ?>);">
		<div class="container mold_container">
			<div class="inner_banner_text text-center">
				<h1><span><?php the_title(); ?></span></h1>
			</div>
		</div>
	</section>
	<!-- home_banner_panel -->



	<section class="blog_list resources_list">
		<div class="container mold_container">
			<div class="row justify-content-between align-items-center mb-4 mb-lg-4">
				<div class="col-12 col-sm">
					<h3 class="mb-2 mb-sm-3 mb-md-0 filter_heading">
						<?php
						$selected_cat = isset($_GET['resource_cat']) ? sanitize_text_field($_GET['resource_cat']) : 'all';
						if ($selected_cat && $selected_cat !== 'all') {
							$category = get_term_by('slug', $selected_cat, 'resource_category');
							if ($category && !is_wp_error($category)) {
								echo 'Showing results for: ' . '<strong>' . esc_html($category->name) . '</strong>';
							} else {
								//echo 'All Categories';
							}
						} else {
							//echo 'All Categories';
						}
						?>
					</h3>
				</div>
				<div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4">
					<form method="GET" id="resourceFilterForm">
						<?php
						$post_type = 'resource';
						$taxonomy = 'resource_category';
						$categories = get_terms(array(
							'taxonomy' => $taxonomy,
							'hide_empty' => false,
						));
						if (!empty($categories) && !is_wp_error($categories)) {
							echo '<select id="resourceCat" name="resource_cat" onchange="document.getElementById(\'resourceFilterForm\').submit();">';
							echo '<option value="all">Select Category</option>';
							foreach ($categories as $category) {
								$selected = (isset($_GET['resource_cat']) && $_GET['resource_cat'] == $category->slug) ? 'selected' : '';
								echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
							}
							echo '</select>';
						} else {
							echo 'No categories found.';
						}
						?>
					</form>
				</div>
			</div>
			
			<div class="row gx-xl-5">				
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$selected_cat = isset($_GET['resource_cat']) ? sanitize_text_field($_GET['resource_cat']) : 'all';
				if($selected_cat === 'all') {
					$args = array(
						'post_type' => $post_type,
						'posts_per_page' => 6,
						'post_status' => 'publish',
						'paged' => $paged
					);
				} else {
					$args = array(
						'post_type' => $post_type,
						'posts_per_page' => 6,
						'post_status' => 'publish',
						'paged' => $paged,
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy,
								'field'    => 'slug',
								'terms'    => $selected_cat,
							),
						),
					);
				}
				$wp_query = new WP_Query($args);
				if ($wp_query->have_posts()):
				while ($wp_query->have_posts()) : $wp_query->the_post();

				$listimg = get_field('resource_list_image');
				?>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="resource_item text-center mb-4 mb-xl-5">
						<div class="resource_img">
							<img src="<?php echo $listimg['url']; ?>" alt="<?php echo $listimg['alt']; ?>">
							<a href="<?php the_permalink(); ?>" class="resource_play_btn">
								<i class="fa-solid fa-play"></i>
							</a>
						</div>
						<div class="resoruce_text">
							<h3 class="mb-0">
								<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							</h3>
						</div>
					</div>
				</div>
				<?php
				endwhile;
				?>
				<?php
				$big = 999999999; 
				$pages = paginate_links(array(
					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'total' => $wp_query->max_num_pages,
					'mid_size' => 1,
					'end_size' => 1,
					'prev_text' => __('<i class="fa-solid fa-angle-left"></i>', 'textdomain'),
					'next_text' => __('<i class="fa-solid fa-angle-right"></i>', 'textdomain'),
					'type' => 'array',
				));

				if ($pages) {
				?>
				<div class="mt-4 col-12 d-flex justify-content-center">
					<nav aria-label="Page navigation example" class="blogpagination">
						<?php
					$pagination = '<ul class="pagination mb-0">';
					foreach ($pages as $page) {
						if (strpos($page, 'current') !== false) {
							$pagination .= '<li class="page-item active">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
						} else {
							$pagination .= '<li class="page-item">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
						}
					}
					$pagination .= '</ul>';
					echo $pagination;
						?>
					</nav>
				</div>
				<?php
				}?>
				<?php
				else:
				echo 'No Posts found';
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>


	<?php get_template_part('section-template/about-mold', 'section'); ?>

<?php get_footer(); ?>