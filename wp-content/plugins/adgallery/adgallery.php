<?php
/*
Plugin Name: AD Gallery
Plugin URI: http://www.ad-theme.com
Description: AD Gallery - Custom Gallery for WP
Author: Ad-theme.com
Version: 1.4
Author URI: http://www.ad-theme.com
*/

// Basic plugin definitions 
define ('PLG_NAME', 'adgallery');
define( 'PLG_VERSION', '1.4' );
define( 'adgallery_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
define( 'adgallery_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

// LANGUAGE
add_action('init', 'localization_init');
function localization_init() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'adgallery', false, $path);
}

// Plugin INIT
require_once(adgallery_DIR.'inc/install.php');