<?php
/**
 * Template to view and generate Shortcode for Blog Style Layout Shortcode.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/shortcodes
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
if (!is_user_logged_in()) {
   return;
} else {
   $access_granted = false;
   foreach ($user_role_permission as $permission) {
      if (current_user_can($permission)) {
         $access_granted = true;
         break;
      }
   }
   if (!$access_granted) {
      return;
   } elseif (shortcode_generator_gallery_bank === "1") {
      $image_dimensions = isset($global_options_get_data["global_options_generated_image_dimensions"]) ? explode(",", $global_options_get_data["global_options_generated_image_dimensions"]) : array("1600", "900");
      ?>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-custom-home"></i>
               <a href="admin.php?page=gallery_bank">
                  <?php echo $gallery_bank; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=gb_thumbnail_layout_shortcode">
                  <?php echo $gb_shortcode_generator; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_blog_style_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-bubble"></i>
                     <?php echo $gb_blog_style_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_blog_style_layout">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $gb_reset_shortcode; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $gb_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcode"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly="true" name="ux_txtarea_generate_shortcode" id="ux_txtarea_generate_shortcode" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_choose_type; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_choose_type_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_type" name="ux_ddl_choose_type" class="form-control" onchange="shortcode_source_type_control_gallery_bank('ux_ddl_choose_type', 'ux_div_gallery', 'ux_div_album', 'ux_div_show_hide_album'); premium_edition_notification_gallery_bank();">
                                    <option value="gallery"><?php echo $gb_gallery; ?></option>
                                    <option value="album"><?php echo $gb_album; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group" id="ux_div_gallery">
                                 <label class="control-label">
                                    <?php echo $gb_choose_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_choose_gallery_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_gallery" name="ux_ddl_choose_gallery" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value=""><?php echo $gb_choose_gallery_title; ?></option>
                                    <?php
                                    foreach ($blog_style_layout_title as $value) {
                                       ?>
                                       <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["gallery_title"]) && $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $gb_untitled; ?></option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group" id="ux_div_album">
                                 <label class="control-label">
                                    <?php echo $gb_choose_album_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_choose_album_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_album" name="ux_ddl_choose_album" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value=""><?php echo $gb_choose_album_title; ?></option>
                                    <?php
                                    foreach ($blog_style_layout_get_album_data as $value) {
                                       ?>
                                       <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["album_name"]) && $value["album_name"] != "" ? esc_attr($value["album_name"]) : $gb_untitled_album; ?></option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_album_type">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_choose_album_type; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_choose_album_type_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                              </label>
                              <select id="ux_ddl_choose_album_type" name="ux_ddl_choose_album_type" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                 <option value="compact_album"><?php echo $gb_album_compact; ?></option>
                                 <option value="extended_album"><?php echo $gb_album_extended; ?></option>
                              </select>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_sort_albums_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_sort_albums_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                    </label>
                                    <select name="ux_ddl_sort_albums_by" id="ux_ddl_sort_albums_by" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="album_title"><?php echo $gb_title; ?></option>
                                       <option value="upload_date"><?php echo $gb_date; ?></option>
                                       <option value="album_name"><?php echo $gb_filename; ?></option>
                                       <option value="file_type"><?php echo $gb_type; ?></option>
                                       <option value="sort_order" selected="selected"><?php echo $gb_custom_order; ?></option>
                                       <option value="random_order"><?php echo $gb_random_order; ?></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_order_albums_by_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_order_albums_by_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                    </label>
                                    <select name="ux_ddl_order_albums" id="ux_ddl_order_albums" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="sort_asc"><?php echo $gb_ascending; ?></option>
                                       <option value="sort_desc"><?php echo $gb_descending; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_alignment_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_layout_settings_alignment_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_alignment" id="ux_ddl_alignment" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="left"><?php echo $gb_left; ?></option>
                                       <option value="center"><?php echo $gb_center; ?></option>
                                       <option value="right"><?php echo $gb_right; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_blog_style_layout_blog_width_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_blog_style_layout_blog_width_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_blog_style_thumbnail_width" id="ux_txt_blog_style_thumbnail_width" value="500" maxlength="4" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="set_thumbnail_dimension_in_shortcode(this,<?php echo $image_dimensions[0] ?>, '<?php echo $gb_shortcode_blog_width_exceed_msg; ?>'); premium_edition_notification_gallery_bank();" placeholder="<?php echo $gb_max_width_placeholder; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_lightbox_type_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_lightbox_type_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_lightbox_type" id="ux_ddl_lightbox_type" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="no_lightbox"><?php echo $gb_no_light_box; ?></option>
                                    <option selected="selected" value="lightcase"><?php echo $gb_lightcase; ?></option>
                                    <option value="fancy_box"><?php echo $gb_fancy_box; ?></option>
                                    <option value="color_box"><?php echo $gb_color_box; ?></option>
                                    <option value="foo_box_free_edition" selected="selected"><?php echo class_exists("fooboxV2") ? $gb_foo_box_premium : $gb_foo_box_free_edition; ?></option>
                                    <option value="nivo_lightbox"><?php echo $gb_nivo_lightbox; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_page_navigation; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_page_navigation_galleries_title; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_page_navigation" id="ux_ddl_page_navigation" class="form-control" onchange="show_hide_control_gallery_bank('ux_ddl_page_navigation', 'ux_no_of_images_per_page'); premium_edition_notification_gallery_bank();">
                                    <option value="disable"><?php echo $gb_disable; ?></option>
                                    <option value="enable"><?php echo $gb_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" id="ux_no_of_images_per_page" style="display:none;">
                           <label class="control-label">
                              <?php echo $gb_no_of_image_per_page_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_no_of_image_per_page_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_images_per_page" id="ux_txt_images_per_page" value="10" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_images_per_page', 10); premium_edition_notification_gallery_bank();" placeholder="<?php echo $gb_no_of_image_per_page_placeholder; ?>">
                        </div>
                        <div id="ux_div_show_hide_album">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_album_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_album_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                    </label>
                                    <select id="ux_ddl_album_title" name="ux_ddl_album_title" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="show"><?php echo $gb_show; ?></option>
                                       <option value="hide"><?php echo $gb_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_album_description; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_album_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                    </label>
                                    <select id="ux_ddl_album_description" name="ux_ddl_album_description" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="show"><?php echo $gb_show; ?></option>
                                       <option value="hide"><?php echo $gb_hide; ?></option>
                                    </select>
                                 </div>
                              </div> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_gallery_title_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_gallery_title" name="ux_ddl_gallery_title" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="show"><?php echo $gb_show; ?></option>
                                    <option value="hide"><?php echo $gb_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_gallery_description_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_gallery_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_gallery_description" id="ux_ddl_gallery_description" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="show"><?php echo $gb_show; ?></option>
                                       <option value="hide"><?php echo $gb_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_thumbnail_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_thumbnail_title" name="ux_ddl_thumbnail_title" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="show"><?php echo $gb_show; ?></option>
                                    <option value="hide"><?php echo $gb_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_thumbnail_description_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_thumbnail_description" id="ux_ddl_thumbnail_description" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="show"><?php echo $gb_show; ?></option>
                                       <option value="hide"><?php echo $gb_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_order_by_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_order_images" id="ux_ddl_order_images" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="sort_asc"><?php echo $gb_ascending; ?></option>
                                    <option value="sort_desc"><?php echo $gb_descending; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_sort_images_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_sort_images_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_sort_image_by" id="ux_ddl_sort_image_by" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="image_title"><?php echo $gb_title; ?></option>
                                    <option value="upload_date"><?php echo $gb_date; ?></option>
                                    <option value="image_name"><?php echo $gb_filename; ?></option>
                                    <option value="file_type"><?php echo $gb_type; ?></option>
                                    <option value="sort_order" selected="selected"><?php echo $gb_custom_order; ?></option>
                                    <option value="random_order"><?php echo $gb_random_order; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_global_option_lazy_load_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_lazy_load_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_lazy_load" id="ux_ddl_lazy_load" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="disable"><?php echo $gb_disable; ?></option>
                                    <option value="enable"><?php echo $gb_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_filters; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_filters_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_filters" id="ux_ddl_filters" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="disable"><?php echo $gb_disable; ?></option>
                                    <option value="enable"><?php echo $gb_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_order_by; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_order_by" id="ux_ddl_order_by" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                    <option value="disable"><?php echo $gb_disable; ?></option>
                                    <option value="enable"><?php echo $gb_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_search_box; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_search_box_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_search_box" id="ux_ddl_search_box" class="form-control"  onchange="premium_edition_notification_gallery_bank();">
                                    <option value="disable"><?php echo $gb_disable; ?></option>
                                    <option value="enable"><?php echo $gb_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_special_effects">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_animation_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_animation_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                    </label>
                                    <select id="ux_ddl_animation_effect" name="ux_ddl_animation_effect" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                       <option value="none"><?php echo $gb_none; ?></option>
                                       <optgroup label="<?php echo $gb_magic_effect; ?>">
                                          <option value="twisterInDown"><?php echo $gb_twister_in_down; ?></option>
                                          <option value="twisterInUp"><?php echo $gb_twister_in_up; ?></option>
                                          <option value="swap"><?php echo $gb_swap; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_bling; ?>">
                                          <option value="puffIn"><?php echo $gb_puff_in; ?></option>
                                          <option value="vanishIn"><?php echo $gb_vanish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_static_effect; ?>"> 
                                          <option value="openDownLeftReturn"><?php echo $gb_open_down_left_return; ?></option>
                                          <option value="openDownRightReturn"><?php echo $gb_open_down_right_return; ?></option>
                                          <option value="openUpLeftReturn"><?php echo $gb_open_up_left_return; ?></option>
                                          <option value="openUpRightReturn"><?php echo $gb_open_up_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_perspective; ?>">
                                          <option value="perspectiveDownReturn"><?php echo $gb_perspective_down_return; ?></option>
                                          <option value="perspectiveUpReturn"><?php echo $gb_perspective_up_return; ?></option>
                                          <option value="perspectiveLeftReturn"><?php echo $gb_perspective_left_return; ?></option>
                                          <option value="perspectiveRightReturn"><?php echo $gb_perspective_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_slide; ?>">
                                          <option value="slideDownReturn"><?php echo $gb_slide_down_return; ?></option>
                                          <option value="slideUpReturn"><?php echo $gb_slide_up_return; ?></option>
                                          <option value="slideLeftReturn"><?php echo $gb_slide_left_return; ?></option>
                                          <option value="slideRightReturn"><?php echo $gb_slide_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_math; ?>">
                                          <option value="swashIn"><?php echo $gb_swash_in; ?></option>
                                          <option value="foolishIn"><?php echo $gb_foolish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_tin; ?>">
                                          <option value="tinRightIn"><?php echo $gb_tin_right_in; ?></option>
                                          <option value="tinLeftIn"><?php echo $gb_tin_left_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_boing; ?>">
                                          <option value="boingInUp"><?php echo $gb_boing_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_on_the_space; ?>">
                                          <option value="spaceInUp"><?php echo $gb_space_in_up; ?></option>
                                          <option value="spaceInRight"><?php echo $gb_space_in_right; ?></option>
                                          <option value="spaceInDown"><?php echo $gb_space_in_down; ?></option>
                                          <option value="spaceInLeft"><?php echo $gb_space_in_left; ?></option>                                                        
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_attention_seekers; ?>">
                                          <option value="bounce"><?php echo $gb_bounce; ?></option>
                                          <option value="flash"><?php echo $gb_flash; ?></option>
                                          <option value="pulse"><?php echo $gb_pulse; ?></option>
                                          <option value="rubberBand"><?php echo $gb_rubber_band; ?></option>
                                          <option value="shake"><?php echo $gb_shake; ?></option>
                                          <option value="swing"><?php echo $gb_swing; ?></option>
                                          <option value="tada"><?php echo $gb_tada; ?></option>
                                          <option value="wobble"><?php echo $gb_wobble; ?></option>
                                          <option value="jello"><?php echo $gb_jello; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_bouncing_entrances; ?>">
                                          <option value="bounceIn"><?php echo $gb_bounce_in; ?></option>
                                          <option value="bounceInDown"><?php echo $gb_bounce_in_down; ?></option>
                                          <option value="bounceInLeft"><?php echo $gb_bounce_in_left; ?></option>
                                          <option value="bounceInRight"><?php echo $gb_bounce_in_right; ?></option>
                                          <option value="bounceInUp"><?php echo $gb_bounce_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_fading_entrances; ?>">
                                          <option value="fadeIn" selected="selected"><?php echo $gb_fade_in; ?></option>
                                          <option value="fadeInDown"><?php echo $gb_fade_in_down; ?></option>
                                          <option value="fadeInLeft"><?php echo $gb_fade_in_left; ?></option>
                                          <option value="fadeInLeftBig"><?php echo $gb_fade_in_left_big; ?></option>
                                          <option value="fadeInRight"><?php echo $gb_fade_in_right; ?></option>
                                          <option value="fadeInRightBig"><?php echo $gb_fade_in_right_big; ?></option>
                                          <option value="fadeInUp"><?php echo $gb_fade_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_flippers; ?>">
                                          <option value="flip"><?php echo $gb_flip; ?></option>
                                          <option value="flipInX"><?php echo $gb_flip_in_x; ?></option>
                                          <option value="flipInY"><?php echo $gb_flip_in_y; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_lightspeed; ?>">
                                          <option value="lightSpeedIn"><?php echo $gb_light_speed_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_rotating_entrances; ?>">
                                          <option value="rotateIn"><?php echo $gb_rotate_in; ?></option>
                                          <option value="rotateInDownLeft"><?php echo $gb_rotate_in_down_left; ?></option>
                                          <option value="rotateInDownRight"><?php echo $gb_rotate_in_down_right; ?></option>
                                          <option value="rotateInUpLeft"><?php echo $gb_rotate_in_up_left; ?></option>
                                          <option value="rotateInUpRight"><?php echo $gb_rotate_in_up_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_sliding_entrances; ?>">
                                          <option value="slideInUp"><?php echo $gb_slide_in_up; ?></option>
                                          <option value="slideInDown"><?php echo $gb_slide_in_down; ?></option>
                                          <option value="slideInLeft"><?php echo $gb_slide_in_left; ?></option>
                                          <option value="slideInRight"><?php echo $gb_slide_in_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_zoom_entrances; ?>">
                                          <option value="zoomIn"><?php echo $gb_zoom_in; ?></option>
                                          <option value="zoomInDown"><?php echo $gb_zoom_in_down; ?></option>
                                          <option value="zoomInLeft"><?php echo $gb_zoom_in_left; ?></option>
                                          <option value="zoomInRight"><?php echo $gb_zoom_in_right; ?></option>
                                          <option value="zoomInUp"><?php echo $gb_zoom_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gb_specials; ?>">
                                          <option value="rollIn"><?php echo $gb_roll_in; ?></option>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_special_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_special_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_special_effects" name="ux_ddl_special_effects" class="form-control" onchange="premium_edition_notification_gallery_bank();">
                                          <option value="none"><?php echo $gb_none; ?></option>
                                          <option value="blur"><?php echo $gb_blur; ?></option>
                                          <option value="sepia"><?php echo $gb_sepia; ?></option>
                                          <option value="brightness"><?php echo $gb_brightness; ?></option>
                                          <option value="contrast"><?php echo $gb_contrast; ?></option>
                                          <option value="invert"><?php echo $gb_invert; ?></option>
                                          <option value="saturate"><?php echo $gb_saturate; ?></option>
                                          <option value="grayscale"><?php echo $gb_grayscale; ?></option>
                                          <option value="hue-rotate"><?php echo $gb_hue_rotate; ?></option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $gb_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcodes"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly="true" name="ux_txtarea_generate_shortcodes" id="ux_txtarea_generate_shortcodes" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $gb_reset_shortcode; ?>">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   } else {
      ?>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-custom-home"></i>
               <a href="admin.php?page=gallery_bank">
                  <?php echo $gallery_bank; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=gb_thumbnail_layout_shortcode">
                  <?php echo $gb_shortcode_generator; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_blog_style_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-bubble"></i>
                     <?php echo $gb_blog_style_layout; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_blog_style_layout">
                     <div class="form-body">
                        <strong><?php echo $gb_user_access_message; ?></strong>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}