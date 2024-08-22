<?php get_header(); ?>
	<?php if ( have_posts() ) { ?>
	<?php while ( have_posts() ) { the_post(); ?>
	<section class="blogdetails_banner caseStudy_details_banner_bg d-flex align-items-center">
		<div class="container mold_container">
			<div class="blogdetails_banner_text text-center">
				<h1><?php the_title(); ?></h1>
				<h6 class="mb-0"><?php echo get_the_date('F j, Y'); ?></h6>
			</div>
		</div>
	</section>
	<!-- home_banner_panel -->

	<section class="caseStudy_details_banner position-relative">
		<?php
			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'full');
			if($thumbnail_src){
				$thumbnail_url = $thumbnail_src[0];
			}
			$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
		?>
		<div class="caseStudy_details_img">
			<?php if($thumbnail_src) { ?>
			<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>">
			<?php } ?>
		</div>
		<div class="container">
			<?php if( have_rows('case_study_details') ): ?>
			<?php while( have_rows('case_study_details') ): the_row(); ?>
			<?php if( get_row_layout() == 'project_info' ): 
				$title = get_sub_field('title');
				$description = get_sub_field('description');
				$project_info_lists = get_sub_field('project_info_list');
			?>
			<div class="caseStudy_details_content">
				<h2><?php echo $title; ?></h2>
				<?php echo $description; ?>

				<?php if($project_info_lists) { ?>
				<ul class="project_info">
					<?php foreach($project_info_lists as $pilist) { 
						$label = $pilist['label'];
						$details = $pilist['details'];
					?>
					<li>
						<?php echo $label; ?>
						<strong><?php echo $details ?></strong>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>


	<section class="caseStudy_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-xl-9">
					<?php if( have_rows('case_study_details') ): ?>
						<?php while( have_rows('case_study_details') ): the_row(); ?>
							<?php if( get_row_layout() == 'challenges' ): 
								$challengesTitle = get_sub_field('challenges_title');
								$challengesText = get_sub_field('challenges_description');
								$challengesLists = get_sub_field('challenges_list');
							?>
							<div class="caseStudy_challenges">
								<h3><?php echo $challengesTitle; ?></h3>
								<div class="caseStudy_textbox">
									<?php echo $challengesText; ?>
								</div>
								<?php if($challengesLists) { ?>
								<ul class="caseStudy_challenges_lists">
									<?php foreach($challengesLists as $clist) { 
										$customIcon = $clist['custom_icon'];
										$icon = $clist['icon'];
										$wantCustomIcon = $clist['want_to_add_custom_icon'];
										$text = $clist['text'];
									?>
									<li>
										<span><?php echo $wantCustomIcon ? "<img src='" . $customIcon['url'] . "'>" : $icon; ?></span>
										<?php echo $text; ?>
									</li>
									<?php } ?>
								</ul>
								<?php } ?>
							</div>
							<?php elseif ( get_row_layout() == 'our_process' ): 
								$process_title = get_sub_field('process_title');
								$process_description = get_sub_field('process_description');
								$process_gallery = get_sub_field('process_gallery');
								$process_lists = get_sub_field('process_list');
							?>
							<div class="caseStudy_process">
								<h3><?php echo $process_title; ?></h3>
								<div class="caseStudy_textbox">
									<?php echo $process_description; ?>
								</div>
								<?php if($process_gallery) { ?>
								<div id="processGallery" class="process_gallery">
									<?php foreach( $process_gallery as $image) { ?>
										<a href="<?php echo esc_url($image['url']); ?>" data-lightbox="mygallery"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>"></a>
									<?php } ?>
								</div>
								<?php } ?>
								<?php if($process_lists) { ?>
								<div class="process_list">
									<?php $count = 1; foreach($process_lists as $plist) { 
										$name = $plist['process_name'];
										$description = $plist['process_description'];
									?>
									<div class="process_list_item">
										<h5><span><?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?></span> <?php echo $name; ?></h5>
										<?php echo $description; ?>
									</div>
									<?php $count++; } ?>
								</div>
								<?php } ?>
							</div>

							<?php elseif( get_row_layout() == 'results' ):  
								$result_title = get_sub_field('results_title');
								$result_description = get_sub_field('result_description');
								$results_before_title = get_sub_field('results_before_title');
								$results_before_image = get_sub_field('results_before_image');
								$results_after_title = get_sub_field('results_after_title');
								$results_after_image = get_sub_field('results_after_image');
					
							?>
							<div class="caseStudy_result">
								<h3><?php echo $result_title; ?></h3>
								<div class="caseStudy_textbox">
									<?php echo $result_description; ?>
								</div>

								<div class="row">
									<div class="col-12 col-md-6">
										<div class="case_before_after case_result_before mb-5 mb-md-4 mb-lg-0">
											<h6><?php echo $results_before_title; ?></h6>
											<div class="case_before_after_img">
												<img src="<?php echo $results_before_image['url']; ?>" alt="<?php echo $results_before_image['alt']; ?>" />
											</div>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="case_before_after case_result_before mb-5 mb-md-4 mb-lg-0">
											<h6><?php echo $results_after_title; ?></h6>
											<div class="case_before_after_img">
												<img src="<?php echo $results_after_image['url']; ?>" alt="<?php echo $results_after_image['alt']; ?>" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				<div class="col-xl-3 col-lg-4">
					<div class="more_caseStudies">
						<h4>Case Study :</h4>
						<?php
						$args = array(
							'post_type' => 'case-study',
							'post_status' => 'publish',
							'posts_per_page' => 10,
							'post__not_in' => array (get_the_ID())
						);

						$query = new WP_Query($args);
						if ($query->have_posts()) {
						$posts = $query->posts;						
						?>
						<ul>
							<?php foreach ($posts as $post) { ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php } ?>
	<?php } else { ?>
	<?php } ?>

<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryItems = document.querySelectorAll('#processGallery a');
    galleryItems.forEach((item, index) => {
        const position = index % 3;
        if (position === 0) {
            item.classList.add('large-item');
        } else if (position === 1) {
            item.classList.add('medium-item-top');
        } else if (position === 2) {
            item.classList.add('medium-item-bottom');
        }
    });
});

</script> -->
	
<?php get_footer(); ?>