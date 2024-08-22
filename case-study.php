<?php 
	/**
	 * 	Template Name: Case Study
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


	<section class="blog_list casestudy_list">
		<div class="container mold_container">
			<div class="row gx-xl-5">				
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'case-study',
					'posts_per_page' => 6,
					'post_status' => 'publish',
					'paged' => $paged
				);
				$wp_query = new WP_Query($args);
				if ($wp_query->have_posts()):
				while ($wp_query->have_posts()) : $wp_query->the_post();

				$img = get_field('case_study_image');
				$text = get_field('short_description');
				?>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="blog_item casestudy_item">
						<a href="<?php the_permalink(); ?>" class="blogimg casestudyimg">
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</a>
						<div class="blog_text casestudy_text">
							<div class="blog_meta">
								<?php echo get_the_date('F j, Y'); ?>
							</div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php echo $text; ?>
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