<?php
/*
Plugin Name: Fast Gallery Mosaic
Plugin URI: http://plugins.ad-theme.com/fastgallery_mosaic/
Description: Fast Gallery Mosaic - Premium Wordpress Gallery Plugin
Author: Ad-theme.com
Version: 1.0
Author URI: http://www.ad-theme.com
Compatibility: WP 3.9.x - WP 4.x.x
*/

// Basic plugin definitions 
define ('PLG_NAME_fastgallery_mosaic', 'fastgallery_mosaic');
define( 'PLG_VERSION_fastgallery_mosaic', '1.0' );
define( 'AD_FGM_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
define( 'AD_FGM_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

// LANGUAGE
add_action('init', 'fg_localization_init');
function fg_localization_init() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'fastgallery_mosaic', false, $path);
}

// Plugin INIT

require_once(AD_FGM_DIR.'install.php');