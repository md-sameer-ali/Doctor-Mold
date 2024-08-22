<?php 
	/**
	 * 	Template Name: For Home
	 * */

	$directory = get_stylesheet_directory_uri();
	get_header();

	$upload_the_video = get_field('upload_the_video');
	$video_thumbnail = get_field('video_thumbnail');
	$uploaded_video_title = get_field('uploaded_video_title'); 

?>
<!--Video Modal -->
<div class="modal video_player_modal show fade" id="videoPlayerModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-between">
				<h5 class="mb-0"><?php echo $uploaded_video_title; ?></h5>
				<i class="fa-solid fa-xmark cut_button"></i>
			</div>
			<div class="modal-body">
				<video controls=""
					poster="<?php echo $video_thumbnail['url']; ?>"
					width="100%" height="100%">
					<source
						src="<?php echo $upload_the_video['url']; ?>"
						type="<?php echo $upload_the_video['mime_type']; ?>">
				</video>
			</div>
		</div>
	</div>
</div>
<?php 
		$bannerTitle = get_field('banner_title');
		$bannerMiniTitle = get_field('banner_mini_title');
		$bannerButton = get_field('banner_button');
		$bannerImgOne = get_field('banner_image_one');
		$bannerImgTwo = get_field('banner_image_two');
	?>
<section class="home_banner_panel for_home_banner_wrapper">
	<div class="container mold_container">
		<div class="row align-items-center flex-md-row flex-column-reverse">
			<div class="col-lg-6 col-md-7">
				<div class="home_banner_text">
					<h2><span><?php echo $bannerMiniTitle; ?></span></h2>
					<?php echo $bannerTitle; ?>
					<a href="<?php echo $bannerButton['url']; ?>" class="all_btn bitter_btn">
						<span class="normal_btn_text"><?php echo $bannerButton['title']; ?></span>
						<span class="hover_btn_text"><?php echo $bannerButton['title']; ?></span>
					</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-5">
				<div class="home_banner_img position-relative">
					<div class="home_banner_img_one">
						<img src="<?php echo $bannerImgTwo['url']; ?>" alt="<?php echo $bannerImgTwo['alt']; ?>">
					</div>
					<div class="home_banner_img_two">
						<img src="<?php echo $bannerImgOne['url']; ?>" alt="<?php echo $bannerImgOne['alt']; ?>">
						<div class="play_icon_area video_pop_up_btn">
							<i class="fa-solid fa-play play_icon"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- home_banner_panel -->
 <?php
	$is_this_you_heading = get_field('is_this_you_heading');
	$is_this_you_boxes = get_field('is_this_you_boxes');
	if($is_this_you_boxes) :
 ?>
<section class="is_this_you_wrapper">
	<div class="container">
		<div class="is_this_you_area">
			<div class="panel_title panel_title_black text-center mb-4">
				<h2><?php echo $is_this_you_heading; ?></h2>
			</div>
			<div class="row gx-xxl-5 text-center">
				<?php 
					foreach($is_this_you_boxes as $each_box) :
						$box_icon = $each_box['box_icon'];
						$box_text = $each_box['box_text'];
				?>
					<div class="col-lg-3 col-md-6">
						<div class="problem_showing_box">
							<div class="problem_icon_area">
								<img src="<?php echo $box_icon['url']; ?>" alt="<?php echo $box_icon['alt']; ?>">
							</div>
							<div class="problem_box_details">
								<p><?php echo $box_text; ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- is_this_you_wrapper end -->


	<?php 
		$forMeTabs = get_field('for_me_tabs');
	?>

