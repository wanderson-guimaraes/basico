<?php
/**
 * Template for view and update OrderBy Settings.
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
      $order_by_font_style = isset($orderby_settings_get_data["order_by_font_style"]) ? explode(",", esc_attr($orderby_settings_get_data["order_by_font_style"])) : array(14, "#000000");
      $order_by_background_color_controls = isset($orderby_settings_get_data["order_by_background_color_and_background_transparency"]) ? explode(",", esc_attr($orderby_settings_get_data["order_by_background_color_and_background_transparency"])) : array("", 100);
      $order_by_border_color = isset($orderby_settings_get_data["order_by_border_style"]) ? explode(",", esc_attr($orderby_settings_get_data["order_by_border_style"])) : array(2, "solid", "#9e9e9e");
      $order_by_margin = isset($orderby_settings_get_data["order_by_margin"]) ? explode(",", esc_attr($orderby_settings_get_data["order_by_margin"])) : array(0, 5, 20, 0);
      $order_by_padding = isset($orderby_settings_get_data["order_by_padding"]) ? explode(",", esc_attr($orderby_settings_get_data["order_by_padding"])) : array(5, 10, 5, 10);
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
                  <?php echo $gb_order_by_settings; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-check"></i>
                     <?php echo $gb_order_by_settings; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_orderby_settings">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_font_style; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_font_style_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_order_font_style_color[]" id="ux_txt_order_by_font_style" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_font_style', 14)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_font_style[0]); ?>">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_order_font_style_color[]" id="ux_txt_order_font_color" onfocus="color_picker_gallery_bank(this, this.value)" onblur="default_value_gallery_bank('#ux_txt_order_font_color', '#000000')" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($order_by_font_style[1]); ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_font_family_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_font_family_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_order_font_family" id="ux_ddl_order_font_family" class="form-control">
                                    <?php
                                    if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                       include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_global_option_active_font_color; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_active_font_color_tooltips; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control" name="ux_txt_order_by_active_font_color" id="ux_txt_order_by_active_font_color" onblur="default_value_gallery_bank('#ux_txt_order_by_active_font_color', '#2fbfc1')" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_global_option_active_font_color_placeholder; ?>" value="<?php echo isset($orderby_settings_get_data["order_by_active_font_color"]) ? esc_attr($orderby_settings_get_data["order_by_active_font_color"]) : "#2fbfc1"; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_button_font_hover_color; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_active_font_hover_color_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_global_order_by_active_font_hover_color" id="ux_txt_global_order_by_active_font_hover_color" onblur="default_value_gallery_bank('#ux_txt_global_order_by_active_font_hover_color', '#2fbfc1')" placeholder="<?php echo $gb_global_option_active_font_hover_color_placeholder; ?>"  onfocus="color_picker_gallery_bank(this, this.value)" value="<?php echo isset($orderby_settings_get_data["order_by_active_font_hover_color"]) ? esc_attr($orderby_settings_get_data["order_by_active_font_hover_color"]) : "#2fbfc1"; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_global_option_filter_background_color; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_background_color_tooltips; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_order_by_background_controls[]" id="ux_txt_global_option_order_by_background_color" onfocus="color_picker_gallery_bank(this, this.value)"  placeholder="<?php echo $gb_global_option_background_color; ?>" value="<?php echo esc_attr($order_by_background_color_controls[0]); ?>">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_order_by_background_controls[]" id="ux_txt_global_option_order_by_background_color_transparency" placeholder="<?php echo $gb_global_option_background_color_transparency; ?>" onblur="default_value_gallery_bank('#ux_txt_global_option_order_by_background_color_transparency', 100)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onchange="check_opacity_gallery_bank(this);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_background_color_controls[1]); ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_global_option_background_hover_color; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_filter_background_hover_color_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_order_by_background_hover_color" id="ux_txt_order_by_background_hover_color" placeholder="<?php echo $gb_global_option_filter_background_hover_color_placeholder; ?>"  onfocus="color_picker_gallery_bank(this, this.value)" value="<?php echo isset($orderby_settings_get_data["order_by_background_hover_color"]) ? esc_attr($orderby_settings_get_data["order_by_background_hover_color"]) : ""; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_border_style_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_border_style_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_order_by_border_style[]" id="ux_txt_order_by_border_style_width" placeholder="<?php echo $gb_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_border_style_width', 2)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_border_color[0]); ?>">
                                    <select name="ux_txt_order_by_border_style[]" id="ux_ddl_order_by_border_style_thickness" class="form-control input-width-27 input-inline">
                                       <option value="none"><?php echo $gb_none; ?></option>
                                       <option value="solid"><?php echo $gb_solid; ?></option>
                                       <option value="dashed"><?php echo $gb_dashed; ?></option>
                                       <option value="dotted"><?php echo $gb_dotted; ?></option>
                                    </select>
                                    <input type="text" class="form-control input-normal input-inline" name="ux_txt_order_by_border_style[]" id="ux_txt_order_by_border_style_color" onblur="default_value_gallery_bank('#ux_txt_order_by_border_style_color', '#9e9e9e')" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($order_by_border_color[2]); ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_border_radius_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_border_radius_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control" name="ux_txt_order_by_border_radius" id="ux_txt_order_by_border_radius" placeholder="<?php echo $gb_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onblur="default_value_gallery_bank('#ux_txt_order_by_border_radius', 0)" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($orderby_settings_get_data["order_by_border_radius"]) ? intval($orderby_settings_get_data["order_by_border_radius"]) : 0 ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_button_border_hover; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_global_option_order_by_border_hover_color_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_order_by_border_hover_color" id="ux_txt_order_by_border_hover_color" onblur="default_value_gallery_bank('#ux_txt_order_by_border_hover_color', '#2fbfc1')"  placeholder="<?php echo $gb_global_option_filter_border_hover_color_placeholder; ?>" onfocus="color_picker_gallery_bank(this, this.value)" value="<?php echo isset($orderby_settings_get_data["order_by_border_hover_color"]) ? esc_attr($orderby_settings_get_data["order_by_border_hover_color"]) : "#2fbfc1" ?>">
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_margin_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_order_by_margin_tooltip; ?>" data-placement="right" ></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_margin[]" id="ux_txt_order_by_margin_top" placeholder="<?php echo $gb_top; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_order_by_margin_top', 0);" value="<?php echo intval($order_by_margin[0]); ?>">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_margin[]" id="ux_txt_order_by_margin_right" placeholder="<?php echo $gb_right; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_order_by_margin_right', 5);" value="<?php echo intval($order_by_margin[1]); ?>">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_margin[]" id="ux_txt_order_by_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_margin_bottom', 20);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_margin[2]); ?>">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_margin[]" id="ux_txt_order_by_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_margin[3]); ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gb_padding_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_order_by_padding_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gb_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_padding[]" id="ux_txt_order_by_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_padding_top', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_padding[0]); ?>">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_padding[]" id="ux_txt_order_by_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_padding[1]); ?>">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_padding[]" id="ux_txt_order_by_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_padding_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_padding[2]); ?>">
                                    <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_order_by_padding[]" id="ux_txt_order_by_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_order_by_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($order_by_padding[3]); ?>">
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
               <a href="admin.php?page=gb_global_options">
                  <?php echo $gb_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_order_by_settings; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-check"></i>
                     <?php echo $gb_order_by_settings; ?>
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