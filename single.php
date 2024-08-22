<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<?php
	// Start the loop.
	if ( have_posts() ) {
		while ( have_posts() ) { the_post(); ?>
	<section class="blogdetails_banner d-flex align-items-center">
		<div class="container mold_container">
			<div class="blogdetails_banner_text text-center">
				<h1><?php the_title(); ?></h1>
				<h6 class="mb-0"><?php echo ucwords(get_the_author()); ?> &nbsp; <em>||</em> &nbsp; <?php echo get_the_date('F j, Y'); ?></h6>
			</div>
		</div>
	</section>
	<!-- home_banner_panel -->

	<section class="blogdetails">
		<div class="container blogdetails_container">
			<?php
				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'full');
				if($thumbnail_src){
					$thumbnail_url = $thumbnail_src[0];
				}
				$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
			?>
			<div class="blog_details_img">
				<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>">
			</div>

			<div class="blog_content">
				<?php if( have_rows('blog_content') ): ?>
						<?php while( have_rows('blog_content') ): the_row(); ?>
							<?php if( get_row_layout() == 'blog_content_box' ): 
							   $blogImg = get_sub_field('blog_details_image');
							   $imgOn = get_sub_field('want_to_add_image');
							?>
								<div class="blog_content_box">
									<?php echo get_sub_field('blog_details_content'); ?>
									<?php if($blogImg && $imgOn){ ?>
									<div class="blog_content_img">
										<img class="img-fluid" src="<?php echo $blogImg['url']; ?>" alt="<?php echo $blogImg['alt']; ?>">
									</div>
									<?php } ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- Blog Details -->
	<?php
		} 
	} else {
	}
	?>


	<section class="blog_list related_blog">
		<div class="container mold_container">
			<div class="panel_title text-center mb-4 mb-lg-5">
				<h2>Related Blogs</h2>
			</div>
			<div class="row gx-xl-5 justify-content-center">
				<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'post__not_in' => array (get_the_ID())
				);

				$query = new WP_Query($args);
				if ($query->have_posts()) {
					$posts = $query->posts;
					foreach ($posts as $post) {
						$img = get_field('grid_img', $post->ID);
						$text = get_field('short_description', $post->ID);
				?>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="blog_item">
						<a href="<?php the_permalink($post->ID); ?>" class="blogimg">
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</a>
						<div class="blog_text">
							<div class="blog_meta">
								<?php echo ucwords(get_the_author()); ?> &nbsp; <em>||</em> &nbsp; <?php echo get_the_date('F j, Y'); ?>
							</div>
							<h3><a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a></h3>
							<?php echo $text; ?>
						</div>
					</div>
				</div>
				<?php
					}
				}
				wp_reset_postdata();
				?>				
			</div>
		</div>
	</section>
<?php get_footer(); ?>
