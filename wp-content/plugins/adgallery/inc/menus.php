<?php
/*
File: inc/menus.php
Description: Plugin Menus
Plugin: AD Gallery
Author: Ad-theme.com
*/


add_action('admin_menu', 'adgallery_menus');

function adgallery_menus() {
	
	// Sub Page button for a specific Post Type
    add_submenu_page( 'edit.php?post_type=adgallery', __('AD Gallery', PLG_NAME), __('Settings', PLG_NAME), 'manage_options', 'adgallery_main_page', 'adgallery_main_page', plugins_url( PLG_NAME.'/assets/img/main_icon.png' ));
	
	// Main Custom button 
	//add_menu_page('AD Gallery', 'AD Gallery', 'manage_options', 'adgallery-main-page', 'adgallery_main_page', plugins_url( PLG_NAME.'/assets/img/main_icon.png' ));
	
}