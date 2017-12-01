<?php
/**
 * Template to view and update the settings for Image Browser Layout.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/layout-settings
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
   } else if (layout_settings_gallery_bank == "1") {
      $image_browser_layout_general_buttons_font_style = isset($image_browser_layout_data["image_browser_layout_general_buttons_font_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_general_buttons_font_style"])) : array(14, "#ffffff");
      $image_browser_layout_general_border_style = isset($image_browser_layout_data["image_browser_layout_general_border_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_general_border_style"])) : array(2, "solid", "#000000");
      $image_browser_layout_general_buttons_border_style = isset($image_browser_layout_data["image_browser_layout_general_buttons_border_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_general_buttons_border_style"])) : array(0, "none", "#ffffff");
      $image_browser_layout_general_shadow = isset($image_browser_layout_data["image_browser_layout_general_shadow"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_general_shadow"])) : array(0, 0, 0, 0);
      $image_browser_layout_gallery_title_font_style = isset($image_browser_layout_data["image_browser_layout_gallery_title_font_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_gallery_title_font_style"])) : array(20, "#000000");
      $image_browser_layout_gallery_title_margin = isset($image_browser_layout_data["image_browser_layout_gallery_title_margin"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_gallery_title_margin"])) : array(10, 0, 10, 0);
      $image_browser_layout_gallery_title_padding = isset($image_browser_layout_data["image_browser_layout_gallery_title_padding"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_gallery_title_padding"])) : array(10, 0, 10, 0);
      $image_browser_layout_gallery_description_font_style = isset($image_browser_layout_data["image_browser_layout_gallery_description_font_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_gallery_description_font_style"])) : array(16, "#787D85");
      $image_browser_layout_gallery_description_margin = isset($image_browser_layout_data["image_browser_layout_gallery_description_margin"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_gallery_description_margin"])) : array(10, 0, 10, 0);
      $image_browser_layout_gallery_description_padding = isset($image_browser_layout_data["image_browser_layout_gallery_description_padding"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_gallery_description_padding"])) : array(0, 0, 10, 0);

      $image_browser_layout_thumbnail_title_font_style = isset($image_browser_layout_data["image_browser_layout_thumbnail_title_font_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_title_font_style"])) : array(14, "#efefef");
      $image_browser_layout_thumbnail_title_margin = isset($image_browser_layout_data["image_browser_layout_thumbnail_title_margin"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_title_margin"])) : array(0, 5, 0, 5);
      $image_browser_layout_thumbnail_title_padding = isset($image_browser_layout_data["image_browser_layout_thumbnail_title_padding"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_title_padding"])) : array(10, 10, 10, 10);

      $image_browser_layout_thumbnail_description_font_style = isset($image_browser_layout_data["image_browser_layout_thumbnail_description_font_style"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_description_font_style"])) : array(12, "#dfdfdf");
      $image_browser_layout_thumbnail_description_margin = isset($image_browser_layout_data["image_browser_layout_thumbnail_description_margin"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_description_margin"])) : array(0, 5, 0, 5);
      $image_browser_layout_thumbnail_description_padding = isset($image_browser_layout_data["image_browser_layout_thumbnail_description_padding"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_description_padding"])) : array(5, 10, 0, 0);
      $image_browser_thumbnail_button_margin = isset($image_browser_layout_data["image_browser_layout_general_button_margin"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_general_button_margin"])) : array(10, 5, 0, 5);
      $image_browser_thumbnail_button_padding = isset($image_browser_layout_data["image_browser_layout_general_button_padding"]) ? explode(",", esc_attr($image_browser_layout_data["image_browser_layout_general_button_padding"])) : array(5, 10, 5, 10);
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
               <a href="admin.php?page=gb_thumbnail_layout">
                  <?php echo $gb_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_image_browser_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-feed"></i>
                     <?php echo $gb_image_browser_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_image_browser">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#general" data-toggle="tab">
                                    <?php echo $gb_general_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#gallery_title" data-toggle="tab">
                                    <?php echo $gb_gallery_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#gallery_description" data-toggle="tab">
                                    <?php echo $gb_gallery_description_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#thumbnail_title" data-toggle="tab">
                                    <?php echo $gb_thumbnail_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#thumbnail_description" data-toggle="tab">
                                    <?php echo $gb_thumbnail_description_title; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="general">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_thumbnail_layout_container_width; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_container_width_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control" name="ux_txt_container_width" id="ux_txt_container_width" placeholder="<?php echo $gb_container_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_container_width', 100);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_container_width"]) ? intval($image_browser_layout_data["image_browser_layout_container_width"]) : 100; ?>">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_image_browser_layout_background_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_background_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control valid" name="ux_txt_background_color_image_browser" id="ux_txt_background_color_image_browser" placeholder="<?php echo $gb_background_color_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_background_color_image_browser', '#ffffff');" onfocus="color_picker_gallery_bank(this, this.value)" value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_image_browser_background_color"]) ? esc_attr($image_browser_layout_data["image_browser_layout_general_image_browser_background_color"]) : "#ffffff"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_image_browser_layout_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control valid" name="ux_txt_opacity_image_browser" id="ux_txt_opacity_image_browser" placeholder="<?php echo $gb_opacity_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_opacity_image_browser', 100);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_image_browser_opacity"]) ? intval($image_browser_layout_data["image_browser_layout_general_image_browser_opacity"]) : 100; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style_image[]" id="ux_txt_border_style_width_image" placeholder="<?php echo $gb_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_border_style_width_image', 0)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_general_border_style[0]); ?>">
                                             <select name="ux_txt_border_style_image[]" id="ux_ddl_border_style_thickness_image" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gb_none; ?></option>
                                                <option value="solid"><?php echo $gb_solid; ?></option>
                                                <option value="dashed"><?php echo $gb_dashed; ?></option>
                                                <option value="dotted"><?php echo $gb_dotted; ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style_image[]" id="ux_txt_border_style_color_image" onblur="default_value_gallery_bank('#ux_txt_border_style_color_image', '#000000')" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_general_border_style[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_border_radius_image" id="ux_txt_border_radius_image" placeholder="<?php echo $gb_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onblur="default_value_gallery_bank('#ux_txt_border_radius_image', 0)" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_border_radius"]) ? intval($image_browser_layout_data["image_browser_layout_general_border_radius"]) : 0; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_shadow; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_shadow_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow_image[]" id="ux_txt_shadow1_image" onblur="default_value_gallery_bank('#ux_txt_shadow1_image', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_horizontal_length_placeholder; ?>" value="<?php echo intval($image_browser_layout_general_shadow[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow_image[]" id="ux_txt_shadow2_image" onblur="default_value_gallery_bank('#ux_txt_shadow2_image', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_vertical_length_placeholder; ?>" value="<?php echo intval($image_browser_layout_general_shadow[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow_image[]" id="ux_txt_shadow3_image" onblur="default_value_gallery_bank('#ux_txt_shadow3_image', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_blur_radius_placeholder; ?>" value="<?php echo intval($image_browser_layout_general_shadow[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow_image[]" id="ux_txt_shadow4_image" onblur="default_value_gallery_bank('#ux_txt_shadow4_image', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_spread_radius_placeholder; ?>" value="<?php echo intval($image_browser_layout_general_shadow[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_shadow_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_shadow_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_shadow_color_image" id="ux_txt_shadow_color_image" onblur="default_value_gallery_bank('#ux_txt_shadow_color_image', '#000000')" placeholder="<?php echo $gb_shadow_color_placeholder; ?>" onfocus="color_picker_gallery_bank(this, this.value)"  value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_shadow_color"]) ? esc_attr($image_browser_layout_data["image_browser_layout_general_shadow_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_buttons_color_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_buttons_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_button_color" id="ux_txt_button_color" onblur="default_value_gallery_bank('#ux_txt_button_color', '#000000')" placeholder="<?php echo $gb_buttons_color_placeholder; ?>"  onfocus="color_picker_gallery_bank(this, this.value)" value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_buttons_color"]) ? esc_attr($image_browser_layout_data["image_browser_layout_general_buttons_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_buttons_hover_color_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_buttons_hover_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_button_hover_color" id="ux_txt_button_hover_color" onblur="default_value_gallery_bank('#ux_txt_button_hover_color', '#105278')" placeholder="<?php echo $gb_buttons_hover_color_placeholder; ?>" onfocus="color_picker_gallery_bank(this, this.value)"  value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_buttons_hover_color"]) ? esc_attr($image_browser_layout_data["image_browser_layout_general_buttons_hover_color"]) : "#105278"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_buttons_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_buttons_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_buttons_border_style[]" id="ux_txt_buttons_border_style_width" placeholder="<?php echo $gb_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_buttons_border_style_width', 0);" value="<?php echo intval($image_browser_layout_general_buttons_border_style[0]); ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);">
                                             <select name="ux_txt_buttons_border_style[]" id="ux_ddl_buttons_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gb_none; ?></option>
                                                <option value="solid"><?php echo $gb_solid; ?></option>
                                                <option value="dashed"><?php echo $gb_dashed; ?></option>
                                                <option value="dotted"><?php echo $gb_dotted; ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_buttons_border_style[]" id="ux_txt_buttons_border_style_color" onblur="default_value_gallery_bank('#ux_txt_buttons_border_style_color', '#ffffff')" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_general_buttons_border_style[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_buttons_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_buttons_border_radius_layout_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_buttons_border_radius" id="ux_txt_buttons_border_radius" placeholder="<?php echo $gb_border_radius_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_buttons_border_radius', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_general_buttons_border_radius"]) ? intval($image_browser_layout_data["image_browser_layout_general_buttons_border_radius"]) : 0; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_buttons_font_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_buttons_font_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_buttons_font_style[]" id="ux_txt_buttons_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" value="<?php echo intval($image_browser_layout_general_buttons_font_style[0]); ?>" onblur="default_value_gallery_bank('#ux_txt_buttons_font_size', 14);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_buttons_font_style[]" id="ux_txt_buttons_style_color" onblur="default_value_gallery_bank('#ux_txt_buttons_style_color', '#ffffff');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_general_buttons_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_buttons_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_buttons_font_family_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_buttons_font_family" id="ux_ddl_buttons_font_family" class="form-control">
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
                                             <i class="icon-custom-question tooltips" data-original-title="<?php
                                             echo $gb_image_browser_layout_button_margin;
                                             ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_margin_text[]" id="ux_txt_thumbnails_button_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_margin_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_margin_text[]" id="ux_txt_thumbnails_button_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_margin_right', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_margin_text[]" id="ux_txt_thumbnails_button_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_margin_text[]" id="ux_txt_thumbnails_button_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_margin_left', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_image_browser_layout_button_padding; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_padding_text[]" id="ux_txt_thumbnails_button_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_padding_top', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_padding_text[]" id="ux_txt_thumbnails_button_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_padding_text[]" id="ux_txt_thumbnails_button_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_padding_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnails_button_padding_text[]" id="ux_txt_thumbnails_button_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnails_button_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_thumbnail_button_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="gallery_title">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_title_html_tag" id="ux_ddl_gallery_title_html_tag" class="form-control">
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_title_alignment" id="ux_ddl_gallery_title_alignment" class="form-control">
                                                <option value="left"><?php echo $gb_left; ?></option>
                                                <option value="center"><?php echo $gb_center; ?></option>
                                                <option value="right"><?php echo $gb_right; ?></option>
                                                <option value="justify"><?php echo $gb_justify; ?> </option>
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_font_size', 20);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_gallery_bank('#ux_txt_gallery_title_style_color', '#000000');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_gallery_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_gallery_title_line_height" id="ux_txt_gallery_title_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_line_height', '1.7em');" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_title_line_height"]) ? esc_attr($image_browser_layout_data["image_browser_layout_gallery_title_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_family_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_gallery_title_font_family" id="ux_ddl_gallery_title_font_family" class="form-control">
                                          <?php
                                          if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                             include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php
                                             echo $gb_margin_gallery_title_tooltip;
                                             ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="gallery_description">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_description_html_tag" id="ux_ddl_gallery_description_html_tag" class="form-control">
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_description_alignment" id="ux_ddl_gallery_description_alignment" class="form-control">
                                                <option value="left"><?php echo $gb_left; ?></option>
                                                <option value="center"><?php echo $gb_center; ?></option>
                                                <option value="right"><?php echo $gb_right; ?></option>
                                                <option value="justify"><?php echo $gb_justify; ?> </option>
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_font_size', 16);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_color" onblur="default_value_gallery_bank('#ux_txt_gallery_description_font_color', '#787D85');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_gallery_description_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_gallery_description_line_height" id="ux_txt_gallery_description_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_line_height', '1.7em');" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_description_line_height"]) ? esc_attr($image_browser_layout_data["image_browser_layout_gallery_description_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_family_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_gallery_description_font_family" id="ux_ddl_gallery_description_font_family" class="form-control">
                                          <?php
                                          if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                             include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_gallery_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="thumbnail_title">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_thumbnail_title_html_tag" id="ux_ddl_thumbnail_title_html_tag" class="form-control">
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_title_alignment_image" id="ux_ddl_title_alignment_image" class="form-control">
                                                <option value="left"><?php echo $gb_left; ?></option>
                                                <option value="center"><?php echo $gb_center; ?></option>
                                                <option value="right"><?php echo $gb_right; ?></option>
                                                <option value="justify"><?php echo $gb_justify; ?> </option>
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_title_font_style_image[]" id="ux_txt_title_font_size_image" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_title_font_size_image', 14);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_title_font_style_image[]" id="ux_txt_title_style_color_image" onblur="default_value_gallery_bank('#ux_txt_title_style_color_image', '#787D85');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_thumbnail_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_thumbnail_title_line_height" id="ux_txt_thumbnail_title_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_title_line_height', '1.7em');" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_title_line_height"]) ? esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_title_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_family_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_title_font_family" id="ux_ddl_title_font_family" class="form-control">
                                          <?php
                                          if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                             include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php
                                             echo $gb_margin_thumbnail_title_tooltip;
                                             ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text_image[]" id="ux_txt_title_margin_top_image" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_top_image', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text_image[]" id="ux_txt_title_margin_right_image" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_right_image', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text_image[]" id="ux_txt_title_margin_bottom_image" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_bottom_image', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text_image[]" id="ux_txt_title_margin_left_image" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_left_image', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_thumbnail_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text_image[]" id="ux_txt_title_padding_top_image" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_top_image', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text_image[]" id="ux_txt_title_padding_right_image" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_right_image', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text_image[]" id="ux_txt_title_padding_bottom_image" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_bottom_image', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text_image[]" id="ux_txt_title_padding_left_image" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_left_image', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="thumbnail_description">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_thumbnail_description_html_tag" id="ux_ddl_thumbnail_description_html_tag" class="form-control">
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
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_description_alignment_image" id="ux_ddl_description_alignment_image" class="form-control">
                                                <option value="left"><?php echo $gb_left; ?></option>
                                                <option value="center"><?php echo $gb_center; ?></option>
                                                <option value="right"><?php echo $gb_right; ?></option>
                                                <option value="justify"><?php echo $gb_justify; ?> </option>
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
                                             <i class="icon-custom-question tooltips" data-original-title="<?php
                                             echo $gb_font_style_description_tooltip;
                                             ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_description_font_style_image[]" id="ux_txt_description_font_size_image" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_description_font_size_image', 12);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_description_font_style_image[]" id="ux_txt_description_font_color_image" onblur="default_value_gallery_bank('#ux_txt_description_font_color_image', '#787D85');" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($image_browser_layout_thumbnail_description_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_thumbnail_description_line_height" id="ux_txt_thumbnail_description_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_description_line_height', '1.7em');" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_description_line_height"]) ? esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_description_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_family_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_description_font_family" id="ux_ddl_description_font_family" class="form-control">
                                          <?php
                                          if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                             include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin_image[]" id="ux_txt_description_margin_top_image" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_top_image', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin_image[]" id="ux_txt_description_margin_right_image" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_right_image', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin_image[]" id="ux_txt_description_margin_bottom_image" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_bottom_image', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin_image[]" id="ux_txt_description_margin_left_image" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_left_image', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding_image[]" id="ux_txt_description_padding_top_image" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_top_image', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding_image[]" id="ux_txt_description_padding_right_image" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_right_image', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding_image[]" id="ux_txt_description_padding_bottom_image" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_bottom_image', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding_image[]" id="ux_txt_description_padding_left_image" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_left_image', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($image_browser_layout_thumbnail_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="line-separator"></div>
                           <div class="form-actions">
                              <div class="pull-right">
                                 <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gb_save_changes; ?>">
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
               <a href="admin.php?page=gb_gallery_bank">
                  <?php echo $gallery_bank; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=gb_thumbnail_layout">
                  <?php echo $gb_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_image_browser_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-feed"></i>
                     <?php echo $gb_image_browser_layout; ?>
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