<?php
	/* =======================
		Function Template
	======================= */
	require_once('functions/base.php');
	require_once('functions/menu.php');
	require_once('functions/woo-function.php');

	/* =======================
		Theme Option
	======================= */
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title'    => 'Theme General Settings',
			'menu_title'    => 'Theme Settings',
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));
		
		acf_add_options_sub_page(array(
			'page_title'    => 'Theme Header Settings',
			'menu_title'    => 'Header',
			'parent_slug'   => 'theme-general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title'    => 'Theme Footer Settings',
			'menu_title'    => 'Footer',
			'parent_slug'   => 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title'    => 'CTA Section',
			'menu_title'    => 'CTA Section',
			'parent_slug'   => 'theme-general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title'    => 'About Section',
			'menu_title'    => 'About Section',
			'parent_slug'   => 'theme-general-settings',
		));
	}

	
	// Remove <p> and <br/> from Contact Form 7
	add_filter('wpcf7_autop_or_not', '__return_false');

	// SVG Permission

function add_file_types_to_uploads($file_types){

    $new_filetypes = array();

    $new_filetypes['svg'] = 'image/svg';

    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types; 

} 

add_action('upload_mimes', 'add_file_types_to_uploads');




