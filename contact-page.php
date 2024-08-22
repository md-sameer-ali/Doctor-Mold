<?php 
	/**
	 * 	Template Name: Contact Us
	 * */

	
	get_header();
?>
	<?php
		$contactBannerTitle = get_field('banner_title');
		$contactBanneText = get_field('banner_text');
	?>
	<section class="contact_banner inner_color_banner ">
		<div class="container">
			<div class="inner_banner_text contact_banner_text">
				<div class="row">
					<div class="col-lg-5">
						<h1 class="mb-3 col-lg-0"><span><?php echo $contactBannerTitle; ?></span></h1>
					</div>

					<div class="col-lg-7">
						<?php echo $contactBanneText; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- contact_banner -->
	

	<?php
		$contactFromTitle = get_field('contact_form_title');
		$contactFrom = get_field('contact_form_shortcode');

		$contactEmailIcon = get_field('contact_email_icon');
		$contactEmail = get_field('contact_email');
		$contactNumberIcon = get_field('contact_number_icon');
		$contactNumber = get_field('contact_number');
		$contactAddressIcon = get_field('contact_address_icon');
		$contactAddress = get_field('contact_address');

		$contact_socials = get_field('contact_socials');
	?>
	<section class="contact_panel">
		<div class="container">
			<div class="contact_box">
				<div class="row justify-content-between flex-lg-row flex-column-reverse">
					<div class="col-xl-8 col-lg-7">
						<div class="contact_form">
							<div class="contacthead">
								<h2><?php echo $contactFromTitle; ?></h2>
							</div>
							<?php echo do_shortcode($contactFrom); ?>
						</div>
					</div>

					<div class="col-xxl-3 col-xl-4 col-lg-5">
						<div class="contact_info">
							<div class="contact_info_item">
								<span class="contact_info_icon">
									<?php echo $contactEmailIcon; ?>
								</span>
								<a href="mailto:<?php echo $contactEmail; ?>"><?php echo $contactEmail; ?></a>
							</div>
							<div class="contact_info_item">
								<span class="contact_info_icon">
									<?php echo $contactNumberIcon; ?>
								</span>
								<a href="tel:<?php echo $contactNumber; ?>"><?php echo $contactNumber; ?></a>
							</div>
							<div class="contact_info_item">
								<span class="contact_info_icon">
									<?php echo $contactAddressIcon; ?>
								</span>
								<p class="mb-0"><?php echo $contactAddress; ?></p>
							</div>
							<div class="contact_info_item">
								<?php if($contact_socials){ ?>
								<ul>
									<?php foreach($contact_socials as $social) { 
									$icon = $social['icon'];
									$link = $social['link'];
									?>
									<li><a href="<?php echo $link; ?>" target="_blank"><?php echo $icon; ?></a></li>
									<?php }?>
								</ul>
								<?php } ?>
								<p class="mb-0">Social Profile</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- contact_panel -->

<?php get_footer(); ?>