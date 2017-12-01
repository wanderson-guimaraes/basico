<?php
/**
 * Template to view and update the settings for Thumbnail Layout.
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
      $thumbnail_layout_general_margin = isset($manage_thumbnail_data["thumbnail_layout_general_margin"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_general_margin"])) : array(10, 10, 0, 0);
      $thumbnail_layout_general_padding = isset($manage_thumbnail_data["thumbnail_layout_general_padding"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_general_padding"])) : array(0, 0, 0, 0);
      $thumbnail_layout_general_border_style = isset($manage_thumbnail_data["thumbnail_layout_general_border_style"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_general_border_style"])) : array(2, "solid", "#000000");
      $thumbnail_layout_general_shadow = isset($manage_thumbnail_data["thumbnail_layout_general_shadow"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_general_shadow"])) : array(0, 0, 0, 0);
      $thumbnail_layout_general_hover_effect_value = isset($manage_thumbnail_data["thumbnail_layout_general_hover_effect_value"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_general_hover_effect_value"])) : array("none", 0, 0, 0);
      $thumbnail_layout_thumbnail_dimensions = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_dimensions"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_dimensions"])) : array(250, 200);
      if (isset($manage_thumbnail_data["thumbnail_layout_general_background_color_transparency"]) && $manage_thumbnail_data["thumbnail_layout_general_background_color_transparency"] != "") {

         $thumbnail_layout_general_background_color_transparency = isset($manage_thumbnail_data["thumbnail_layout_general_background_color_transparency"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_general_background_color_transparency"])) : array("#ffffff", 50);
      }
      $thumbnail_layout_gallery_title_font_style = isset($manage_thumbnail_data["thumbnail_layout_gallery_title_font_style"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_title_font_style"])) : array(20, "#000000");
      $thumbnail_layout_gallery_title_margin = isset($manage_thumbnail_data["thumbnail_layout_gallery_title_margin"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_title_margin"])) : array(10, 0, 10, 0);
      $thumbnail_layout_gallery_title_padding = isset($manage_thumbnail_data["thumbnail_layout_gallery_title_padding"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_title_padding"])) : array(10, 0, 10, 0);
      $thumbnail_layout_gallery_description_font_style = isset($manage_thumbnail_data["thumbnail_layout_gallery_description_font_style"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_description_font_style"])) : array(16, "#787D85");
      $thumbnail_layout_gallery_description_margin = isset($manage_thumbnail_data["thumbnail_layout_gallery_description_margin"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_description_margin"])) : array(10, 0, 10, 0);
      $thumbnail_layout_gallery_description_padding = isset($manage_thumbnail_data["thumbnail_layout_gallery_description_padding"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_description_padding"])) : array(0, 0, 10, 0);
      $thumbnail_layout_thumbnail_title_font_style = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_font_style"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_title_font_style"])) : array(14, "#787D85");
      $thumbnail_layout_thumbnail_title_margin = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_margin"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_title_margin"])) : array(0, 5, 0, 5);
      $thumbnail_layout_thumbnail_title_padding = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_padding"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_title_padding"])) : array(10, 10, 10, 10);
      $thumbnail_layout_thumbnail_description_font_style = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_font_style"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_description_font_style"])) : array(16, "#000000");
      $thumbnail_layout_thumbnail_description_margin = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_margin"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_description_margin"])) : array(0, 5, 0, 5);
      $thumbnail_layout_thumbnail_description_padding = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_padding"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_description_padding"])) : array(5, 10, 10, 5);
      $thumbnail_dimensions = isset($global_options_get_data["global_options_thumbnail_dimensions"]) ? explode(",", esc_attr($global_options_get_data["global_options_thumbnail_dimensions"])) : array(250, 200);
      $thumbnail_layout_thumbnail_position = isset($manage_thumbnail_data["thumbnail_layout_thumbnail_position"]) ? explode(",", esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_position"])) : array("center", "center");
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
                  <?php echo $gb_thumbnail_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-screen-tablet"></i>
                     <?php echo $gb_thumbnail_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_thumbnail_layout">
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
                                       <input type="text" class="form-control" name="ux_txt_container_width" id="ux_txt_container_width" placeholder="<?php echo $gb_container_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_container_width', 100);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_container_width"]) ? intval($manage_thumbnail_data["thumbnail_layout_container_width"]) : 100; ?>">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_thumbnail_dimensions_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_thumbnail_dimension_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class= "input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_dimension[]" id="ux_txt_width" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="set_thumbnail_dimension_in_shortcode(this, '<?php echo $thumbnail_dimensions[0] ?>', '<?php echo $gb_global_thumbnail_dimension_exceed_msg ?>');" placeholder="<?php echo $gb_width_layout_placeholder; ?>" value="<?php echo intval($thumbnail_layout_thumbnail_dimensions[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_dimension[]" id="ux_txt_height" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="set_thumbnail_dimension_in_shortcode(this, '<?php echo $thumbnail_dimensions[1] ?>', '<?php echo $gb_global_thumbnail_dimension_exceed_msg ?>');" placeholder="<?php echo $gb_height_placeholder; ?>" value="<?php echo intval($thumbnail_layout_thumbnail_dimensions[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_background_color_transparency; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_background_color_transparency_tooltips; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_background_color_transperancy[]" id="ux_txt_background_color" placeholder="<?php echo $gb_background_color; ?>" onfocus="color_picker_gallery_bank(this, this.value)" value="<?php echo esc_attr($thumbnail_layout_general_background_color_transparency[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_background_color_transperancy[]" id="ux_txt_background_transperancy" maxlength="3" placeholder="<?php echo $gb_background_transparency; ?>"  onblur="default_value_gallery_bank('#ux_txt_background_transperancy', 50);" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" value="<?php echo intval($thumbnail_layout_general_background_color_transparency[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row custom-margin-top" >
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_thumbnail_layout_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_opacity" id="ux_txt_opacity" placeholder="<?php echo $gb_opacity_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_opacity', 100);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onchange="check_opacity_gallery_bank(this);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_general_thumbnail_opacity"]) ? intval($manage_thumbnail_data["thumbnail_layout_general_thumbnail_opacity"]) : 100; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_thumbnail_layout_thumbnail_position; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_thumbnail_position_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_txt_thumbnail_position[]" id="ux_txt_thumbnail_position_x" class="form-control custom-input-medium input-inline valid">
                                                <option value="center"><?php echo $gb_center; ?></option>
                                                <option value="left"><?php echo $gb_left; ?></option>
                                                <option value="right"><?php echo $gb_right; ?></option>
                                             </select>
                                             <select name="ux_txt_thumbnail_position[]" id="ux_txt_thumbnail_position_y" class="form-control custom-input-medium input-inline valid">
                                                <option value="top"><?php echo $gb_top; ?></option>
                                                <option value="bottom"><?php echo $gb_bottom; ?></option>
                                                <option value="center"><?php echo $gb_center; ?></option>
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
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_width" placeholder="<?php echo $gb_width_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_border_style_width', 0)" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_general_border_style[0]); ?>">
                                             <select name="ux_txt_border_style[]" id="ux_ddl_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gb_none; ?></option>
                                                <option value="solid"><?php echo $gb_solid; ?></option>
                                                <option value="dashed"><?php echo $gb_dashed; ?></option>
                                                <option value="dotted"><?php echo $gb_dotted ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_color" onblur="default_value_gallery_bank('#ux_txt_border_style_color', '#000000')" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($thumbnail_layout_general_border_style[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_border_radius" id="ux_txt_border_radius" placeholder="<?php echo $gb_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onblur="default_value_gallery_bank('#ux_txt_border_radius', 0)" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_general_border_radius"]) ? intval($manage_thumbnail_data["thumbnail_layout_general_border_radius"]) : 0; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_shadow; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_thumbnail_layout_shadow_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow1" onblur="default_value_gallery_bank('#ux_txt_shadow1', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_horizontal_length_placeholder; ?>" value="<?php echo intval($thumbnail_layout_general_shadow[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow2" onblur="default_value_gallery_bank('#ux_txt_shadow2', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_vertical_length_placeholder; ?>" value="<?php echo intval($thumbnail_layout_general_shadow[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow3" onblur="default_value_gallery_bank('#ux_txt_shadow3', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_blur_radius_placeholder; ?>" value="<?php echo intval($thumbnail_layout_general_shadow[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow4" onblur="default_value_gallery_bank('#ux_txt_shadow4', 0);" onfocus="paste_prevent_gallery_bank(this.id);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" placeholder="<?php echo $gb_spread_radius_placeholder; ?>" value="<?php echo intval($thumbnail_layout_general_shadow[3]); ?>">
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
                                             <input type="text" class="form-control" name="ux_txt_shadow_color" id="ux_txt_shadow_color" onblur="default_value_gallery_bank('#ux_txt_shadow_color', '#000000');" placeholder="<?php echo $gb_shadow_color_placeholder; ?>" onfocus="color_picker_gallery_bank(this, this.value)"  value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_general_shadow_color"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_general_shadow_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_hover_effect_value_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_hover_effect_value_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                             <span id="ux_spn_hover_value" aria-required="true" style="margin-left:10%"></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_txt_hover_effect[]" id="ux_ddl_hover_effect" class="form-control custom-input-medium input-inline" onchange="hover_effect_value_gallery_bank();">
                                                <option value="none"><?php echo $gb_none; ?></option>
                                                <option value="rotate"><?php echo $gb_rotate; ?></option>
                                                <option value="scale"><?php echo $gb_scale; ?></option>
                                                <option value="skew"><?php echo $gb_skew ?></option>
                                             </select>
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_effect_value" placeholder="<?php echo $gb_hover_effect_value_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_hover_effect_value', 0);" maxlength="3" onkeypress="digits_with_dot_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_general_hover_effect_value[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_scale_value_x" placeholder="<?php echo $gb_hover_effect_value_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_hover_scale_value_x', 0);" maxlength="3" onkeypress="digits_with_dot_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo floatval($thumbnail_layout_general_hover_effect_value[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_scale_value_y" placeholder="<?php echo $gb_hover_effect_value_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_hover_scale_value_y', 0);" maxlength="3" onkeypress="digits_with_dot_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo floatval($thumbnail_layout_general_hover_effect_value[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_transition_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_transition_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_transition_time" id="ux_txt_transition_time" placeholder="<?php echo $gb_transition_time_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_transition_time', 1)" maxlength="1" onkeypress="digits_with_dot_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_general_transition_time"]) ? intval($manage_thumbnail_data["thumbnail_layout_general_transition_time"]) : 1; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_thumbnail_setting_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_top_text" placeholder="<?php echo $gb_top; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_thumbnail_margin_top_text', 10);" value="<?php echo intval($thumbnail_layout_general_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_right_text" placeholder="<?php echo $gb_right; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_thumbnail_margin_right_text', 10);" value="<?php echo intval($thumbnail_layout_general_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_bottom_text" placeholder="<?php echo $gb_bottom; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_thumbnail_margin_bottom_text', 0);"   value="<?php echo intval($thumbnail_layout_general_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_left_text" placeholder="<?php echo $gb_left; ?>" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" onblur="default_value_gallery_bank('#ux_txt_thumbnail_margin_left_text', 0);"   value="<?php echo intval($thumbnail_layout_general_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_thumbnail_setting_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_top_text" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_padding_top_text', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_general_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_right_text" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_padding_right_text', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_general_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_bottom_text" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_padding_bottom_text', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_general_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_left_text" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_padding_left_text', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_general_padding[3]); ?>">
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
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_font_size', 20);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_gallery_bank('#ux_txt_gallery_title_style_color', '#000000');" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($thumbnail_layout_gallery_title_font_style[1]); ?>">
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
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_gallery_title_line_height" id="ux_txt_gallery_title_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_line_height', '1.7em')"  onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_title_line_height"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_title_line_height"]) : "1.7em"; ?>">
                                          </div>
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
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_margin_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_gallery_title_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_gallery_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_margin[3]); ?>">
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
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_title_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_title_padding[3]); ?>">
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
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_font_size', 16);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_color" onblur="default_value_gallery_bank('#ux_txt_gallery_description_font_color', '#787D85');" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($thumbnail_layout_gallery_description_font_style[1]); ?>">
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
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_gallery_description_line_height" id="ux_txt_gallery_description_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_line_height', '1.7em')" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_description_line_height"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_description_line_height"]) : "1.7em"; ?>">
                                          </div>
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
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin[]" id="ux_txt_gallery_description_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_margin[3]); ?>">
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
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding[]" id="ux_txt_gallery_description_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_gallery_description_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_gallery_description_padding[3]); ?>">
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
                                             <select name="ux_ddl_title_alignment" id="ux_ddl_title_alignment" class="form-control">
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
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_title_font_style[]" id="ux_txt_title_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_title_font_size', 14);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_title_font_style[]" id="ux_txt_title_style_color" onblur="default_value_gallery_bank('#ux_txt_title_style_color', '#787D85');" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($thumbnail_layout_thumbnail_title_font_style[1]); ?>">
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
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_thumbnail_title_line_height" id="ux_txt_thumbnail_title_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_title_line_height', '1.7em')" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_line_height"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_title_line_height"]) : "1.7em"; ?>">
                                          </div>
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
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_margin_thumbnail_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text[]" id="ux_txt_title_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_top', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text[]" id="ux_txt_title_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_right', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text[]" id="ux_txt_title_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_margin_text[]" id="ux_txt_title_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_title_margin_left', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gb_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_padding_thumbnail_title_tooltip ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " (" . $gb_premium_edition . " )" ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text[]" id="ux_txt_title_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_top', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text[]" id="ux_txt_title_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text[]" id="ux_txt_title_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_title_padding_text[]" id="ux_txt_title_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_title_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_title_padding[3]); ?>">
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
                                             <select name="ux_ddl_description_alignment" id="ux_ddl_description_alignment" class="form-control">
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
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_description_font_style[]" id="ux_txt_description_font_size" placeholder="<?php echo $gb_font_size_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_description_font_size', 12);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_description_font_style[]" id="ux_txt_description_font_color" onblur="default_value_gallery_bank('#ux_txt_description_font_color', '#787D85');" onfocus="color_picker_gallery_bank(this, this.value)" placeholder="<?php echo $gb_color_placeholder; ?>" value="<?php echo esc_attr($thumbnail_layout_thumbnail_description_font_style[1]); ?>">
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
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_thumbnail_description_line_height" id="ux_txt_thumbnail_description_line_height" placeholder="<?php echo $gb_line_height_placeholder; ?>" onblur="default_value_gallery_bank('#ux_txt_thumbnail_description_line_height', '1.7em')" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_line_height"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_description_line_height"]) : "1.7em"; ?>">
                                          </div>
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
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin[]" id="ux_txt_description_margin_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_top', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin[]" id="ux_txt_description_margin_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_right', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin[]" id="ux_txt_description_margin_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_margin[]" id="ux_txt_description_margin_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_description_margin_left', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_margin[3]); ?>">
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
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding[]" id="ux_txt_description_padding_top" placeholder="<?php echo $gb_top; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_top', 5);" maxlength="3"   onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding[]" id="ux_txt_description_padding_right" placeholder="<?php echo $gb_right; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding[]" id="ux_txt_description_padding_bottom" placeholder="<?php echo $gb_bottom; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_description_padding[]" id="ux_txt_description_padding_left" placeholder="<?php echo $gb_left; ?>" onblur="default_value_gallery_bank('#ux_txt_description_padding_left', 5);" maxlength="3" onkeypress="only_digits_gallery_bank(event);" onfocus="paste_prevent_gallery_bank(this.id);" value="<?php echo intval($thumbnail_layout_thumbnail_description_padding[3]); ?>">
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
                  <?php echo $gb_thumbnail_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-screen-tablet"></i>
                     <?php echo $gb_thumbnail_layout; ?>
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