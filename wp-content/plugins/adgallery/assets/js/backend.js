/* 
File: assets/js/backend.js
Description: JS Script for Backend
Plugin: AD Gallery
Author: Ad-theme.com
*/

jQuery(document).ready(function($){
// Custom popup box
	 $("#adgallery-generator-button").click(function(){
	  $("#adgallery-generator-wrap, #adgallery-generator-overlay").show();
	 });
	 
	 $("#adgallery-generator-close").click(function(){
	  $("#adgallery-generator-wrap, #adgallery-generator-overlay").hide();
	 });
	 	 
	 // Insert shortcode
	 $('#adgallery-generator-insert').live('click', function(event) {
		var style = $('#adgallery-style').val();
		var shortcode = '[adgallery id="'+ style + '"]';
		window.send_to_editor(shortcode);
		$("#adgallery-generator-wrap, #adgallery-generator-overlay").hide();
	});

	$(function() {
		$( "#tabs" ).tabs();
	});

	$(function() {
		$('#ad_gallery_type').live('click', function(event) {
			var img_source = $('#ad_gallery_type').val();
			if(img_source == 'filter') {
				$("#ad_gallery_img_source option[value=album]").hide();
			}
			if(img_source != 'filter') {
				$("#ad_gallery_img_source option[value=album]").show();
			}	
		});
		$('#ad_gallery_img_source').live('click', function(event) {
			var ad_gallery_img_source = $('#ad_gallery_img_source').val();
			if(ad_gallery_img_source == 'album') {
				$("#ad_gallery_sgallery_type option[value=infinitescroll]").hide();
				$("#ad_gallery_prettyphoto_type option[value=infinitescroll]").hide();
				$("#ad_gallery_photobox_type option[value=infinitescroll]").hide();
				$("#ad_gallery_photowall_type option[value=infinitescroll]").hide();
				$('#featured_image').css('display','none');
				$('#numbers_post').css('display','none');											
			}
			if(ad_gallery_img_source != 'album') {
				$("#ad_gallery_sgallery_type option[value=infinitescroll]").show();
				$("#ad_gallery_prettyphoto_type option[value=infinitescroll]").show();
				$("#ad_gallery_photobox_type option[value=infinitescroll]").show();
				$("#ad_gallery_photowall_type option[value=infinitescroll]").show();
				$('#featured_image').css('display','block');
				$('#numbers_post').css('display','block');	
			}	
		});		
		$('#ad_gallery_img_source').live('click', function(event) {
			var img_source = $('#ad_gallery_img_source').val();
			if(img_source == 'woocommerce') {
				$('#wrap_category_woocommerce').css('display','block');
				$('#wrap_category').css('display','none');
				$('#wrap_category_wp_ecommerce').css('display','none');
				$('#wrap_category_jigoshop').css('display','none');
				$('#wrap_category_post_cat').css('display','none');
				$('#wrap_album').css('display','none');
			}
			if(img_source == 'post') {
				$('#wrap_category_woocommerce').css('display','none');
				$('#wrap_category').css('display','block');
				$('#wrap_category_wp_ecommerce').css('display','none');
				$('#wrap_category_jigoshop').css('display','none');
				$('#wrap_category_post_cat').css('display','none');
				$('#wrap_album').css('display','none');
			}
			if(img_source == 'wp-ecommerce') {
				$('#wrap_category_woocommerce').css('display','none');
				$('#wrap_category').css('display','none');
				$('#wrap_category_wp_ecommerce').css('display','block');
				$('#wrap_category_jigoshop').css('display','none');
				$('#wrap_category_post_cat').css('display','none');
				$('#wrap_album').css('display','none');
			}
			if(img_source == 'jigoshop') {
				$('#wrap_category_woocommerce').css('display','none');
				$('#wrap_category').css('display','none');
				$('#wrap_category_wp_ecommerce').css('display','none');
				$('#wrap_category_jigoshop').css('display','block');
				$('#wrap_category_post_cat').css('display','none');
				$('#wrap_album').css('display','none');
			}
			if(img_source == 'post_cat') {
				$('#wrap_category_woocommerce').css('display','none');
				$('#wrap_category').css('display','none');
				$('#wrap_category_wp_ecommerce').css('display','none');
				$('#wrap_category_jigoshop').css('display','none');
				$('#wrap_category_post_cat').css('display','block');
				$('#wrap_album').css('display','none');
			}
			if(img_source == 'album') {
				$('#wrap_album').css('display','block');
				$('#wrap_category_woocommerce').css('display','none');
				$('#wrap_category').css('display','none');
				$('#wrap_category_wp_ecommerce').css('display','none');
				$('#wrap_category_jigoshop').css('display','none');
				$('#wrap_category_post_cat').css('display','none');
			}		
		});
		$('#ad_gallery_filter_action').live('click', function(event) {
			var filter_action = $('#ad_gallery_filter_action').val();
			if(filter_action == 'lightbox') {
				$('#ad_gallery_filter_action_lightbox_div').css('display','block');
				$('#ad_gallery_filter_preview').css('display','none');
			}
			if(filter_action == 'preview') {
				$('#ad_gallery_filter_action_lightbox_div').css('display','none');
				$('#ad_gallery_filter_prettyphoto').css('display','none');
				$('#ad_gallery_filter_photobox').css('display','none');
				$('#ad_gallery_filter_preview').css('display','block');
			}
		});
		$('#ad_gallery_filter_action_lightbox').live('click', function(event) {
			var filter_action_lightbox = $('#ad_gallery_filter_action_lightbox').val();
			if(filter_action_lightbox == 'prettyphoto') {
				$('#ad_gallery_filter_prettyphoto').css('display','block');
				$('#ad_gallery_filter_photobox').css('display','none');
			}
			if(filter_action_lightbox == 'photobox') {
				$('#ad_gallery_filter_prettyphoto').css('display','none');
				$('#ad_gallery_filter_photobox').css('display','block');
			}
		});
		$('#ad_gallery_image_effect').live('click', function(event) {
			var ad_gallery_image_effect = $('#ad_gallery_image_effect').val();
			if(ad_gallery_image_effect == 'normal') {
				$('#ad_gallery_image_effect_rotate_div').css('display','none');
				$('#ad_gallery_image_effect_scale_div').css('display','none');
				$('#ad_gallery_image_effect_translate_div').css('display','none');
			}
			if(ad_gallery_image_effect == 'rotate') {
				$('#ad_gallery_image_effect_rotate_div').css('display','block');
				$('#ad_gallery_image_effect_scale_div').css('display','none');
				$('#ad_gallery_image_effect_translate_div').css('display','none');
			}
			if(ad_gallery_image_effect == 'scale') {
				$('#ad_gallery_image_effect_rotate_div').css('display','none');
				$('#ad_gallery_image_effect_scale_div').css('display','block');
				$('#ad_gallery_image_effect_translate_div').css('display','none');
			}
			if(ad_gallery_image_effect == 'translate') {
				$('#ad_gallery_image_effect_rotate_div').css('display','none');
				$('#ad_gallery_image_effect_scale_div').css('display','none');
				$('#ad_gallery_image_effect_translate_div').css('display','block');
			}
		});
	});		
});