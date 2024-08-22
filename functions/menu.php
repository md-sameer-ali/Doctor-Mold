<?php
/*=================
    Register Menus
=================*/
function register_menus(){
    register_nav_menus(
        array(
            'header_menu' => 'Header Menu',
            'footer_menu_home' => 'Footer Menu Home',
            'footer_menu_me' => 'Footer Menu Me',
            'footer_menu_shop' => 'Footer Menu Shop',
            'footer_menu_education' => 'Footer Menu Education',
            'footer_menu_experts' => 'Footer Menu Experts',
            'footer_menu_community' => 'Footer Menu Community',
        )
    );
}
add_action( 'init', 'register_menus' );


// Footer Nav Home
function header_nav() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "header_menu_ul",
        'theme_location'	=> 'header_menu',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}

// Footer Nav Home
function footer_nav_home() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "footer_menu_home_ul",
        'theme_location'	=> 'footer_menu_home',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}

// Footer Nav Me
function footer_nav_me() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "footer_menu_me_ul",
        'theme_location'	=> 'footer_menu_me',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}


// Footer Nav Shop
function footer_nav_shop() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "footer_menu_shop_ul",
        'theme_location'	=> 'footer_menu_shop',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}

// Footer Nav Education
function footer_nav_education() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "footer_menu_education_ul",
        'theme_location'	=> 'footer_menu_education',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}

// Footer Nav Experts
function footer_nav_experts() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "footer_menu_experts_ul",
        'theme_location'	=> 'footer_menu_experts',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}

// Footer Nav Community
function footer_nav_community() {
    wp_nav_menu(array(
        'container'			=> '',
        'container_class'   => false,
        'menu_id'			=> false,
        'menu_class'		=> "footer_menu_community_ul",
        'theme_location'	=> 'footer_menu_community',
        'depth'				=> 0,
        'fallback_cb'		=> '',
        //'walker'			=> new Main_Walker()
    ));
}
