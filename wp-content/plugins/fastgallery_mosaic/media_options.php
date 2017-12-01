<?php
/*
File: inc/assets.php
Description: MEDIA OPTIONS
Plugin: FAST GALLERY MOSAIC
Author: Ad-theme.com
*/


add_action('print_media_templates','fastgallery_mosaic'); 


function fastgallery_mosaic(){

  ?>
  <script type="text/html" id="tmpl-fast_gallery_type">
  	<h3 style="padding:20px 0 5px 0;color:#0073aa;font-size:16px;text-align:center;display:inline-block;"><?php _e('FAST GALLERY MOSAIC SETTINGS','fastgallery_mosaic'); ?></h3>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Type Gallery','fastgallery_mosaic'); ?></span><br>
      <select data-setting="fg_type">
        <option value="prettyphoto"><?php _e('Prettyphoto','fastgallery_mosaic'); ?></option>
        <option value="photobox"><?php _e('Photobox','fastgallery_mosaic'); ?></option>        
        <option value="magnific-popup"><?php _e('Magnific Popup','fastgallery_mosaic'); ?></option>
		<option value="lightgallery"><?php _e('Light Gallery','fastgallery_mosaic'); ?></option>
		<option value="custom_url"><?php _e('Custom Url','fastgallery_mosaic'); ?></option>        
      </select>
    </label>    
	<label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Layout','fastgallery_mosaic'); ?></span>
      <select data-setting="fgm_layout">
        <option value="fg_layout1"><?php _e('Layout 1','fastgallery_mosaic'); ?></option>
        <option value="fg_layout2"><?php _e('Layout 2','fastgallery_mosaic'); ?></option>        
        <option value="fg_layout3"><?php _e('Layout 3','fastgallery_mosaic'); ?></option>
        <option value="fg_layout4"><?php _e('Layout 4','fastgallery_mosaic'); ?></option>
        <option value="fg_layout5"><?php _e('Layout 5','fastgallery_mosaic'); ?></option>							
      </select>
    </label>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Style','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_style">
        <option value="fg_style1"><?php _e('Style 1','fastgallery_mosaic'); ?></option>
        <option value="fg_style2"><?php _e('Style 2','fastgallery_mosaic'); ?></option>        
        <option value="fg_style3"><?php _e('Style 3','fastgallery_mosaic'); ?></option>
        <option value="fg_style4"><?php _e('Style 4','fastgallery_mosaic'); ?></option>
        <option value="fg_style5"><?php _e('Style 5','fastgallery_mosaic'); ?></option>
        <option value="fg_style6"><?php _e('Style 6','fastgallery_mosaic'); ?></option>
        <option value="fg_style7"><?php _e('Style 7','fastgallery_mosaic'); ?></option>
        <option value="fg_style8"><?php _e('Style 8','fastgallery_mosaic'); ?></option>
        <option value="fg_style9"><?php _e('Style 9','fastgallery_mosaic'); ?></option>
        <option value="fg_style10"><?php _e('Style 10','fastgallery_mosaic'); ?></option>								
      </select>
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Standard Image Height','fastgallery_mosaic'); ?></span><br>
      <select data-setting="fgm_height">
	    <option value="100"><?php _e('Very small (100px)','fastgallery_mosaic'); ?></option>  
        <option value="150"><?php _e('Small (150px)','fastgallery_mosaic'); ?></option>   
	    <option value="200"><?php _e('Medium (200px)','fastgallery_mosaic'); ?></option>
	    <option value="300"><?php _e('Big (300px)','fastgallery_mosaic'); ?></option>  
        <option value="500"><?php _e('Very Big (500px)','fastgallery_mosaic'); ?></option> 		           
      </select>
    </label>
	<label class="fg-field">
		<span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Custom Image Height (i.e 150 - Leave empty if you want use Image Height Standard)','fastgallery_mosaic'); ?></span>	
		<input data-setting="fgm_custom_height" type="text" id="fgm_custom_height" > 
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Sometimes there is just one image on the last row and it gets blown up to a huge size to fit the parent div width. To stop this behaviour, set this to ON','fastgallery_mosaic'); ?></span>
      <select data-setting="fgm_allow" id="fgm_allow">
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>							
      </select>
    </label>	

    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Responsive / Mosaic','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_responsive">
        <option value="fg_responsive"><?php _e('Responsive','fastgallery_mosaic'); ?></option>
        <option value="fg_mosaic"><?php _e('Mosaic','fastgallery_mosaic'); ?></option>        
      </select>
    </label>

    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Over Image','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_over_image">
        <option value="fg_over_image_on"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="fg_over_image_off"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>		
	<h3 style="color:#0073aa;font-size:16px"><?php _e('Custom Style','fastgallery_mosaic'); ?></h3>
	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Image Lightbox Size','fastgallery_mosaic'); ?></span>
      <select data-setting="fgm_image_lightbox_size">
        <option value="fgm_default"><?php _e('Default: 1000px x 800px cropped','fastgallery_mosaic'); ?></option>
        <option value="thumbnail"><?php _e('Thumbnail','fastgallery_mosaic'); ?></option>
        <option value="medium"><?php _e('Medium','fastgallery_mosaic'); ?></option>							
        <option value="large"><?php _e('Large','fastgallery_mosaic'); ?></option>							
        <option value="full"><?php _e('Full','fastgallery_mosaic'); ?></option>									
      </select>
    </label>	
	<label class="fg-field">
		<span style="padding:20px 0 0px 0;display:inline-block;font-weight:bold">
		<?php _e('Pixel of Padding Between Image (ex 20)','fastgallery_mosaic'); ?>
		</span>
		<span style="padding:0px 0 5px 0;display:inline-block;font-weight:bold">
		<?php _e('Default value 0 (0px) so if you don\' want a padding leave empty','fastgallery_mosaic'); ?>
		</span>	
		<input data-setting="fgm_padding" type="text" id="fgm_padding" > 
    </label>
	<label class="fg-field">
		<span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Main Color (ex #EEEEEE)','fastgallery_mosaic'); ?></span>	
		<input data-setting="fg_main_color" type="text" id="fg_main_color" > 
    </label>
	<label class="fg-field">
		<span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold" ><?php _e('Main Color Opacity (0.1 to 1)','fastgallery_mosaic'); ?></span>	
		<input data-setting="fg_main_color_opacity" type="text" id="fg_main_color_opacity" > 
    </label>
	<label class="fg-field">
		<span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Secondary Color (ex #EEEEEE)','fastgallery_mosaic'); ?></span>	
		<input data-setting="fg_secondary_color" type="text" id="fg_secondary_color" > 
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Image Lightbox','fastgallery_mosaic'); ?></span><br>
      <select data-setting="fgm_image_lightbox">
	    <option value="plus"><?php _e('Plus','fastgallery_mosaic'); ?></option>  
		<option value="zoomin"><?php _e('Zoom In','fastgallery_mosaic'); ?></option>
        <option value="image"><?php _e('Image','fastgallery_mosaic'); ?></option>   
	    <option value="images"><?php _e('Images','fastgallery_mosaic'); ?></option>  
        <option value="spinner"><?php _e('Spinner','fastgallery_mosaic'); ?></option>
		<option value="search"><?php _e('Search','fastgallery_mosaic'); ?></option>		           
      </select>
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Image Lightbox Width','fastgallery_mosaic'); ?></span><br>
      <select data-setting="fgm_image_width">
	    <option value="small"><?php _e('Small (Default)','fastgallery_mosaic'); ?></option>  
		<option value="medium"><?php _e('Medium','fastgallery_mosaic'); ?></option>
        <option value="large"><?php _e('Large','fastgallery_mosaic'); ?></option>	           
      </select>
    </label>		
	<h3 style="color:#0073aa;font-size:16px"><?php _e('Photobox Options','fastgallery_mosaic'); ?></h3>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Show Thumbnails','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_photobox_thumbsnails">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Autoplay','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_photobox_autoplay">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Counter','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_photobox_counter">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
	<label class="fg-field">
		<span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Speed in ms (i.e 2000)','fastgallery_mosaic'); ?></span>	
		<input data-setting="fg_photobox_time" type="text" id="fg_photobox_time"> 
    </label>
	<h3 style="color:#0073aa;font-size:16px"><?php _e('Magnific Popup Options','fastgallery_mosaic'); ?></h3>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Enabled Gallery','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_magnificpopup_gallery">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>	
	<h3 style="color:#0073aa;font-size:16px"><?php _e('PrettyPhoto Options','fastgallery_mosaic'); ?></h3>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Autoplay Slideshow','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_prettyphoto_autoplay_slideshow">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Animation Speed','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_prettyphoto_animation_speed">
        <option value="fast"><?php _e('Fast','fastgallery_mosaic'); ?></option>
		<option value="normal"><?php _e('Normal','fastgallery_mosaic'); ?></option>	
        <option value="slow"><?php _e('Slow','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Show Title','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_prettyphoto_show_title">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Social Tools','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_prettyphoto_social_tools">
        <option value="show"><?php _e('Show','fastgallery_mosaic'); ?></option>
        <option value="hidden"><?php _e('Hidden','fastgallery_mosaic'); ?></option>							
      </select>
    </label>

	<h3 style="color:#0073aa;font-size:16px"><?php _e('Light Gallery Options','fastgallery_mosaic'); ?></h3>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Mode','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_lightgallery_mode">
        <option value="slide"><?php _e('Slide','fastgallery_mosaic'); ?></option>
        <option value="fade"><?php _e('Fade','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
	<label class="fg-field">
		<span style="padding:20px 0 5px 0;display:inline-block;font-weight:bold"><?php _e('Speed in ms (i.e 2000)','fastgallery_mosaic'); ?></span>	
		<input data-setting="fg_lightgallery_speed" type="text" id="fg_photobox_time"> 
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Thumbnails','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_lightgallery_thumbnails">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Controls','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_lightgallery_controls">
        <option value="true"><?php _e('On','fastgallery_mosaic'); ?></option>
        <option value="false"><?php _e('Off','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
	<h3 style="color:#0073aa;font-size:16px"><?php _e('CUSTOM URL SETTINGS','fastgallery_mosaic'); ?></h3>	
    <label class="fg-field">
      <span style="padding:20px 0 5px 0;display:block;font-weight:bold"><?php _e('Target','fastgallery_mosaic'); ?></span>
      <select data-setting="fg_custom_url_target">
        <option value="_blank"><?php _e('Blank (New Window)','fastgallery_mosaic'); ?></option>
        <option value="_self"><?php _e('Self (Same Widow)','fastgallery_mosaic'); ?></option>							
      </select>
    </label>	
	<h3 style="color:#0073aa;font-size:16px"><?php _e('SEO SETTINGS','fastgallery_mosaic'); ?></h3>
	<span style="padding:0px 0 5px 0;display:inline-block;font-weight:bold">
		<?php _e('If you set ON you need to insert all ALT and TITLE Tags image for correct settings.','fastgallery_mosaic'); ?>
	</span>			
    <label class="fg-field">
      <select data-setting="fg_seo">
        <option value="off"><?php _e('Off','fastgallery_mosaic'); ?></option>
        <option value="on"><?php _e('On','fastgallery_mosaic'); ?></option>							
      </select>
    </label>
					
  </script>

  <script>

    jQuery(document).ready(function(){

      _.extend(wp.media.gallery.defaults, {
        fg_type: 'prettyphoto',
		fgm_height: '100',
		fgm_custom_height: '',
		fgm_allow: '',
		fg_reponsive: 'fg_responsive',
		fgm_padding: '0',
		fgm_layout: 'fg_layout1',
		fg_style: 'fg_style1',
		fg_over_image: 'fg_over_image_on',
		fgm_image_lightbox_size: 'fgm_default',
		fg_main_color: '#EEEEEE',
		fg_main_color_opacity: '0.7',
		fg_secondary_color: '#FFFFFF',	
		fg_photobox_thumbsnails: 'true',
		fg_photobox_autoplay: 'true',
		fg_photobox_counter: 'true',
		fg_photobox_time: '2000',
		fg_magnificpopup_gallery: 'true',
		fg_prettyphoto_autoplay_slideshow: 'true',
		fg_prettyphoto_animation_speed: 'true',
		fg_prettyphoto_show_title: 'true',
		fg_prettyphoto_social_tools: 'show',
		fg_lightgallery_mode: 'slide',
		fg_lightgallery_speed: '2000',
		fg_lightgallery_thumbnails: 'true',
		fg_lightgallery_controls: 'true',
		fg_custom_url_target: '_blank',
		fgm_image_lightbox:	'plus',
		fgm_image_width: 'small',
		fg_seo: 'off'
      });

      wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
        template: function(view){
          return wp.media.template('gallery-settings')(view)
               + wp.media.template('fast_gallery_type')(view);
        }
      });

    });
  </script>
  
  <?php

}