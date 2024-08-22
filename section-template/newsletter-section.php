<?php 
	$newsletterHeading = get_field('newsletter_heading', 'options');
	$newsletterForm = get_field('newsletter_shortcode', 'options');
?>
<section class="newsletter_signup">
	<div class="container">
		<div class="row align-items-center">
			<div class="col">
				<h5 class="mb-3 mb-xl-0 text-xl-start text-center"><?php echo $newsletterHeading; ?></h5>
			</div>
			<div class="col-12 col-xxl-5 col-xl-6">
				<div class="footer_subform">
					<?php echo do_shortcode($newsletterForm); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- newsletter_signup -->