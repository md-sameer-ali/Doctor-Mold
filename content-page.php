<?php
/**
 * Template Name: Static Content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<?php if ( have_posts() ) { ?>
	<section class="inner_small_banner content_page_banner">
		<div class="container mold_container">
			<div class="inner_banner_text text-center">
				<h1><span><?php the_title(); ?></span></h1>
			</div>
		</div>
	</section>

	<section class="innter_pages content_page">
		<div class="container mold_container">
			<?php while ( have_posts() ) : the_post(); ?>
					<?php $content = get_the_content(); ?>
					<?php if($content) { ?>
						<div class="content_box">
							<?php echo $content; ?>
						</div>
					<?php } else { ?>
					<?php if( have_rows('content') ): ?>
						<?php while( have_rows('content') ): the_row(); ?>
							<?php if( get_row_layout() == 'content_box' ): 
							?>
								<div class="content_box">
									<?php echo get_sub_field('text_box'); ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php } ?>
			<?php endwhile; ?>
		</div>
	</section>
	<?php } ?>
<?php get_footer(); ?>
