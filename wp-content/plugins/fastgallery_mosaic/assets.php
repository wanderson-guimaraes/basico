<?php
/*
File: inc/assets.php
Description: Assets inclusion
Plugin: FAST GALLERY
Author: Ad-theme.com
*/



//********************************************************************************//
// CSS
//********************************************************************************//


// Frontend
add_action( 'wp_enqueue_scripts', 'fastgallery_mosaic_frontend_styles' );

function fastgallery_mosaic_frontend_styles() {
	
	// Main
	wp_register_style( 'fastgallery_mosaic-main-style',  AD_FGM_URL . 'css/style.css' );
	wp_register_style( 'fonts',  AD_FGM_URL . 'css/fonts.css' );
	
	// PHOTOBOX
	wp_register_style( 'photobox',  AD_FGM_URL . 'css/photobox.css' );
	wp_register_style( 'photoboxie',  AD_FGM_URL . 'css/photobox.ie.css' );
	wp_register_style( 'photobox-style',  AD_FGM_URL . 'css/photobox-style.css' );
	
	// PRETTYPHOTO
	wp_register_style( 'prettyPhoto',  AD_FGM_URL . 'css/prettyPhoto.css' );
	
	// MAGNIFIC POPUP
	wp_register_style( 'magnific-popup',  AD_FGM_URL . 'css/magnific-popup.css' );	
	
	// LIGHT GALLERY
	wp_register_style( 'lightgallery',  AD_FGM_URL . 'css/lightGallery.css' );    			
}


// Backend
add_action( 'admin_enqueue_scripts', 'fastgallery_mosaic_backend_styles' );

function fastgallery_mosaic_backend_styles() {
	
	// Main
	wp_register_style( 'fastgallery_mosaic-backend-style',  AD_FGM_URL . 'css/backend.css' );
    wp_enqueue_style( 'fastgallery_mosaic-backend-style' );
	
}



//********************************************************************************//
// JS
//********************************************************************************//


// Frontend
add_action('wp_enqueue_scripts', 'fastgallery_mosaic_frontend_scripts');

function fastgallery_mosaic_frontend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery');
	
	wp_register_script('fgm_removeWhitespace', AD_FGM_URL . 'js/jquery.removeWhitespace.min.js', array('jquery'), '', true);
	wp_register_script('fgm_collagePlus', AD_FGM_URL . 'js/jquery.collagePlus.min.js', array('jquery'), '', true);
	
	// Load main js script
	wp_register_script('fastgallery_mosaic-frontend-script', AD_FGM_URL . 'js/frontend.js', array('jquery'), '', true);

	// PHOTOBOX
	wp_register_script('photobox-js', AD_FGM_URL . 'js/photobox.js', array('jquery'), '', true);
	// PRETTYPHOTO
	wp_register_script('prettyPhoto-js', AD_FGM_URL . 'js/jquery.prettyPhoto.js', array('jquery'), '', true);
	// MAGNIFIC POPUP
	wp_register_script('magnific-popup-js', AD_FGM_URL . 'js/jquery.magnific-popup.js', array('jquery'), '', true);
	
	// LIGHT GALLERY
	wp_register_script('lightgallery-js', AD_FGM_URL . 'js/lightGallery.min.js', array('jquery'), '', true);
	
}

// Backend
add_action('admin_enqueue_scripts', 'fastgallery_mosaic_shortcodes_backend_scripts');

function fastgallery_mosaic_shortcodes_backend_scripts() {
	
	wp_enqueue_script('jquery');
    wp_enqueue_script( 'wp-color-picker-script', AD_FGM_URL . 'js/colorpicker.js', array( 'wp-color-picker' ), false, true );
	
}