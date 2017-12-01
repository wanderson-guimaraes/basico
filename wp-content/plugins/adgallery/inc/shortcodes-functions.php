<?php
/*
File: inc/shortcodes.php
Description: Shortocodes Functions
Plugin: AD Gallery
Author: Ad-theme.com
*/

function adgallery_function ($id) {
	//global $post;
	$ad_gallery_type = get_post_meta( $id, '_ad_gallery_type', true );
	$style = get_post_meta( $id, '_ad_gallery_style', true );
	$number = get_post_meta( $id, '_ad_gallery_number', true );
	if(empty($number)) { $number = '-1'; }
	$custom_size = get_post_meta( $id, '_ad_gallery_custom_size', true );
	$img_source = get_post_meta( $id, '_ad_gallery_img_source', true );
	$wrap = get_post_meta( $id, '_ad_gallery_wrap', true );
	$wrap_align = get_post_meta( $id, '_ad_gallery_wrap_align', true );
	$wrap_margin = get_post_meta( $id, '_ad_gallery_wrap_margin', true );
	$featured_body = get_post_meta( $id, '_ad_gallery_featured_body', true );
	$image_effect = get_post_meta( $id, '_ad_gallery_image_effect', true );
	if(empty($image_effect)) { $image_effect = 'normal'; }
	$image_effect_rotate = get_post_meta( $id, '_ad_gallery_image_effect_rotate', true );
	if(empty($image_effect_rotate)) { $image_effect_rotate = '360'; }
	$image_effect_scale = get_post_meta( $id, '_ad_gallery_image_effect_scale', true );
	if(empty($image_effect_scale)) { $image_effect_scale = '1.2,1.2'; }
	$image_effect_translate = get_post_meta( $id, '_ad_gallery_image_effect_translate', true );
	if(empty($image_effect_translate)) { $image_effect_translate = '10px,0'; }
	$border_radius = get_post_meta( $id, '_ad_gallery_border_radius', true );
	if(empty($border_radius)) { $border_radius = '0'; }
	// S GALLERY
	$caption = get_post_meta( $id, '_ad_gallery_caption', true );
	$excerpt = get_post_meta( $id, '_ad_gallery_excerpt', true );
	if(empty($excerpt)) { $excerpt = '100'; }
	$controls = get_post_meta( $id, '_ad_gallery_controls', true );
	$direction = get_post_meta( $id, '_ad_gallery_direction', true );
	$fullscreen = get_post_meta( $id, '_ad_gallery_fullscreen', true );
	$custom_color_active = get_post_meta( $id, '_ad_gallery_custom_color_active', true );
	$custom_color = get_post_meta( $id, '_ad_gallery_custom_color', true );
	$custom_opacity = get_post_meta( $id, '_ad_gallery_custom_opacity', true );
	if(empty($custom_opacity)) { $custom_opacity = '1'; }
	$sgallery_type = get_post_meta( $id, '_ad_gallery_sgallery_type', true );
	$rgb_sgallery = adhex2rgb($custom_color);
	$rgba_sgallery = "rgba( " . $rgb_sgallery[0] . ", " . $rgb_sgallery[1] . ", " . $rgb_sgallery[2] . ", " . $custom_opacity . ")";
	
	// GALLERY PRETTYPHOTO
	$prettyphoto_style = get_post_meta( $id, '_ad_gallery_prettyphoto_style', true );
	$prettyphoto_custom_color = get_post_meta( $id, '_ad_gallery_prettyphoto_custom_color', true );
	$prettyphoto_custom_opacity = get_post_meta( $id, '_ad_gallery_prettyphoto_custom_opacity', true );
	if(empty($prettyphoto_custom_opacity)) { $prettyphoto_custom_opacity = '1'; }
	$prettyphoto_custom_icon = get_post_meta( $id, '_ad_gallery_prettyphoto_custom_icon', true );
	$prettyphoto_theme = get_post_meta( $id, '_ad_gallery_prettyphoto_theme', true );
	$prettyphoto_animation_speed = get_post_meta( $id, '_ad_gallery_prettyphoto_animation_speed', true );	
	$prettyphoto_slideshow = get_post_meta( $id, '_ad_gallery_prettyphoto_slideshow', true );
	if(empty($prettyphoto_slideshow)) { $prettyphoto_slideshow = '5000'; }
	$prettyphoto_autoplay_slideshow = get_post_meta( $id, '_ad_gallery_prettyphoto_autoplay_slideshow', true );
	$prettyphoto_opacity = get_post_meta( $id, '_ad_gallery_prettyphoto_opacity', true );
	if(empty($prettyphoto_opacity)) { $prettyphoto_opacity = '1'; }
	$prettyphoto_show_title = get_post_meta( $id, '_ad_gallery_prettyphoto_show_title', true );
	$prettyphoto_show_social = get_post_meta( $id, '_ad_gallery_prettyphoto_show_social', true );	
	$prettyphoto_type = get_post_meta( $id, '_ad_gallery_prettyphoto_type', true );
	
	// GALLERY PHOTOBOX
	$photobox_style = get_post_meta( $id, '_ad_gallery_photobox_style', true );
	$photobox_custom_color = get_post_meta( $id, '_ad_gallery_photobox_custom_color', true );
	$photobox_custom_opacity = get_post_meta( $id, '_ad_gallery_photobox_custom_opacity', true );
	if(empty($photobox_custom_opacity)) { $photobox_custom_opacity = '1'; }
	$rgb_photobox = adhex2rgb($photobox_custom_color);
	$rgba_photobox = "rgba( " . $rgb_photobox[0] . ", " . $rgb_photobox[1] . ", " . $rgb_photobox[2] . ", " . $photobox_custom_opacity . ")";	
	$photobox_custom_icon = get_post_meta( $id, '_ad_gallery_photobox_custom_icon', true );
	$photobox_thumbs = get_post_meta( $id, '_ad_gallery_photobox_thumbs', true );
	$photobox_time = get_post_meta( $id, '_ad_gallery_photobox_time', true );
	if(empty($photobox_time)) { $photobox_time = '1000'; }
	$photobox_autoplay = get_post_meta( $id, '_ad_gallery_photobox_autoplay', true );
	$photobox_title = get_post_meta( $id, '_ad_gallery_photobox_title', true );
	$photobox_counter = get_post_meta( $id, '_ad_gallery_photobox_counter', true );
	$photobox_type = get_post_meta( $id, '_ad_gallery_photobox_type', true );
	
	// GALLERY PHOTOWALL
	$photowall_type = get_post_meta( $id, '_ad_gallery_photowall_type', true );
	$ad_gallery_photowall_title = get_post_meta( $id, '_ad_gallery_photowall_title', true );
	$ad_gallery_photowall_title_visible_onload = get_post_meta( $id, '_ad_gallery_photowall_title_visible_onload', true );

	// FILTER
	$ad_gallery_filter_effects_scale = get_post_meta( $id, '_ad_gallery_filter_effects_scale', true );
	$ad_gallery_filter_effects_rotateX = get_post_meta( $id, '_ad_gallery_filter_effects_rotateX', true );
	$ad_gallery_filter_effects_rotateY = get_post_meta( $id, '_ad_gallery_filter_effects_rotateY', true );
	$ad_gallery_filter_effects_rotateZ = get_post_meta( $id, '_ad_gallery_filter_effects_rotateZ', true );
	$ad_gallery_filter_effects_blur = get_post_meta( $id, '_ad_gallery_filter_effects_blur', true );
	$ad_gallery_filter_effects_grayscale = get_post_meta( $id, '_ad_gallery_filter_effects_grayscale', true );
	$ad_gallery_filter_easing = get_post_meta( $id, '_ad_gallery_filter_easing', true );
	$ad_gallery_filter_layoutMode = get_post_meta( $id, '_ad_gallery_filter_layoutMode', true );
	$ad_gallery_filter_transitionSpeed = get_post_meta( $id, '_ad_gallery_filter_transitionSpeed', true );
	if(empty($ad_gallery_filter_transitionSpeed)) { $ad_gallery_filter_transitionSpeed = '1000'; }
	$ad_gallery_filter_buttonEvent = get_post_meta( $id, '_ad_gallery_filter_buttonEvent', true );
	$ad_gallery_filter_show_sort = get_post_meta( $id, '_ad_gallery_filter_show_sort', true );
	$ad_gallery_filter_action = get_post_meta( $id, '_ad_gallery_filter_action', true );
	$ad_gallery_filter_action_lightbox = get_post_meta( $id, '_ad_gallery_filter_action_lightbox', true );
	$ad_gallery_filter_style = get_post_meta( $id, '_ad_gallery_filter_style', true );
	$ad_gallery_filter_custom_color = get_post_meta( $id, '_ad_gallery_filter_custom_color', true );
	$ad_gallery_filter_custom_opacity = get_post_meta( $id, '_ad_gallery_filter_custom_opacity', true );
	if(empty($ad_gallery_filter_custom_opacity)) { $ad_gallery_filter_custom_opacity = '1'; }
	$ad_gallery_filter_custom_icon = get_post_meta( $id, '_ad_gallery_filter_custom_icon', true );
	$rgb_filter = adhex2rgb($ad_gallery_filter_custom_color);
	$rgba_filter = "rgba( " . $rgb_filter[0] . ", " . $rgb_filter[1] . ", " . $rgb_filter[2] . ", " . $ad_gallery_filter_custom_opacity . ")";
	// FILTER PRETTYPHOTO
	$ad_gallery_filter_prettyphoto_theme = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_theme', true );
	$ad_gallery_filter_prettyphoto_animation_speed = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_animation_speed', true );
	$ad_gallery_filter_prettyphoto_slideshow = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_slideshow', true );
	if(empty($ad_gallery_filter_prettyphoto_slideshow)) { $ad_gallery_filter_prettyphoto_slideshow = '5000'; }
	$ad_gallery_filter_prettyphoto_autoplay_slideshow = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_autoplay_slideshow', true );
	$ad_gallery_filter_prettyphoto_opacity = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_opacity', true );
	if(empty($ad_gallery_filter_prettyphoto_opacity)) { $ad_gallery_filter_prettyphoto_opacity = '1'; }
	$ad_gallery_filter_prettyphoto_show_title = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_show_title', true );
	$ad_gallery_filter_prettyphoto_show_social = get_post_meta( $id, '_ad_gallery_filter_prettyphoto_show_social', true );	
	// FILTER PHOTOBOX
	$ad_gallery_filter_photobox_thumbs = get_post_meta( $id, '_ad_gallery_filter_photobox_thumbs', true );
	$ad_gallery_filter_photobox_time = get_post_meta( $id, '_ad_gallery_filter_photobox_time', true );
	if(empty($ad_gallery_filter_photobox_time)) { $ad_gallery_filter_photobox_time = '1000'; }
	$ad_gallery_filter_photobox_autoplay = get_post_meta( $id, '_ad_gallery_filter_photobox_autoplay', true );
	$ad_gallery_filter_photobox_title = get_post_meta( $id, '_ad_gallery_filter_photobox_title', true );
	$ad_gallery_filter_photobox_counter = get_post_meta( $id, '_ad_gallery_filter_photobox_counter', true );
	// FILTER PREVIEW
	$ad_gallery_filter_preview_excerpt = get_post_meta( $id, '_ad_gallery_filter_preview_excerpt', true );
	if(empty($ad_gallery_filter_preview_excerpt)) { $ad_gallery_filter_preview_excerpt = '100'; }
	
	
	// THUMBS
		if($custom_size == 'adgallery_custom_size_default') {
			$adgallery_custom_size_width = '260';
		   	$adgallery_custom_size_height = '260';
			$adgallery_custom_size_crop = true;
		}
		if($custom_size == 'adgallery_custom1_size') {
           	$adgallery_custom_size_width = get_option( 'adgallery_custom1_size_width', '' );
		   	$adgallery_custom_size_height = get_option( 'adgallery_custom1_size_height', '' );
			$adgallery_custom_size_crop = get_option( 'adgallery_custom1_size_crop', '' );
    	}
		if($custom_size == 'adgallery_custom2_size') {
           	$adgallery_custom_size_width = get_option( 'adgallery_custom2_size_width', '' );
		   	$adgallery_custom_size_height = get_option( 'adgallery_custom2_size_height', '' );
			$adgallery_custom_size_crop = get_option( 'adgallery_custom2_size_crop', '' );
		}
		if($custom_size == 'adgallery_custom3_size') {
           	$adgallery_custom_size_width = get_option( 'adgallery_custom3_size_width', '' );
		   	$adgallery_custom_size_height = get_option( 'adgallery_custom3_size_height', '' );
			$adgallery_custom_size_crop = get_option( 'adgallery_custom3_size_crop', '' );
		}
		if($custom_size == 'adgallery_custom4_size') {
           	$adgallery_custom_size_width = get_option( 'adgallery_custom4_size_width', '' );
		   	$adgallery_custom_size_height = get_option( 'adgallery_custom4_size_height', '' );
			$adgallery_custom_size_crop = get_option( 'adgallery_custom4_size_crop', '' );
		}
		if($custom_size == 'adgallery_custom_size_grid') {
           	$adgallery_custom_size_width = get_option( 'adgallery_custom_size_grid', '' );
			$adgallery_custom_size_height = 'auto';
		}
		
	$rgb = adhex2rgb($prettyphoto_custom_color);
	$rgba = "rgba( " . $rgb[0] . ", " . $rgb[1] . ", " . $rgb[2] . ", " . $prettyphoto_custom_opacity . ")";
	
	// GET CAT METEBOX
	$cat = get_post_meta( $id, '_ad_gallery_category', true );
	if(empty($cat)) { $cat = array(''); }
	$category = '';
	foreach ($cat as $name) {
		$category .= $name . ',';
	}
	if($cat[0]=='all') {
		$category = '';
	}

	// GET CAT WOOCOMMERCE METABOX
	$woocommerce_cat = get_post_meta( $id, '_ad_gallery_woocommerce_category', true );
	if(empty($woocommerce_cat)) { $woocommerce_cat = array(''); }
	$woocommerce_category = '';
	foreach ($woocommerce_cat as $name) {
		$woocommerce_category .= $name . ',';
	}
	if($woocommerce_cat[0]=='all') {
		$woocommerce_category = '';
	}

	// GET CAT WP ECOMMERCE METABOX
	$wp_ecommerce_cat = get_post_meta( $id, '_ad_gallery_wp_ecommerce_category', true );
	if(empty($wp_ecommerce_cat)) { $wp_ecommerce_cat = array(''); }
	$wp_ecommerce_category = '';
	foreach ($wp_ecommerce_cat as $name) {
		$wp_ecommerce_category .= $name . ',';
	}
	if($wp_ecommerce_cat[0]=='all') {
		$wp_ecommerce_category = '';
	}

	// GET CAT JIGOSHOP METABOX
	$jigoshop_cat = get_post_meta( $id, '_ad_gallery_jigoshop_category', true );
	if(empty($jigoshop_cat)) { $jigoshop_cat = array(''); }
	$jigoshop_category = '';
	foreach ($jigoshop_cat as $name) {
		$jigoshop_category .= $name . ',';
	}
	if($jigoshop_cat[0]=='all') {
		$jigoshop_category = '';
	}

	// GET CAT ADGALLERY POST CAT METABOX
	$adgallery_post_cat = get_post_meta( $id, '_ad_gallery_post_cat_category', true );
	if(empty($adgallery_post_cat)) { $adgallery_post_cat = array(''); }
	$adgallery_post_cat_category = '';
	foreach ($adgallery_post_cat as $name) {
		$adgallery_post_cat_category .= $name . ',';
	}
	if($adgallery_post_cat[0]=='all') {
		$adgallery_post_cat_category = '';
	}

	// LOOP QUERY
	$query = 'post_type=Post&posts_per_page='.$number.'&post_status=publish';
		if($img_source == 'post') {
			if($category != '') {
				$query .= '&category_name='.$category;
			}
		}
		if($img_source == 'woocommerce') {
			if($woocommerce_category != '') {
				$query .= '&product_cat='.$woocommerce_category;
			}
			$query .= '&post_type=product';
		}
		if($img_source == 'wp-ecommerce') {
			if($wp_ecommerce_category != '') {
				$query .= '&wpsc_product_category='.$wp_ecommerce_category;
			}
			$query .= '&post_type=wpsc-product';
		}
		if($img_source == 'jigoshop') {
			if($jigoshop_category != '') {
				$query .= '&product_cat='.$jigoshop_category;
			}
			$query .= '&post_type=product';
		}	
		if($img_source == 'post_cat') {
			if($adgallery_post_cat_category != '') {
				$query .= '&adgallery_post_cat='.$adgallery_post_cat_category;
			}
			$query .= '&post_type=adgallery_post';
		}
		if($img_source == 'album') {
			$ad_gallery_album = get_post_meta( $id, '_ad_gallery_album', true );
			if(empty($ad_gallery_album) || $ad_gallery_album == 'all') { $ad_gallery_album = ''; }
			$query .= '&post_type=adgallery_album';
			//print_r($ad_gallery_album);
			$query .= '&p='.$ad_gallery_album;
		}

		
	/***********************************************************************************************/
	/**************************************** SGALLERY *********************************************/
	/***********************************************************************************************/
	
	if($ad_gallery_type == 'sgallery') {
	
	?>
    <style type="text/css">
	#adgallery-sgallery {
			width:<?php if(empty($wrap)) { echo '100%'; } else { echo $wrap.'px'; } ?>;
			margin:
			<?php if($wrap_align=='center') { echo '0 auto'; } 
			elseif ($wrap_align=='left') { echo '0 auto 0 0'; } 
			elseif ($wrap_align=='right') { echo '0 0 0 auto'; } 
			?>;
	}
	#adgallery-sgallery .items-thumbs li {
			margin:<?php echo $wrap_margin; ?>;
			<?php if($border_radius != '') { ?>
				border-radius:<?php echo $border_radius; ?>;
				overflow:hidden;
			<?php } ?>
	}
	#adgallery-sgallery.<?php echo $style; ?> .items-thumbs li {
			width:<?php echo $adgallery_custom_size_width; ?>px;
			height:<?php echo $adgallery_custom_size_height; ?>px;
	}
	<?php if($custom_color_active == 'on') { ?>
	.sgallery.<?php echo $style; ?> .items-thumbs li.item:hover .item-overlay {
		    background:<?php echo $rgba_sgallery; ?>!important;
	}
	<?php } ?>
	#adgallery-sgallery .icon-grid, #adgallery-sgallery .icon-arrow-left, #adgallery-sgallery .icon-arrow-right, #adgallery-sgallery .icon-fullscreen-exit, #adgallery-sgallery .icon-fullscreen {
			background-image:url('<?php echo adgallery_URL; ?>assets/img/<?php echo $direction; ?>.png');
	}
	<?php if($image_effect != 'normal') { ?>
	#adgallery-sgallery .items-thumbs .item:hover img {
			transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-ms-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-webkit-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>	
	}
	<?php } ?>
	#adgallery-sgallery .items-thumbs .item img {
		border-radius:<?php echo $border_radius; ?>
	}
	</style>
  <script>
  jQuery(function($){
    $(document).ready(function(){
     $('#adgallery-sgallery').sGallery({
        fullScreenEnabled: true
      });
    });
  });
  <?php if($sgallery_type == 'infinitescroll') { ?>
  jQuery(function($){			
			// INFINITE SCROLL   
				var infinite_scroll = {
						loading: {
							img: "<?php echo adgallery_URL; ?>assets/img/ajax-loader.gif",
							msgText: "<?php _e( 'Loading the next set of posts...', 'custom' ); ?>",
							finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
						},
						"nextSelector":"#nav-below .nav-previous a",
						"navSelector":"#nav-below",
						"itemSelector":".item",
						"contentSelector":".items-thumbs"
				};
				jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
				// INFINITE SCROLL END				
  });
  <?php } ?>
  <?php if($sgallery_type ==  'grid') { ?>
		jQuery(document).ready(function($){
		$(function(){
		$(".items-thumbs").vgrid({
			easing: "easeOutQuint",
			time: 500,
			delay: 20,
			fadeIn: {
				time: 300,
				delay: 50
			}
			});
		});
		});
  <?php } ?>
  </script>
	  <!--// Gallery Markup: A container that the plugin is called upon, and two lists for the images (use images with same aspect ratio) //-->
  <div id="adgallery-sgallery" class="sgallery <?php echo $style; ?>">
    
    <ul class="items-thumbs">
	<?php
	// INFINITE SCROLL 
	if($sgallery_type == 'infinitescroll') {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$paged_value = ",'paged' => ".$paged ;
	}	
	if($sgallery_type == 'infinitescroll') {
			$query .= '&paged='.$paged;
	}
	// INFINITE SCROLL END
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		?> 
        
        <?php
        		if($img_source == 'album') {
				$gallery_image = get_post_meta( get_the_id(), 'gallery-image', false );
            	foreach ( $gallery_image as $single_image_id ):
				$single_image = wp_get_attachment_image_src( $single_image_id, $custom_size );
				$single_image_large = wp_get_attachment_image_src( $single_image_id, 'post-cat' );
        ?>
        		<li class="item">
					<a href="#">
        				<img src="<?php echo $single_image[0]; ?>">
                        <div class="item-overlay"></div>
        			</a>
                    </li>
                    
         
		<?php
				endforeach;
				} else {
		?>           
                    
                    
		<li class="item">
			<a href="#">
                	<?php if($featured_body == 'content') { ?>
					<img src="<?php echo get_first_image(); ?>" >
                    <?php
                    $url = get_first_image();
					 } else { ?>                    
						<?php if(has_post_thumbnail()){ ?>
                            <?php the_post_thumbnail( $custom_size ); ?>
                        <?php } else { ?>               
                            <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                        <?php } 
					
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
					} // Close Post Image Content
					?> 
                <div class="item-overlay"></div>
			</a>            
		</li>
		<?php
				}
		endwhile;
		if($sgallery_type == 'infinitescroll') { ?>
		<!-- INFINITE SCROLL -->
		<nav id="nav-below">
        <ul>
            <li><?php previous_posts_link( '&laquo; PREV', $loop->max_num_pages) ?></li> 
            <li class="nav-previous"><?php next_posts_link( 'NEXT &raquo;', $loop->max_num_pages) ?></li>
        </ul>
        </nav>
        <!-- INFINITE SCROLL END -->
    	<?php }
		}
	
	

    ?>	   
    </ul>
    
   <ul class="items-large">   
   	<?php
		if($sgallery_type == 'infinitescroll') {
	    	$query .= '&posts_per_page=-1';
        }
		$loop = new WP_Query($query);	
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
        
        		if($img_source == 'album') {
				$gallery_image = get_post_meta( get_the_id(), 'gallery-image', false );
            	foreach ( $gallery_image as $single_image_id ):
				$single_image = wp_get_attachment_image_src( $single_image_id, $custom_size );
				$single_image_large = wp_get_attachment_image_src( $single_image_id, 'post-cat' );
		?>
		 <li class="item-large">
			<a href="#">
			<figure>   
				<img src="<?php echo $single_image_large[0]; ?>">

			</figure>
            </a>
		</li>
		<?php
				endforeach;
				} else {
	?>	
        
        
        
        
        
		 <li class="item-large">
			<a href="#">
			<figure>                
                    <?php if($featured_body == 'content') { ?>
					<img src="<?php echo get_first_image(); ?>" >
                    <?php
                    $url = get_first_image();
					 } else { ?>                    
						<?php if(has_post_thumbnail()){ ?>
                            <?php the_post_thumbnail( 'sgallery' ); ?>
                        <?php } else { ?>               
                            <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                        <?php } 
					
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
					} // Close Post Image Content
					?> 
			</a>
			<?php if($caption == 'on') { ?>
				<figcaption class="img-caption">
					  <?php echo substr(get_the_excerpt(), 0, $excerpt); ?>
				</figcaption>
			<?php } ?>
			</figure>
		</li>
		<?php
				}
		endwhile;
		}

    ?>
    </ul>
    <?php if($controls == 'on') { ?>
        <div class="controls">
              	<span class="control icon-arrow-left" data-direction="previous"></span> 
              	<span class="control icon-arrow-right" data-direction="next"></span> 
          		<span class="grid icon-grid"></span>
          		<span class="fs-toggle icon-fullscreen"></span>
        </div>
    <?php } ?>
   </div> 
	<?
	} // CLOSE SGALLERY
	/***********************************************************************************************/
	/**************************************** PRETTYPHOTO ******************************************/
	/***********************************************************************************************/
	
	if($ad_gallery_type == 'prettyphoto') {
		?>
		<style type="text/css">
		.adgallery {
			width:<?php if(empty($wrap)) { echo '100%'; } else { echo $wrap.'px'; } ?>;
			margin:
			<?php if($wrap_align=='center') { echo '0 auto'; } 
			elseif ($wrap_align=='left') { echo '0 auto 0 0'; } 
			elseif ($wrap_align=='right') { echo '0 0 0 auto'; } 
			?>;
		}
		.adgallery-prettyphoto .container-item {
			margin:<?php echo $wrap_margin; ?>;
			<?php if($border_radius != '') { ?>
				border-radius:<?php echo $border_radius; ?>;
				overflow:hidden;
			<?php } ?>
		}
		.adgallery-prettyphoto.<?php echo $prettyphoto_style; ?> .container-item {
			width:<?php echo $adgallery_custom_size_width; ?>px;
			height:<?php echo $adgallery_custom_size_height; ?>px;
		}
		.adgallery-prettyphoto.<?php echo $prettyphoto_style; ?> .item img.item-img, .item {
			width:<?php echo $adgallery_custom_size_width; ?>px;
			height:<?php echo $adgallery_custom_size_height; ?>px;
		}
		<?php if($prettyphoto_style == 'style3' || $prettyphoto_style == 'style1') { ?>
		.adgallery-prettyphoto.<?php echo $prettyphoto_style; ?> .item-content {
			background:<?php echo $rgba; ?>!important;
		}		
		<?php } else { ?>
		.adgallery-prettyphoto.<?php echo $prettyphoto_style; ?> .item:hover .item-overlay {
			background:<?php echo $rgba; ?>!important;
		}
		<?php } ?>		
		.adgallery-prettyphoto.<?php echo $prettyphoto_style; ?> .item-button.play{
			background-image: url("<?php echo adgallery_URL; ?>assets/img/prettyPhoto/<?php echo $prettyphoto_custom_icon; ?>.png");
		}		
		<?php
		if($prettyphoto_show_title == 'false') {
		?>
		.pp_description {
			display:none!important;
		}
		<?php	
		}
		?>
		<?php if($image_effect != 'normal') { ?>
		.adgallery .container-item .item:hover img {
			transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-ms-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-webkit-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>	
		}
		<?php } ?>
		.adgallery .container-item .item img, .adgallery .container-item .item .item-overlay, .adgallery .container-item .item:hover .item-content {
			border-radius:<?php echo $border_radius; ?>
		}
		</style>
		<script type="text/javascript">
		<?php if($prettyphoto_type == 'default' || $prettyphoto_type == 'grid') { ?>
		jQuery(function($){
			jQuery(document).ready(function($){
					$("a[data-rel^='prettyPhoto']").prettyPhoto({
					theme: '<?php echo $prettyphoto_theme; ?>',
					animation_speed: '<?php echo $prettyphoto_animation_speed; ?>',
					slideshow: <?php echo $prettyphoto_slideshow; ?>,
					autoplay_slideshow: <?php echo $prettyphoto_autoplay_slideshow;?>,
					<?php if($prettyphoto_show_social == 'false') { echo 'social_tools: false,'; } ?>
					opacity: <?php echo $prettyphoto_opacity; ?>				
					});
			}); 
		});
		<?php } ?>
		<?php if($prettyphoto_type == 'infinitescroll') { ?>
		jQuery(function($){
			$(document).ajaxComplete(function() {
					$("a[data-rel^='prettyPhoto']").prettyPhoto({
					theme: '<?php echo $prettyphoto_theme; ?>',
					animation_speed: '<?php echo $prettyphoto_animation_speed; ?>',
					slideshow: <?php echo $prettyphoto_slideshow; ?>,
					autoplay_slideshow: <?php echo $prettyphoto_autoplay_slideshow;?>,
					<?php if($prettyphoto_show_social == 'false') { echo 'social_tools: false,'; } ?>
					opacity: <?php echo $prettyphoto_opacity; ?>				
					});
			}); 
		});		
		jQuery(function($){			
			// INFINITE SCROLL   
				var infinite_scroll = {
						loading: {
							img: "<?php echo adgallery_URL; ?>assets/img/ajax-loader.gif",
							msgText: "<?php _e( 'Loading the next set of posts...', 'custom' ); ?>",
							finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
						},
						"nextSelector":"#nav-below .nav-previous a",
						"navSelector":"#nav-below",
						"itemSelector":".container-item",
						"contentSelector":".adgallery-prettyphoto"
				};
				jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
				// INFINITE SCROLL END					
		});
		<?php } ?>
		<?php if($prettyphoto_type == 'grid') { ?>
		jQuery(document).ready(function($){
		$(function(){
		$(".adgallery").vgrid({
			easing: "easeOutQuint",
			time: 500,
			delay: 20,
			fadeIn: {
				time: 300,
				delay: 50
			}
			});
		});
		});
		<?php } ?>
		</script>
	<?php	
	// INFINITE SCROLL 
	if($prettyphoto_type == 'infinitescroll') {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$paged_value = ",'paged' => ".$paged ;
	}	
	if($prettyphoto_type == 'infinitescroll') {
			$query .= '&paged='.$paged;
	}
	// INFINITE SCROLL END	
	echo '<div class="adgallery adgallery-prettyphoto '.$prettyphoto_style.'">';
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
			if($img_source == 'album') {
				$gallery_image = get_post_meta( get_the_id(), 'gallery-image', false );
            	foreach ( $gallery_image as $single_image_id ):
				$single_image = wp_get_attachment_image_src( $single_image_id, $custom_size );
				$single_image_large = wp_get_attachment_image_src( $single_image_id, 'post-cat' );
				?>
				<div class="container-item">        	
				<div class="item">				
				<img src="<?php echo $single_image[0]; ?>">
				<div class="item-overlay">
                    <?php if($prettyphoto_style == 'style1' || $prettyphoto_style == 'style2' || $prettyphoto_style == 'style6') { ?>
						<a href="<?php echo $single_image_large[0]; ?>" data-rel="prettyPhoto['<?php echo $id; ?>']" class="item-button play" title="<?php echo the_title(); ?>"></a>
					<?php } ?>
                    </div>
					<div class="item-content">
                        <?php if($prettyphoto_style == 'style3' || $prettyphoto_style == 'style4' || $prettyphoto_style == 'style5' || $prettyphoto_style == 'style5' ) { ?>
						<a href="<?php echo $single_image_large[0]; ?>" data-rel="prettyPhoto['<?php echo $id; ?>']" class="item-button play" title="<?php echo the_title(); ?>"></a>
						<?php } ?>					
						<div class="item-add-content">						
						</div>
					</div>
				</div>
			</div>				
				
				
				
				
		<?php	
			endforeach;
			} else {
		
		?>	
				<div class="container-item">        	
				<div class="item">
                	<?php if($featured_body == 'content') { ?>
					<img src="<?php echo get_first_image(); ?>" >
                    <?php
                    $url = get_first_image();
					 } else { ?>                    
						<?php if(has_post_thumbnail()){ ?>
                            <?php the_post_thumbnail( $custom_size ); ?>
                        <?php } else { ?>               
                            <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                        <?php } 
					
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
					} // Close Post Image Content
					?>  
					<div class="item-overlay">
                    <?php if($prettyphoto_style == 'style1' || $prettyphoto_style == 'style2' || $prettyphoto_style == 'style6') { ?>
						<a href="<?php echo $url; ?>" data-rel="prettyPhoto['<?php echo $id; ?>']" class="item-button play" title="<?php echo the_title(); ?>"></a>
					<?php } ?>
                    </div>
					<div class="item-content">
                        <?php if($prettyphoto_style == 'style3' || $prettyphoto_style == 'style4' || $prettyphoto_style == 'style5' || $prettyphoto_style == 'style5' ) { ?>
						<a href="<?php echo $url; ?>" data-rel="prettyPhoto['<?php echo $id; ?>']" class="item-button play" title="<?php echo the_title(); ?>"></a>
						<?php } ?>					
						<div class="item-add-content">						
						</div>
					</div>
				</div>
			</div>
	<?php
			}
	endwhile;
	if($prettyphoto_type == 'infinitescroll') { ?>
	<!-- INFINITE SCROLL -->
	<nav id="nav-below" style="clear:both">
    <ul>
        <li><?php previous_posts_link( '&laquo; PREV', $loop->max_num_pages) ?></li> 
        <li class="nav-previous"><?php next_posts_link( 'NEXT &raquo;', $loop->max_num_pages) ?></li>
    </ul>
	</nav>
	<!-- INFINITE SCROLL END -->
    <?php }
	echo '</div>';
	}
	
	} // CLOSE IF PRETTYPHOTO

	/***********************************************************************************************/
	/**************************************** PHOTOBOX ******************************************/
	/***********************************************************************************************/
	
	if($ad_gallery_type == 'photobox') {
		?>
		<style type="text/css">
		.adgallery {
			width:<?php if(empty($wrap)) { echo '100%'; } else { echo $wrap.'px'; } ?>;
			margin:
			<?php if($wrap_align=='center') { echo '0 auto'; } 
			elseif ($wrap_align=='left') { echo '0 auto 0 0'; } 
			elseif ($wrap_align=='right') { echo '0 0 0 auto'; } 
			?>;
		}
		.adgallery-photobox .container-item {
			margin:<?php echo $wrap_margin; ?>;
			<?php if($border_radius != '') { ?>
				border-radius:<?php echo $border_radius; ?>;
				overflow:hidden;
			<?php } ?>
		}
		.adgallery-photobox.<?php echo $photobox_style; ?> .container-item {
			width:<?php echo $adgallery_custom_size_width; ?>px;
			height:<?php echo $adgallery_custom_size_height; ?>px;
		}
		.adgallery-photobox.<?php echo $photobox_style; ?> .item img.item-img, .item {
			width:<?php echo $adgallery_custom_size_width; ?>px;
			height:<?php echo $adgallery_custom_size_height; ?>px;
		}
		<?php if($prettyphoto_style == 'style3' || $prettyphoto_style == 'style1') { ?>
		.adgallery-photobox.<?php echo $photobox_style; ?> .item-content {
			background:<?php echo $rgba_photobox; ?>!important;
		}		
		<?php } else { ?>
		.adgallery-photobox.<?php echo $photobox_style; ?> .item:hover .item-overlay {
			background:<?php echo $rgba_photobox; ?>!important;
		}
		<?php } ?>		
		.adgallery-photobox.<?php echo $photobox_style; ?> .item-button.play{
			background-image: url("<?php echo adgallery_URL; ?>assets/img/prettyPhoto/<?php echo $photobox_custom_icon; ?>.png");
		}
		<?php if($photobox_title == 'false') { ?>
		.pbCaptionText .title {
			display:none!important;
		}
		<?php } ?>
		<?php if($image_effect != 'normal') { ?>
		.adgallery .container-item .item:hover img {
			transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-ms-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-webkit-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
		}
		<?php } ?>
		.adgallery .container-item .item img, .adgallery .container-item .item .item-overlay, .adgallery .container-item .item:hover .item-content {
			border-radius:<?php echo $border_radius; ?>
		}
		</style>
		<script type="text/javascript">
		jQuery(function($){

			$('#gallery-<?php echo $id; ?>').photobox('a', { 
				thumbs:<?php echo $photobox_thumbs; ?>, 
				time:<?php echo $photobox_time; ?>,
				autoplay: <?php echo $photobox_autoplay; ?>,
				counter: <?php echo $photobox_counter; ?>				 
			});
			<?php if($photobox_type == 'infinitescroll') { ?>
			// INFINITE SCROLL   
				var infinite_scroll = {
						loading: {
							img: "<?php echo adgallery_URL; ?>assets/img/ajax-loader.gif",
							msgText: "<?php _e( 'Loading the next set of posts...', 'custom' ); ?>",
							finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
						},
						"nextSelector":"#nav-below .nav-previous a",
						"navSelector":"#nav-below",
						"itemSelector":".container-item",
						"contentSelector":".adgallery-photobox"
				};
				jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
				// INFINITE SCROLL END
				<?php } ?>
		});
		<?php if($photobox_type == 'grid') { ?>
		jQuery(document).ready(function($){
		$(function(){
		$(".adgallery").vgrid({
			easing: "easeOutQuint",
			time: 500,
			delay: 20,
			fadeIn: {
				time: 300,
				delay: 50
			}
			});
		});
		});
		<?php } ?>
		</script>
	<?php
	// INFINITE SCROLL 
	if($photobox_type == 'infinitescroll') {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$paged_value = ",'paged' => ".$paged ;
	}
	// INFINITE SCROLL END		
	echo '<div class="adgallery adgallery-photobox '.$photobox_style.'" id="gallery-'.$id.'">';	
		if($photobox_type == 'infinitescroll') {
			$query .= '&paged='.$paged;
		}
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
				if($img_source == 'album') {
				$gallery_image = get_post_meta( get_the_id(), 'gallery-image', false );
            	foreach ( $gallery_image as $single_image_id ):
				$single_image = wp_get_attachment_image_src( $single_image_id, $custom_size );
				$single_image_large = wp_get_attachment_image_src( $single_image_id, 'post-cat' );
				$thumbnail_details = get_posts(array('p' => $single_image_id, 'post_type' => 'attachment'));
		?>
				<div class="container-item">        	
				<div class="item">
       	 			<img src="<?php echo $single_image[0]; ?>">
        			<div class="item-overlay">
                    <?php if($photobox_style == 'style1' || $photobox_style == 'style2' || $photobox_style == 'style6') { ?>
						<a href="<?php echo $single_image_large[0]; ?>" class="item-button play" title="<?php echo $attachment_meta['caption']; ?>">
                            <div style="display:none">
								<img src="<?php echo $single_image[0]; ?>" alt="<?php echo $thumbnail_details[0]->post_excerpt; ?>">
                            </div>
                        </a>
					<?php } ?>
                    </div>
					<div class="item-content">
                        <?php if($photobox_style == 'style3' || $photobox_style == 'style4' || $photobox_style == 'style5' || $prettyphoto_style == 'style5' ) { ?>
						<a href="<?php echo $single_image_large[0]; ?>" class="item-button play" title="<?php echo the_title(); ?>">
                            <div style="display:none">
								<img src="<?php echo $single_image[0]; ?>" alt="<?php echo $thumbnail_details[0]->post_excerpt; ?>">
                            </div>
                        </a>
						<?php } ?>					
						<div class="item-add-content">						
						</div>
					</div>
				</div>
			</div>
                
		<?php
				endforeach;
				} else {
	?>	
				<div class="container-item">        	
				<div class="item">
                	<?php if($featured_body == 'content') { ?>
					<img src="<?php echo get_first_image(); ?>" >
                    <?php
                    $url = get_first_image();
					 } else { ?>                    
						<?php if(has_post_thumbnail()){ ?>
                            <?php the_post_thumbnail( $custom_size ); ?>
                        <?php } else { ?>               
                            <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                        <?php } 
					
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
					} // Close Post Image Content
					?> 
					<div class="item-overlay">
                    <?php if($photobox_style == 'style1' || $photobox_style == 'style2' || $photobox_style == 'style6') { ?>
						<a href="<?php echo $url; ?>" class="item-button play" title="<?php echo the_title(); ?>">
                            <div style="display:none">
								<?php if($featured_body == 'content') { ?>
                                <img src="<?php echo get_first_image(); ?>" >
                                <?php
                                $url = get_first_image();
                                 } else { ?>                    
                                    <?php if(has_post_thumbnail()){ ?>
                                        <?php the_post_thumbnail( $custom_size ); ?>
                                    <?php } else { ?>               
                                        <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                                    <?php } 
                                
                                $url = wp_get_attachment_url( get_post_thumbnail_id() );
                                } // Close Post Image Content
                                ?> 
                            </div>
                        </a>
					<?php } ?>
                    </div>
					<div class="item-content">
                        <?php if($photobox_style == 'style3' || $photobox_style == 'style4' || $photobox_style == 'style5' || $prettyphoto_style == 'style5' ) { ?>
						<a href="<?php echo $url; ?>" class="item-button play" title="<?php echo the_title(); ?>">
                            <div style="display:none">
								<?php if($featured_body == 'content') { ?>
                                <img src="<?php echo get_first_image(); ?>" >
                                <?php
                                $url = get_first_image();
                                 } else { ?>                    
                                    <?php if(has_post_thumbnail()){ ?>
                                        <?php the_post_thumbnail( $custom_size ); ?>
                                    <?php } else { ?>               
                                        <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                                    <?php } 
                                
                                $url = wp_get_attachment_url( get_post_thumbnail_id() );
                                } // Close Post Image Content
                                ?> 
                            </div>
                        </a>
						<?php } ?>					
						<div class="item-add-content">						
						</div>
					</div>
				</div>
			</div>
	<?php
				}
	endwhile;?>
    <?php if($photobox_type == 'infinitescroll') { ?>
	<!-- INFINITE SCROLL -->
	<nav id="nav-below">
    <ul>
        <li><?php previous_posts_link( '&laquo; PREV', $loop->max_num_pages) ?></li> 
        <li class="nav-previous"><?php next_posts_link( 'NEXT &raquo;', $loop->max_num_pages) ?></li>
    </ul>
	</nav>
	<!-- INFINITE SCROLL END -->
    <?php } ?>
	<?php
	echo '</div>';
	}
	
	} // CLOSE IF PHOTOBOX

	/***********************************************************************************************/
	/**************************************** Photowall ******************************************/
	/***********************************************************************************************/
	
	if($ad_gallery_type == 'photowall') { ?>
    <style type="text/css">
		.adgallery {
			width:<?php if(empty($wrap)) { echo '100%'; } else { echo $wrap.'px'; } ?>;
			margin:
			<?php if($wrap_align=='center') { echo '0 auto'; } 
			elseif ($wrap_align=='left') { echo '0 auto 0 0'; } 
			elseif ($wrap_align=='right') { echo '0 0 0 auto'; } 
			?>;
		}
		.adgallery-photowall #content img {
			margin:<?php echo $wrap_margin; ?>;
			<?php if($border_radius != '') { ?>
				border-radius:<?php echo $border_radius; ?>;
				overflow:hidden;
			<?php } ?>
		}
		<?php if($image_effect != 'normal') { ?>
		.adgallery #thumbsWrapper img:hover {
			transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-ms-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-webkit-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>	
		}
		<?php } ?>
		.adgallery #thumbsWrapper img {
			border-radius:<?php echo $border_radius; ?>
		}
	</style>	
    <div class="adgallery adgallery-photowall">
    	<?php if($ad_gallery_photowall_title == 'true') { ?>
        <div class="infobar" 
		<?php if($ad_gallery_photowall_title_visible_onload == 'false') { ?> 
        	style="display:none" 		
		<?php } ?>>
            <span id="description"></span>
            <span id="loading"><?php _e('Loading Image','adgallery'); ?></span>
        </div>
        <?php } ?>
        <div id="thumbsWrapper">
            <div id="content" class="content-loadmore">
    	<?php
		if($photowall_type == 'infinitescroll') {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$paged_value = ",'paged' => ".$paged ;
		}
		if($photowall_type == 'infinitescroll') {
			$query .= '&paged='.$paged;
		}
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
		
			if($img_source == 'album') {
			$gallery_image = get_post_meta( get_the_id(), 'gallery-image', false );
            foreach ( $gallery_image as $single_image_id ):
			$single_image = wp_get_attachment_image_src( $single_image_id, $custom_size );
			$single_image_large = wp_get_attachment_image_src( $single_image_id, 'post-cat' );
		?>
		<img src="<?php echo $single_image[0]; ?>" alt="<?php echo $single_image_large[0]; ?>" class="photowall-img">
		
		
		
		<?php
				endforeach;
				} else {
				
		
		
			if($featured_body == 'content') {
					$url = get_first_image();
				 	$url_thumbs[0] = $url;
					?>      
             <img src="<?php echo $url_thumbs[0]; ?>" alt="<?php echo $url; ?>" title="<?php echo the_title(); ?>" class="photowall-img"/>
			<?php } else {
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
					$url_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id(), $custom_size, false, '' );
			?> 
			<img src="<?php echo $url_thumbs[0]; ?>" alt="<?php echo $url; ?>" title="<?php echo the_title(); ?>" class="photowall-img"/>
			<?php }	?>    
	<?php
				}
		endwhile;

		}
	?>
    <?php if($photowall_type == 'infinitescroll') { ?>
	<!-- INFINITE SCROLL -->
	<nav id="nav-below">
    <ul>
        <li><?php previous_posts_link( '&laquo; PREV', $loop->max_num_pages) ?></li> 
        <li class="nav-previous"><?php next_posts_link( 'NEXT &raquo;', $loop->max_num_pages) ?></li>
    </ul>
	</nav>
	<!-- INFINITE SCROLL END -->
    <?php } ?>
	    </div>
        </div>
        
        <div id="panel">
            <div id="wrapper">
                <a id="prev"></a>
                <a id="next"></a>
            </div>
        </div>
        
	</div> <!-- // adgallery-photowall	-->
    <script type="text/javascript">
	<?php if($photowall_type == 'default') { ?>
	jQuery(function($){
		jQuery(document).ready(function($){
                var current = -1;
                var totalpictures = $('#content img').size();
                var speed 	= 500;

                $('#content').show();
                $(window).bind('resize', function() {
                    var $picture = $('#wrapper').find('img');
                    resize($picture);
                });

                $('#content > img').hover(function () {
                    var $this   = $(this);
                    $this.stop().animate({'opacity':'0.4'},200);
                },function () {
                    var $this   = $(this);
                    $this.stop().animate({'opacity':'1.0'},200);
                }).bind('click',function(){
                    var $this   = $(this);
                    
                    $('#loading').show();
                    
                    $('<img/>').load(function(){
                        $('#loading').hide();
                        
                        if($('#wrapper').find('img').length) return;
                        current 	= $this.index();
                        var $theImage   = $(this);
                        
                        resize($theImage);

                        $('#wrapper').append($theImage);
                        $theImage.fadeIn(800);
                        
                        $('#panel').animate({'height':'100%'},speed,function(){
                            var title = $this.attr('title');
                            if(title != '') 
                                $('#description').html(title).show();
                            else 
                                $('#description').empty().hide();
                            if(current==0)
                                $('#prev').hide();
                            else
                                $('#prev').fadeIn();
                            if(current==parseInt(totalpictures-1))
                                $('#next').hide();
                            else
                                $('#next').fadeIn();
                            $('#thumbsWrapper').css({'z-index':'0','height':'0px'});
                        });
                    }).attr('src', $this.attr('alt'));
                });

                $('#wrapper > img').live('click',function(){
                    $this = $(this);
                    $('#description').empty().hide();
                    
                    $('#thumbsWrapper').css('z-index','10')
                    .stop()
                    .animate({'height':'100%'},speed,function(){
                        var $theWrapper = $(this);
                        $('#panel').css('height','0px');
                        $theWrapper.css('z-index','0');
                        $this.remove();
                        $('#prev').hide();
                        $('#next').hide();
                    });
                });
                $('#next').bind('click',function(){
                    var $this           = $(this);
                    var $nextimage 		= $('#content img:nth-child('+parseInt(current+2)+')');
                    navigate($nextimage,'right');
                });
                $('#prev').bind('click',function(){
                    var $this           = $(this);
                    var $previmage 		= $('#content img:nth-child('+parseInt(current)+')');
                    navigate($previmage,'left');
                });
                function navigate($nextimage,dir){
                    if(dir=='left' && current==0)
                        return;
                    if(dir=='right' && current==parseInt(totalpictures-1))
                        return;
                    $('#loading').show();
                    $('<img/>').load(function(){
                        var $theImage = $(this);
                        $('#loading').hide();
                        $('#description').empty().fadeOut();
                         
                        $('#wrapper img').stop().fadeOut(500,function(){
                            var $this = $(this);
							
                            $this.remove();
                            resize($theImage);
                            
                            $('#wrapper').append($theImage.show());
                            $theImage.stop().fadeIn(800);

                            var title = $nextimage.attr('title');
                            if(title != ''){
                                $('#description').html(title).show();
                            }
                            else
                                $('#description').empty().hide();

                            if(current==0)
                                $('#prev').hide();
                            else
                                $('#prev').show();
                            if(current==parseInt(totalpictures-1))
                                $('#next').hide();
                            else
                                $('#next').show();
                        });
                        if(dir=='right')
                            ++current;
                        else if(dir=='left')
                            --current;
                    }).attr('src', $nextimage.attr('alt'));
                }
                function resize($image){
                    var windowH      = $(window).height()-100;
                    var windowW      = $(window).width()-80;
                    var theImage     = new Image();
                    theImage.src     = $image.attr("src");
                    var imgwidth     = theImage.width;
                    var imgheight    = theImage.height;

                    if((imgwidth > windowW)||(imgheight > windowH)){
                        if(imgwidth > imgheight){
                            var newwidth = windowW;
                            var ratio = imgwidth / windowW;
                            var newheight = imgheight / ratio;
                            theImage.height = newheight;
                            theImage.width= newwidth;
                            if(newheight>windowH){
                                var newnewheight = windowH;
                                var newratio = newheight/windowH;
                                var newnewwidth =newwidth/newratio;
                                theImage.width = newnewwidth;
                                theImage.height= newnewheight;
                            }
                        }
                        else{
                            var newheight = windowH;
                            var ratio = imgheight / windowH;
                            var newwidth = imgwidth / ratio;
                            theImage.height = newheight;
                            theImage.width= newwidth;
                            if(newwidth>windowW){
                                var newnewwidth = windowW;
                                var newratio = newwidth/windowW;
                                var newnewheight =newheight/newratio;
                                theImage.height = newnewheight;
                                theImage.width= newnewwidth;
                            }
                        }
                    }
                    $image.css({'width':theImage.width+'px','height':theImage.height+'px'});
                }
				
				<?php if($ad_gallery_photowall_title_visible_onload == 'false') { ?> 
				$('.adgallery-photowall #content img').live('click',function(){
					$('.adgallery-photowall .infobar').css('display','block');
				});
				$('.adgallery-photowall #panel img').live('click',function(){
					$('.adgallery-photowall .infobar').css('display','none');
				});
				<?php } ?>
		});	
	});
	<?php } ?>
	<?php if($photowall_type == 'infinitescroll') { ?>		
	jQuery(function($){
		$(document).ajaxComplete(function() {
                var current = -1;
                var totalpictures = $('#content img').size();
                var speed 	= 500;

                $('#content').show();
                $(window).bind('resize', function() {
                    var $picture = $('#wrapper').find('img');
                    resize($picture);
                });

                $('#content > img').hover(function () {
                    var $this   = $(this);
                    $this.stop().animate({'opacity':'0.4'},200);
                },function () {
                    var $this   = $(this);
                    $this.stop().animate({'opacity':'1.0'},200);
                }).bind('click',function(){
                    var $this   = $(this);
                    
                    $('#loading').show();
                    
                    $('<img/>').load(function(){
                        $('#loading').hide();
                        
                        if($('#wrapper').find('img').length) return;
                        current 	= $this.index();
                        var $theImage   = $(this);
                        
                        resize($theImage);

                        $('#wrapper').append($theImage);
                        $theImage.fadeIn(800);
                        
                        $('#panel').animate({'height':'100%'},speed,function(){
                            var title = $this.attr('title');
                            if(title != '') 
                                $('#description').html(title).show();
                            else 
                                $('#description').empty().hide();
                            if(current==0)
                                $('#prev').hide();
                            else
                                $('#prev').fadeIn();
                            if(current==parseInt(totalpictures-1))
                                $('#next').hide();
                            else
                                $('#next').fadeIn();
                            $('#thumbsWrapper').css({'z-index':'0','height':'0px'});
                        });
                    }).attr('src', $this.attr('alt'));
                });

                $('#wrapper > img').live('click',function(){
                    $this = $(this);
                    $('#description').empty().hide();
                    
                    $('#thumbsWrapper').css('z-index','10')
                    .stop()
                    .animate({'height':'100%'},speed,function(){
                        var $theWrapper = $(this);
                        $('#panel').css('height','0px');
                        $theWrapper.css('z-index','0');
                        $this.remove();
                        $('#prev').hide();
                        $('#next').hide();
                    });
                });
                $('#next').bind('click',function(){
                    var $this           = $(this);
                    var $nextimage 		= $('#content img:nth-child('+parseInt(current+2)+')');
                    navigate($nextimage,'right');
                });
                $('#prev').bind('click',function(){
                    var $this           = $(this);
                    var $previmage 		= $('#content img:nth-child('+parseInt(current)+')');
                    navigate($previmage,'left');
                });
                function navigate($nextimage,dir){
                    if(dir=='left' && current==0)
                        return;
                    if(dir=='right' && current==parseInt(totalpictures-1))
                        return;
                    $('#loading').show();
                    $('<img/>').load(function(){
                        var $theImage = $(this);
                        $('#loading').hide();
                        $('#description').empty().fadeOut();
                         
                        $('#wrapper img').stop().fadeOut(500,function(){
                            var $this = $(this);
							
                            $this.remove();
                            resize($theImage);
                            
                            $('#wrapper').append($theImage.show());
                            $theImage.stop().fadeIn(800);

                            var title = $nextimage.attr('title');
                            if(title != ''){
                                $('#description').html(title).show();
                            }
                            else
                                $('#description').empty().hide();

                            if(current==0)
                                $('#prev').hide();
                            else
                                $('#prev').show();
                            if(current==parseInt(totalpictures-1))
                                $('#next').hide();
                            else
                                $('#next').show();
                        });
                        if(dir=='right')
                            ++current;
                        else if(dir=='left')
                            --current;
                    }).attr('src', $nextimage.attr('alt'));
                }
                function resize($image){
                    var windowH      = $(window).height()-100;
                    var windowW      = $(window).width()-80;
                    var theImage     = new Image();
                    theImage.src     = $image.attr("src");
                    var imgwidth     = theImage.width;
                    var imgheight    = theImage.height;

                    if((imgwidth > windowW)||(imgheight > windowH)){
                        if(imgwidth > imgheight){
                            var newwidth = windowW;
                            var ratio = imgwidth / windowW;
                            var newheight = imgheight / ratio;
                            theImage.height = newheight;
                            theImage.width= newwidth;
                            if(newheight>windowH){
                                var newnewheight = windowH;
                                var newratio = newheight/windowH;
                                var newnewwidth =newwidth/newratio;
                                theImage.width = newnewwidth;
                                theImage.height= newnewheight;
                            }
                        }
                        else{
                            var newheight = windowH;
                            var ratio = imgheight / windowH;
                            var newwidth = imgwidth / ratio;
                            theImage.height = newheight;
                            theImage.width= newwidth;
                            if(newwidth>windowW){
                                var newnewwidth = windowW;
                                var newratio = newwidth/windowW;
                                var newnewheight =newheight/newratio;
                                theImage.height = newnewheight;
                                theImage.width= newnewwidth;
                            }
                        }
                    }
                    $image.css({'width':theImage.width+'px','height':theImage.height+'px'});
                }
				
				<?php if($ad_gallery_photowall_title_visible_onload == 'false') { ?> 
				$('.adgallery-photowall #content img').live('click',function(){
					$('.adgallery-photowall .infobar').css('display','block');
				});
				$('.adgallery-photowall #panel img').live('click',function(){
					$('.adgallery-photowall .infobar').css('display','none');
				});
				<?php } ?>
	});			
	jQuery(function($){		
				// INFINITE SCROLL   
				var infinite_scroll = {
						loading: {
							img: "<?php echo adgallery_URL; ?>assets/img/ajax-loader.gif",
							msgText: "<?php _e( 'Loading the next set of posts...', 'custom' ); ?>",
							finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
						},
						"nextSelector":"#nav-below .nav-previous a",
						"navSelector":"#nav-below",
						"itemSelector":".photowall-img",
						"contentSelector":".content-loadmore"
				};
				jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
				// INFINITE SCROLL END
            });
	});	
	<?php } ?>
    </script>    
    <?php	
	}
	/***********************************************************************************************/
	/**************************************** FILTER ***********************************************/
	/***********************************************************************************************/
	
	if($ad_gallery_type == 'filter') {
		?>
        <style>
		.adgallery {
			width:<?php if(empty($wrap)) { echo '100%'; } else { echo $wrap.'px'; } ?>;
			margin:
			<?php if($wrap_align=='center') { echo '0 auto'; } 
			elseif ($wrap_align=='left') { echo '0 auto 0 0'; } 
			elseif ($wrap_align=='right') { echo '0 0 0 auto'; } 
			?>;
		}
		#adgallery-filter .controls li {
			background:<?php echo $rgba_filter; ?>!important;
		}
		#adgallery-filter .controls li:hover {
			background:<?php echo $ad_gallery_filter_custom_color; ?>!important;
		}
		#adgallery-filter #Grid .mix {
			margin:<?php echo $wrap_margin; ?>;
			<?php if($border_radius != '') { ?>
				border-radius:<?php echo $border_radius; ?>;
				overflow:hidden;
			<?php } ?>
		}
		#adgallery-filter .text {
			width:100%;
			height:100%;
			position:relative;
			background:<?php echo $rgba_filter; ?>!important;
		}
		#adgallery-filter .gridClass li {
			width:<?php echo $adgallery_custom_size_width; ?>px;
			height:<?php echo $adgallery_custom_size_height; ?>px;
		}
		#adgallery-filter .listClass li {
			width:100%;
			height:<?php echo $adgallery_custom_size_height; ?>px;
		}
		#adgallery-filter.<?php echo $ad_gallery_filter_style; ?> .mix:hover .item-overlay {
			background:<?php echo $rgba_filter; ?>!important;
		}	
		#adgallery-filter.<?php echo $ad_gallery_filter_style; ?> .item-button.play{
			background-image: url("<?php echo adgallery_URL; ?>assets/img/prettyPhoto/<?php echo $ad_gallery_filter_custom_icon; ?>.png");
		}		
		<?php
		if($ad_gallery_filter_prettyphoto_show_title == 'false') {
		?>
		#adgallery-filter .pp_description {
			display:none!important;
		}
		<?php	
		}
		?>
		<?php if($image_effect != 'normal') { ?>
		#adgallery-filter .item-overlay:hover img {
			transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-ms-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>
			-webkit-transform:
				<?php if($image_effect == 'translate') { echo 'translate('.$image_effect_translate.');'; } ?>
				<?php if($image_effect == 'rotate') { echo 'rotate('.$image_effect_rotate.'deg);'; } ?>
				<?php if($image_effect == 'scale') { echo 'scale('.$image_effect_scale.');'; } ?>	
		}
		<?php } ?>
		#adgallery-filter .item-overlay img, #adgallery-filter #Grid .mix {
			border-radius:<?php echo $border_radius; ?>
		}
        </style>
        <script>
  jQuery(function($){
    $(document).ready(function(){
    $('#Grid').mixitup({
    targetSelector: '.mix',
    filterSelector: '.filter',
    sortSelector: '.sort',
    buttonEvent: '<?php echo $ad_gallery_filter_buttonEvent; ?>',
    effects: ['fade',
	<?php
	if($ad_gallery_filter_effects_scale == 'true') { echo '\'scale\','; } 
	if($ad_gallery_filter_effects_rotateX == 'true') { echo '\'rotateX\','; } 
	if($ad_gallery_filter_effects_rotateY == 'true') { echo '\'rotateY\','; } 
	if($ad_gallery_filter_effects_rotateZ == 'true') { echo '\'rotateZ\','; } 
	if($ad_gallery_filter_effects_blur == 'true') { echo '\'blur\','; } 
	if($ad_gallery_filter_effects_grayscale == 'true') { echo '\'grayscale\','; }
	?>],
    listEffects: null,
    easing: '<?php echo $ad_gallery_filter_easing; ?>',
    layoutMode: 'grid',
    targetDisplayGrid: 'inline-block',
    targetDisplayList: 'block',
    gridClass: 'gridClass',
    listClass: 'listClass',
    transitionSpeed: <?php if(!empty($ad_gallery_filter_transitionSpeed)) { echo $ad_gallery_filter_transitionSpeed; } else { echo '300'; } ?>,
    showOnLoad: 'all',
    sortOnLoad: false,
    multiFilter: false,
    filterLogic: 'or',
    resizeContainer: true,
    minHeight: 0,
    failClass: 'fail',
    perspectiveDistance: '3000',
    perspectiveOrigin: '50% 50%',
    animateGridList: true,
    onMixLoad: null,
    onMixStart: null,
    onMixEnd: null
});	
<?php // IF PREVIEW
					if($ad_gallery_filter_action == 'preview') { ?>        	
$('.item-overlay').click(function(e) {
   $('.text').hide();
   $(this).parent().find('.item-button.play').css('display','none');
   $(this).parent().find('.text').animate({
		height: "toggle",
		opacity: "toggle"
		}, "slow" );	
	});	
$('.close-text').click(function(e) {
	$('.text').hide("slow");
	$('.item-button.play').css('display','block');
});
<?php } else { ?>
	<?php if($ad_gallery_filter_action_lightbox == 'prettyphoto') { ?>	
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
				theme: '<?php echo $ad_gallery_filter_prettyphoto_theme; ?>',
				animation_speed: '<?php echo $ad_gallery_filter_prettyphoto_animation_speed; ?>',
				slideshow: <?php echo $ad_gallery_filter_prettyphoto_slideshow; ?>,
				autoplay_slideshow: <?php echo $ad_gallery_filter_prettyphoto_autoplay_slideshow; ?>,
				<?php if($ad_gallery_filter_prettyphoto_show_social == 'false') { echo 'social_tools: false,'; } ?>
				opacity: <?php echo $ad_gallery_filter_prettyphoto_opacity; ?>				
		});
	<?php } ?>
	<?php if($ad_gallery_filter_action_lightbox == 'photobox') { ?>
			$('#adgallery-filter').photobox('a', { 
				thumbs:<?php echo $ad_gallery_filter_photobox_thumbs; ?>, 
				time:<?php echo $ad_gallery_filter_photobox_time; ?>,
				autoplay: <?php echo $ad_gallery_filter_photobox_autoplay; ?>,
				counter: <?php echo $ad_gallery_filter_photobox_counter; ?>				 
			});
	<?php } 
}
	?>		
});
});
</script>
<div id="adgallery-filter" class="<?php echo $ad_gallery_filter_style; ?> adgallery">
		<div class="controls">
				<ul>
					<li data-filter="all" class="filter active"><?php _e('Show All','adgallery'); ?></li>
                    <?php
					if($img_source == 'post') { // POST
						
						if ($cat[0] == 'all') {
							$categories = get_categories();
							foreach ( $categories as $category ) {
							echo '<li data-filter="' . $category->slug . '" class="filter">' . $category->name . '</li>';
							}
							$category = '';
						} else {
							$category_single = explode( ',', $category );
							$num_cat_array = count($category_single);
							$num_cat_count=1;
							foreach ( $category_single as $category_name ) {
							if($num_cat_array == $num_cat_count) { break; }
							$term = get_term_by('name', $category_name, 'category');
							echo '<li data-filter="' . $term->slug . '" class="filter">' . $category_name . '</li>';
							$num_cat_count++;
							}		
						}
					} // CLOSE POST
					if($img_source == 'post_cat') { // POST CAT ADGALLERY
						
						if ($adgallery_post_cat[0] == 'all') {
							$categories = get_categories('taxonomy=adgallery_post_cat');
							foreach ( $categories as $category ) {
							echo '<li data-filter="' . $category->slug . '" class="filter">' . $category->name . '</li>';
							}
							$category = '';
						} else {
							$category_single = explode( ',', $adgallery_post_cat_category );
							$num_cat_array = count($category_single);
							$num_cat_count=1;
							foreach ( $category_single as $category_name ) {
							if($num_cat_array == $num_cat_count) { break; }
							$term = get_term_by('name', $category_name , 'adgallery_post_cat');
							echo '<li data-filter="' . $term->slug . '" class="filter">' . $category_name . '</li>';
							$num_cat_count++;
							}		
						}
					} // CLOSE POST CAT ADGALLERY
					if($img_source == 'woocommerce') { // POST WOOCOMMERCE
						
						if ($woocommerce_cat[0] == 'all') {
							$categories = get_categories('taxonomy=product_cat');
							foreach ( $categories as $category ) {
							echo '<li data-filter="' . $category->slug . '" class="filter">' . $category->name . '</li>';
							}
							$category = '';
						} else {
							$category_single = explode( ',', $woocommerce_cat_category );
							$num_cat_array = count($category_single);
							$num_cat_count=1;
							foreach ( $category_single as $category_name ) {
							if($num_cat_array == $num_cat_count) { break; }
							$term = get_term_by('name', $category_name , 'product_cat');
							echo '<li data-filter="' . $term->slug . '" class="filter">' . $category_name . '</li>';
							$num_cat_count++;
							}		
						}
					} // CLOSE POST WOOCOMMERCE
					if($img_source == 'wp-ecommerce') { // POST WP ECOMMERCE
						
						if ($wp_ecommerce_cat[0] == 'all') {
							$categories = get_categories('taxonomy=wpsc_product_category');
							foreach ( $categories as $category ) {
							echo '<li data-filter="' . $category->slug . '" class="filter">' . $category->name . '</li>';
							}
							$category = '';
						} else {
							$category_single = explode( ',', $wp_ecommerce_category );
							$num_cat_array = count($category_single);
							$num_cat_count=1;
							foreach ( $category_single as $category_name ) {
							if($num_cat_array == $num_cat_count) { break; }
							$term = get_term_by('name', $category_name , 'wpsc_product_category');
							echo '<li data-filter="' . $term->slug . '" class="filter">' . $category_name . '</li>';
							$num_cat_count++;
							}		
						}
					} // CLOSE POST WP ECOMMERCE
					if($img_source == 'jigoshop') { // POST JOGOSHOP
						
						if ($jigoshop_cat[0] == 'all') {
							$categories = get_categories('taxonomy=product_cat');
							foreach ( $categories as $category ) {
							echo '<li data-filter="' . $category->slug . '" class="filter">' . $category->name . '</li>';
							}
							$category = '';
						} else {
							$category_single = explode( ',', $jigoshop_category );
							$num_cat_array = count($category_single);
							$num_cat_count=1;
							foreach ( $category_single as $category_name ) {
							if($num_cat_array == $num_cat_count) { break; }
							$term = get_term_by('name', $category_name , 'product_cat');
							echo '<li data-filter="' . $term->slug . '" class="filter">' . $category_name . '</li>';
							$num_cat_count++;
							}		
						}
					} // CLOSE POST JOGOSHOP
    				?>
				</ul>
                <?php if($ad_gallery_filter_show_sort == 'true') { ?>                
				<ul class="adgallery-order">
					<li data-order="desc" data-sort="data-cat" class="sort"><?php echo __('Descending','adgallery'); ?></li>
					<li data-order="asc" data-sort="data-cat" class="sort"><?php echo __('Ascending','adgallery'); ?></li>
					<li data-order="desc" data-sort="default" class="sort active"><?php echo __('Default','adgallery'); ?></li>
				</ul>
                <?php } ?>                           
			</div>
            <ul id="Grid">
            <?php
					$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		?>
        
        <?php 
		
		if($img_source == 'post') { // POST
        ?>
            
			<li data-cat="<?php $category = get_the_category(); echo $category[0]->slug; ?>" class="mix <?php $category = get_the_category(); echo $category[0]->slug; ?>" style=" display: inline-block; opacity: 1;">
        
		
        <?php }
		if($img_source == 'post_cat') { // POST CAT ADGALLERY
					$cat_array = wp_get_post_terms( get_the_ID(), 'adgallery_post_cat');
					$cat_list = '';
					$cat_list2 = array();
					foreach ( $cat_array as $category ) {
						$cat_list .= $category->slug.' ';
						$cat_list2[] = $category->name;
					}	
					
		?>
        
        
        
        	<li data-cat="<?php $category = get_the_category('taxonomy=adgallery_post_cat'); echo $cat_list; ?>" class="mix <?php $category = get_the_category('taxonomy=adgallery_post_cat'); echo $cat_list; ?>" style=" display: inline-block; opacity: 1;">
		<?php		
		}
		if($img_source == 'woocommerce') { // POST WOOCOMMERCE
					$cat_array = wp_get_post_terms( get_the_ID(), 'product_cat');
					$cat_list = '';
					$cat_list2 = array();
					foreach ( $cat_array as $category ) {
						$cat_list .= $category->slug.' ';
						$cat_list2[] = $category->name;
					}	
					
		?>
        
        
        
        	<li data-cat="<?php $category = get_the_category('taxonomy=product_cat'); echo $cat_list; ?>" class="mix <?php $category = get_the_category('taxonomy=product_cat'); echo $cat_list; ?>" style=" display: inline-block; opacity: 1;">
		<?php		
		}
		if($img_source == 'wp-ecommerce') { // POST WP ECOMMERCE
					$cat_array = wp_get_post_terms( get_the_ID(), 'wpsc_product_category');
					$cat_list = '';
					$cat_list2 = array();
					foreach ( $cat_array as $category ) {
						$cat_list .= $category->slug.' ';
						$cat_list2[] = $category->name;
					}	
					
		?>
        
        
        
        	<li data-cat="<?php $category = get_the_category('taxonomy=wpsc_product_category'); echo $cat_list; ?>" class="mix <?php $category = get_the_category('taxonomy=wpsc_product_category'); echo $cat_list; ?>" style=" display: inline-block; opacity: 1;">
		<?php		
		}
		if($img_source == 'jigoshop') { // POST WP ECOMMERCE
					$cat_array = wp_get_post_terms( get_the_ID(), 'product_cat');
					$cat_list = '';
					$cat_list2 = array();
					foreach ( $cat_array as $category ) {
						$cat_list .= $category->slug.' ';
						$cat_list2[] = $category->name;
					}	
					
		?>
        
        
        
        	<li data-cat="<?php $category = get_the_category('taxonomy=product_cat'); echo $cat_list; ?>" class="mix <?php $category = get_the_category('taxonomy=product_cat'); echo $cat_list; ?>" style=" display: inline-block; opacity: 1;">
		<?php		
		}
		?>
		<?php
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
					?>  
					<div class="item-overlay">
							<?php if($featured_body == 'content') { ?>
                            <img src="<?php echo get_first_image(); ?>" >
                            <?php
                            $url = get_first_image();
                             } else { ?>                    
                                <?php if(has_post_thumbnail()){ ?>
                                    <?php the_post_thumbnail( $custom_size ); ?>
                                <?php } else { ?>               
                                    <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                                <?php } 
                            
                            $url = wp_get_attachment_url( get_post_thumbnail_id() );
                            } // Close Post Image Content
                            ?>                   
                    	<div class="item-overlay">                        
                            <a href="<?php if($ad_gallery_filter_action == 'preview') { echo 'javascript:void(0)'; } else { echo $url; } ?>"                        
                            <?php if($ad_gallery_filter_action_lightbox == 'prettyphoto') { ?>
                                data-rel="prettyPhoto['<?php echo $id; ?>']" 
                            <?php } ?>
                            class="item-button play" title="<?php echo the_title(); ?>">
                            <?php if($ad_gallery_filter_action_lightbox == 'photobox') { ?>
                                <div style="display:none">
									<?php if($featured_body == 'content') { ?>
                                    <img src="<?php echo get_first_image(); ?>" >
                                    <?php
                                    $url = get_first_image();
                                     } else { ?>                    
                                        <?php if(has_post_thumbnail()){ ?>
                                            <?php the_post_thumbnail( $custom_size ); ?>
                                        <?php } else { ?>               
                                            <img src="<?php echo adgallery_URL; ?>/assets/img/no-img.png" alt="no img" >               
                                        <?php } 
                                    
                                    $url = wp_get_attachment_url( get_post_thumbnail_id() );
                                    } // Close Post Image Content
                                    ?> 
                                </div>                            
                            <?php } ?>
                            </a>
                        </div>
                        <div class="item-content">                        					
							<div class="item-add-content"></div>
						</div>
                    </div>
        			<?php // IF PREVIEW
					if($ad_gallery_filter_action == 'preview') { ?>            
                    <div class="text" style="display:none;">
                    <div class="close-text">x</div>
                    <p class="content-text"><?php echo substr(get_the_excerpt(), 0, $ad_gallery_filter_preview_excerpt); ?></p>
                    <a class="more-info" href="<?php echo the_permalink();?>"><?php _e('more info','adgallery'); ?></a>
                    </div> 
					<?php } // ENDINF LIGHTBOX ?>
        </li>
               
         <?php
		 endwhile;
		}
		?>
			</ul>
            </div>
		<?php
	}
	echo '<div class="adgallery-clear"></div>';
}
function adgallery ( $attr ) {
		ob_start();
		$id = $attr['id'];
        $return = adgallery_function($id);  
		//ob_end_clean();
		$return = ob_get_clean();
		return $return;
    }  
add_shortcode("adgallery", "adgallery");
?>