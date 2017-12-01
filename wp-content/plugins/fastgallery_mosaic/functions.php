<?php
/*
File: inc/assets.php
Description: FUNCTIONS
Plugin: FAST GALLERY MOSAIC
Author: Ad-theme.com
*/


// ADD SIZE

function fastgallery_mosaic_add_image_sizes() {

	add_image_size( 'fgm-2-6', 1000 , 800 , true );
	add_image_size( 'fgm-3-6', 1200 , 800 , true );
	add_image_size( 'fgm-1-6', 1400 , 800 , true );
	add_image_size( 'fgm_default', 1000 , 800 , true );

}

add_action( 'init', 'fastgallery_mosaic_add_image_sizes' );



//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
 
//activate own function
add_shortcode('gallery', 'fastgallery_mosaic_gallery_shortcode');
function fastgallery_mosaic_gallery_shortcode($attr) {
	$post = get_post();
 
	static $instance = 0;
	$instance++;
 
	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) )
		$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}
 
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
	return $output;
 
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
		unset( $attr['orderby'] );
	}
 
	extract(shortcode_atts(array(
		'order' 							=> 'ASC',
		'orderby' 							=> 'menu_order ID',
		'id' 								=> $post ? $post->ID : 0,
		'size' 								=> '',
		'itemtag' 							=> 'div',
		'icontag'							=> 'div',
		'captiontag' 						=> 'div',
		'columns' 							=> 3,
		'include' 							=> '',
		'exclude' 							=> '',
		'link' 								=> 'file',
		'fg_type' 							=> 'prettyphoto',
		'fgm_layout' 						=> 'fg_layout1',
		'fg_style' 							=> 'fg_style1',
		'fg_responsive'						=> 'fg_responsive',
		'fgm_height' 						=> '100',		
		'fgm_custom_height'					=> '',
		'fgm_padding'						=> '0',
		'fgm_allow' 						=> 'false',
		'fg_over_image' 					=> 'fg_over_image_on',
		'fgm_image_lightbox_size'			=> 'fgm_default',
		'fg_main_color' 					=> '#000',
		'fg_main_color_opacity' 			=> '0.7',
		'fg_secondary_color' 				=> '#FFF',
		'fgm_image_lightbox'				=> 'plus',
		'fgm_image_width'					=> 'small',  
		'fg_photobox_thumbsnails'			=> 'true',
		'fg_photobox_autoplay'				=> 'true',
		'fg_photobox_counter'				=> 'true',
		'fg_photobox_time'					=> '2000',
		'fg_magnificpopup_gallery'			=> 'true',
		'fg_prettyphoto_autoplay_slideshow'	=> 'true',
		'fg_prettyphoto_animation_speed'	=> 'true',
		'fg_prettyphoto_show_title'			=> 'true',
		'fg_prettyphoto_social_tools'		=> 'show',
		'fg_lightgallery_mode'				=> 'slide',
		'fg_lightgallery_speed'				=> '2000',
		'fg_lightgallery_thumbnails'		=> 'true',
		'fg_lightgallery_controls'			=> 'true',
		'fg_custom_url_target'				=> '_blank',
		'fg_seo'							=> 'off'				
	), $attr, 'gallery'));
 
 	/* LOAD WP ENQUEUE */

 	wp_enqueue_style( 'fonts' );
 	wp_enqueue_style( 'fastgallery_mosaic-main-style' );
	wp_enqueue_script( 'fgm_removeWhitespace' );
 	wp_enqueue_script( 'fgm_collagePlus' );
	wp_enqueue_script( 'fastgallery_mosaic-frontend-script' );
	
	/* #LOAD WP ENQUEUE */
	
	$id = intval($id);
	if ( 'RAND' == $order )
	$orderby = 'none';
 
	if ( !empty($include) ) {
	$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
	$attachments = array();
	foreach ( $_attachments as $key => $val ) {
		$attachments[$val->ID] = $_attachments[$key];
	}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
 
	if ( empty($attachments) )
	return '';
 
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
		$output .= fastgallery_mosaic_wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
 
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
	$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
	$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
	$icontag = 'dt';
 
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

 	// CHECK MAIN COLOR
	$check_color = stripos($fg_main_color, '#');
	if ($check_color === false) {
		$rgb_main_color = fastgallery_mosaichex2rgb('#000');
	} else {
		$rgb_main_color = fastgallery_mosaichex2rgb($fg_main_color);
	}
	$rgba_main_color = "rgba( ".$rgb_main_color[0]." , ".$rgb_main_color[1]." , ".$rgb_main_color[2]." , ".$fg_main_color_opacity.")";	
 	
	$check_color = stripos($fg_secondary_color, '#');
	if ($check_color === false) {
		$rgb_secondary_color = fastgallery_mosaichex2rgb('#000');
	} else {
		$rgb_secondary_color = fastgallery_mosaichex2rgb($fg_secondary_color);
	}
	$rgba_secondary_color = "rgba( ".$rgb_secondary_color[0]." , ".$rgb_secondary_color[1]." , ".$rgb_secondary_color[2]." , ".$fg_main_color_opacity.")";	
	// END MAIN COLOR
 
	$selector = "gallery-{$instance}";
 
	$gallery_style = $gallery_div = '';

	$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector}.FGM-Collage .fg-gallery-item {
				text-align: center;			
			}
			#{$selector} .fg-gallery-caption {
				margin-left: 0;
			}
			#{$selector}.fastgallery_mosaic .fg-gallery-caption, 
			#{$selector}.fastgallery_mosaic .fg-gallery-caption:hover {
				background-color:".$rgba_main_color.";
			}
			#{$selector}.fastgallery_mosaic.gallery .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery_mosaic.gallery .gallery-icon .fg_zoom a:hover {
				color:".$fg_main_color.";
			}
			#{$selector}.fastgallery_mosaic.fg_style1 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			#{$selector}.fastgallery_mosaic.gallery.fg_style2 .gallery-icon .fg_zoom a {
				background:".$rgba_secondary_color.";
			}
			#{$selector}.fastgallery_mosaic.fg_style2 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}			
			#{$selector}.fastgallery_mosaic.gallery.fg_style3 .fg_zoom, #{$selector}.fastgallery_mosaic.gallery.fg_style3 .fg_zoom:hover {
				background:".$rgba_main_color.";
			}
			#{$selector}.fastgallery_mosaic.fg_style3 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}				
			#{$selector}.fastgallery_mosaic.fg_style4 .fg-gallery-caption,			
			#{$selector}.fastgallery_mosaic.gallery.fg_style4 .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery_mosaic.gallery.fg_style4 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery_mosaic.gallery.fg_style4 .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery_mosaic.gallery.fg_style4 .gallery-icon .fg_zoom a:hover	{
				background:".$rgba_main_color.";
			}			
			#{$selector}.fastgallery_mosaic.gallery.fg_style5 .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery_mosaic.gallery.fg_style5 .gallery-icon .fg_zoom a:hover	{
				color:".$fg_secondary_color.";
				background-color:".$rgba_main_color.";
			}					
			#{$selector}.fastgallery_mosaic.gallery.fg_style6 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery_mosaic.gallery.fg_style6 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}
		
			#{$selector}.fastgallery_mosaic.fg_style6 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			#{$selector}.fastgallery_mosaic.gallery.fg_style7 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery_mosaic.gallery.fg_style7 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastgallery_mosaic.fg_style7 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			
			#{$selector}.fastgallery_mosaic.gallery.fg_style8 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery_mosaic.gallery.fg_style8 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}
		
			#{$selector}.fastgallery_mosaic.fg_style8 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			
			#{$selector}.fastgallery_mosaic.gallery.fg_style9 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery_mosaic.gallery.fg_style9 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastgallery_mosaic.fg_style9 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			
			#{$selector}.fastgallery_mosaic.gallery.fg_style10 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery_mosaic.gallery.fg_style10 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastgallery_mosaic.fg_style10 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}";
	
	if($fgm_image_lightbox == 'zoomin') {
		$gallery_style .= '#'.$selector.'.fastgallery_mosaic.gallery .gallery-icon .icon-plus:before {	
							content: "\e6ef\"!important;
		}';
	}
	if($fgm_image_lightbox == 'image') {
		$gallery_style .= '#'.$selector.'.fastgallery_mosaic.gallery .gallery-icon .icon-plus:before {	
							content: "\e687"!important;
		}';
	}	
	if($fgm_image_lightbox == 'images') {
		$gallery_style .= '#'.$selector.'.fastgallery_mosaic.gallery .gallery-icon .icon-plus:before {	
							content: "\e605"!important;
		}';
	}	
	if($fgm_image_lightbox == 'spinner') {
		$gallery_style .= '#'.$selector.'.fastgallery_mosaic.gallery .gallery-icon .icon-plus:before {	
							content: "\e6e7"!important;
		}';
	}
	if($fgm_image_lightbox == 'search') {
		$gallery_style .= '#'.$selector.'.fastgallery_mosaic.gallery .gallery-icon .icon-plus:before {	
							content: "\e6ee"!important;
		}';
	}
	
	if($fgm_image_width == 'medium') {
		$gallery_style .= "#{$selector}.fastgallery_mosaic.gallery span {
							font-size:30px!important;
		}
		#{$selector}.fastgallery_mosaic.gallery .gallery-icon .fg-zoom-icon {
							margin-left:-15px!important;
							margin-top:-40px;
		}
		#{$selector}.fastgallery_mosaic.gallery.fg_style2 .gallery-icon .fg-zoom-icon,
		#{$selector}.fastgallery_mosaic.gallery.fg_style5 .gallery-icon .fg-zoom-icon  {
							margin-top:-15px;
		}		
		#{$selector}.fastgallery_mosaic.gallery .gallery-icon.no-caption .fg-zoom-icon {
							margin-top:-15px!important;
		}
		#{$selector}.fastgallery_mosaic.fg_style7 .fg-gallery-caption,
		#{$selector}.fastgallery_mosaic.fg_style8 .fg-gallery-caption {
							top:55%;
		}
		";
	}
	
	if($fgm_image_width == 'large') {
		$gallery_style .= "#{$selector}.fastgallery_mosaic.gallery span {
							font-size:50px!important;
		}
		#{$selector}.fastgallery_mosaic.gallery .gallery-icon .fg-zoom-icon {
							margin-left:-25px!important;
							margin-top:-50px;
		}
		#{$selector}.fastgallery_mosaic.gallery.fg_style2 .gallery-icon .fg-zoom-icon,
		#{$selector}.fastgallery_mosaic.gallery.fg_style5 .gallery-icon .fg-zoom-icon {
							margin-top:-25px;
		}		
		#{$selector}.fastgallery_mosaic.gallery .gallery-icon.no-caption .fg-zoom-icon {
							margin-top:-25px!important;
		}
		#{$selector}.fastgallery_mosaic.fg_style7 .fg-gallery-caption,
		#{$selector}.fastgallery_mosaic.fg_style8 .fg-gallery-caption {
							top:55%;
		}
		";
	}	
				
	$gallery_style .= "</style>";	
	
	
	
	
	
	
	if(!empty($fgm_custom_height)) {
		$fgm_height = $fgm_custom_height;
	}
	
	
	
	$gallery_script = "<script type=\"text/javascript\">";
	
	if($fg_responsive == 'fg_responsive') {

		$gallery_script .= "jQuery(function($){
				$(window).load(function () {
			window.onresize = function(){ location.reload(); }
			var mq = window.matchMedia( \"(min-width: 1000px)\" );
			if (mq.matches) {	
				
						function collage() {
							$('#$selector.FGM-Collage').removeWhitespace().collagePlus(
							{
									'targetHeight'  		: ".$fgm_height.",
									'padding'				: ".$fgm_padding.",
									'allowPartialLastRow'   : ".$fgm_allow."
								}
							);
						};						
						$(document).ready(function(){
							collage();
						});	
						var resizeTimer = null;
						$(window).bind('resize', function() {
							$('.FGM-Collage .fg-gallery-item').css(\"opacity\", 0);
							if (resizeTimer) clearTimeout(resizeTimer);
							resizeTimer = setTimeout(collage, 200);
						});	
			}
		});
		});";
			
	} else {
		
		$gallery_script .= "jQuery(function($){
			$(window).load(function () {
						$(document).ready(function(){
							collage();
						});
						function collage() {
							$('#$selector.FGM-Collage').removeWhitespace().collagePlus(
							{
									'targetHeight'  		: ".$fgm_height.",
									'padding'				: ".$fgm_padding.",
									'allowPartialLastRow'   : ".$fgm_allow."
								}
							);
						};	
						var resizeTimer = null;
						$(window).bind('resize', function() {
							$('.FGM-Collage .fg-gallery-item').css(\"opacity\", 0);
							if (resizeTimer) clearTimeout(resizeTimer);
							resizeTimer = setTimeout(collage, 200);
						});	
		});
		});";		
			
	}
			
			
	$gallery_script .= "</script>";
	
	
	// PHOTOBOX
	if($fg_type == 'photobox') { // PHOTOBOX CSS/JS
		wp_enqueue_style( 'photobox' );	
    	wp_enqueue_style( 'photoboxie' );	
		wp_enqueue_style( 'photobox-style' );
		wp_enqueue_script('photobox-js');
		 
		$gallery_script .= '<script type="text/javascript">
			jQuery(function($){
				$(\'#'.$selector.'\').photobox(\'a\', { 
					thumbs: '.$fg_photobox_thumbsnails.', 
					time: '.$fg_photobox_time.',
					autoplay: '.$fg_photobox_autoplay.',
					counter: '.$fg_photobox_counter.'				 
				});
			});
		</script>';
		
	} // CLOSE PHOTOBOX CSS/JS
		
	// PRETTYPHOTO
	if($fg_type == 'prettyphoto') {
		wp_enqueue_style( 'prettyPhoto' );
		wp_enqueue_script('prettyPhoto-js');
		if($fg_prettyphoto_social_tools == 'hidden') {
			$fg_prettyphoto_social_tools = ',social_tools: false';
		} else {
			$fg_prettyphoto_social_tools = '';
		}
		$gallery_script .= '<script type="text/javascript">		
		jQuery(function($){
			jQuery(document).ready(function($){
					$("#'.$selector.' a[data-rel-fg^=\'prettyPhoto\']").prettyPhoto({
						autoplay_slideshow: '.$fg_prettyphoto_autoplay_slideshow.',
						animation_speed: \''.$fg_prettyphoto_animation_speed.'\',
						theme: \'pp_default\',
						slideshow: 5000,
						show_title: '.$fg_prettyphoto_show_title.'
						'.$fg_prettyphoto_social_tools.'									
					});
			}); 
		});
		</script>';
	}
	
	// MAGNIFIC POPUP
	if($fg_type == 'magnific-popup') {
		wp_enqueue_style( 'magnific-popup' );
		wp_enqueue_script('magnific-popup-js');
		
		$gallery_script .= '<script type="text/javascript">
			jQuery(function($){
  				$(\'#'.$selector.' .fg_magnificPopup\').magnificPopup({
		  			type: \'image\',					
		  			gallery:{
						enabled:'.$fg_magnificpopup_gallery.'
  					}
					});
			});		
		</script>';
	}
	
	// LIGHT GALLERY
	if($fg_type == 'lightgallery') {
		wp_enqueue_style( 'lightgallery' );
		wp_enqueue_script( 'lightgallery-js');
		
		$gallery_script .= '<script type="text/javascript">
						jQuery(function($){
							$(\'#'.$selector.'.FGM-Collage\').lightGallery({
								mode:\''.$fg_lightgallery_mode.'\',
								speed: '.$fg_lightgallery_speed.',
								thumbnail: '.$fg_lightgallery_thumbnails.',
								controls: '.$fg_lightgallery_controls.'								
							});
						});		
					</script>';				
	}
	
	$size_class = sanitize_html_class( $size );

	$gallery_div = "<div id='$selector' class='FGM-Collage gallery galleryid-{$id} gallery-size-{$size_class} fastgallery_mosaic ".$fg_responsive." ".$fg_style." ".$fg_over_image." ".$fgm_layout."'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_script . "\n\t\t" . $gallery_div );

		$i = 0;
		$count_image = count($attachments);
		foreach ( $attachments as $id => $attachment ) {
		// CHECK CAPTION
		$caption_check = '';
		if(empty($attachment->post_excerpt)) {
			$caption_check = 'no-caption';
		}
		// END CHECK CAPTION
		
		// ALT IMAGE
		$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
		// END ALT IMAGE
		
		
		$image_meta = wp_get_attachment_metadata( $id );
	 
		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
		$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
	 	
		
		if($fgm_layout == 'fg_layout1') {
		
			$tag_grid_array = array('fgm-2-6','fgm-1-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-2-6','fgm-1-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-2-6','fgm-1-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-2-6','fgm-1-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-2-6','fgm-1-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-1-6','fgm-3-6');
		}
		if($fgm_layout == 'fg_layout2') {
			
			$tag_grid_array = array('fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-1-6',
									'fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-1-6',									
									'fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-1-6',
									'fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-1-6',
									'fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-1-6');
		
		}
		if($fgm_layout == 'fg_layout3') {
			
			$tag_grid_array = array('fgm-3-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6',
									'fgm-3-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6',									
									'fgm-3-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6',
									'fgm-3-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6',
									'fgm-3-6','fgm-3-6','fgm-3-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-1-6','fgm-1-6','fgm-3-6','fgm-2-6','fgm-1-6');
		
		}
		if($fgm_layout == 'fg_layout4') {
			
			$tag_grid_array = array('fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-3-6',									
									'fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-3-6',
									'fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-3-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-2-6','fgm-1-6','fgm-3-6');
		
		}
		if($fgm_layout == 'fg_layout5') {
			
			$tag_grid_array = array('fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6',
									'fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6',									
									'fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6',
									'fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6',
									'fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6','fgm-1-6','fgm-1-6','fgm-2-6','fgm-2-6','fgm-3-6','fgm-3-6');
		
		}
								
		if(empty($tag_grid_array[$i])) { $tag_grid_array[$i] = 'fgm-2-6'; }
				
		$tag_grid = $tag_grid_array[$i];	
		
		if($fg_seo == 'on') {
			
			$default_attr = array(
					'title' => trim(strip_tags(($attachment->post_title))),
					'alt'   => trim(strip_tags( get_post_meta($attachment->ID, '_wp_attachment_image_alt', true) ))			
			);
			$link_text = wp_get_attachment_image( $id, $tag_grid_array[$i], false, $default_attr );
		
		} else {
			
			$link_text = wp_get_attachment_image( $id, $tag_grid_array[$i] );
		
		}
		
		/* FUNCTION THUMBS */
		$_post = get_post( $id );
		$image_attributes = wp_get_attachment_image_src( $_post->ID, $fgm_image_lightbox_size );
		if($fg_type == 'custom_url') {					
				$url = get_post_meta( $id, '_custom_url', true );						
		} else {
				$url = $image_attributes[0];
		}	
		$attachment_caption_array = get_post( $_post->ID );
		$attachment_caption	= $attachment_caption_array->post_excerpt;	
			
		// LIGHTGALLERY
		if($fg_type != 'lightgallery') {	
				$output .= "<{$itemtag} class='fg-gallery-item {$tag_grid}'>";
		} else {
				$output .= "<{$itemtag} data-src='$url' class='fg-gallery-item {$tag_grid}'>";	
		}
		// #LIGHTGALLERY		
		
		$output .= "
		<{$icontag} class='gallery-icon {$orientation} $caption_check'>";
		
		if($fg_type == 'lightgallery') {
				$output .= "<div class='fg_zoom'>$link_text<a href='$url'><span class='fg-zoom-icon icon-plus'></span></a></div>";
		} elseif($fg_type == 'custom_url') {
				$output .= "<div class='fg_zoom'>$link_text<a href='$url' target='$fg_custom_url_target'><span class='fg-zoom-icon icon-plus'></span></a></div>";					
		} else {
				$output .= "<div class='fg_zoom'>$link_text<a href='$url' title=\"$attachment_caption\" data-rel-fg='prettyPhoto[album-{$instance}]' class='fg_magnificPopup'><span class='fg-zoom-icon icon-plus'></span><span style='display:none'>$link_text</span></a></div>";							
		}

		/* #FUNCTION THUMBS */
		
		
		if ( $captiontag && trim($attachment->post_excerpt) ) {
		$output .= "
		<{$captiontag} class='fg-wp-caption-text fg-gallery-caption'><div class='caption-container'>
		" . wptexturize($attachment->post_excerpt) . "
		</div></{$captiontag}>";
		}
		$output .= "</{$icontag}></{$itemtag}>";
		$i++;
		}

		$output .= "
		</div>\n";	
	return $output;
}

function fastgallery_mosaichex2rgb($hex) {

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
	return $rgb;
	
}

add_filter('widget_text', 'do_shortcode');

add_action( 'after_setup_theme', 'fix_fastgallery_mosaic' ); 
function fix_fastgallery_mosaic() {
	remove_shortcode('gallery');
	add_shortcode('gallery', 'fastgallery_mosaic_gallery_shortcode');
}
?>