<?php 
	/**
	 * 	Template Name: About Us
	 * */

	
	get_header();
?>
	<?php
		$aboutBannerImg = get_field('banner_image');
		$aboutBannerTitle = get_field('banner_title');
	?>
	<section class="inner_banner parallaxBg about_banner d-flex align-items-center" style="background-image: url(<?php echo $aboutBannerImg['url']; ?>);">
		<div class="container mold_container">
			<div class="inner_banner_text text-center">
				<h1><span><?php echo $aboutBannerTitle; ?></span></h1>
			</div>
		</div>
	</section>
	<!-- home_banner_panel -->

	<?php
		$forHomeImg = get_field('for_home_image');
		$forHomeTitle = get_field('for_home_title');
		$forHomeText = get_field('for_home_text');
		$forHomeBtn = get_field('for_home_button');

		$forMeImg = get_field('for_me_image');
		$forMeTitle = get_field('for_me_title');
		$forMeText = get_field('for_me_text');
		$forMeBtn = get_field('for_me_button');
	?>
	<section class="about_option">
		<div class="container mold_container">
			<div class="row gx-xxl-5">
				<div class="col-lg-6">
					<div class="about_option_item mb-5 mb-lg-0">
						<h3><?php echo $forHomeTitle; ?></h3>
						<div class="about_option_item_img">
							<img class="img-fluid" src="<?php echo $forHomeImg['url']; ?>" alt="<?php echo $forHomeImg['alt']; ?>">
						</div>
						<div class="about_option_item_text">
							<?php echo $forHomeText; ?>
							<a href="<?php echo $forHomeBtn['url']; ?>" class="all_btn big_btn bitter_btn">
								<span class="normal_btn_text"><?php echo $forHomeBtn['title']; ?></span>
								<span class="hover_btn_text"><?php echo $forHomeBtn['title']; ?></span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_option_item">
						<h3><?php echo $forMeTitle; ?></h3>
						<div class="about_option_item_img">
							<img class="img-fluid" src="<?php echo $forMeImg['url']; ?>" alt="<?php echo $forMeImg['alt']; ?>">
						</div>
						<div class="about_option_item_text">
							<?php echo $forMeText; ?>
							<a href="<?php echo $forMeBtn['url']; ?>" class="all_btn big_btn cream_btn">
								<span class="normal_btn_text"><?php echo $forMeBtn['title']; ?></span>
								<span class="hover_btn_text"><?php echo $forMeBtn['title']; ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about_option -->


	<?php
		$ourTeamTitle = get_field('team_heading');
		$ourTeamText = get_field('team_text');
		$teamMembers = get_field('members');
	?>
	<section class="our_team">
		<div class="container">
			<div class="panel_title our_team_title text-center mb-4 mb-lg-5">
				<h2><?php echo $ourTeamTitle; ?></h2>
				<?php echo $ourTeamText; ?>
			</div>

			<div class="our_team_inner">
				<div class="row">
					<?php if($teamMembers) { ?>
						<?php foreach($teamMembers as $member) { 
							$isFeatured = $member['is_this_featured_member'];
							$img = $member['image'];
							$designation = $member['designation'];
							$name = $member['name'];
							$showDescription = $member['want_to_add_description'];
							$description = $member['description'];
						?>
						<div class="<?php echo $isFeatured ? 'col-lg-6 col-md-6' : 'col-lg-3 col-6 team_mob_full'; ?>">
							<div class="our_time_item <?php echo $isFeatured ? 'our_team_big_item' : ''; ?>">
								<div class="our_team_img">
									<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								</div>
								<div class="out_team_content">
									<h4><?php echo $name; ?></h4>
									<h6><?php echo $designation; ?></h6>
									<?php if($showDescription && $description) { ?>
									<div class="out_team_text">
										<p><?php echo $description; ?></p>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<!-- our_team -->


<?php get_footer(); ?>