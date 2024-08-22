<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php
} 
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
	<header class="main_header">
        <div class="container mold_container">
            <div class="row gx-0 justify-content-between align-items-center">
				<?php $logo = get_field('site_logo', 'options'); ?>
                <div class="logo col-auto">
                    <a href="<?php echo home_url(''); ?>">
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </a>
                </div>

                <div class="header_right col d-flex align-items-center flex-wrap justify-content-end">                    
                    <nav class="main_nav">
                        <div class="mobile_top">
                            <div class="mobile_logo">
                                <a href="<?php echo site_url(); ?>">
									<img class="img-fluid" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                                </a>
                            </div>
                            <div class="menu_close_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                        </div>
                        <?php header_nav(); ?>
                    </nav>
                    <button class="mob_menu_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="12"></line>
                        </svg>
                    </button>
					<div class="cart_btn_wrap">
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart_btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								 stroke-linejoin="round" class="feather feather-shopping-cart">
								<circle cx="9" cy="21" r="1"></circle>
								<circle cx="20" cy="21" r="1"></circle>
								<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
							</svg>
							<?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
							<span class="cart-count"><?php echo esc_html($cart_count); ?></span>
						</a>
					</div>
                </div>
            </div>
        </div>
        <div class="responsiveOverlay"></div>
    </header>
    <!-- main_header -->


	<main class="main_body">