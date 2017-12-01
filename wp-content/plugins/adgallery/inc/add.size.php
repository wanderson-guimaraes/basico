<?php
/*
File: inc/add.size.php
Description: Custom ADD SIZE
Plugin: AD Gallery
Author: Ad-theme.com
*/
function adgallery_add_image_sizes() {
$adgallery_custom1_size_width = get_option( 'adgallery_custom1_size_width', '' );
$adgallery_custom1_size_height = get_option( 'adgallery_custom1_size_height', '' );
$adgallery_custom1_size_crop = get_option( 'adgallery_custom1_size_crop', '' );

$adgallery_custom2_size_width = get_option( 'adgallery_custom2_size_width', '' );
$adgallery_custom2_size_height = get_option( 'adgallery_custom2_size_height', '' );
$adgallery_custom2_size_crop = get_option( 'adgallery_custom2_size_crop', '' );
	
$adgallery_custom3_size_width = get_option( 'adgallery_custom3_size_width', '' );
$adgallery_custom3_size_height = get_option( 'adgallery_custom3_size_height', '' );
$adgallery_custom3_size_crop = get_option( 'adgallery_custom3_size_crop', '' );
	
$adgallery_custom4_size_width = get_option( 'adgallery_custom4_size_width', '' );
$adgallery_custom4_size_height = get_option( 'adgallery_custom4_size_height', '' );
$adgallery_custom4_size_crop = get_option( 'adgallery_custom4_size_crop', '' );

$adgallery_custom_size_grid = get_option( 'adgallery_custom_size_grid', '' );

if(!empty($adgallery_custom1_size_width)) {
	add_image_size( 'adgallery_custom1_size', $adgallery_custom1_size_width, $adgallery_custom1_size_height, $adgallery_custom1_size_crop );
}
if(!empty($adgallery_custom2_size_width)) {
add_image_size( 'adgallery_custom2_size', $adgallery_custom2_size_width, $adgallery_custom2_size_height, $adgallery_custom2_size_crop );
}
if(!empty($adgallery_custom3_size_width)) {
add_image_size( 'adgallery_custom3_size', $adgallery_custom3_size_width, $adgallery_custom3_size_height, $adgallery_custom3_size_crop );
}
if(!empty($adgallery_custom4_size_width)) {
add_image_size( 'adgallery_custom4_size', $adgallery_custom4_size_width, $adgallery_custom4_size_height, $adgallery_custom4_size_crop );
}
if(!empty($adgallery_custom_size_grid )) {
add_image_size( 'adgallery_custom_size_grid', $adgallery_custom_size_grid );
}
}
add_action( 'init', 'adgallery_add_image_sizes' );

add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
        'adgallery_custom1_size' => 'Custom Size 1',
        'adgallery_custom2_size' => 'Custom Size 2',
		'adgallery_custom3_size' => 'Custom Size 3',
        'adgallery_custom4_size' => 'Custom Size 4',
		'adgallery_custom_size_grid' => 'Custom Size Grid'
    );
    return array_merge( $sizes, $custom_sizes );
}