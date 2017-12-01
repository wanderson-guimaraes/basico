<?php
/*
File: inc/install.php
Description: Install functions
Plugin: AD Gallery
Author: Ad-theme.com
*/


//***************************************************************************
// Options Install/Unistall
//***************************************************************************

register_activation_hook(__FILE__,'adgallery_install_options');
register_deactivation_hook(__FILE__, 'adgallery_uninstall_options');


// Install Options Function
function adgallery_install_options() {
	
	// Force to uninstall past options
    adgallery_uninstall_options();
	
	// Add the options
	add_option('adgallery_custom_css','');
	
	// Update the revrite rules on activation
	flush_rewrite_rules();
	
}

// Uninstall Options Function
function adgallery_uninstall_options() { 

	// Remove Options
	delete_option('adgallery_custom_css');
	
	// Update the revrite rules on deactivation
	flush_rewrite_rules();
	
}



//***************************************************************************
// Plugin INIT
//***************************************************************************

// ASSETS
require_once(adgallery_DIR.'inc/assets.php');

// MENUS & PAGES
require_once(adgallery_DIR.'inc/menus.php');

// FUNCTION
require_once(adgallery_DIR.'inc/functions.php');

// ADMIN PAGES
require_once(adgallery_DIR.'inc/pages.php');

// SHORTCODES
require_once(adgallery_DIR.'inc/add.size.php');

// POST TYPE
require_once(adgallery_DIR.'inc/posttype.php');

// METABOXES
require_once(adgallery_DIR.'inc/metaboxes.php');

// METABOXES FRAMEWORK

require_once( adgallery_DIR.'inc/Custom-Meta-Boxes/custom-meta-boxes.php' );
require_once( adgallery_DIR.'inc/Custom-Meta-Boxes/adtheme-metaboxes-functions.php' );

// CUSTOM gallery
require_once(adgallery_DIR.'inc/shortcodes-functions.php');

// SHORTCODES
require_once(adgallery_DIR.'inc/shortcodes.php');

// UPDATE LIBRARY
require_once(adgallery_DIR.'inc/update-notifier.php');