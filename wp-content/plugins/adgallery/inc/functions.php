<?php
/*
File: inc/functions.php
Description: Functions
Plugin: AD Gallery
Author: Ad-theme.com
*/

//first register the column
add_filter('manage_adgallery_posts_columns', 'adgallery_columns');
function adgallery_columns($defaults){
    $defaults['Shortcode'] = __('Shortcode');
    return $defaults;
}
 
//then you need to render the column
add_action('manage_adgallery_posts_custom_column', 'adgallery_custom_columns', 5, 2);
function adgallery_custom_columns($column_name, $post_id){
    if($column_name === 'Shortcode'){
        echo get_post_meta($post_id,'_ad_gallery_shortcode_name', true);
    }
}

add_filter('manage_edit-adgallery_columns', 'add_new_adgallery_columns');

function add_new_adgallery_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['title'] = _x('Gallery Name', 'column name');
    $new_columns['Shortcode'] = _x('Shortcode', 'column name');
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}


add_filter('widget_text', 'do_shortcode');
function adhex2rgb($hex) {

   $hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
}

function get_first_image() {
	global $post, $posts;
  	$first_img = '';
  	ob_start();
  	ob_end_clean();
  	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if($output == '1') {
  	$first_img = $matches[1][0];
	}
  	if(empty($first_img)){ //Defines a default image
    	$first_img = WP_PLUGIN_URL . '/adgallery/assets/img/no-img.png';
  	}
	//echo $first_img;
  	return $first_img;
}
