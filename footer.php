<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

	</main>
	<!-- main_body -->
	<?php get_template_part('section-template/newsletter', 'section'); ?>
	
	<?php 
		$footerLogo = get_field('footer_logo', 'options');
		$footerSocial = get_field('footer_social', 'options');
		$footerTitle1 = get_field('footer_title_1', 'options');
		$footerTitle2 = get_field('footer_title_2', 'options');
		$footerTitle3 = get_field('footer_title_3', 'options');
		$footerTitle4 = get_field('footer_title_4', 'options');
		$footerTitle5 = get_field('footer_title_5', 'options');
		$footerTitle6 = get_field('footer_title_6', 'options');
	?>
    <footer class="main_footer">
        <div class="container mold_container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer_item">
                        <div class="footer_logo text-center">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo $footerLogo['url']; ?>" alt="<?php echo $footerLogo['alt']; ?>">
                            </a>
                        </div>
						<?php if($footerSocial){ ?>
                        <ul class="footer_social">
                            <li class="followtext">Follow Us:</li>
							<?php foreach($footerSocial as $social) { ?>
                            <li><a target"_blank" href="<?php echo $social['link']; ?>"><?php echo $social['icon']; ?></a></li>
							<?php } ?>
                        </ul>
						<?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-md-6">
                    <div class="footer_item footer_menu">
                        <div class="footer_menu_col">
                            <h4><?php echo $footerTitle1; ?></h4>
                            <?php footer_nav_home(); ?>
                        </div>
                        <div class="footer_menu_col">
                            <h4><?php echo $footerTitle2; ?></h4>
                            <?php footer_nav_me(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-md-6">
                    <div class="footer_item footer_menu">
                        <div class="footer_menu_col">
                            <h4><?php echo $footerTitle3; ?></h4>
                            <?php footer_nav_shop(); ?>
                        </div>
                        <div class="footer_menu_col">
                            <h4><?php echo $footerTitle4; ?></h4>
                            <?php footer_nav_education(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_item footer_menu">
                        <div class="footer_menu_col">
                            <h4><?php echo $footerTitle5; ?></h4>
                            <?php footer_nav_experts(); ?>
                        </div>
                        <div class="footer_menu_col">
                            <h4><?php echo $footerTitle6; ?></h4>
                            <?php footer_nav_community(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- main_footer -->

    <section class="copyright_text">
        <div class="container mold_container">
            <div class="text-center">
                <p class="mb-0"><?php echo get_field('copyright_text', 'options'); ?></p>
            </div>
        </div>
    </section>
    <!-- copyright_text -->

<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
	</body>
</html>
