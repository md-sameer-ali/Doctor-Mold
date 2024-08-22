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
				<h6 class="mb-0"><?php echo get_the_date('F j, Y'); ?></h6>
			</div>
		</div>
	</section>
	<!-- home_banner_panel -->

	<section class="blogdetails">
		<div class="container blogdetails_container">
			<?php
				$want_to_add_file = get_field('want_to_add_file');
				$resource_video = get_field('resource_video');
				$resource_video_file = get_field('resource_video_file');
								
				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'full');
				if($thumbnail_src){
					$thumbnail_url = $thumbnail_src[0];
				}
				$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
			?>
<!-- 			<div class="blog_details_img resource_details_video">
				<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>">
			</div> -->
			<div class="blog_details_img resource_details_video">
				<?php if($want_to_add_file && $resource_video_file) { ?>
				<video width="320" height="240" controls>
					<?php if($resource_video_file['mime_type'] === 'video/mp4') { ?>
					<source src="<?php echo $resource_video_file['url']; ?>" type="<?php echo $resource_video_file['mime_type']; ?>">
					<?php } else { ?>
					<source src="<?php echo $resource_video_file['url']; ?>" type="<?php echo $resource_video_file['mime_type']; ?>">
					<?php } ?>
				</video>
				<?php } else { ?>
				<?php echo $resource_video; ?>
				<?php } ?>
			</div>

			<div class="blog_content">
				<?php the_content(); ?>
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
				<h2>Related Resources</h2>
			</div>
			<div class="row gx-xl-5 justify-content-center">
				<?php
				$args = array(
					'post_type' => 'resource',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'post__not_in' => array (get_the_ID())
				);

				$query = new WP_Query($args);
				if ($query->have_posts()) {
					$posts = $query->posts;
					foreach ($posts as $post) {
						$listimg = get_field('resource_list_image', $resource->ID);
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
								<a href="<?php the_permalink(); ?>"><?php echo get_the_title($resource->ID); ?></a>
							</h3>
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
