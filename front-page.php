<?php 
	/*
	 * Template Name: New Home Page
	 * */
	get_header();
	$directory = get_stylesheet_directory_uri();

	$banner_heading_and_details = get_field('banner_heading_and_details');
	$compare_text_with_button_area = get_field('compare_text_with_button_area');
	$banner_video_thumbnail = get_field('banner_video_thumbnail');
	$upload_the_video = get_field('upload_the_video');

?>

<!--Video Modal -->
<div class="modal video_player_modal show fade" id="videoPlayerModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-between">
				<h5 class="mb-0">Doctor Mold</h5>
				<i class="fa-solid fa-xmark cut_button"></i>
			</div>
			<div class="modal-body">
				<video controls=""
					poster="<?php echo $banner_video_thumbnail['url']; ?>"
					width="100%" height="100%">
					<source
						src="<?php echo $upload_the_video['url']; ?>"
						type="<?php echo $upload_the_video['mime_type']; ?>">
				</video>
			</div>
		</div>
	</div>
</div>

<section class="common_bg_color banner_new_wrapper">
	<div class="container mold_container">
		<div class="banner_new_area">
			<div class="banner_details_area pe-0 pe-m-5 pe-lg-0">
				<div class="banner_new_text_area">
					<?php echo $banner_heading_and_details; ?>
				</div>
				<div class="compare_box_wrapper">
					<?php 
						foreach($compare_text_with_button_area as $compare_item) :
							$compare_text = $compare_item['compare_text'];
							$compare_button = $compare_item['compare_button'];
							$button_color = $compare_item['button_color'];
					?>
						<div class="compare_box_area">
							<?php echo $compare_text; ?>
							<a href="<?php echo $compare_button['url']; ?>" class="all_btn big_btn <?php echo ($button_color) ? 'bitter_btn' : 'cream_btn';?>">
								<span class="normal_btn_text"><?php echo $compare_button['title']; ?></span>
								<span class="hover_btn_text"><?php echo $compare_button['title']; ?></span>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="banner_video_area" id="video_show_case_area">
				<img src="<?php echo $banner_video_thumbnail['url']; ?>" alt="<?php echo $banner_video_thumbnail['alt']; ?>">
				<div class="play_icon_area video_pop_up_btn">
					<i class="fa-solid fa-play play_icon"></i>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner Section End  -->
 <?php
 $mold_description = get_field('mold_description');
 $description_area_redirect_buttons = get_field('description_area_redirect_buttons');
 if($mold_description):
 ?>
<section class="common_padding common_bg_color resource_content_wrapper">
	<div class="container mold_container">
		<div class="resource_content_area">
			<div class="resource_content text-center">
				<?php echo $mold_description; ?>
			</div>
			<div class="home_tab_btn detection_tab_btn d-flex justify-content-center">
				<?php 
					foreach ($description_area_redirect_buttons as $description_button) :
						$redirect_button = $description_button['redirect_button'];
						$button_color = $description_button['button_color'];
				?>
				<a href="<?php echo $redirect_button['url']; ?>" class="all_btn big_btn <?php echo ($button_color) ? 'bitter_btn' : 'cream_btn';?>">
					<span class="normal_btn_text"><?php echo $redirect_button['title']; ?></span>
					<span class="hover_btn_text"><?php echo $redirect_button['title']; ?></span>
				</a>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- Resource Content Section End  -->
<?php
 $tabs_area_heading = get_field('tabs_area_heading');
 $home_tabs = get_field('home_tabs');
 if($home_tabs):
 ?>
<div class="common_padding tabs_main take_back_control">
	<div class="container">
		<div class="alternative_heading text-center">
			<h2><?php echo $tabs_area_heading; ?></h2>
		</div>
		<ul class="tabs-menu home_tab_menu mb-0">
			<?php
				foreach ($home_tabs as $key => $home_tab_name) :
					$tab_icon = $home_tab_name['tab_icon'];
					$tab_name = $home_tab_name['tab_name'];
			?>
				<li>
					<a href="#tab<?php echo $key; ?>">
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
				foreach ($home_tabs as $key => $home_tab_name) :
					$tab_icon = $home_tab_name['tab_icon'];
					$tab_name = $home_tab_name['tab_name'];
					$tab_content_heading = $home_tab_name['tab_content_heading'];
					$tab_content_short_description = $home_tab_name['tab_content_short_description'];
					$concern_area = $home_tab_name['concern_area'];
			?>
				<div class="home_tab_mob_head tab_accordian_head">
					<div class="tabicon">
						<img src="<?php echo $tab_icon['url']; ?>" alt="<?php echo $tab_icon['alt']; ?>">
					</div>
					<?php echo $tab_name; ?> <span></span>
				</div>
				<div id="tab<?php echo $key; ?>" class="tab_content home_tab_content detection_tab_content" style="display: block;">
					<div class="home_tab_head text-center">
						<h2><span><?php echo $tab_content_heading; ?></span></h2>
						<p><?php echo $tab_content_short_description; ?></p>
					</div>
					<div class="row">
						<?php 
							foreach($concern_area as $concern_item) :
								$concern_image = $concern_item['concern_image'];
								$concern_question_or_heading = $concern_item['concern_question_or_heading'];
								$concern_answer_or_details = $concern_item['concern_answer_or_details'];
						?>
							<div class="col-lg-6">
								<div class="three_grid_box">
									<div class="three_grid_img">
										<img src="<?php echo $concern_image['url']; ?>" alt="<?php echo $concern_image['alt']; ?>">
									</div>
									<div class="three_grid_text text-start text-lg-center">
										<h4><?php echo $concern_question_or_heading; ?></h4>
										<p><?php echo $concern_answer_or_details; ?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- Take Control Back End -->
