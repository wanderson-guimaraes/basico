<?php
/**
 * Template to display the Lightcase settings.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/lightboxes
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
   } else if (lightboxes_gallery_bank == "1") {
      $lightcase_nonce = wp_create_nonce("lightcase_nonce");
      $gb_lightcase_border = isset($gb_lightcase_meta_data["lightcase_border"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_border"])) : array(0, "none", "#ffffff");
      $lightcase_button_font_style = isset($gb_lightcase_meta_data["lightcase_button_font_style"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_button_font_style"])) : array(30, "#ffffff");
      $lightcase_counter_font_style = isset($gb_lightcase_meta_data["lightcase_counter_font_style"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_counter_font_style"])) : array(10, "#ffffff");
      $lightcase_image_title_font_style = isset($gb_lightcase_meta_data["lightcase_image_title_font_style"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_image_title_font_style"])) : array(16, "#ffffff");
      $lightcase_image_title_margin = isset($gb_lightcase_meta_data["lightcase_image_title_margin"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_image_title_margin"])) : array(5, 0, 5, 0);
      $lightcase_image_title_padding = isset($gb_lightcase_meta_data["lightcase_image_title_padding"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_image_title_padding"])) : array(0, 0, 0, 0);
      $lightcase_image_description_font_style = isset($gb_lightcase_meta_data["lightcase_image_description_font_style"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_image_description_font_style"])) : array(14, "#ffffff");
      $lightcase_image_description_margin = isset($gb_lightcase_meta_data["lightcase_image_description_margin"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_image_description_margin"])) : array(5, 0, 5, 0);
      $lightcase_image_description_padding = isset($gb_lightcase_meta_data["lightcase_image_description_padding"]) ? explode(",", esc_attr($gb_lightcase_meta_data["lightcase_image_description_padding"])) : array(0, 0, 0, 0);
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
               <a href="admin.php?page=gb_lightcase">
                  <?php echo $gb_lightboxes; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_lightcase; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-magnet"></i>
                     <?php echo $gb_lightcase; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_lightcase_lightbox_settings">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_lightcase"  id="ux_btn_lightcase" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#settings" data-toggle="tab">
                                    <?php echo $gb_settings; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#image_title" data-toggle="tab">
                                    <?php echo $gb_add_gallery_image_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#image_description" data-toggle="tab">
                                    <?php echo $gb_add_gallery_image_description_title; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="settings">
                                 <div class="row" >
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_autoplay_slideshow; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_autoplay_slideshow_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select id="ux_ddl_autoplay_slideshow" name="ux_ddl_autoplay_slideshow" class="form-control" onchange="show_hide_control_gallery_bank('ux_ddl_autoplay_slideshow', 'ux_div_lightcase_slideshow')">
                                                <option value="true"><?php echo $gb_enable; ?></option>
                                                <option value="false"><?php echo $gb_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_lightcase_image_transition; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_lightcase_image_transition_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select id="ux_ddl_image_transition" name="ux_ddl_image_transition" class="form-control">
                                                <option value="none"><?php echo $gb_none; ?></option>
                                                <option value="fade"><?php echo $gb_transition_fade ?></option>
                                                <option value="fadeInline"><?php echo $gb_transition_fadeinline ?></option>
                                                <option value="scrollTop"><?php echo $gb_transition_scrolltop ?></option>
                                                <option value="elastic"><?php echo $gb_transition_elastic ?></option>
                                                <option value="scrollRight"><?php echo $gb_transition_scrollright ?></option>
                                                <option value="scrollBottom"><?php echo $gb_transition_scrollbottom ?></option>
                                                <option value="scrollLeft"><?php echo $gb_transition_scrollleft ?></option>
                                                <option value="scrollHorizontal"><?php echo $gb_transition_scrollhorizontal ?></option>
                                                <option value="scrollVertical"><?php echo $gb_transition_scrollvertical ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="ux_div_lightcase_slideshow">
                                    <div class="form-group">
                                       <label class="control-label">
                                          <?php echo $gb_slideshow_interval; ?> :
                                          <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_slideshow_interval_tooltip; ?>" data-placement="right"></i>
                                          <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                       </label>
                                       <div class="input-icon right">
                                          <input type="text" class="form-control" name="ux_txt_slideshow_interval" id="ux_txt_slideshow_interval"  maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);"  onblur="default_value_gallery_bank('#ux_txt_slideshow_interval', 10);" placeholder="<?php echo $gb_slideshow_interval_placeholder; ?>" value="<?php echo isset($gb_lightcase_meta_data["lightcase_slideshow_interval"]) ? intval($gb_lightcase_meta_data["lightcase_slideshow_interval"]) : 10; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row navigation-buttons">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_lightcase_animation_speed_starting_transition; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_lightcase_animation_speed_starting_transition_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_animation_speed_starting_transition" id="ux_txt_animation_speed_starting_transition" onblur="default_value_gallery_bank('#ux_txt_animation_speed_starting_transition', 350);" maxlength="4" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" placeholder="<?php echo $gb_lightcase_animation_speed_starting_transition_placeholder; ?>" value="<?php echo isset($gb_lightcase_meta_data["lightcase_animation_speed_starting_transition"]) ? intval($gb_lightcase_meta_data["lightcase_animation_speed_starting_transition"]) : 350 ?>" >
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_lightcase_animation_speed_ending_transition; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_lightcase_animation_speed_ending_transition_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_animation_speed_ending_transition" id="ux_txt_animation_speed_ending_transition" onblur="default_value_gallery_bank('#ux_txt_animation_speed_ending_transition', 250);" maxlength="4" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" placeholder="<?php echo $gb_lightcase_animation_speed_ending_transition_placeholder; ?>" value="<?php echo isset($gb_lightcase_meta_data["lightcase_animation_speed_ending_transition"]) ? intval($gb_lightcase_meta_data["lightcase_animation_speed_ending_transition"]) : 250 ?>" >
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_lightbox_overlay_color_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_lightbox_overlay_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_overlay_color" id="ux_txt_overlay_color" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_lightbox_overlay_color_placeholder; ?>" value="<?php echo isset($gb_lightcase_meta_data["lightcase_onoverlay_color"]) ? esc_attr($gb_lightcase_meta_data["lightcase_onoverlay_color"]) : "#000000" ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_lightcase_overlay_opacity; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_lightcase_overlay_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_overlay_opacity" id="ux_txt_overlay_opacity" onblur="default_value_gallery_bank('#ux_txt_overlay_opacity', '75');" maxlength="3"  onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" placeholder="<?php echo $gb_lightcase_overlay_opacity_placeholder; ?>" value="<?php echo isset($gb_lightcase_meta_data["lightcase_onoverlay_opacity"]) ? intval($gb_lightcase_meta_data["lightcase_onoverlay_opacity"]) : 75; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_button_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_button_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_button_font_style[]" id="ux_txt_button_font_size" placeholder="<?php echo $gb_button_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_button_font_size', 30);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_button_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_button_font_style[]" id="ux_txt_button_style_color" onblur="default_value_gallery_bank('#ux_txt_button_style_color', '#ffffff');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_button_color_placeholder; ?>" value="<?php echo esc_attr($lightcase_button_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_close_button; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_close_button_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <select name="ux_ddl_close_button" id="ux_ddl_close_button" class="form-control">
                                             <option value="show"><?php echo $gb_show; ?></option>
                                             <option value="hide"><?php echo $gb_hide; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_image_counter; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_iimage_counter_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_image_counter" id="ux_ddl_image_counter" class="form-control" onchange="show_hide_control_gallery_bank('ux_ddl_image_counter', 'ux_div_image_counter_style');">
                                       <option value="show"><?php echo $gb_show; ?></option>
                                       <option value="hide"><?php echo $gb_hide; ?></option>
                                    </select>
                                 </div>
                                 <div class="row" id="ux_div_image_counter_style">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_counter_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_counter_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_conter_font_style[]" id="ux_txt_counter_font_size" placeholder="<?php echo $gb_counter_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_counter_font_size', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_counter_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_conter_font_style[]" id="ux_txt_counter_style_color" onblur="default_value_gallery_bank('#ux_txt_counter_style_color', '#ffffff');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_counter_color_placeholder; ?>" value="<?php echo esc_attr($lightcase_counter_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_counter_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_counter_font_family_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_image_counter_font_family" id="ux_ddl_image_counter_font_family" class="form-control">
                                                <?php
                                                if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                   include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                                }
                                                ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_width" placeholder="<?php echo $gb_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_border_style_width', 0)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($gb_lightcase_border[0]); ?>">
                                             <select name="ux_txt_border_style[]" id="ux_ddl_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gb_none; ?></option>
                                                <option value="solid"><?php echo $gb_solid; ?></option>
                                                <option value="dashed"><?php echo $gb_dashed; ?></option>
                                                <option value="dotted"><?php echo $gb_dotted ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_color" onblur="default_value_gallery_bank('#ux_txt_border_style_color', '#ffffff')" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($gb_lightcase_border[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_border_radius" id="ux_txt_border_radius" placeholder="<?php echo $gb_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onblur="default_value_gallery_bank('#ux_txt_border_radius', 0)" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($gb_lightcase_meta_data["lightcase_border_radius"]) ? intval($gb_lightcase_meta_data["lightcase_border_radius"]) : 0; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_title">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_lightbox_lightbox2_title" name="ux_ddl_lightbox_lightbox2_title" class="form-control" onchange="show_hide_control_gallery_bank('ux_ddl_lightbox_lightbox2_title', 'ux_div_title_lightbox_lightbox2');">
                                          <option value="true"><?php echo $gb_show; ?></option>
                                          <option value="false"><?php echo $gb_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="ux_div_title_lightbox_lightbox2">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_html_tag; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_html_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_title_html_tag" id="ux_ddl_image_title_html_tag" class="form-control">
                                                   <option value="h1"><?php echo $gb_h1_tag; ?></option>
                                                   <option value="h2"><?php echo $gb_h2_tag; ?></option>
                                                   <option value="h3"><?php echo $gb_h3_tag; ?></option>
                                                   <option value="h4"><?php echo $gb_h4_tag; ?></option>
                                                   <option value="h5"><?php echo $gb_h5_tag; ?></option>
                                                   <option value="h6"><?php echo $gb_h6_tag; ?></option>
                                                   <option value="blockquote"><?php echo $gb_blockquote_tag; ?></option>
                                                   <option value="p"><?php echo $gb_paragraph_tag; ?></option>
                                                   <option value="span"><?php echo $gb_span_tag; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_text_alignment_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_text_alignment_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_title_alignment" id="ux_ddl_image_title_alignment" class="form-control">
                                                   <option value="left"><?php echo $gb_left; ?></option>
                                                   <option value="center"><?php echo $gb_center; ?></option>
                                                   <option value="right"><?php echo $gb_right; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_font_style; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_style_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_image_title_font_style[]" id="ux_txt_image_title_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_font_size', 16);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_image_title_font_style[]" id="ux_txt_image_title_style_color" onblur="default_value_gallery_bank('#ux_txt_image_title_style_color', '#ffffff');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($lightcase_image_title_font_style[1]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_font_family_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_family_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_title_font_family" id="ux_ddl_image_title_font_family" class="form-control">
                                                   <?php
                                                   if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                      include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_margin_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_margin_top', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_margin[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_padding_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_image_title_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_title_padding[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_description">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_description; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_lightbox_lightbox2_description" name="ux_ddl_lightbox_lightbox2_description" class="form-control" onchange="show_hide_control_gallery_bank('ux_ddl_lightbox_lightbox2_description', 'ux_div_lightbox_lightbox2_description');">
                                          <option value="true"><?php echo $gb_show; ?></option>
                                          <option value="false"><?php echo $gb_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id='ux_div_lightbox_lightbox2_description'>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_html_tag; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_html_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_description_html_tag" id="ux_ddl_image_description_html_tag" class="form-control">
                                                   <option value="h1"><?php echo $gb_h1_tag; ?></option>
                                                   <option value="h2"><?php echo $gb_h2_tag; ?></option>
                                                   <option value="h3"><?php echo $gb_h3_tag; ?></option>
                                                   <option value="h4"><?php echo $gb_h4_tag; ?></option>
                                                   <option value="h5"><?php echo $gb_h5_tag; ?></option>
                                                   <option value="h6"><?php echo $gb_h6_tag; ?></option>
                                                   <option value="blockquote"><?php echo $gb_blockquote_tag; ?></option>
                                                   <option value="p"><?php echo $gb_paragraph_tag; ?></option>
                                                   <option value="span"><?php echo $gb_span_tag; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_text_alignment_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_text_alignment_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_description_alignment" id="ux_ddl_image_description_alignment" class="form-control">
                                                   <option value="left"><?php echo $gb_left; ?></option>
                                                   <option value="center"><?php echo $gb_center; ?></option>
                                                   <option value="right"><?php echo $gb_right; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_font_style; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_style_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_image_description_font_style[]" id="ux_txt_image_description_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_font_size', 14);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_image_description_font_style[]" id="ux_txt_image_description_font_color" onblur="default_value_gallery_bank('#ux_txt_image_description_font_color', '#ffffff');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($lightcase_image_description_font_style[1]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_font_family_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_family_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_description_font_family" id="ux_ddl_image_description_font_family" class="form-control">
                                                   <?php
                                                   if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                      include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_margin_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_margin_top', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_margin[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_padding_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_gallery_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gb_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_image_description_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($lightcase_image_description_padding[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="line-separator"></div>
                           <div class="form-actions">
                              <div class="pull-right">
                                 <input type="submit" class="btn vivid-green" name="ux_btn_lightcase" id="ux_btn_lightcase" value="<?php echo $gb_save_changes; ?>">
                              </div>
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
               <a href="admin.php?page=gb_lightcase">
                  <?php echo $gb_lightboxes; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_lightcase; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-magnet"></i>
                     <?php echo $gb_lightcase; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <div class="form-body">
                     <strong><?php echo $gb_user_access_message; ?></strong>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}