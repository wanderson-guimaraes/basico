<?php
/*
File: inc/assets.php
Description: Assets inclusion
Plugin: AD Gallery
Author: Ad-theme.com
*/



//********************************************************************************//
// CSS
//********************************************************************************//


// Frontend
add_action( 'wp_enqueue_scripts', 'adgallery_frontend_styles' );

function adgallery_frontend_styles() {
	
	// Main
	wp_register_style( 'adgallery-main-style',  adgallery_URL . 'assets/css/frontend.css' );
    wp_enqueue_style( 'adgallery-main-style' );
	
	// SGALLERY
	
	wp_register_style( 'sgallery',  adgallery_URL . 'assets/css/sgallery.css' );
    wp_enqueue_style( 'sgallery' );	

	// PRETTYPHOTO
	wp_register_style( 'prettyphoto',  adgallery_URL . 'assets/css/prettyPhoto.css' );
    wp_enqueue_style( 'prettyphoto' );	
	wp_register_style( 'prettyphoto-style',  adgallery_URL . 'assets/css/prettyPhoto-style.css' );
    wp_enqueue_style( 'prettyphoto-style' );	

	// PHOTOBOX
	wp_register_style( 'photobox',  adgallery_URL . 'assets/css/photobox.css' );
    wp_enqueue_style( 'photobox' );	
	wp_register_style( 'photoboxie',  adgallery_URL . 'assets/css/photobox.ie.css' );
    wp_enqueue_style( 'photoboxie' );	
	wp_register_style( 'photobox-style',  adgallery_URL . 'assets/css/photobox-style.css' );
    wp_enqueue_style( 'photobox-style' );
	
	// PHOTOWALL
	wp_register_style( 'photowall',  adgallery_URL . 'assets/css/photowall.css' );
    wp_enqueue_style( 'photowall' );		

	// ANIMATE
	wp_register_style( 'animate',  adgallery_URL . 'assets/css/animate.css' );
    wp_enqueue_style( 'animate' );
																				
	// Fonts
	wp_register_style( 'adgallery-fonts-style',  adgallery_URL . 'assets/css/fonts.css' );
    wp_enqueue_style( 'adgallery-fonts-style' );
	
	// Inline
	wp_add_inline_style( 'adgallery-main-style', get_option('adgallery_custom_css') ); 
	
}


// Backend
add_action( 'admin_enqueue_scripts', 'adgallery_backend_styles' );

function adgallery_backend_styles() {
	
	// Main
	wp_register_style( 'adgallery-backend-style',  adgallery_URL . 'assets/css/backend.css' );
    wp_enqueue_style( 'adgallery-backend-style' );
	
}



//********************************************************************************//
// JS
//********************************************************************************//


// Frontend
add_action('wp_enqueue_scripts', 'adgallery_frontend_scripts');

function adgallery_frontend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery');
	
	// Load main js script
	wp_enqueue_script('adgallery-frontend-script', adgallery_URL . 'assets/js/frontend.js', array('jquery'), '', true);

	// INFINITE SCROLL
	wp_enqueue_script('infinite-scroll', adgallery_URL . 'assets/js/jquery.infinitescroll.js', array('jquery'), '', true);

	// GALLERY ONE
	
	wp_enqueue_script('sgallery-plugins', adgallery_URL . 'assets/js/sgallery-plugins.js', array('jquery'), '', true);
	wp_enqueue_script('sgallery-scripts', adgallery_URL . 'assets/js/sgallery-scripts.js', array('jquery'), '', true);

	// PRETTYPHOTO
	wp_enqueue_script('prettyphoto-js', adgallery_URL . 'assets/js/jquery.prettyPhoto.js', array('jquery'), '', true);

	// PHOTOBOX
	wp_enqueue_script('photobox-js', adgallery_URL . 'assets/js/photobox.js', array('jquery'), '', true);

	// MIXITUP
	wp_enqueue_script('mixitup', adgallery_URL . 'assets/js/jquery.mixitup.js', array('jquery'), '', true);

	// CAROUSEL - FUTURE USE
	wp_enqueue_script('jquery.cycle2.min.js', adgallery_URL . 'assets/js/jquery.cycle2.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery.cycle2.carousel.min.js', adgallery_URL . 'assets/js/jquery.cycle2.carousel.min.js', array('jquery'), '', true);	

	// VGRID
	wp_enqueue_script('vgrid', adgallery_URL . 'assets/js/jquery.vgrid.js', array('jquery'), '', true);	

}


// Backend
add_action('admin_enqueue_scripts', 'adgallery_backend_scripts');

function adgallery_backend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-tabs'); //load tabs
	// Load main js script
	wp_enqueue_script('adgallery-backend-script', adgallery_URL . 'assets/js/backend.js', array('jquery'), '', true);
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', adgallery_URL . 'assets/js/colorpicker.js', array( 'wp-color-picker' ), false, true );
	
}

if (!function_exists('adtheme_theme_setup')):

    function adtheme_theme_setup() {
		add_image_size( 'adgallery_custom_size_default', 260, 260, true );
		add_image_size( 'sgallery', 800, 600, true );
		add_image_size( 'post-cat', 1000, 800, true );
	}
	
endif;

add_action('after_setup_theme', 'adtheme_theme_setup');