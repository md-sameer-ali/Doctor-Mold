<?php 
	/**
	 * 	Template Name: For Me
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
				<div class="col-lg-6 col-md-7 pe-lg-5">
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
							<img src="<?php echo $bannerImgOne['url']; ?>" alt="<?php echo $bannerImgOne['alt']; ?>">
						</div>
						<div class="home_banner_img_two">
							<img src="<?php echo $bannerImgTwo['url']; ?>" alt="<?php echo $bannerImgTwo['alt']; ?>">
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
	$who_research_details = get_field('who_research_details');
	if($who_research_details):
?>
		<section class="who_info_wrapper">
			<div class="container mold_container">
				<div class="who_info_area">
					<div class="content_writing_area">
						<?php echo $who_research_details; ?>
					</div>
				</div>
			</div>
		</section>
<?php endif; ?>
<!-- who_info_wrapper end  -->
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
			<div class="row gx-xxl-5 text-center justify-content-center">
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
		$silent_siege_image = get_field('silent_siege_image');
		$silent_siege_details = get_field('silent_siege_details');
		$silent_siege_button = get_field('silent_siege_button');
		if($silent_siege_details) :
	?>
		<section class="common_padding whyus_panel">
			<div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-xl-5">
						<div class="right_side_angle_wrapper">
							<div class="right_side_angle_img">
								<img src="<?php echo $silent_siege_image['url']; ?>" alt="<?php echo $silent_siege_image['alt']; ?>">
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="content_writing_area">
							<?php echo $silent_siege_details; ?>
						</div>
						<div class="home_tab_btn d-flex pt-4 pt-lg-5 silent_area_button">
							<a href="<?php echo $silent_siege_button['url']; ?>" class="all_btn big_btn bitter_btn">
								<span class="normal_btn_text"><?php echo $silent_siege_button['title']; ?></span>
								<span class="hover_btn_text"><?php echo $silent_siege_button['title']; ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- whyus_panel -->
	
	<?php
		$threeGridTitle = get_field('three_grid_title');
		$threeGrid = get_field('three_grid');
	?>
	<!-- <section class="three_grid">
		<div class="container">
			<div class="panel_title text-center mb-4 mb-lg-5">
				<h2 class="text-white"><?php echo $threeGridTitle; ?></h2>
			</div>
			<?php if($threeGrid){ ?>
			<div class="row">
				<?php foreach($threeGrid as $grid) { 
					$img = $grid['image'];
					$title = $grid['title'];
					$text = $grid['text'];
				?>
				<div class="col-lg-4">
					<div class="three_grid_box">
						<div class="three_grid_img">
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div>
						<div class="three_grid_text text-start text-lg-center">
							<h4><?php echo $title; ?></h4>
							<?php echo $text; ?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</section> -->


	<?php
		$roadmap_heading = get_field('roadmap_heading');
		$roadmap_short_description = get_field('roadmap_short_description');
		$forMeTabs = get_field('for_me_tabs');
	?>
	<section class="home_tabs forme_tabs tabs_main forme_page_tabs_wrapper">
		<div class="container">
			<div class="alternative_heading text-center">
				<h2><?php echo $roadmap_heading; ?></h2>
				<p><?php echo $roadmap_short_description; ?></p>
			</div>
			<?php if($forMeTabs) { ?>
			<ul class="tabs-menu home_tab_menu mb-0">
				<?php 
				$i = 1;				  
				foreach($forMeTabs as $tablist) { 
				$icon = $tablist['tab_icon'];
				$title = $tablist['tab_heading'];
				?>
				<li><a href="#tab<?php echo $i; ?>">
					<span class="tabicon"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $title['alt']; ?>"></span>
					<?php echo $title; ?>
					</a></li>
				<?php $i++; } ?>
			</ul>
			<?php } ?>
			<div class="home_tab_inner">
				<?php if($forMeTabs) { ?>
				<?php $i = 1; foreach($forMeTabs as $tabContent) { 
					$tabIcon = $tabContent['tab_icon'];
					$tabTitle = $tabContent['tab_heading'];
					$tabText = $tabContent['tab_text'];
					$tabItems = $tabContent['tab_items'];
					$tabButtons = $tabContent['tab_buttons'];
				?>
				<div class="home_tab_mob_head tab_accordian_head">
					<div class="tabicon"><img src="<?php echo $tabIcon['url']; ?>" alt="<?php echo $tabIcon['alt']; ?>"></div>
					<?php echo $tabTitle; ?>
					<span></span>
				</div>  
				<div id="tab<?php echo $i; ?>" class="tab_content home_tab_content forme_tab_content">
					<!-- NEW DESIGN START  -->
					<div class="home_tab_head text-center">
						<h2><span><?php echo $tabTitle; ?></span></h2>
					</div>
					<?php if($tabItems){ ?>
						<div class="row">
							<?php foreach($tabItems as $roadmap_box) { 
								$img = $roadmap_box['remediation_item_image'];
								$title = $roadmap_box['remediation_item_title'];
								$text = $roadmap_box['remediation_item_text'];
							?>
							<div class="col-lg-4">
								<div class="three_grid_box">
									<div class="three_grid_img">
										<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
									</div>
									<div class="three_grid_text text-start text-lg-center">
										<h4><?php echo $title; ?></h4>
										<?php echo $text; ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					<?php } ?>
					<!-- NEW DESIGN END  -->
				</div>
				<?php $i++; } ?>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- forme_tabs end -->
	 <?php
	 	$video_resources_heading = get_field('video_resources_heading');
	 	
		$video_resourse_posts_array = array(
			'post_type' => 'video_resourse',
			'post_status' => 'publish',
			'posts_per_page' => '-1',
			'order' => 'ASC'
		);
		$video_resourse_posts_query = new WP_Query($video_resourse_posts_array);




	if($video_resourse_posts_query->posts):
 ?>
	 <section class="common_padding video_resource_wrapper">
		<div class="container mold_container">
			<div class="video_resource_area">
				<div class="panel_title resources_panel_title text-center mb-4 mb-lg-5">
					<h2><span><?php echo $video_resources_heading; ?></span></h2>
				</div>
				<div class="video_slider_wrapper">
					<div class="swiper videoSwiper">
						<div class="swiper-wrapper">
							<?php
								foreach($video_resourse_posts_query->posts as $each_video_slider):
									
							?>	
								<div class="swiper-slide">
									<a href="<?php echo get_the_permalink($each_video_slider->ID); ?>" class="video_showcase_area">
										<?php echo get_the_post_thumbnail($each_video_slider->ID); ?>
										<div class="play_icon_area">
											<i class="fa-solid fa-play play_icon"></i>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="videoSwiper_btn videoSwiper_next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M8.72 18.78a.75.75 0 0 1 0-1.06L14.44 12 8.72 6.28a.751.751 0 0 1 .018-1.042.751.751 0 0 1 1.042-.018l6.25 6.25a.75.75 0 0 1 0 1.06l-6.25 6.25a.75.75 0 0 1-1.06 0Z"></path></svg></div>
						<div class="videoSwiper_btn videoSwiper_prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.28 5.22a.75.75 0 0 1 0 1.06L9.56 12l5.72 5.72a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215l-6.25-6.25a.75.75 0 0 1 0-1.06l6.25-6.25a.75.75 0 0 1 1.06 0Z"></path></svg></div>
  					</div>
				</div>
			</div>
		</div>
	 </section>
	<?php endif; ?>
	 <!-- video_resource_wrapper  -->
	 <?php
	 	$water_damaged_heading = get_field('water_damaged_heading');
		$water_damaged_short_description = get_field('water_damaged_short_description');
	 	$water_damaged_slider = get_field('water_damaged_slider');
	 	if($water_damaged_slider) :
	 ?>
		<section class="common_padding mold_water_damage_wrapper">
			<div class="container">
				<div class="mold_water_damage_area">
					<div class="alternative_heading text-center">
						<?php echo $water_damaged_heading; ?>
						<p><?php echo $water_damaged_short_description; ?></p>
					</div>
					<div class="mold_water_damage_slider_wrapper">
						<div class="swiper waterSwiper">
							<div class="swiper-wrapper">
								<?php
									foreach($water_damaged_slider as $each_slider):
										$slider_content_image = $each_slider['slider_content_image'];
										$slider_details = $each_slider['slider_details'];
								?>
									<div class="swiper-slide">
										<div class="mold_water_damage_content_area">
											<div class="water_damage_profile_img">
												<img src="<?php echo $slider_content_image['url'] ?>" alt="<?php echo $slider_content_image['alt'] ?>">
											</div>
											<div class="water_damage_details_area">
												<div class="content_writing_area">
													<?php echo $slider_details; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- mold_water_damage_wrapper end  -->
	  <?php endif; ?>
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
						'posts_per_page' => -1
					);

					$query = new WP_Query($args);
					if ($query->have_posts()) {
						$resources = $query->posts;
						foreach ($resources as $resource) {
							$listimg = get_field('resource_list_image', $resource->ID);
					?>
					<div class="swiper-slide">
						<div class="resource_item  text-center">
							<div class="resource_img">
								<img src="<?php echo $listimg['url']; ?>" alt="<?php echo $listimg['alt']; ?>">
								<a href="<?php the_permalink($resource->ID); ?>" class="resource_play_btn">
									<i class="fa-solid fa-play"></i>
								</a>
							</div>
							<div class="resoruce_text">
								<h3 class="mb-0">
									<a href="<?php the_permalink($resource->ID); ?>"><?php echo get_the_title($resource->ID); ?></a>
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
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							 stroke-linejoin="round" class="feather feather-chevron-left">
							<polyline points="15 18 9 12 15 6"></polyline>
						</svg>
					</div>
					<div class="slide_btn_next resource_slide_btn_next">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							 stroke-linejoin="round" class="feather feather-chevron-right">
							<polyline points="9 18 15 12 9 6"></polyline>
						</svg>
					</div>
				</div>
				<div class="view_more_wrap">
					<a target="<?php echo $resources_button['target']; ?>" href="<?php echo $resources_button['url']; ?>" class="all_btn big_btn d-block outline_btn">
						<span class="normal_btn_text"><?php echo $resources_button['title']; ?></span>
						<span class="hover_btn_text"><?php echo $resources_button['title']; ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- resource_panel -->


	<?php
	$featured_products_title = get_field('featured_products_title');
	$featured_products_button = get_field('featured_products_button');
	?>
	<section class="featured_product">
		<div class="container">
			<div class="panel_title featured_product_title text-center">
				<h2><?php echo $featured_products_title; ?></h2>
			</div>
			<div class="featured_product_slide swiper">
				<div class="swiper-wrapper">
					<?php
					$args = array(
						'post_type'           => 'product',
						'posts_per_page'      => $products,
						'orderby'             => $orderby,
						'order'               => $order == 'asc' ? 'asc' : 'desc',
						'post__in'            => wc_get_featured_product_ids(),
					);

					$featured_query = new WP_Query($args);
					if ($featured_query->have_posts()) {
						$products = $featured_query->posts; // Get the array of posts
						foreach ($products as $post) {
							setup_postdata($post);
							$product = wc_get_product($post->ID);
					?>
					<div class="swiper-slide">
						<div class="featured_product_item">
							<a href="<?php echo get_permalink(); ?>" class="featured_product_img">
								<?php if (has_post_thumbnail($post->ID)) : ?>
								<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
								<?php else : ?>
								<img src="img/productimg.png" alt="">
								<?php endif; ?>
							</a>
							<div class="featured_product_text">
								<h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title($post->ID); ?></a></h4>
								<div class="featured_product_price">
									<?php if ($product->is_on_sale()) : ?>
									<span class="regular_price"><?php echo wc_price($product->get_regular_price()); ?></span>
									<span class="sale_price"><?php echo wc_price($product->get_sale_price()); ?></span>
									<?php else : ?>
									<span class="regular_price"><?php echo wc_price($product->get_price()); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
						wp_reset_postdata();
					} else {
						echo 'No featured products found';
					}
					?>
				</div>
			</div>
			<div class="featured_product_bottom d-flex justify-content-between align-items-center">
				<div class="featured_slide_btn d-flex">
					<div class="slide_btn_prev featured_slide_btn_prev">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							 stroke-linejoin="round" class="feather feather-chevron-left">
							<polyline points="15 18 9 12 15 6"></polyline>
						</svg>
					</div>
					<div class="slide_btn_prev featured_slide_btn_next">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							 stroke-linejoin="round" class="feather feather-chevron-right">
							<polyline points="9 18 15 12 9 6"></polyline>
						</svg>
					</div>
				</div>
				<div class="view_more_wrap">
					<a target="<?php echo $featured_products_button['target']; ?>" href="<?php echo $featured_products_button['url']; ?>" class="all_btn big_btn d-block bitter_btn">
						<span class="normal_btn_text"><?php echo $featured_products_button['title']; ?></span>
						<span class="hover_btn_text"><?php echo $featured_products_button['title']; ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- featured_product -->

	<?php get_template_part('section-template/about-mold', 'section'); ?>

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



<?php 
	get_footer();
?>