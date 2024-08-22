<?php 
	/**
	 * 	Template Name: FAQ's
	 * */

	
	get_header();
?>
	<?php
		$faqBannerTitle = get_field('banner_title');
	?>
	<section class="inner_small_banner primary_small_banner faq_banner">
		<div class="container">
			<div class="inner_banner_text faq_banner_text text-center">
				<?php if($faqBannerTitle){ ?>
					<h1><span><?php echo $faqBannerTitle; ?></span></h1>
				<?php } else { ?>
					<h1><span><?php the_title(); ?></span></h1>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- faq_banner -->
	<?php $faq_type = get_field('faq_type'); ?>
	<section class="faq_list tabs_main">
		<div class="container">
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