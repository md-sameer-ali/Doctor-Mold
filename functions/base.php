<?php
    add_filter( 'use_block_editor_for_post', '__return_false' );

    // Adding style and script
    add_action( 'wp_enqueue_scripts', 'add_script_to_childtheme' );
    function add_script_to_childtheme(){
        // loading css
		wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
		wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
		wp_enqueue_style( 'lightbox.min', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
		wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.css');
		wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/css/app.css', array(), '0.0.1', 'all');
        wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), '0.0.1', 'all');
    
        // loading js
        wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery-core'), false, true);
        wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery-core'), false, true);
        wp_enqueue_script( 'jquery.matchHeight', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery-core'), false, true);
        wp_enqueue_script( 'lightbox.min', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery-core'), false, true);
        wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery-core'), false, true);
        wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/gsap.min.js', array('jquery-core'), false, true);
        wp_enqueue_script( 'gsap-ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/ScrollTrigger.min.js', array('jquery-core'), false, true);
		
        wp_enqueue_script( 'app', get_stylesheet_directory_uri().'/js/app.js', array('jquery-core'), '0.0.1', true);
    }