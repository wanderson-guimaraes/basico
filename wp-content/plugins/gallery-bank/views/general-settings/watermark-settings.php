<?php
/**
 * Template for view and update settings in Watermark Settings.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/general-settings
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
   } else if (general_settings_gallery_bank == "1") {
      $get_image_path_nonce = wp_create_nonce("get_image_path_nonce");
      $watermark_setting_offset = isset($watermark_settings_get_data["watermark_setting_offset"]) ? explode(",", esc_attr($watermark_settings_get_data["watermark_setting_offset"])) : array(0, 0);
      $watermark_settings_font_style = isset($watermark_settings_get_data["watermark_settings_font_style"]) ? explode(",", esc_attr($watermark_settings_get_data["watermark_settings_font_style"])) : array(20, "#cccccc");
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
               <a href="admin.php?page=gb_global_options">
                  <?php echo $gb_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_watermark_settings; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-note"></i>
                     <?php echo $gb_watermark_settings; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_watermark_setting">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_watermark_settings_type_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_type_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                           </label>
                           <select name="ux_ddl_watermark_settings" id="ux_ddl_watermark_settings" class="form-control" onchange="watermark_settings_gallery_bank();">
                              <option value="none"><?php echo $gb_none; ?></option>
                              <option value="text"><?php echo $gb_text; ?></option>
                              <option value="image"><?php echo $gb_image; ?></option>
                           </select>
                        </div>
                        <div id="ux_div_watermark_text" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_watermark_settings_text_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_text_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_watermark_text" id="ux_txt_watermark_text"  placeholder="<?php echo $gb_watermark_settings_text_placeholder; ?>" value="<?php echo isset($watermark_settings_get_data["watermark_settings_text"]) ? esc_attr($watermark_settings_get_data["watermark_settings_text"]) : ""; ?>">
                           </div>
                        </div>
                        <div id="ux_div_font_style" style="display:none;">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_font_style; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_font_style_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_font[]" id="ux_txt_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_size', 20)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($watermark_settings_font_style[0]); ?>">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_font[]" id="ux_txt_color" onblur="default_value_gallery_bank('#ux_txt_color', '#cccccc')" onfocus="color_picker_gallery_bank(this, this.value)"   placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($watermark_settings_font_style[1]); ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_watermark_settings_rotate_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_rotate_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <input class="form-control" name="ux_txt_watermark_angle" id="ux_txt_watermark_angle"  onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_watermark_setting_text_angle_placeholder; ?>" value="<?php echo isset($watermark_settings_get_data["watermark_setting_angle"]) ? intval($watermark_settings_get_data["watermark_setting_angle"]) : 0; ?>" onblur="default_value_gallery_bank('#ux_txt_watermark_angle', 0)" type="text">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_watermark_image" style="display: none">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_watermark_settings_watermark_url_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_url_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                              </label>
                              <input class="form-control custom-input-large input-inline" name="ux_txt_watermark_url" id="ux_txt_watermark_url"  placeholder="<?php echo $gb_url_placeholder; ?>" value="<?php echo isset($watermark_settings_get_data["watermark_settings_url"]) ? $watermark_settings_get_data["watermark_settings_url"] : ""; ?>" type="text">
                              <input id="wp_upload_button" onclick="premium_edition_notification_gallery_bank();" class="btn vivid-green" value="<?php echo $gb_url_add_image; ?>" type="button">
                              <p id="wp_media_upload_error_message" style="display: none;"><?php echo $gb_url_message; ?></p>
                           </div>
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_watermark_settings_size_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_size_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_watermark_size" id="ux_txt_watermark_size"  placeholder="<?php echo $gb_watermark_settings_size_placeholder; ?>" onchange="check_opacity_gallery_bank(this)" maxlength="3" onkeypress="only_digits_gallery_bank(event);"  onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($watermark_settings_get_data["watermark_settings_size"]) ? intval($watermark_settings_get_data["watermark_settings_size"]) : ""; ?>" >
                           </div>
                        </div>
                        <div id="ux_div_settings" style="display: none">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_watermark_settings_offset_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_offset_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_offset[]" id="ux_txt_offset_x" placeholder="<?php echo $gb_watermark_settings_offset_x_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_offset_x', 0)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($watermark_setting_offset[0]); ?>">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_offset[]" id="ux_txt_offset_y" placeholder="<?php echo $gb_watermark_settings_offset_y_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_offset_y', 0)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($watermark_setting_offset[1]); ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gb_watermark_settings_opacity_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_opacity_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control" name="ux_txt_opacity" id="ux_txt_opacity" placeholder="<?php echo $gb_opacity_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_opacity', 100);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" value="<?php echo isset($watermark_settings_get_data["watermark_setting_opacity"]) ? intval($watermark_settings_get_data["watermark_setting_opacity"]) : 100; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gb_watermark_settings_position_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_watermark_settings_position_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                              </label>
                              <select name="ux_ddl_watermark_position" id="ux_ddl_watermark_position" class="form-control">
                                 <option value="top_left"><?php echo $gb_position_top_left; ?></option>
                                 <option value="top_center"><?php echo $gb_position_top_center; ?></option>
                                 <option value="top_right"><?php echo $gb_position_top_right; ?></option>
                                 <option value="middle_left"><?php echo $gb_position_middle_left; ?></option>
                                 <option value="middle_center"><?php echo $gb_position_middle_center; ?></option>
                                 <option value="middle_right"><?php echo $gb_position_middle_right; ?></option>
                                 <option value="bottom_left"><?php echo $gb_position_bottom_left; ?></option>
                                 <option value="bottom_center"><?php echo $gb_position_bottom_center; ?></option>
                                 <option value="bottom_right"><?php echo $gb_position_bottom_right; ?></option>
                              </select>
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gb_save_changes; ?>">
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
               <a href="admin.php?page=gb_watermark_settings">
                  <?php echo $gb_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_watermark_settings; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-note"></i>
                     <?php echo $gb_watermark_settings; ?>
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