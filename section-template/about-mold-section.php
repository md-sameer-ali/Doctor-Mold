<?php
	$about_mold_image = get_field('about_mold_image', 'options');
	$about_mold_heading = get_field('about_mold_heading', 'options');
	$about_mold_text = get_field('about_mold_text', 'options');
	$about_mold_button = get_field('about_mold_button', 'options');
?>

<section class="about_mold">
	<div class="container mold_container">
		<div class="row align-items-center flex-md-row flex-column-reverse">
			<div class="col-xl-6 col-lg-7 col-md-7">
				<div class="about_mold_text text-center text-md-start">
					<h2><?php echo $about_mold_heading; ?></h2>
					<?php echo $about_mold_text; ?>
					<a href="<?php echo $about_mold_button['url']; ?>" class="all_btn cream_btn">
						<span class="normal_btn_text"><?php echo $about_mold_button['title']; ?></span>
						<span class="hover_btn_text"><?php echo $about_mold_button['title']; ?></span>
					</a>
				</div>
			</div>
			<div class="col-md-5">
				<div class="about_mold_img">
					<img src="<?php echo $about_mold_image['url']; ?>" alt="<?php echo $about_mold_image['alt']; ?>">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- about_mold -->