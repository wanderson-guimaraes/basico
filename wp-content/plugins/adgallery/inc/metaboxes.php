<?php
/*
File: inc/metaboxes.php
Description: Metaboxes
Plugin: AD Gallery
Author: Ad-theme.com
*/

function adgallery_add_custom_box() {

    $screens = array( 'adgallery' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'adgallery_sectionid',
            __( 'AD Gallery', 'adgallery' ),
            'adgallery_inner_custom_box',
            $screen, 'normal', 'high'
        );
    }
}
add_action( 'add_meta_boxes', 'adgallery_add_custom_box' );


function adgallery_inner_custom_box( $post ) {

    wp_nonce_field( 'adgallery_inner_custom_box', 'adgallery_inner_custom_box_nonce' );

  	$ad_gallery_show_shortcode = get_post_meta( $post->ID, '_ad_gallery_show_shortcode', true );
  	$ad_gallery_number = get_post_meta( $post->ID, '_ad_gallery_number', true );
  	$ad_gallery_style = get_post_meta( $post->ID, '_ad_gallery_style', true );
  	$ad_gallery_category = get_post_meta( $post->ID, '_ad_gallery_category', true );
  	$ad_gallery_woocommerce_category = get_post_meta( $post->ID, '_ad_gallery_woocommerce_category', true );
	$ad_gallery_wp_ecommerce_category = get_post_meta( $post->ID, '_ad_gallery_wp_ecommerce_category', true );
	$ad_gallery_jigoshop_category = get_post_meta( $post->ID, '_ad_gallery_jigoshop_category', true );
	$ad_gallery_post_cat_category = get_post_meta( $post->ID, '_ad_gallery_post_cat_category', true );
	$ad_gallery_album = get_post_meta( $post->ID, '_ad_gallery_album', true );
	$ad_gallery_custom_size = get_post_meta( $post->ID, '_ad_gallery_custom_size', true );
  	$ad_gallery_caption = get_post_meta( $post->ID, '_ad_gallery_caption', true );
  	$ad_gallery_excerpt = get_post_meta( $post->ID, '_ad_gallery_excerpt', true );
  	$ad_gallery_controls = get_post_meta( $post->ID, '_ad_gallery_controls', true );
	$ad_gallery_direction = get_post_meta( $post->ID, '_ad_gallery_direction', true );
	$ad_gallery_fullscreen = get_post_meta( $post->ID, '_ad_gallery_fullscreen', true );
	$ad_gallery_custom_color_active = get_post_meta( $post->ID, '_ad_gallery_custom_color_active', true );
  	$ad_gallery_custom_color = get_post_meta( $post->ID, '_ad_gallery_custom_color', true );
	$ad_gallery_custom_opacity = get_post_meta( $post->ID, '_ad_gallery_custom_opacity', true );
	$ad_gallery_sgallery_type = get_post_meta( $post->ID, '_ad_gallery_sgallery_type', true );
	$ad_gallery_type = get_post_meta( $post->ID, '_ad_gallery_type', true );					
	$ad_gallery_img_source = get_post_meta( $post->ID, '_ad_gallery_img_source', true );
	$ad_gallery_featured_body = get_post_meta( $post->ID, '_ad_gallery_featured_body', true );
	$ad_gallery_image_effect = get_post_meta( $post->ID, '_ad_gallery_image_effect', true );
	$ad_gallery_image_effect_rotate = get_post_meta( $post->ID, '_ad_gallery_image_effect_rotate', true );
	$ad_gallery_image_effect_scale = get_post_meta( $post->ID, '_ad_gallery_image_effect_scale', true );
	$ad_gallery_image_effect_translate = get_post_meta( $post->ID, '_ad_gallery_image_effect_translate', true );
	$ad_gallery_border_radius = get_post_meta( $post->ID, '_ad_gallery_border_radius', true );
	$ad_gallery_wrap = get_post_meta( $post->ID, '_ad_gallery_wrap', true );
	$ad_gallery_wrap_align = get_post_meta( $post->ID, '_ad_gallery_wrap_align', true );
	$ad_gallery_wrap_margin = get_post_meta( $post->ID, '_ad_gallery_wrap_margin', true );
	$ad_gallery_prettyphoto_style = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_style', true );
	$ad_gallery_prettyphoto_custom_color = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_custom_color', true );
	$ad_gallery_prettyphoto_custom_opacity = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_custom_opacity', true );
	$ad_gallery_prettyphoto_custom_icon = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_custom_icon', true );
	$ad_gallery_prettyphoto_theme = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_theme', true );
	$ad_gallery_prettyphoto_animation_speed = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_animation_speed', true );
	$ad_gallery_prettyphoto_slideshow = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_slideshow', true );
	$ad_gallery_prettyphoto_autoplay_slideshow = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_autoplay_slideshow', true );
	$ad_gallery_prettyphoto_opacity = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_opacity', true );
	$ad_gallery_prettyphoto_show_title = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_show_title', true );
	$ad_gallery_prettyphoto_show_social = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_show_social', true );
	$ad_gallery_prettyphoto_type = get_post_meta( $post->ID, '_ad_gallery_prettyphoto_type', true );
	$ad_gallery_photobox_style = get_post_meta( $post->ID, '_ad_gallery_photobox_style', true );
	$ad_gallery_photobox_custom_color = get_post_meta( $post->ID, '_ad_gallery_photobox_custom_color', true );
	$ad_gallery_photobox_custom_opacity = get_post_meta( $post->ID, '_ad_gallery_photobox_custom_opacity', true );
	$ad_gallery_photobox_custom_icon = get_post_meta( $post->ID, '_ad_gallery_photobox_custom_icon', true );
	$ad_gallery_photobox_thumbs = get_post_meta( $post->ID, '_ad_gallery_photobox_thumbs', true );
	$ad_gallery_photobox_time = get_post_meta( $post->ID, '_ad_gallery_photobox_time', true );
	$ad_gallery_photobox_autoplay = get_post_meta( $post->ID, '_ad_gallery_photobox_autoplay', true );
	$ad_gallery_photobox_title = get_post_meta( $post->ID, '_ad_gallery_photobox_title', true );
	$ad_gallery_photobox_counter = get_post_meta( $post->ID, '_ad_gallery_photobox_counter', true );
	$ad_gallery_photobox_type = get_post_meta( $post->ID, '_ad_gallery_photobox_type', true );
	$ad_gallery_photowall_title = get_post_meta( $post->ID, '_ad_gallery_photowall_title', true );
	$ad_gallery_photowall_title_visible_onload = get_post_meta( $post->ID, '_ad_gallery_photowall_title_visible_onload', true );
	
	// FILTER
	$ad_gallery_filter_effects_scale = get_post_meta( $post->ID, '_ad_gallery_filter_effects_scale', true );
	$ad_gallery_filter_effects_rotateX = get_post_meta( $post->ID, '_ad_gallery_filter_effects_rotateX', true );
	$ad_gallery_filter_effects_rotateY = get_post_meta( $post->ID, '_ad_gallery_filter_effects_rotateY', true );
	$ad_gallery_filter_effects_rotateZ = get_post_meta( $post->ID, '_ad_gallery_filter_effects_rotateZ', true );
	$ad_gallery_filter_effects_blur = get_post_meta( $post->ID, '_ad_gallery_filter_effects_blur', true );
	$ad_gallery_filter_effects_grayscale = get_post_meta( $post->ID, '_ad_gallery_filter_effects_grayscale', true );
	$ad_gallery_filter_easing = get_post_meta( $post->ID, '_ad_gallery_filter_easing', true );
	$ad_gallery_filter_layoutMode = get_post_meta( $post->ID, '_ad_gallery_filter_layoutMode', true );
	$ad_gallery_filter_transitionSpeed = get_post_meta( $post->ID, '_ad_gallery_filter_transitionSpeed', true );
	$ad_gallery_filter_buttonEvent = get_post_meta( $post->ID, '_ad_gallery_filter_buttonEvent', true );
	$ad_gallery_filter_show_sort = get_post_meta( $post->ID, '_ad_gallery_filter_show_sort', true );
	$ad_gallery_filter_action = get_post_meta( $post->ID, '_ad_gallery_filter_action', true );
	$ad_gallery_filter_action_lightbox = get_post_meta( $post->ID, '_ad_gallery_filter_action_lightbox', true );
	$ad_gallery_filter_style = get_post_meta( $post->ID, '_ad_gallery_filter_style', true );
	$ad_gallery_filter_custom_color = get_post_meta( $post->ID, '_ad_gallery_filter_custom_color', true );
	$ad_gallery_filter_custom_opacity = get_post_meta( $post->ID, '_ad_gallery_filter_custom_opacity', true );
	$ad_gallery_filter_custom_icon = get_post_meta( $post->ID, '_ad_gallery_filter_custom_icon', true );
	$ad_gallery_filter_prettyphoto_theme = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_theme', true );
	$ad_gallery_filter_prettyphoto_animation_speed = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_animation_speed', true );
	$ad_gallery_filter_prettyphoto_slideshow = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_slideshow', true );
	$ad_gallery_filter_prettyphoto_autoplay_slideshow = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_autoplay_slideshow', true );
	$ad_gallery_filter_prettyphoto_opacity = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_opacity', true );
	$ad_gallery_filter_prettyphoto_show_title = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_show_title', true );
	$ad_gallery_filter_prettyphoto_show_social = get_post_meta( $post->ID, '_ad_gallery_filter_prettyphoto_show_social', true );
	$ad_gallery_filter_photobox_thumbs = get_post_meta( $post->ID, '_ad_gallery_filter_photobox_thumbs', true );
	$ad_gallery_filter_photobox_time = get_post_meta( $post->ID, '_ad_gallery_filter_photobox_time', true );
	$ad_gallery_filter_photobox_autoplay = get_post_meta( $post->ID, '_ad_gallery_filter_photobox_autoplay', true );
	$ad_gallery_filter_photobox_title = get_post_meta( $post->ID, '_ad_gallery_filter_photobox_title', true );
	$ad_gallery_filter_photobox_counter = get_post_meta( $post->ID, '_ad_gallery_filter_photobox_counter', true );						
	$ad_gallery_photowall_type = get_post_meta( $post->ID, '_ad_gallery_photowall_type', true );
	$ad_gallery_filter_preview_excerpt = get_post_meta( $post->ID, '_ad_gallery_filter_preview_excerpt', true );
	$shortcodes = '[adgallery id="'.get_the_id().'"]';

  /*********************** SHOW SHORTCODE **********************/

  if ($ad_gallery_show_shortcode == 'update') {	
  echo '<label for="ad_gallery_show_shortcode" id="ad_gallery_show_shortcode">';
         _e( "Shortcode (copy and paste this shortcode into post/page): ", 'adgallery' );
  update_post_meta( get_the_id(), '_ad_gallery_shortcode_name', $shortcodes );
  echo '<span class="shortcode-value">'.$shortcodes.'</span>';
  echo '</label>';
  }
  echo '<br>';
  
  /*********************** GALLERY TYPE ************************/
  
  echo '<label for="ad_gallery_type">';
       _e( "Gallery Type", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_type" name="ad_gallery_type">';
  echo '<option value="sgallery"'; if ($ad_gallery_type == 'sgallery') { echo 'selected'; } echo '>S Gallery</div>';
  echo '<option value="prettyphoto"'; if ($ad_gallery_type == 'prettyphoto') { echo 'selected'; } echo '>PrettyPhoto</div>';
  echo '<option value="photobox"'; if ($ad_gallery_type == 'photobox') { echo 'selected'; } echo '>Photobox</div>';
  echo '<option value="photowall"'; if ($ad_gallery_type == 'photowall') { echo 'selected'; } echo '>Photowall</div>';
  echo '<option value="filter"'; if ($ad_gallery_type == 'filter') { echo 'selected'; } echo '>Filter</div>';
  echo '</select>';
  echo '<br>';
  
    /*********************** IMG SOURCE *************************/

  echo '<label for="ad_gallery_img_source">';
       _e( "Img Source", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_img_source" name="ad_gallery_img_source">';
  echo '<option value="post"'; if ($ad_gallery_img_source == 'post') { echo 'selected'; } echo '>Post</option>';
  if(class_exists( 'woocommerce' )) {
  echo '<option value="woocommerce"'; if ($ad_gallery_img_source == 'woocommerce') { echo 'selected'; } echo '>Woocommerce</option>';
  }
  if(class_exists( 'WP_eCommerce' )) {
  echo '<option value="wp-ecommerce"'; if ($ad_gallery_img_source == 'wp-ecommerce') { echo 'selected'; } echo '>WP E-commerce</option>';
  }
  if(class_exists( 'Jigoshop' )) {
  echo '<option value="jigoshop"'; if ($ad_gallery_img_source == 'jigoshop') { echo 'selected'; } echo '>Jigoshop</option>';
  }
  echo '<option value="post_cat"'; if ($ad_gallery_img_source == 'post_cat') { echo 'selected'; } echo '>AD Gallery Post</option>';
  
  echo '<option value="album"'; if ($ad_gallery_img_source == 'album') { echo 'selected'; } echo '>AD Album</option>';
  
  echo '</select>'; 

  echo '<br>';

  /*********************** CATEGORY FOR POST IMG SOURCE *************************/

  echo '<div id="wrap_category"'; 
  if(($ad_gallery_img_source == 'post') || empty($ad_gallery_img_source)) { 
  echo 'style="display:block">'; } 
  else 
  { echo 'style="display:none">'; }

  echo '<label for="ad_gallery_category">';
       _e('Select Category (Multiple category is allowed)', 'adgallery');
  echo '</label> ';
    
  echo '<select multiple="multiple" id="ad_gallery_category" name="ad_gallery_category[]" >
  	<option value="all"';
	if(empty($ad_gallery_category)) { $ad_gallery_category[0] = ''; }
	if($ad_gallery_category[0] == 'all') { echo 'selected'; }
  echo	'>';
	_e('All','adgallery');
  echo '</option>';

  			$categories = get_categories(); 
  			foreach ($categories as $category) {
			$option = '<option value="'.$category->cat_name.'"';
			$i = 0;
			foreach ($ad_gallery_category as $cat_select_name) {
			if ($cat_select_name == $category->cat_name) { $option .= 'selected';}
			}
			$option .= '>';			
			$option .= $category->cat_name;
			$option .= ' ('.$category->category_count.')';
			$option .= '</option>';
			echo $option;
  			}
  echo '</select>';
  
  echo '<br>';
  
  echo '</div>';

  /*********************** ALBUM FOR ALBUM IMG SOURCE *************************/

  echo '<div id="wrap_album"'; 
  if(($ad_gallery_img_source == 'album')) { 
  echo 'style="display:block">'; } 
  else 
  { echo 'style="display:none">'; }

  echo '<label for="ad_gallery_album">';
       _e('Select Album', 'adgallery');
  echo '</label> ';
    
  echo '<select id="ad_gallery_album" name="ad_gallery_album" >
  	<option value="all"';
	if(empty($ad_gallery_album)) { $ad_gallery_album = ''; }
	if($ad_gallery_album == 'all') { echo 'selected'; }
  echo	'>';
	_e('All','adgallery');
  echo '</option>';
 		
	    $query = 'post_type=Post&post_status=publish&post_type=adgallery_album&posts_per_page=-1';
	    $loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
		echo '<option class="adgallery-shortcode" value="'.get_the_id().'"';
		if($ad_gallery_album == get_the_id()) { echo 'selected'; }		
		echo '>';
		echo the_title();
		echo '</option>'; 
		
		
		endwhile;
		}

  echo '</select>';
  
  echo '<br>';
  
  echo '</div>';




  
  /*********************** CATEGORY FOR WOOCOMMERCE POST IMG SOURCE *************************/
  echo '<div id="wrap_category_woocommerce"';
  if($ad_gallery_img_source == 'woocommerce') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_woocommerce_category">';
       _e('Select Woocommerce Category (Multiple category is allowed)', 'adgallery');
  echo '</label> ';
    
  echo '<select multiple="multiple" id="ad_gallery_woocommerce_category" name="ad_gallery_woocommerce_category[]" >
  	<option value="all"';
	if(empty($ad_gallery_woocommerce_category)) { $ad_gallery_woocommerce_category[0] = ''; }
	if($ad_gallery_woocommerce_category[0] == 'all') { echo 'selected'; }
  echo	'>';
	_e('All','adgallery');
  echo '</option>';

  			$woocommerce_categories = get_categories('taxonomy=product_cat'); 
  			foreach ($woocommerce_categories as $category) {
			$woocommerce_option = '<option value="'.$category->cat_name.'"';
			$i = 0;
			foreach ($ad_gallery_woocommerce_category as $woocommerce_cat_select_name) {
			if ($woocommerce_cat_select_name == $category->cat_name) { $woocommerce_option .= 'selected';}
			}
			$woocommerce_option .= '>';			
			$woocommerce_option .= $category->cat_name;
			$woocommerce_option .= ' ('.$category->category_count.')';
			$woocommerce_option .= '</option>';
			echo $woocommerce_option;
  			}
  echo '</select>';  
  
  echo '</div>';
  
  /*********************** CATEGORY FOR WP ECOMMERCE POST IMG SOURCE *************************/
  echo '<div id="wrap_category_wp_ecommerce"';
  if($ad_gallery_img_source == 'wp-ecommerce') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_wp_ecommerce_category">';
       _e('Select Wp e-commerce Category (Multiple category is allowed)', 'adgallery');
  echo '</label> ';
    
  echo '<select multiple="multiple" id="ad_gallery_wp_ecommerce_category" name="ad_gallery_wp_ecommerce_category[]" >
  	<option value="all"';
	if(empty($ad_gallery_wp_ecommerce_category)) { $ad_gallery_wp_ecommerce_category[0] = ''; }
	if($ad_gallery_wp_ecommerce_category[0] == 'all') { echo 'selected'; }
  echo	'>';
	_e('All','adgallery');
  echo '</option>';

  			$wp_ecommerce_categories = get_categories('taxonomy=wpsc_product_category'); 
  			foreach ($wp_ecommerce_categories as $category) {
			$wp_ecommerce_option = '<option value="'.$category->cat_name.'"';
			$i = 0;
			foreach ($ad_gallery_wp_ecommerce_category as $wp_ecommerce_cat_select_name) {
			if ($wp_ecommerce_cat_select_name == $category->cat_name) { $wp_ecommerce_option .= 'selected';}
			}
			$wp_ecommerce_option .= '>';			
			$wp_ecommerce_option .= $category->cat_name;
			$wp_ecommerce_option .= ' ('.$category->category_count.')';
			$wp_ecommerce_option .= '</option>';
			echo $wp_ecommerce_option;
  			}
  echo '</select>';  
  
  echo '</div>'; 
  
  /*********************** CATEGORY FOR JIGOSHOP POST IMG SOURCE *************************/
  echo '<div id="wrap_category_jigoshop"';
  if($ad_gallery_img_source == 'jigoshop') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
    
  echo '<label for="ad_gallery_jigoshop_category">';
       _e('Select Jigoshop Category (Multiple category is allowed)', 'adgallery');
  echo '</label> ';
    
  echo '<select multiple="multiple" id="ad_gallery_jigoshop_category" name="ad_gallery_jigoshop_category[]" >
  	<option value="all"';
	if(empty($ad_gallery_jigoshop_category)) { $ad_gallery_jigoshop_category[0] = ''; }
	if($ad_gallery_jigoshop_category[0] == 'all') { echo 'selected'; }
  echo	'>';
	_e('All','adgallery');
  echo '</option>';

  			$jigoshop_categories = get_categories('taxonomy=product_cat'); 
  			foreach ($jigoshop_categories as $category) {
			$jigoshop_option = '<option value="'.$category->cat_name.'"';
			$i = 0;
			foreach ($ad_gallery_jigoshop_category as $jigoshop_cat_select_name) {
			if ($jigoshop_cat_select_name == $category->cat_name) { $jigoshop_option .= 'selected';}
			}
			$jigoshop_option .= '>';			
			$jigoshop_option .= $category->cat_name;
			$jigoshop_option .= ' ('.$category->category_count.')';
			$jigoshop_option .= '</option>';
			echo $jigoshop_option;
  			}
  echo '</select>';  

  echo '</div>';

  /*********************** CATEGORY FOR POST CAT POST IMG SOURCE *************************/
  echo '<div id="wrap_category_post_cat"';
  if($ad_gallery_img_source == 'post_cat') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_post_cat_category">';
       _e('Select AD Gallery Post Category (Multiple category is allowed)', 'adgallery');
  echo '</label> ';
    
  echo '<select multiple="multiple" id="ad_gallery_post_cat_category" name="ad_gallery_post_cat_category[]" >
  	<option value="all"';
	if(empty($ad_gallery_post_cat_category)) { $ad_gallery_post_cat_category[0] = ''; }
	if($ad_gallery_post_cat_category[0] == 'all') { echo 'selected'; }
  echo	'>';
	_e('All','adgallery');
  echo '</option>';

  			$post_cat_categories = get_categories('taxonomy=adgallery_post_cat'); 
  			foreach ($post_cat_categories as $category) {
			$post_cat_option = '<option value="'.$category->cat_name.'"';
			$i = 0;
			foreach ($ad_gallery_post_cat_category as $post_cat_select_name) {
			if ($post_cat_select_name == $category->cat_name) { $post_cat_option .= 'selected';}
			}
			$post_cat_option .= '>';			
			$post_cat_option .= $category->cat_name;
			$post_cat_option .= ' ('.$category->category_count.')';
			$post_cat_option .= '</option>';
			echo $post_cat_option;
  			}
  echo '</select>';
  
  echo '</div>';    
  
  
  echo '<br>';

  echo '<div id="featured_image">';

  echo '<label for="ad_gallery_featured_body">';
       _e( "Featured Image/Content Image", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_featured_body" name="ad_gallery_featured_body">';
  echo '<option value="featured"'; if ($ad_gallery_featured_body == 'featured') { echo 'selected'; } echo '>Featured Image</div>';
  echo '<option value="content"'; if ($ad_gallery_featured_body == 'content') { echo 'selected'; } echo '>Content Image</div>';
  echo '</select>'; 
  
  echo '</div>';
  
  ?>
  
  
  <br>
  <label for="ad_gallery_custom_size"><?php _e('Select Custom Size', 'adgallery'); ?></label>
  <?php 
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
  ?>
  
  <select id="ad_gallery_custom_size" name="ad_gallery_custom_size">
  	<option value="adgallery_custom_size_default"><?php _e('Default','adgallery');?></option>
  	<?php if(!empty($adgallery_custom1_size_width)) { ?>
  	<option value="adgallery_custom1_size" <?php if ($ad_gallery_custom_size == 'adgallery_custom1_size') { echo 'selected'; } ?>><?php _e('Custom Size 1: ','adgallery'); echo $adgallery_custom1_size_width; echo 'x'; echo $adgallery_custom1_size_height; ?></option>
    <?php } ?>
  	<?php if(!empty($adgallery_custom2_size_width)) { ?>
  	<option value="adgallery_custom2_size" <?php if ($ad_gallery_custom_size == 'adgallery_custom2_size') { echo 'selected'; } ?>><?php _e('Custom Size 2: ','adgallery'); echo $adgallery_custom2_size_width; echo 'x'; echo $adgallery_custom2_size_height; ?></option>
    <?php } ?>
  	<?php if(!empty($adgallery_custom3_size_width)) { ?>
  	<option value="adgallery_custom3_size" <?php if ($ad_gallery_custom_size == 'adgallery_custom3_size') { echo 'selected'; } ?>><?php _e('Custom Size 3: ','adgallery'); echo $adgallery_custom3_size_width; echo 'x'; echo $adgallery_custom3_size_height; ?></option>
    <?php } ?>
  	<?php if(!empty($adgallery_custom4_size_width)) { ?>
  	<option value="adgallery_custom4_size" <?php if ($ad_gallery_custom_size == 'adgallery_custom4_size') { echo 'selected'; } ?>><?php _e('Custom Size 4: ','adgallery'); echo $adgallery_custom4_size_width; echo 'x'; echo $adgallery_custom4_size_height; ?></option>
    <?php } if(!empty($adgallery_custom_size_grid)) { ?>
  	<option value="adgallery_custom_size_grid" <?php if ($ad_gallery_custom_size == 'adgallery_custom_size_grid') { echo 'selected'; } ?>><?php _e('Custom Size Grid: ','adgallery'); echo $adgallery_custom_size_grid; ?></option>
    <?php } ?>           
  </select>  
  
  <?php

  echo '<br>';
  
  /************************ NUMBER ****************************/

  echo '<div id="numbers_post">';
  
  echo '<label for="ad_gallery_number">';
       _e( "Number Post/Image Load", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_number" name="ad_gallery_number" value="' . esc_attr( $ad_gallery_number ) . '" size="25">';

  echo '</div>';

  echo '<br>';

  echo '<label for="ad_gallery_wrap">';
       _e( "Wrapper Width (Insert only a number, ex 1000. Leave empty for 100%)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_wrap" name="ad_gallery_wrap" value="' . esc_attr( $ad_gallery_wrap ) . '" size="25">';

  echo '<br>';

  echo '<label for="ad_gallery_wrap_align">';
       _e( "Wrapper Align", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_wrap_align" name="ad_gallery_wrap_align">';
  echo '<option value="center"'; if ($ad_gallery_wrap_align == 'center') { echo 'selected'; } echo '>Center</div>';
  echo '<option value="left"'; if ($ad_gallery_wrap_align == 'left') { echo 'selected'; } echo '>Left</div>';
  echo '<option value="right"'; if ($ad_gallery_wrap_align == 'right') { echo 'selected'; } echo '>Right</div>';
  echo '</select>'; 

  echo '<br>';

  echo '<label for="ad_gallery_wrap_margin">';
       _e( "Item Margin for ex: 5px (Inline margin allowed for ex: 2px 5px 2px 5px)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_wrap_margin" name="ad_gallery_wrap_margin" value="' . esc_attr( $ad_gallery_wrap_margin ) . '" size="25">';

  echo '<br>';

  echo '<label for="ad_gallery_image_effect">';
       _e( "Image Over Effect", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_image_effect" name="ad_gallery_image_effect">';
  echo '<option value="normal"'; if ($ad_gallery_image_effect == 'normal') { echo 'selected'; } echo '>Normal</div>';
  echo '<option value="rotate"'; if ($ad_gallery_image_effect == 'rotate') { echo 'selected'; } echo '>Rotate</div>';
  echo '<option value="scale"'; if ($ad_gallery_image_effect == 'scale') { echo 'selected'; } echo '>Scale</div>';
  echo '<option value="translate"'; if ($ad_gallery_image_effect == 'translate') { echo 'selected'; } echo '>Translate</div>';  
  echo '</select>';
  
  echo '<br>';  
  
  echo '<div id="ad_gallery_image_effect_rotate_div"';
  if($ad_gallery_image_effect == 'rotate') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_image_effect_rotate">';
       _e( "Angle Rotate ex: 360", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_image_effect_rotate" name="ad_gallery_image_effect_rotate" value="' . esc_attr( $ad_gallery_image_effect_rotate ) . '" size="25">';
  
  
  echo '</div>';
  
  echo '<div id="ad_gallery_image_effect_scale_div"';
  if($ad_gallery_image_effect == 'scale') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_image_effect_scale">';
       _e( "Scale(x,y) ex: 1.2,1.2", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_image_effect_scale" name="ad_gallery_image_effect_scale" value="' . esc_attr( $ad_gallery_image_effect_scale ) . '" size="25">';
  
  
  echo '</div>';  
  
  echo '<div id="ad_gallery_image_effect_translate_div"';
  if($ad_gallery_image_effect == 'translate') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
    
  echo '<label for="ad_gallery_image_effect_translate">';
       _e( "Translate(x,y) ex: 10px,0", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_image_effect_translate" name="ad_gallery_image_effect_translate" value="' . esc_attr( $ad_gallery_image_effect_translate ) . '" size="25">';
  
  
  echo '</div>'; 
  
  echo '<br>';

  echo '<label for="ad_gallery_border_radius">';
       _e( "Border Radius ex: 5px (Inline margin allowed for ex: 2px 5px 2px 5px)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_border_radius" name="ad_gallery_border_radius" value="' . esc_attr( $ad_gallery_border_radius ) . '" size="25">';
   
  echo '<br>';     
  ?>
  <div id="tabs">
	<ul>
	<li><a href="#tabs-1"><?php _e('SGallery','adgallery'); ?></a></li>
    <li><a href="#tabs-2"><?php _e('Prettyphoto','adgallery'); ?></a></li>
    <li><a href="#tabs-3"><?php _e('Photobox','adgallery'); ?></a></li>
    <li><a href="#tabs-4"><?php _e('Photowall','adgallery'); ?></a></li>
    <li><a href="#tabs-5"><?php _e('Filter','adgallery'); ?></a></li>
    </ul>
  <div id="tabs-1">
  <?php
  /*********************** STYLE SGALLERY *************************/

  echo '<label for="ad_gallery_sgallery_type">';
       _e( "Type SGallery", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_sgallery_type" name="ad_gallery_sgallery_type">';
  echo '<option value="default"'; if ($ad_gallery_sgallery_type == 'default') { echo 'selected'; } echo '>Default</div>';
  echo '<option value="infinitescroll"'; if ($ad_gallery_sgallery_type == 'infinitescroll') { echo 'selected'; } echo '>Infinite Scroll</div>';
  echo '<option value="grid"'; if ($ad_gallery_sgallery_type == 'grid') { echo 'selected'; } echo '>Grid Masonry Layout</div>';    
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_style">';
       _e( "Style SGallery", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_style" name="ad_gallery_style">';
  echo '<option value="style1"'; if ($ad_gallery_style == 'style1') { echo 'selected'; } echo '>Style 1</div>';
  echo '<option value="style2"'; if ($ad_gallery_style == 'style2') { echo 'selected'; } echo '>Style 2</div>';
  echo '<option value="style3"'; if ($ad_gallery_style == 'style3') { echo 'selected'; } echo '>Style 3</div>';
  echo '<option value="style4"'; if ($ad_gallery_style == 'style4') { echo 'selected'; } echo '>Style 4</div>';
  echo '<option value="style5"'; if ($ad_gallery_style == 'style5') { echo 'selected'; } echo '>Style 5</div>';
  echo '<option value="style6"'; if ($ad_gallery_style == 'style6') { echo 'selected'; } echo '>Style 6</div>';
  echo '<option value="style7"'; if ($ad_gallery_style == 'style7') { echo 'selected'; } echo '>Style 7</div>';
  echo '</select>'; 

  echo '<br>';
   
  /************************ CAPTION ****************************/
  
  echo '<label for="ad_gallery_caption">';
       _e( "Caption", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_caption" name="ad_gallery_caption">';
  echo '<option value="on"'; if ($ad_gallery_caption == 'on') { echo 'selected'; } echo '>On</div>';
  echo '<option value="off"'; if ($ad_gallery_caption == 'off') { echo 'selected'; } echo '>Off</div>';
  echo '</select>'; 

  echo '<br>';

  /************************ EXCERPT ****************************/
  
  echo '<label for="ad_gallery_excerpt">';
       _e( "Number Excerpt", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_excerpt" name="ad_gallery_excerpt" value="' . esc_attr( $ad_gallery_excerpt ) . '" size="25">';

  echo '<br>';

  /************************ CONTROLS ****************************/
  
  echo '<label for="ad_gallery_controls">';
       _e( "Controls", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_controls" name="ad_gallery_controls">';
  echo '<option value="on"'; if ($ad_gallery_controls == 'on') { echo 'selected'; } echo '>On</div>';
  echo '<option value="off"'; if ($ad_gallery_controls == 'off') { echo 'selected'; } echo '>Off</div>';
  echo '</select>'; 

  echo '<br>';

  /************************ DIRECTION ****************************/
  
  echo '<label for="ad_gallery_direction">';
       _e( "Navigation Button Type", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_direction" name="ad_gallery_direction">';
  echo '<option value="sgallery-type1"'; if ($ad_gallery_direction == 'sgallery-type1') { echo 'selected'; } echo '>Type 1</div>';
  echo '<option value="sgallery-typewhite1"'; if ($ad_gallery_direction == 'sgallery-typewhite1') { echo 'selected'; } echo '>Type 1 White</div>';
  echo '<option value="sgallery-type2"'; if ($ad_gallery_direction == 'sgallery-type2') { echo 'selected'; } echo '>Type 2</div>';
  echo '<option value="sgallery-typewhite2"'; if ($ad_gallery_direction == 'sgallery-typewhite2') { echo 'selected'; } echo '>Type 2 White</div>';
  echo '<option value="sgallery-type3"'; if ($ad_gallery_direction == 'sgallery-type3') { echo 'selected'; } echo '>Type 3</div>';
  echo '<option value="sgallery-typewhite3"'; if ($ad_gallery_direction == 'sgallery-typewhite3') { echo 'selected'; } echo '>Type 3 White</div>';  
  echo '</select>'; 

  echo '<br>';

  /************************ FULLSCREEN ****************************/
  
  echo '<label for="ad_gallery_fullscreen">';
       _e( "Full Screen Button", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_fullscreen" name="ad_gallery_fullscreen">';
  echo '<option value="on"'; if ($ad_gallery_fullscreen == 'on') { echo 'selected'; } echo '>On</div>';
  echo '<option value="off"'; if ($ad_gallery_fullscreen == 'off') { echo 'selected'; } echo '>Off</div>';
  echo '</select>';
  echo '<br>';
  
  /*********************** ACTIVE CUSTOM COLOR *************************/

  echo '<label for="ad_gallery_custom_color_active">';
       _e( "Active Custom Color", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="radio" name="ad_gallery_custom_color_active" id="ad_gallery_custom_color_active" value="on"'; if ($ad_gallery_custom_color_active == 'on'){echo 'checked';} echo '>ON';
  echo '<input type="radio" name="ad_gallery_custom_color_active" id="ad_gallery_custom_color_active" value="off"'; if ($ad_gallery_custom_color_active == 'off' || empty($ad_gallery_custom_color_active)){echo 'checked';} echo '>OFF';

  echo '<br>'; 
  
  /*********************** CUSTOM COLOR *************************/

  echo '<label for="ad_gallery_custom_color">';
       _e( "Custom Color:", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" value="'; if (empty($ad_gallery_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_custom_color; } echo '" class="wp-color-picker-field" data-default-color="'; if (empty($ad_gallery_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_custom_color; } echo '" id="ad_gallery_custom_color" name="ad_gallery_custom_color"/>'; 

  echo '<br>';

  echo '<label for="ad_gallery_custom_opacity">';
       _e( "Opacity (Value between 0 and 1: ex 0.8)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_custom_opacity" name="ad_gallery_custom_opacity" value="' . esc_attr( $ad_gallery_custom_opacity ) . '" size="25">'; 
  
  echo '<br>'; 
  
  
  ?>
  </div>
  <div id="tabs-2">
  <?php
    /*********************** STYLE PRETTYPHOTO *************************/
  echo '<label for="ad_gallery_prettyphoto_type">';
       _e( "Type prettyphoto", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_prettyphoto_type" name="ad_gallery_prettyphoto_type">';
  echo '<option value="default"'; if ($ad_gallery_prettyphoto_type == 'default') { echo 'selected'; } echo '>Default</div>';
  echo '<option value="infinitescroll"'; if ($ad_gallery_prettyphoto_type == 'infinitescroll') { echo 'selected'; } echo '>Infinite Scroll</div>';
  echo '<option value="grid"'; if ($ad_gallery_prettyphoto_type == 'grid') { echo 'selected'; } echo '>Grid Masonry Layout</div>';  
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_prettyphoto_style">';
       _e( "Style prettyPhoto", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_prettyphoto_style" name="ad_gallery_prettyphoto_style">';
  echo '<option value="style1"'; if ($ad_gallery_prettyphoto_style == 'style1') { echo 'selected'; } echo '>Style 1</div>';
  echo '<option value="style2"'; if ($ad_gallery_prettyphoto_style == 'style2') { echo 'selected'; } echo '>Style 2</div>';
  echo '<option value="style3"'; if ($ad_gallery_prettyphoto_style == 'style3') { echo 'selected'; } echo '>Style 3</div>';
  echo '<option value="style4"'; if ($ad_gallery_prettyphoto_style == 'style4') { echo 'selected'; } echo '>Style 4</div>';
  echo '<option value="style5"'; if ($ad_gallery_prettyphoto_style == 'style5') { echo 'selected'; } echo '>Style 5</div>';
  echo '<option value="style6"'; if ($ad_gallery_prettyphoto_style == 'style6') { echo 'selected'; } echo '>Style 6</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_custom_color">';
       _e( "Overlay Custom Color:", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" value="'; if (empty($ad_gallery_prettyphoto_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_prettyphoto_custom_color; } echo '" class="wp-color-picker-field" data-default-color="'; if (empty($ad_gallery_prettyphoto_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_prettyphoto_custom_color; } echo '" id="ad_gallery_prettyphoto_custom_color" name="ad_gallery_prettyphoto_custom_color"/>'; 

  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_custom_opacity">';
       _e( "Opacity (Value between 0 and 1: ex 0.8)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_prettyphoto_custom_opacity" name="ad_gallery_prettyphoto_custom_opacity" value="' . esc_attr( $ad_gallery_prettyphoto_custom_opacity ) . '" size="25">'; 
  
  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_custom_icon">';
       _e( "Style prettyPhoto", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_prettyphoto_custom_icon" name="ad_gallery_prettyphoto_custom_icon">';
  echo '<option value="plus"'; if ($ad_gallery_prettyphoto_custom_icon == 'plus') { echo 'selected'; } echo '>Plus</div>';  
  echo '<option value="magnifier"'; if ($ad_gallery_prettyphoto_custom_icon == 'magnifier') { echo 'selected'; } echo '>Magnifier</div>';
  echo '<option value="magnifierplus"'; if ($ad_gallery_prettyphoto_custom_icon == 'magnifierplus') { echo 'selected'; } echo '>Magnifier Plus</div>';
  echo '<option value="arrows"'; if ($ad_gallery_prettyphoto_custom_icon == 'arrows') { echo 'selected'; } echo '>Arrows</div>';
  echo '<option value="arrowsblack"'; if ($ad_gallery_prettyphoto_custom_icon == 'arrowsblack') { echo 'selected'; } echo '>Arrows Black</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_theme">';
       _e( "PrettyPhoto Theme", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_prettyphoto_theme" name="ad_gallery_prettyphoto_theme">';
  echo '<option value="pp_default"'; if ($ad_gallery_prettyphoto_theme == 'default') { echo 'selected'; } echo '>Default</div>';
  echo '<option value="dark_rounded"'; if ($ad_gallery_prettyphoto_theme == 'dark_rounded') { echo 'selected'; } echo '>Dark Rounded</div>';
  echo '<option value="dark_square"'; if ($ad_gallery_prettyphoto_theme == 'dark_square') { echo 'selected'; } echo '>Dark Square</div>';
  echo '<option value="facebook"'; if ($ad_gallery_prettyphoto_theme == 'facebook') { echo 'selected'; } echo '>Facebook</div>';
  echo '<option value="light_rounded"'; if ($ad_gallery_prettyphoto_theme == 'light_rounded') { echo 'selected'; } echo '>Light Rounded</div>';
  echo '<option value="light_square"'; if ($ad_gallery_prettyphoto_theme == 'light_square') { echo 'selected'; } echo '>Light Square</div>';    
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_prettyphoto_animation_speed">';
       _e( "PrettyPhoto Animation Speed", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_prettyphoto_animation_speed" name="ad_gallery_prettyphoto_animation_speed">';
  echo '<option value="fast"'; if ($ad_gallery_prettyphoto_animation_speed == 'fast') { echo 'selected'; } echo '>Fast</div>';
  echo '<option value="slow"'; if ($ad_gallery_prettyphoto_animation_speed == 'slow') { echo 'selected'; } echo '>Slow</div>';
  echo '<option value="normal"'; if ($ad_gallery_prettyphoto_animation_speed == 'normal') { echo 'selected'; } echo '>Normal</div>';  
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_prettyphoto_slideshow">';
       _e( "Slideshow (enter number (ms) ex: 5000", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_prettyphoto_slideshow" name="ad_gallery_prettyphoto_slideshow" value="' . esc_attr( $ad_gallery_prettyphoto_slideshow ) . '" size="25">';

  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_autoplay_slideshow">';
       _e( "Autoplay Slideshow", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_prettyphoto_autoplay_slideshow" name="ad_gallery_prettyphoto_autoplay_slideshow">';
  echo '<option value="true"'; if ($ad_gallery_prettyphoto_autoplay_slideshow == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_prettyphoto_autoplay_slideshow == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_opacity">';
       _e( "Opacity Lightbox (Value between 0 and 1: ex 0.8)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_prettyphoto_opacity" name="ad_gallery_prettyphoto_opacity" value="' . esc_attr( $ad_gallery_prettyphoto_opacity ) . '" size="25">'; 
  
  echo '<br>';
  
  echo '<label for="ad_gallery_prettyphoto_show_title">';
       _e( "Show Title", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_prettyphoto_show_title" name="ad_gallery_prettyphoto_show_title">';
  echo '<option value="true"'; if ($ad_gallery_prettyphoto_show_title == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_prettyphoto_show_title == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_prettyphoto_show_social">';
       _e( "Show Social", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_prettyphoto_show_social" name="ad_gallery_prettyphoto_show_social">';
  echo '<option value="true"'; if ($ad_gallery_prettyphoto_show_social == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_prettyphoto_show_social == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';  
  ?> 
  </div>
  <div id="tabs-3">
  <?php
  /*********************** STYLE PHOTOBOX *************************/

  echo '<label for="ad_gallery_photobox_type">';
       _e( "Type photobox", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_photobox_type" name="ad_gallery_photobox_type">';
  echo '<option value="default"'; if ($ad_gallery_photobox_type == 'default') { echo 'selected'; } echo '>Default</div>';
  echo '<option value="infinitescroll"'; if ($ad_gallery_photobox_type == 'infinitescroll') { echo 'selected'; } echo '>Infinite Scroll</div>';
  echo '<option value="grid"'; if ($ad_gallery_photobox_type == 'grid') { echo 'selected'; } echo '>Grid Masonry Layout</div>';  
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_photobox_style">';
       _e( "Style photobox", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_photobox_style" name="ad_gallery_photobox_style">';
  echo '<option value="style1"'; if ($ad_gallery_photobox_style == 'style1') { echo 'selected'; } echo '>Style 1</div>';
  echo '<option value="style2"'; if ($ad_gallery_photobox_style == 'style2') { echo 'selected'; } echo '>Style 2</div>';
  echo '<option value="style3"'; if ($ad_gallery_photobox_style == 'style3') { echo 'selected'; } echo '>Style 3</div>';
  echo '<option value="style4"'; if ($ad_gallery_photobox_style == 'style4') { echo 'selected'; } echo '>Style 4</div>';
  echo '<option value="style5"'; if ($ad_gallery_photobox_style == 'style5') { echo 'selected'; } echo '>Style 5</div>';
  echo '<option value="style6"'; if ($ad_gallery_photobox_style == 'style6') { echo 'selected'; } echo '>Style 6</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_photobox_custom_color">';
       _e( "Overlay Custom Color:", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" value="'; if (empty($ad_gallery_photobox_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_photobox_custom_color; } echo '" class="wp-color-picker-field" data-default-color="'; if (empty($ad_gallery_photobox_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_photobox_custom_color; } echo '" id="ad_gallery_photobox_custom_color" name="ad_gallery_photobox_custom_color"/>'; 

  echo '<br>';

  echo '<label for="ad_gallery_photobox_custom_opacity">';
       _e( "Opacity (Value between 0 and 1: ex 0.8)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_photobox_custom_opacity" name="ad_gallery_photobox_custom_opacity" value="' . esc_attr( $ad_gallery_photobox_custom_opacity ) . '" size="25">'; 
  
  echo '<br>';

  echo '<label for="ad_gallery_photobox_custom_icon">';
       _e( "Style photobox", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_photobox_custom_icon" name="ad_gallery_photobox_custom_icon">';
  echo '<option value="plus"'; if ($ad_gallery_photobox_custom_icon == 'plus') { echo 'selected'; } echo '>Plus</div>';  
  echo '<option value="magnifier"'; if ($ad_gallery_photobox_custom_icon == 'magnifier') { echo 'selected'; } echo '>Magnifier</div>';
  echo '<option value="magnifierplus"'; if ($ad_gallery_photobox_custom_icon == 'magnifierplus') { echo 'selected'; } echo '>Magnifier Plus</div>';
  echo '<option value="arrows"'; if ($ad_gallery_photobox_custom_icon == 'arrows') { echo 'selected'; } echo '>Arrows</div>';
  echo '<option value="arrowsblack"'; if ($ad_gallery_photobox_custom_icon == 'arrowsblack') { echo 'selected'; } echo '>Arrows Black</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_photobox_thumbs">';
       _e( "Thumbs", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_photobox_thumbs" name="ad_gallery_photobox_thumbs">';
  echo '<option value="true"'; if ($ad_gallery_photobox_thumbs == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_photobox_thumbs == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_photobox_time">';
       _e( "Time (ms). Min 1000", 'adgallery' );
  echo '</label> '; 

  echo '<input type="text" id="ad_gallery_photobox_time" name="ad_gallery_photobox_time" value="' . esc_attr( $ad_gallery_photobox_time ) . '" size="25">'; 

  echo '<br>'; 
  
  echo '<label for="ad_gallery_photobox_autoplay">';
       _e( "Autoplay", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_photobox_autoplay" name="ad_gallery_photobox_autoplay">';
  echo '<option value="true"'; if ($ad_gallery_photobox_autoplay == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_photobox_autoplay == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_photobox_counter">';
       _e( "Counter", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_photobox_counter" name="ad_gallery_photobox_counter">';
  echo '<option value="true"'; if ($ad_gallery_photobox_counter == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_photobox_counter == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>'; 
  
  echo '<label for="ad_gallery_photobox_title">';
       _e( "Title", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_photobox_title" name="ad_gallery_photobox_title">';
  echo '<option value="true"'; if ($ad_gallery_photobox_title == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_photobox_title == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';      
  ?>
  </div>
  <div id="tabs-4">
  <?php
  
  echo '<label for="ad_gallery_photowall_type">';
       _e( "Type photowall", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_photowall_type" name="ad_gallery_photowall_type">';
  echo '<option value="default"'; if ($ad_gallery_photowall_type == 'default') { echo 'selected'; } echo '>Default</div>';
  echo '<option value="infinitescroll"'; if ($ad_gallery_photowall_type == 'infinitescroll') { echo 'selected'; } echo '>Infinite Scroll</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_photowall_title">';
       _e( "Title", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_photowall_title" name="ad_gallery_photowall_title">';
  echo '<option value="true"'; if ($ad_gallery_photowall_title == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_photowall_title == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';
  
  echo '<br>';
  
  echo '<label for="ad_gallery_photowall_title_visible_onload">';
       _e( "Title Visible OnLoad", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_photowall_title_visible_onload" name="ad_gallery_photowall_title_visible_onload">';
  echo '<option value="true"'; if ($ad_gallery_photowall_title_visible_onload == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_photowall_title_visible_onload == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';
  
  ?>
  </div>
  <div id="tabs-5">
  <?php
  
  /************************************************* FILTER ************************************************/
  
  echo '<label for="ad_gallery_filter_effects_scale">';
       _e( "Filter Effects Scale", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_effects_scale" name="ad_gallery_filter_effects_scale">';
  echo '<option value="true"'; if ($ad_gallery_filter_effects_scale == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_effects_scale == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';
  
  echo '<label for="ad_gallery_filter_effects_rotateX">';
       _e( "Filter Effects rotateX", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_effects_rotateX" name="ad_gallery_filter_effects_rotateX">';
  echo '<option value="true"'; if ($ad_gallery_filter_effects_rotateX == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_effects_rotateX == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';
  
  echo '<label for="ad_gallery_filter_effects_rotateY">';
       _e( "Filter Effects rotateY", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_effects_rotateY" name="ad_gallery_filter_effects_rotateY">';
  echo '<option value="true"'; if ($ad_gallery_filter_effects_rotateY == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_effects_rotateY == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';
  
  echo '<label for="ad_gallery_filter_effects_rotateZ">';
       _e( "Filter Effects rotateZ", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_effects_rotateZ" name="ad_gallery_filter_effects_rotateZ">';
  echo '<option value="true"'; if ($ad_gallery_filter_effects_rotateZ == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_effects_rotateZ == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';
  
  echo '<label for="ad_gallery_filter_effects_blur">';
       _e( "Filter Effects blur", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_effects_blur" name="ad_gallery_filter_effects_blur">';
  echo '<option value="true"'; if ($ad_gallery_filter_effects_blur == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_effects_blur == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';     

  echo '<label for="ad_gallery_filter_effects_grayscale">';
       _e( "Filter Effects grayscale", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_effects_grayscale" name="ad_gallery_filter_effects_grayscale">';
  echo '<option value="true"'; if ($ad_gallery_filter_effects_grayscale == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_effects_grayscale == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>'; 
  
  echo '<label for="ad_gallery_filter_easing">';
       _e( "Filter Easing", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_easing" name="ad_gallery_filter_easing">';
  echo '<option value="smooth"'; if ($ad_gallery_filter_easing == 'smooth') { echo 'selected'; } echo '>Smooth</div>';
  echo '<option value="snap"'; if ($ad_gallery_filter_easing == 'snap') { echo 'selected'; } echo '>Snap</div>';
  echo '<option value="windup"'; if ($ad_gallery_filter_easing == 'windup') { echo 'selected'; } echo '>Windup</div>';
  echo '<option value="windback"'; if ($ad_gallery_filter_easing == 'windback') { echo 'selected'; } echo '>Windback</div>';  
  echo '</select>'; 
  
  echo '<br>';
  
  echo '<div style="display:none">';
  
  echo '<label for="ad_gallery_filter_layoutMode">';
       _e( "Filter Layout Mode", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_layoutMode" name="ad_gallery_filter_layoutMode">';
  echo '<option value="grid"'; if ($ad_gallery_filter_layoutMode == 'grid') { echo 'selected'; } echo '>Grid</div>';
  echo '<option value="list"'; if ($ad_gallery_filter_layoutMode == 'list') { echo 'selected'; } echo '>List</div>';  
  echo '</select>'; 
  
  echo '<br>';
  
  echo '</div>';
  
  echo '<label for="ad_gallery_filter_transitionSpeed">';
       _e( "Transition Speed (in ms - insert only number ex: 3000)", 'adgallery' );
  echo '</label> '; 

  echo '<input type="text" id="ad_gallery_filter_transitionSpeed" name="ad_gallery_filter_transitionSpeed" value="' . esc_attr( $ad_gallery_filter_transitionSpeed ) . '" size="25">'; 

  echo '<label for="ad_gallery_filter_buttonEvent">';
       _e( "Filter Button Event", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_buttonEvent" name="ad_gallery_filter_buttonEvent">';
  echo '<option value="click"'; if ($ad_gallery_filter_buttonEvent == 'click') { echo 'selected'; } echo '>Click</div>';
  echo '<option value="hover"'; if ($ad_gallery_filter_buttonEvent == 'hover') { echo 'selected'; } echo '>Hover</div>';  
  echo '</select>'; 
 
  echo '<br>';
 
  echo '<label for="ad_gallery_filter_show_sort">';
       _e( "Filter Show Sort", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_show_sort" name="ad_gallery_filter_show_sort">';
  echo '<option value="true"'; if ($ad_gallery_filter_show_sort == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_show_sort == 'false') { echo 'selected'; } echo '>No</div>';  
  echo '</select>';  

  echo '<br>';
  
  echo '<label for="ad_gallery_filter_style">';
       _e( "Style prettyPhoto", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_filter_style" name="ad_gallery_filter_style">';
  echo '<option value="style1"'; if ($ad_gallery_filter_style == 'style1') { echo 'selected'; } echo '>Style 1</div>';
  echo '<option value="style2"'; if ($ad_gallery_filter_style == 'style2') { echo 'selected'; } echo '>Style 2</div>';
  echo '<option value="style3"'; if ($ad_gallery_filter_style == 'style3') { echo 'selected'; } echo '>Style 3</div>';
  echo '<option value="style4"'; if ($ad_gallery_filter_style == 'style4') { echo 'selected'; } echo '>Style 4</div>';
  echo '<option value="style5"'; if ($ad_gallery_filter_style == 'style5') { echo 'selected'; } echo '>Style 5</div>';
  echo '<option value="style6"'; if ($ad_gallery_filter_style == 'style6') { echo 'selected'; } echo '>Style 6</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_filter_custom_color">';
       _e( "Overlay Custom Color:", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" value="'; if (empty($ad_gallery_filter_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_filter_custom_color; } echo '" class="wp-color-picker-field" data-default-color="'; if (empty($ad_gallery_filter_custom_color)){ echo '#eeeeee'; } else { echo $ad_gallery_filter_custom_color; } echo '" id="ad_gallery_filter_custom_color" name="ad_gallery_filter_custom_color"/>'; 

  echo '<br>';

  echo '<label for="ad_gallery_filter_custom_opacity">';
       _e( "Opacity (Value between 0 and 1: ex 0.8)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_filter_custom_opacity" name="ad_gallery_filter_custom_opacity" value="' . esc_attr( $ad_gallery_filter_custom_opacity ) . '" size="25">'; 
  
  echo '<br>';

  echo '<label for="ad_gallery_filter_custom_icon">';
       _e( "Style prettyPhoto", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_filter_custom_icon" name="ad_gallery_filter_custom_icon">';
  echo '<option value="plus"'; if ($ad_gallery_filter_custom_icon == 'plus') { echo 'selected'; } echo '>Plus</div>';  
  echo '<option value="magnifier"'; if ($ad_gallery_filter_custom_icon == 'magnifier') { echo 'selected'; } echo '>Magnifier</div>';
  echo '<option value="magnifierplus"'; if ($ad_gallery_filter_custom_icon == 'magnifierplus') { echo 'selected'; } echo '>Magnifier Plus</div>';
  echo '<option value="arrows"'; if ($ad_gallery_filter_custom_icon == 'arrows') { echo 'selected'; } echo '>Arrows</div>';
  echo '<option value="arrowsblack"'; if ($ad_gallery_filter_custom_icon == 'arrowsblack') { echo 'selected'; } echo '>Arrows Black</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_filter_action">';
       _e( "Filter Action", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_action" name="ad_gallery_filter_action">';
  echo '<option value="lightbox"'; if ($ad_gallery_filter_action == 'lightbox') { echo 'selected'; } echo '>Lightbox</div>';
  echo '<option value="preview"'; if ($ad_gallery_filter_action == 'preview') { echo 'selected'; } echo '>Preview Post</div>';  
  echo '</select>'; 

  echo '<br>';

  echo '<div id="ad_gallery_filter_action_lightbox_div"';
  if($ad_gallery_filter_action == 'lightbox' || empty($ad_gallery_filter_action)) { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_filter_action_lightbox">';
       _e( "Filter Lightbox Type", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_action_lightbox" name="ad_gallery_filter_action_lightbox">';
  echo '<option value="prettyphoto"'; if ($ad_gallery_filter_action_lightbox == 'prettyphoto') { echo 'selected'; } echo '>PrettyPhoto</div>';
  echo '<option value="photobox"'; if ($ad_gallery_filter_action_lightbox == 'photobox') { echo 'selected'; } echo '>PhotoBox</div>';  
  echo '</select>'; 
  
  echo '</div>';
  
  echo '<br>';
  
  /******************* PRETTYPHOTO OPTION ***************************/

  
  echo '<div id="ad_gallery_filter_prettyphoto"';
  if($ad_gallery_filter_action_lightbox == 'prettyphoto' || empty($ad_gallery_filter_action_lightbox)) { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
    
  echo '<label for="ad_gallery_filter_prettyphoto_theme">';
       _e( "PrettyPhoto Theme", 'adgallery' );
  echo '</label> ';
  
  echo '<select id="ad_gallery_filter_prettyphoto_theme" name="ad_gallery_filter_prettyphoto_theme">';
  echo '<option value="pp_default"'; if ($ad_gallery_filter_prettyphoto_theme == 'default') { echo 'selected'; } echo '>Default</div>';
  echo '<option value="dark_rounded"'; if ($ad_gallery_filter_prettyphoto_theme == 'dark_rounded') { echo 'selected'; } echo '>Dark Rounded</div>';
  echo '<option value="dark_square"'; if ($ad_gallery_filter_prettyphoto_theme == 'dark_square') { echo 'selected'; } echo '>Dark Square</div>';
  echo '<option value="facebook"'; if ($ad_gallery_filter_prettyphoto_theme == 'facebook') { echo 'selected'; } echo '>Facebook</div>';
  echo '<option value="light_rounded"'; if ($ad_gallery_filter_prettyphoto_theme == 'light_rounded') { echo 'selected'; } echo '>Light Rounded</div>';
  echo '<option value="light_square"'; if ($ad_gallery_filter_prettyphoto_theme == 'light_square') { echo 'selected'; } echo '>Light Square</div>';    
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_filter_prettyphoto_animation_speed">';
       _e( "PrettyPhoto Animation Speed", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_prettyphoto_animation_speed" name="ad_gallery_filter_prettyphoto_animation_speed">';
  echo '<option value="fast"'; if ($ad_gallery_filter_prettyphoto_animation_speed == 'fast') { echo 'selected'; } echo '>Fast</div>';
  echo '<option value="slow"'; if ($ad_gallery_filter_prettyphoto_animation_speed == 'slow') { echo 'selected'; } echo '>Slow</div>';
  echo '<option value="normal"'; if ($ad_gallery_filter_prettyphoto_animation_speed == 'normal') { echo 'selected'; } echo '>Normal</div>';  
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_filter_prettyphoto_slideshow">';
       _e( "Slideshow (enter number (ms) ex: 5000", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_filter_prettyphoto_slideshow" name="ad_gallery_filter_prettyphoto_slideshow" value="' . esc_attr( $ad_gallery_filter_prettyphoto_slideshow ) . '" size="25">';

  echo '<br>';

  echo '<label for="ad_gallery_filter_prettyphoto_autoplay_slideshow">';
       _e( "Autoplay Slideshow", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_prettyphoto_autoplay_slideshow" name="ad_gallery_filter_prettyphoto_autoplay_slideshow">';
  echo '<option value="true"'; if ($ad_gallery_filter_prettyphoto_autoplay_slideshow == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_prettyphoto_autoplay_slideshow == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_filter_prettyphoto_opacity">';
       _e( "Opacity (Value between 0 and 1: ex 0.8)", 'adgallery' );
  echo '</label> ';
  
  echo '<input type="text" id="ad_gallery_filter_prettyphoto_opacity" name="ad_gallery_filter_prettyphoto_opacity" value="' . esc_attr( $ad_gallery_filter_prettyphoto_opacity ) . '" size="25">'; 
  
  echo '<br>';
  
  echo '<label for="ad_gallery_filter_prettyphoto_show_title">';
       _e( "Show Title", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_prettyphoto_show_title" name="ad_gallery_filter_prettyphoto_show_title">';
  echo '<option value="true"'; if ($ad_gallery_filter_prettyphoto_show_title == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_prettyphoto_show_title == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';

  echo '<label for="ad_gallery_filter_prettyphoto_show_social">';
       _e( "Show Social", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_prettyphoto_show_social" name="ad_gallery_filter_prettyphoto_show_social">';
  echo '<option value="true"'; if ($ad_gallery_filter_prettyphoto_show_social == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_prettyphoto_show_social == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';  
  
  echo '</div>';
  
  /***************** PHOTOBOX OPTION *******************/
  
  echo '<div id="ad_gallery_filter_photobox"';
  if($ad_gallery_filter_action_lightbox == 'photobox') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
  
  echo '<label for="ad_gallery_filter_photobox_thumbs">';
       _e( "Thumbs", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_photobox_thumbs" name="ad_gallery_filter_photobox_thumbs">';
  echo '<option value="true"'; if ($ad_gallery_filter_photobox_thumbs == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_photobox_thumbs == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_filter_photobox_time">';
       _e( "Time (ms). Min 1000", 'adgallery' );
  echo '</label> '; 

  echo '<input type="text" id="ad_gallery_filter_photobox_time" name="ad_gallery_filter_photobox_time" value="' . esc_attr( $ad_gallery_filter_photobox_time ) . '" size="25">'; 

  echo '<br>'; 
  
  echo '<label for="ad_gallery_filter_photobox_autoplay">';
       _e( "Autoplay", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_photobox_autoplay" name="ad_gallery_filter_photobox_autoplay">';
  echo '<option value="true"'; if ($ad_gallery_filter_photobox_autoplay == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_photobox_autoplay == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';
  
  echo '<label for="ad_gallery_filter_photobox_counter">';
       _e( "Counter", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_photobox_counter" name="ad_gallery_filter_photobox_counter">';
  echo '<option value="true"'; if ($ad_gallery_filter_photobox_counter == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_photobox_counter == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>'; 
  
  echo '<label for="ad_gallery_filter_photobox_title">';
       _e( "Title", 'adgallery' );
  echo '</label> '; 

  echo '<select id="ad_gallery_filter_photobox_title" name="ad_gallery_filter_photobox_title">';
  echo '<option value="true"'; if ($ad_gallery_filter_photobox_title == 'true') { echo 'selected'; } echo '>Yes</div>';
  echo '<option value="false"'; if ($ad_gallery_filter_photobox_title == 'false') { echo 'selected'; } echo '>No</div>';
  echo '</select>';

  echo '<br>';      
  
  echo '</div>';

  // FILTER PREVIEW
  
  echo '<div id="ad_gallery_filter_preview"';
  if($ad_gallery_filter_action == 'preview') { 
  	echo 'style="display:block">'; } 
  else { 
    echo 'style="display:none">'; 
  }
    
  echo '<label for="ad_gallery_filter_preview_excerpt">';
       _e( "Excerpt Number", 'adgallery' );
  echo '</label> '; 

  echo '<input type="text" id="ad_gallery_filter_preview_excerpt" name="ad_gallery_filter_preview_excerpt" value="' . esc_attr( $ad_gallery_filter_preview_excerpt ) . '" size="25">'; 

  echo '<br>';      
  
  echo '</div>';
  
  ?>
  </div>
  </div>
  <?php    
  echo '<input type="hidden" id="ad_gallery_show_shortcode" name="ad_gallery_show_shortcode" value="update">';
  echo '<br>';
  ?>
<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function adgallery_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['adgallery_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['adgallery_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'adgallery_inner_custom_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */
  
  $ad_gallery_show_shortcode = sanitize_text_field( $_POST['ad_gallery_show_shortcode'] );
  update_post_meta( $post_id, '_ad_gallery_show_shortcode', $ad_gallery_show_shortcode );
  

  $ad_gallery_number = sanitize_text_field( $_POST['ad_gallery_number'] );
  update_post_meta( $post_id, '_ad_gallery_number', $ad_gallery_number );
  

  $ad_gallery_style = sanitize_text_field( $_POST['ad_gallery_style'] );
  update_post_meta( $post_id, '_ad_gallery_style', $ad_gallery_style );        
  

/*  $ad_gallery_category = implode(",", $_POST['ad_gallery_category'] );
  update_post_meta( $post_id, '_ad_gallery_category', $ad_gallery_category );
 */
  if ( isset( $_POST['ad_gallery_category'] ) ) {

        $sanitized_data = array();

        $data = (array) $_POST['ad_gallery_category'];
		
		//print_r($data);

        foreach ($data as $key => $value) {

            $sanitized_data[ $key ] = $value ;

        }

        update_post_meta( $post_id, '_ad_gallery_category', $sanitized_data );

    } 

  if ( isset( $_POST['ad_gallery_woocommerce_category'] ) ) {

        $sanitized_data = array();

        $data = (array) $_POST['ad_gallery_woocommerce_category'];
		
		//print_r($data);

        foreach ($data as $key => $value) {

            $sanitized_data[ $key ] = $value ;

        }

        update_post_meta( $post_id, '_ad_gallery_woocommerce_category', $sanitized_data );

    }

  if ( isset( $_POST['ad_gallery_wp_ecommerce_category'] ) ) {

        $sanitized_data = array();

        $data = (array) $_POST['ad_gallery_wp_ecommerce_category'];
		
		//print_r($data);

        foreach ($data as $key => $value) {

            $sanitized_data[ $key ] = $value ;

        }

        update_post_meta( $post_id, '_ad_gallery_wp_ecommerce_category', $sanitized_data );

    }

  if ( isset( $_POST['ad_gallery_jigoshop_category'] ) ) {

        $sanitized_data = array();

        $data = (array) $_POST['ad_gallery_jigoshop_category'];
		
		//print_r($data);

        foreach ($data as $key => $value) {

            $sanitized_data[ $key ] = $value ;

        }

        update_post_meta( $post_id, '_ad_gallery_jigoshop_category', $sanitized_data );

    }

  if ( isset( $_POST['ad_gallery_post_cat_category'] ) ) {

        $sanitized_data = array();

        $data = (array) $_POST['ad_gallery_post_cat_category'];
		
		//print_r($data);

        foreach ($data as $key => $value) {

            $sanitized_data[ $key ] = $value ;

        }

        update_post_meta( $post_id, '_ad_gallery_post_cat_category', $sanitized_data );

    }
 
  $ad_gallery_album = sanitize_text_field( $_POST['ad_gallery_album'] );
  update_post_meta( $post_id, '_ad_gallery_album', $ad_gallery_album );  
  
  $ad_gallery_custom_size = sanitize_text_field( $_POST['ad_gallery_custom_size'] );
  update_post_meta( $post_id, '_ad_gallery_custom_size', $ad_gallery_custom_size );     

  $ad_gallery_featured_body = sanitize_text_field( $_POST['ad_gallery_featured_body'] );
  update_post_meta( $post_id, '_ad_gallery_featured_body', $ad_gallery_featured_body );

  $ad_gallery_image_effect = sanitize_text_field( $_POST['ad_gallery_image_effect'] );
  update_post_meta( $post_id, '_ad_gallery_image_effect', $ad_gallery_image_effect );
  
  $ad_gallery_image_effect_rotate = sanitize_text_field( $_POST['ad_gallery_image_effect_rotate'] );
  update_post_meta( $post_id, '_ad_gallery_image_effect_rotate', $ad_gallery_image_effect_rotate );
  
  $ad_gallery_image_effect_scale = sanitize_text_field( $_POST['ad_gallery_image_effect_scale'] );
  update_post_meta( $post_id, '_ad_gallery_image_effect_scale', $ad_gallery_image_effect_scale );
  
  $ad_gallery_image_effect_translate = sanitize_text_field( $_POST['ad_gallery_image_effect_translate'] );
  update_post_meta( $post_id, '_ad_gallery_image_effect_translate', $ad_gallery_image_effect_translate );      

  $ad_gallery_border_radius = sanitize_text_field( $_POST['ad_gallery_border_radius'] );
  update_post_meta( $post_id, '_ad_gallery_border_radius', $ad_gallery_border_radius ); 

  $ad_gallery_caption = sanitize_text_field( $_POST['ad_gallery_caption'] );
  update_post_meta( $post_id, '_ad_gallery_caption', $ad_gallery_caption ); 
  

  $ad_gallery_excerpt = sanitize_text_field( $_POST['ad_gallery_excerpt'] );
  update_post_meta( $post_id, '_ad_gallery_excerpt', $ad_gallery_excerpt );


  $ad_gallery_controls = sanitize_text_field( $_POST['ad_gallery_controls'] );
  update_post_meta( $post_id, '_ad_gallery_controls', $ad_gallery_controls );
  
  $ad_gallery_direction = sanitize_text_field( $_POST['ad_gallery_direction'] );
  update_post_meta( $post_id, '_ad_gallery_direction', $ad_gallery_direction );    
  
  $ad_gallery_fullscreen = sanitize_text_field( $_POST['ad_gallery_fullscreen'] );
  update_post_meta( $post_id, '_ad_gallery_fullscreen', $ad_gallery_fullscreen );
  
  $ad_gallery_custom_color_active = sanitize_text_field( $_POST['ad_gallery_custom_color_active'] );
  update_post_meta( $post_id, '_ad_gallery_custom_color_active', $ad_gallery_custom_color_active );  
  
  $ad_gallery_custom_color = sanitize_text_field( $_POST['ad_gallery_custom_color'] );
  update_post_meta( $post_id, '_ad_gallery_custom_color', $ad_gallery_custom_color );

  $ad_gallery_custom_opacity = sanitize_text_field( $_POST['ad_gallery_custom_opacity'] );
  update_post_meta( $post_id, '_ad_gallery_custom_opacity', $ad_gallery_custom_opacity );
  
  $ad_gallery_sgallery_type = sanitize_text_field( $_POST['ad_gallery_sgallery_type'] );
  update_post_meta( $post_id, '_ad_gallery_sgallery_type', $ad_gallery_sgallery_type );  
  
  $ad_gallery_type = sanitize_text_field( $_POST['ad_gallery_type'] );
  update_post_meta( $post_id, '_ad_gallery_type', $ad_gallery_type );                     

  $ad_gallery_img_source = sanitize_text_field( $_POST['ad_gallery_img_source'] );
  update_post_meta( $post_id, '_ad_gallery_img_source', $ad_gallery_img_source );
  
  $ad_gallery_prettyphoto_type = sanitize_text_field( $_POST['ad_gallery_prettyphoto_type'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_type', $ad_gallery_prettyphoto_type );  

  $ad_gallery_prettyphoto_style = sanitize_text_field( $_POST['ad_gallery_prettyphoto_style'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_style', $ad_gallery_prettyphoto_style );

  $ad_gallery_prettyphoto_custom_color = sanitize_text_field( $_POST['ad_gallery_prettyphoto_custom_color'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_custom_color', $ad_gallery_prettyphoto_custom_color );
  
  $ad_gallery_prettyphoto_custom_opacity = sanitize_text_field( $_POST['ad_gallery_prettyphoto_custom_opacity'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_custom_opacity', $ad_gallery_prettyphoto_custom_opacity );  

  $ad_gallery_prettyphoto_custom_icon = sanitize_text_field( $_POST['ad_gallery_prettyphoto_custom_icon'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_custom_icon', $ad_gallery_prettyphoto_custom_icon ); 
  
  $ad_gallery_prettyphoto_theme = sanitize_text_field( $_POST['ad_gallery_prettyphoto_theme'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_theme', $ad_gallery_prettyphoto_theme );
  
  $ad_gallery_prettyphoto_animation_speed = sanitize_text_field( $_POST['ad_gallery_prettyphoto_animation_speed'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_animation_speed', $ad_gallery_prettyphoto_animation_speed );

  $ad_gallery_prettyphoto_slideshow = sanitize_text_field( $_POST['ad_gallery_prettyphoto_slideshow'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_slideshow', $ad_gallery_prettyphoto_slideshow );
  
  $ad_gallery_prettyphoto_autoplay_slideshow = sanitize_text_field( $_POST['ad_gallery_prettyphoto_autoplay_slideshow'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_autoplay_slideshow', $ad_gallery_prettyphoto_autoplay_slideshow );  

  $ad_gallery_prettyphoto_opacity = sanitize_text_field( $_POST['ad_gallery_prettyphoto_opacity'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_opacity', $ad_gallery_prettyphoto_opacity ); 
  
  $ad_gallery_prettyphoto_show_title = sanitize_text_field( $_POST['ad_gallery_prettyphoto_show_title'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_show_title', $ad_gallery_prettyphoto_show_title );  
  
  $ad_gallery_prettyphoto_show_social = sanitize_text_field( $_POST['ad_gallery_prettyphoto_show_social'] );
  update_post_meta( $post_id, '_ad_gallery_prettyphoto_show_social', $ad_gallery_prettyphoto_show_social );
  
  $ad_gallery_wrap = sanitize_text_field( $_POST['ad_gallery_wrap'] );
  update_post_meta( $post_id, '_ad_gallery_wrap', $ad_gallery_wrap ); 
  
  $ad_gallery_wrap_align = sanitize_text_field( $_POST['ad_gallery_wrap_align'] );
  update_post_meta( $post_id, '_ad_gallery_wrap_align', $ad_gallery_wrap_align );  
 
  $ad_gallery_wrap_margin = sanitize_text_field( $_POST['ad_gallery_wrap_margin'] );
  update_post_meta( $post_id, '_ad_gallery_wrap_margin', $ad_gallery_wrap_margin ); 

  $ad_gallery_photobox_type = sanitize_text_field( $_POST['ad_gallery_photobox_type'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_type', $ad_gallery_photobox_type );
  
  $ad_gallery_photobox_style = sanitize_text_field( $_POST['ad_gallery_photobox_style'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_style', $ad_gallery_photobox_style );

  $ad_gallery_photobox_custom_color = sanitize_text_field( $_POST['ad_gallery_photobox_custom_color'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_custom_color', $ad_gallery_photobox_custom_color );
  
  $ad_gallery_photobox_custom_opacity = sanitize_text_field( $_POST['ad_gallery_photobox_custom_opacity'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_custom_opacity', $ad_gallery_photobox_custom_opacity );  

  $ad_gallery_photobox_custom_icon = sanitize_text_field( $_POST['ad_gallery_photobox_custom_icon'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_custom_icon', $ad_gallery_photobox_custom_icon );

  $ad_gallery_photobox_thumbs = sanitize_text_field( $_POST['ad_gallery_photobox_thumbs'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_thumbs', $ad_gallery_photobox_thumbs );

  $ad_gallery_photobox_time = sanitize_text_field( $_POST['ad_gallery_photobox_time'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_time', $ad_gallery_photobox_time );  

  $ad_gallery_photobox_autoplay = sanitize_text_field( $_POST['ad_gallery_photobox_autoplay'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_autoplay', $ad_gallery_photobox_autoplay );  

  $ad_gallery_photobox_counter = sanitize_text_field( $_POST['ad_gallery_photobox_counter'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_counter', $ad_gallery_photobox_counter );  

  $ad_gallery_photobox_title = sanitize_text_field( $_POST['ad_gallery_photobox_title'] );
  update_post_meta( $post_id, '_ad_gallery_photobox_title', $ad_gallery_photobox_title );    

  $ad_gallery_photowall_title = sanitize_text_field( $_POST['ad_gallery_photowall_title'] );
  update_post_meta( $post_id, '_ad_gallery_photowall_title', $ad_gallery_photowall_title );  

  $ad_gallery_photowall_title_visible_onload = sanitize_text_field( $_POST['ad_gallery_photowall_title_visible_onload'] );
  update_post_meta( $post_id, '_ad_gallery_photowall_title_visible_onload', $ad_gallery_photowall_title_visible_onload );   
  
  $ad_gallery_photowall_type = sanitize_text_field( $_POST['ad_gallery_photowall_type'] );
  update_post_meta( $post_id, '_ad_gallery_photowall_type', $ad_gallery_photowall_type );
  
  // FILTER
  $ad_gallery_filter_effects_scale = sanitize_text_field( $_POST['ad_gallery_filter_effects_scale'] );
  update_post_meta( $post_id, '_ad_gallery_filter_effects_scale', $ad_gallery_filter_effects_scale );  
  
  $ad_gallery_filter_effects_rotateX = sanitize_text_field( $_POST['ad_gallery_filter_effects_rotateX'] );
  update_post_meta( $post_id, '_ad_gallery_filter_effects_rotateX', $ad_gallery_filter_effects_rotateX );
  
  $ad_gallery_filter_effects_rotateY = sanitize_text_field( $_POST['ad_gallery_filter_effects_rotateY'] );
  update_post_meta( $post_id, '_ad_gallery_filter_effects_rotateY', $ad_gallery_filter_effects_rotateY );
  
  $ad_gallery_filter_effects_rotateZ = sanitize_text_field( $_POST['ad_gallery_filter_effects_rotateZ'] );
  update_post_meta( $post_id, '_ad_gallery_filter_effects_rotateZ', $ad_gallery_filter_effects_rotateZ );
  
  $ad_gallery_filter_effects_blur = sanitize_text_field( $_POST['ad_gallery_filter_effects_blur'] );
  update_post_meta( $post_id, '_ad_gallery_filter_effects_blur', $ad_gallery_filter_effects_blur );
  
  $ad_gallery_filter_effects_grayscale = sanitize_text_field( $_POST['ad_gallery_filter_effects_grayscale'] );
  update_post_meta( $post_id, '_ad_gallery_filter_effects_grayscale', $ad_gallery_filter_effects_grayscale );
  
  $ad_gallery_filter_easing = sanitize_text_field( $_POST['ad_gallery_filter_easing'] );
  update_post_meta( $post_id, '_ad_gallery_filter_easing', $ad_gallery_filter_easing );
  
  $ad_gallery_filter_layoutMode = sanitize_text_field( $_POST['ad_gallery_filter_layoutMode'] );
  update_post_meta( $post_id, '_ad_gallery_filter_layoutMode', $ad_gallery_filter_layoutMode );
  
  $ad_gallery_filter_transitionSpeed = sanitize_text_field( $_POST['ad_gallery_filter_transitionSpeed'] );
  update_post_meta( $post_id, '_ad_gallery_filter_transitionSpeed', $ad_gallery_filter_transitionSpeed );
  
  $ad_gallery_filter_buttonEvent = sanitize_text_field( $_POST['ad_gallery_filter_buttonEvent'] );
  update_post_meta( $post_id, '_ad_gallery_filter_buttonEvent', $ad_gallery_filter_buttonEvent );

  $ad_gallery_filter_show_sort = sanitize_text_field( $_POST['ad_gallery_filter_show_sort'] );
  update_post_meta( $post_id, '_ad_gallery_filter_show_sort', $ad_gallery_filter_show_sort );
  
  $ad_gallery_filter_action = sanitize_text_field( $_POST['ad_gallery_filter_action'] );
  update_post_meta( $post_id, '_ad_gallery_filter_action', $ad_gallery_filter_action ); 

  $ad_gallery_filter_action_lightbox = sanitize_text_field( $_POST['ad_gallery_filter_action_lightbox'] );
  update_post_meta( $post_id, '_ad_gallery_filter_action_lightbox', $ad_gallery_filter_action_lightbox ); 
  
  $ad_gallery_filter_style = sanitize_text_field( $_POST['ad_gallery_filter_style'] );
  update_post_meta( $post_id, '_ad_gallery_filter_style', $ad_gallery_filter_style );

  $ad_gallery_filter_custom_color = sanitize_text_field( $_POST['ad_gallery_filter_custom_color'] );
  update_post_meta( $post_id, '_ad_gallery_filter_custom_color', $ad_gallery_filter_custom_color );
  
  $ad_gallery_filter_custom_opacity = sanitize_text_field( $_POST['ad_gallery_filter_custom_opacity'] );
  update_post_meta( $post_id, '_ad_gallery_filter_custom_opacity', $ad_gallery_filter_custom_opacity );  

  $ad_gallery_filter_custom_icon = sanitize_text_field( $_POST['ad_gallery_filter_custom_icon'] );
  update_post_meta( $post_id, '_ad_gallery_filter_custom_icon', $ad_gallery_filter_custom_icon ); 
  
  $ad_gallery_filter_prettyphoto_theme = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_theme'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_theme', $ad_gallery_filter_prettyphoto_theme );
  
  $ad_gallery_filter_prettyphoto_animation_speed = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_animation_speed'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_animation_speed', $ad_gallery_filter_prettyphoto_animation_speed );

  $ad_gallery_filter_prettyphoto_slideshow = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_slideshow'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_slideshow', $ad_gallery_filter_prettyphoto_slideshow );
  
  $ad_gallery_filter_prettyphoto_autoplay_slideshow = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_autoplay_slideshow'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_autoplay_slideshow', $ad_gallery_filter_prettyphoto_autoplay_slideshow );  

  $ad_gallery_filter_prettyphoto_opacity = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_opacity'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_opacity', $ad_gallery_filter_prettyphoto_opacity ); 
  
  $ad_gallery_filter_prettyphoto_show_title = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_show_title'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_show_title', $ad_gallery_filter_prettyphoto_show_title );  
  
  $ad_gallery_filter_prettyphoto_show_social = sanitize_text_field( $_POST['ad_gallery_filter_prettyphoto_show_social'] );
  update_post_meta( $post_id, '_ad_gallery_filter_prettyphoto_show_social', $ad_gallery_filter_prettyphoto_show_social );
  
  $ad_gallery_filter_photobox_thumbs = sanitize_text_field( $_POST['ad_gallery_filter_photobox_thumbs'] );
  update_post_meta( $post_id, '_ad_gallery_filter_photobox_thumbs', $ad_gallery_filter_photobox_thumbs );

  $ad_gallery_filter_photobox_time = sanitize_text_field( $_POST['ad_gallery_filter_photobox_time'] );
  update_post_meta( $post_id, '_ad_gallery_filter_photobox_time', $ad_gallery_filter_photobox_time );  

  $ad_gallery_filter_photobox_autoplay = sanitize_text_field( $_POST['ad_gallery_filter_photobox_autoplay'] );
  update_post_meta( $post_id, '_ad_gallery_filter_photobox_autoplay', $ad_gallery_filter_photobox_autoplay );  

  $ad_gallery_filter_photobox_counter = sanitize_text_field( $_POST['ad_gallery_filter_photobox_counter'] );
  update_post_meta( $post_id, '_ad_gallery_filter_photobox_counter', $ad_gallery_filter_photobox_counter );  

  $ad_gallery_filter_photobox_title = sanitize_text_field( $_POST['ad_gallery_filter_photobox_title'] );
  update_post_meta( $post_id, '_ad_gallery_filter_photobox_title', $ad_gallery_filter_photobox_title ); 
  
  $ad_gallery_filter_preview_excerpt = sanitize_text_field( $_POST['ad_gallery_filter_preview_excerpt'] );
  update_post_meta( $post_id, '_ad_gallery_filter_preview_excerpt', $ad_gallery_filter_preview_excerpt );                                                       
}
add_action( 'save_post', 'adgallery_save_postdata' );