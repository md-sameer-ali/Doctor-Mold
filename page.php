<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<?php if ( have_posts() ) { ?>
	<section class="inner_small_banner">
		<div class="container mold_container">
			<div class="inner_banner_text text-center">
				<h1><span><?php the_title(); ?></span></h1>
			</div>
		</div>
	</section>

	<section class="innter_pages">
		<div class="container mold_container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</section>
	<?php } ?>
<?php get_footer(); ?>