<section class="home_tabs tabs_main you_are_not_alone_wrapper">
	<div class="container mold_container">
		<?php if($forMeTabs) { ?>
		<ul class="tabs-menu home_tab_menu mb-0">
			<?php $tabIndex = 1; foreach($forMeTabs as $tab) { 
				$icon = $tab['tab_icon'];
				$tabHeading = $tab['tab_heading'];
				$tabSubHeading = $tab['tab_sub_heading'];
			?>
			<li>
				<a href="#tabs<?php echo $tabIndex; ?>">
					<span class="tabicon"><img src="<?php echo $icon ? $icon['url'] : bloginfo('stylesheet_directory') . '/img/search@2x.png'; ?>" alt="<?php echo $icon['alt']; ?>"></span>
					<?php if(!$tabSubHeading) { ?>
					<?php echo $tabHeading ? $tabHeading : "Tab Heading " . $tabIndex; ?>
					<?php } else { ?>
					<p class="small_tab_title">
						<?php echo $tabHeading; ?>
						<span><?php echo $tabSubHeading ?></span>
					</p>
					<?php } ?>
				</a>
			</li>
			<?php $tabIndex++; } ?>
		</ul>
		<?php } ?>
		
		<div class="home_tab_inner">
			<?php if($forMeTabs) { ?>
			<?php $tabIndex = 1; foreach($forMeTabs as $tab) { 
				$icon = $tab['tab_icon'];
				$tabHeading = $tab['tab_heading'];
				$tabSubHeading = $tab['tab_sub_heading'];
				$tabText = $tab['tab_right_text'];
				$tabImage = $tab['tab_image'];
			?>
			<div class="home_tab_mob_head tab_accordian_head">
				<div class="tabicon">
					<img src="<?php echo $icon ? $icon['url'] : bloginfo('stylesheet_directory') . '/img/search@2x.png'; ?>" alt="<?php echo $icon['alt']; ?>">
				</div>
				<?php echo $tabHeading; ?>
				<span></span>
			</div>
			<div id="tabs<?php echo $tabIndex; ?>" class="tab_content home_tab_content photo_tab_content">
				<div class="row justify-content-between">
					<div class="col-xl-5">
						<div class="right_side_angle_wrapper">
							<div class="right_side_angle_img">
								<img src="<?php echo $tabImage['url']; ?>" alt="<?php echo $tabImage['alt']; ?>">
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="content_writing_area">
							<?php if($tabText) { ?>
								<?php echo $tabText; ?>
							<?php } else { ?>
								<h2>No content found...</h2>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php $tabIndex++; } ?>
			<?php } ?>
		</div>
	</div>
</section>

<!-- Home Big Tab End  -->
 <?php 
	$is_there_a_test_heading = get_field('is_there_a_test_heading');
	$is_there_a_test_content_box = get_field('is_there_a_test_content_box');
	if($is_there_a_test_content_box):
 ?>
<section class="product_details_wrapper">
	<div class="container mold_container">
		<div class="product_details_area">
			<div class="panel_title panel_title_black text-center mb-4 mb-md-5">
				<h2><?php echo $is_there_a_test_heading; ?></h2>
			</div>
			<div class="product_details_cards">
				<div class="row gx-xl-5">
					<?php
						foreach($is_there_a_test_content_box as $each_test_content_box) :
							$is_there_a_test_content = $each_test_content_box['is_there_a_test_content'];
					?>
						<div class="col-xl-4">
							<div class="hr_product_card_box">
								<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
									<path fill="#c5ae98" d="M65,-3.3C65,17.9,32.5,35.7,8.9,35.7C-14.8,35.7,-29.5,17.9,-29.5,-3.3C-29.5,-24.5,-14.8,-49,8.9,-49C32.5,-49,65,-24.5,65,-3.3Z" transform="translate(100 100)" />
								</svg>
								
								<div class="hr_box_content_area">
									<?php echo $is_there_a_test_content; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- product_details_wrapper end  -->
<?php 
	$explore_the_connection_details_area = get_field('explore_the_connection_details_area');
	if($explore_the_connection_details_area):
 ?>
 <section class="common_bg_color explore_the_connection_wrapper">
	<div class="container">
		<div class="explore_the_connection_area">
			<?php
				foreach($explore_the_connection_details_area as $each_explore) :
					$green_box_content = $each_explore['green_box_content'];
					$normal_box_content = $each_explore['normal_box_content'];
			?>
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-5">
						<div class="hr_green_bg_content_box">
							<div class="hr_green_bg_content">
								<div class="hr_green_bg_content_text">
									<?php echo $green_box_content; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="content_writing_area">
							<?php echo $normal_box_content; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
 </section>
 <?php endif; ?>
 <!-- explore_the_connection_wrapper end  -->
 <?php 
	$diagnosis_tabs = get_field('diagnosis_tabs');
	if($diagnosis_tabs):
 ?>
 <section class="common_padding tabs_main take_back_control step_showing_wrapper">
	<div class="container">
		<div class="step_showing_area">
			<ul class="tabs-menu home_tab_menu mb-0">
				<?php 
					foreach($diagnosis_tabs as $key => $each_diagnosis_tab):
						$tab_icon = $each_diagnosis_tab['tab_icon'];
						$tab_name = $each_diagnosis_tab['tab_name'];
				?>
					<li>
						<a href="#steptab<?php echo $key; ?>">
							<span class="tabicon">
								<img src="<?php echo $tab_icon['url']; ?>" alt="<?php echo $tab_icon['alt']; ?>">
							</span>
							<?php echo $tab_name; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="home_tab_inner">
				<?php 
					foreach($diagnosis_tabs as $key => $each_diagnosis_tab):
						$tab_icon = $each_diagnosis_tab['tab_icon'];
						$tab_name = $each_diagnosis_tab['tab_name'];
						$tab_heading = $each_diagnosis_tab['tab_heading'];
						$tab_short_description = $each_diagnosis_tab['tab_short_description'];
						$diagnosis_steps = $each_diagnosis_tab['diagnosis_steps'];
						$tab_bottom_details = $each_diagnosis_tab['tab_bottom_details'];
				?>		
					<div class="home_tab_mob_head tab_accordian_head">
						<div class="tabicon">
							<img src="<?php echo $tab_icon['url']; ?>" alt="<?php echo $tab_icon['alt']; ?>">
						</div>
						<?php echo $tab_name; ?>
					</div>
					<div id="steptab<?php echo $key; ?>" class="tab_content home_tab_content detection_tab_content">
						<div class="step_by_treatment_wrapper">
							<div class="content_writing_area text-center">
								<h2><?php echo $tab_heading; ?></h2>
								<p><?php echo $tab_short_description; ?></p>
							</div>
							<div class="multiple_step_area_main">
								<?php
									foreach($diagnosis_steps as $each_step):
										$step_image = $each_step['step_image'];
										$step_details = $each_step['step_details'];
								?>
									<div class="row justify-content-center">
										<div class="col-6 stepline">
											<div class="step_image_area">
												<img src="<?php echo $step_image['url']; ?>" alt="<?php echo $step_image['alt']; ?>">
											</div>
										</div>
										<div class="col-6">
											<div class="step_text_area">
												<?php echo $step_details; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="content_writing_area text-center step_bottom_details">
								<?php echo $tab_bottom_details; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- step_showing_wrapper end  -->
<?php 
	$how_to_use_heading = get_field('how_to_use_heading');
	$how_to_use_posts_array = array(
		'post_type' => 'how_to_use',
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'order' => 'ASC'
	);
	$how_to_use_posts_query = new WP_Query($how_to_use_posts_array);




	if($how_to_use_posts_query->posts):
 ?>
<div class="where_in_the_world_wrapper">
	<div class="container">
		<div class="where_in_the_world_area">
			<div class="alternative_heading text-center">
				<h2><?php echo $how_to_use_heading; ?></h2>
			</div>
			<div class="row text-center">
				<?php
					foreach($how_to_use_posts_query->posts as $each_how_to) :
				?>
					<div class="col-lg-4">
						<div class="where_box_area">
							<?php echo get_the_post_thumbnail($each_how_to->ID, 'medium'); ?>
							<h3><?php echo $each_how_to->post_title; ?></h3>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- where_in_the_world_wrapper end  -->
<?php 
	$other_projects_heading = get_field('other_projects_heading');
	$projects_array = array(
		'post_type' => 'projects',
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'order' => 'ASC'
	);
	$projects_query = new WP_Query($projects_array);




	if($projects_query->posts):
 ?>
<div class="other_project_wrapper">
	<div class="container">
		<div class="other_project_area">
			<div class="alternative_heading text-center">
				<h2><?php echo $other_projects_heading; ?></h2>
			</div>
			<div class="row text-center">
				<?php
					foreach($projects_query->posts as $each_projects) :
				?>
					<div class="col-lg-4">
						<div class="other_box_area">
							<?php echo get_the_post_thumbnail($each_projects->ID, 'medium'); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- other_project_wrapper end  -->
<?php $parallax_image = get_field('parallax_image'); ?>
<section class="parallaxSingle image_scoll" style="background-image: url(<?php echo $parallax_image['url']; ?>);">
</section>


<?php 
		$resources_title = get_field('resources_title'); 
		$resources_button = get_field('resources_button'); 
	?>
<section class="resource_panel">
	<div class="container">
		<div class="panel_title resources_panel_title text-center">
			<h2><span><?php echo $resources_title; ?></span></h2>
		</div>

		<div class="resource_slide swiper">
			<div class="swiper-wrapper">
				<?php
					$args = array(
						'post_type' => 'resource',
						'posts_per_page' => -1,
						'post_status' => 'publish',
// 						'tax_query' => array(
// 							array(
// 								'taxonomy' => 'resource_category',
// 								'field'    => 'term_id',
// 								'terms'    => $category_id,
// 							),
// 						),
					);

					$query = new WP_Query($args);
					if ($query->have_posts()) {
						$resources = $query->posts;
						foreach ($resources as $resource) {
						$listimg = get_field('resource_list_image', $resource->ID);
					?>
				<div class="swiper-slide">
					<div class="resource_item text-center">
						<div class="resource_img">
							<img src="<?php echo $listimg['url']; ?>" alt="<?php echo $listimg['alt']; ?>">
							<a href="<?php the_permalink($resource->ID); ?>" class="resource_play_btn">
								<i class="fa-solid fa-play"></i>
							</a>
						</div>
						<div class="resoruce_text">
							<h3 class="mb-0">
								<a
									href="<?php the_permalink($resource->ID); ?>"><?php echo get_the_title($resource->ID); ?></a>
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

		<div class="featured_product_bottom d-flex justify-content-between align-items-center">
			<div class="featured_slide_btn d-flex">
				<div class="slide_btn_prev resource_slide_btn_prev">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="feather feather-chevron-left">
						<polyline points="15 18 9 12 15 6"></polyline>
					</svg>
				</div>
				<div class="slide_btn_next resource_slide_btn_next">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="feather feather-chevron-right">
						<polyline points="9 18 15 12 9 6"></polyline>
					</svg>
				</div>
			</div>
			<div class="view_more_wrap">
				<a target="<?php echo $resources_button['target']; ?>" href="<?php echo $resources_button['url']; ?>"
					class="all_btn big_btn d-block outline_btn">
					<span class="normal_btn_text"><?php echo $resources_button['title']; ?></span>
					<span class="hover_btn_text"><?php echo $resources_button['title']; ?></span>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- resource_panel -->



<?php get_template_part('section-template/about-mold', 'section'); ?>


<?php 
	get_footer();
?>