<?php

 $doctor_tabs = get_field('doctor_tabs');
 if($doctor_tabs):
 ?>
<section class="common_bg_color meet_our_team_wrapper tabs_main">
	<div class="container mold_container">
		<div class="row align-items-center justify-content-between flex-md-row">
			<div class="col-lg-6">
				<div class="meet_doctor_img">
					<ul class="tabs-menu doctors_tabs_menu">
						<?php
							foreach($doctor_tabs as $key => $each_doctor) :
								$doctor_image = $each_doctor['doctor_image'];
						?>
							<li>
								<a href="#doctortab<?php echo $key; ?>">
									<img src="<?php echo $doctor_image['url']; ?>" alt="<?php echo $doctor_image['alt']; ?>"></a>
							</li>
						<?php endforeach; ?>
					</ul>

				</div>
			</div>
			<div class="col-lg-5">
				<?php 
					foreach($doctor_tabs as $key => $each_doctor) :
						$heading_of_doctor_description = $each_doctor['heading_of_doctor_description'];
						$doctor_description = $each_doctor['doctor_description'];
						$doctor_booking_button = $each_doctor['doctor_booking_button'];
				?>
					<div class="tab_content doctor_info_wrap accordion_wrap" id="doctortab<?php echo $key; ?>">
						<div class="about_mold_text text-center text-md-start">
							<h2><?php echo $heading_of_doctor_description; ?></h2>
							<p><?php echo $doctor_description; ?></p>
							<a href="<?php echo $doctor_booking_button['url']; ?>" class="all_btn cream_btn">
								<span class="normal_btn_text"><?php echo $doctor_booking_button['title']; ?></span>
								<span class="hover_btn_text"><?php echo $doctor_booking_button['title']; ?></span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- Meet Our Team End  -->
<?php

$testimonial_heading = get_field('testimonial_heading', 'options');
$testimonial_content_area = get_field('testimonial_content_area', 'options');
$testimonial_section_image = get_field('testimonial_section_image', 'options');
if($testimonial_content_area):
?>
<section class="testimonial_wrapper">
	<div class="container">
		<div class="testimonial_area">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="testimonial_all_content">
						<div class="home_banner_text">
							<h2><span><?php echo $testimonial_heading; ?></span></h2>
						</div>
						<div class="quote_img_area">
							<img src="<?php echo $directory; ?>/img/quote.svg" alt="img">
						</div>
						<div class="swiper testimonial_swiper">
							<div class="swiper-wrapper">
								<?php
									foreach($testimonial_content_area as $each_content) :
										$testimonial_content = $each_content['testimonial_content'];
										$testimonial_person_name = $each_content['testimonial_person_name'];
								?>
									<div class="swiper-slide">
										<div class="testimonial_content_area">
											<p><?php echo $testimonial_content; ?></p>
											<div class="testimonial_person_name">
												<span>~ <?php echo $testimonial_person_name; ?></span>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="swiper-pagination testimonial_pagination"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="why_usimg_wrap">
						<div class="why_usimg why_usimg_left">
							<img src="<?php echo $testimonial_section_image['url']; ?>"
								alt="<?php echo $testimonial_section_image['alt']; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php $faq_type = get_field('faq_type', 448); ?>
<section class="faq_list tabs_main">
	<div class="container">
		<div class="panel_title resources_panel_title text-center">
			<h2><span>FAQs</span></h2>
		</div>
		<?php if($faq_type){ ?>
		<ul class="tabs-menu faq_tabs_menu">
			<?php $i = 1; foreach($faq_type as $type ) { ?>
			<li><a href="#faqtab<?php echo $i; ?>"><?php echo $type['faq_type_name']; ?></a></li>
			<?php $i++; } ?>
		</ul>
		<?php } ?>

		<?php if($faq_type){ ?>
		<div class="faq_tab_wrap">
			<?php $i = 1; foreach($faq_type as $type ) { 
					$faqItems = $type['faq_list'];
				?>
			<div class="tab_content faq_accordion_wrap accordion_wrap" id="faqtab<?php echo $i; ?>">
				<?php if($faqItems){ ?>
				<?php foreach($faqItems as $faq) { 
							$faqQuestion = $faq['question'];
							$faqAnswer = $faq['answer'];
							?>
				<div class="faq_accordion_item">
					<div class="faq_accordion_question accordion_head">
						<?php echo $faqQuestion; ?>
						<span></span>
					</div>
					<div class="faq_accordion_answer accordion_content">
						<?php echo $faqAnswer; ?>
					</div>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
			<?php $i++; } ?>
		</div>
		<?php } ?>
	</div>
</section>




<?php get_footer(); ?>