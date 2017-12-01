<?php
/**
 * Template for update and view settings in Roles and Capabilities.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/roles-and-capabilities
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
   } else if (roles_and_capabilities_gallery_bank == "1") {
      $roles_and_capabilities = explode(",", isset($details_roles_capabilities) ? $details_roles_capabilities["roles_and_capabilities"] : "1,1,1,0,0,0");
      $author = explode(",", isset($details_roles_capabilities) ? $details_roles_capabilities["author_privileges"] : "0,1,1,0,0,0,1,0,0,0,1,0");
      $editor = explode(",", isset($details_roles_capabilities) ? $details_roles_capabilities["editor_privileges"] : "0,0,0,0,0,0,1,0,1,0,0,0");
      $contributor = explode(",", isset($details_roles_capabilities) ? $details_roles_capabilities["contributor_privileges"] : "0,0,0,1,0,0,1,0,0,0,0,0");
      $subscriber = explode(",", isset($details_roles_capabilities) ? $details_roles_capabilities["subscriber_privileges"] : "0,0,0,0,0,0,0,0,0,0,0,0");
      $other_capability = explode(",", isset($details_roles_capabilities) ? $details_roles_capabilities["other_privileges"] : "0,0,0,0,0,0,0,0,0,0,0,0");
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
               <span>
                  <?php echo $gb_roles_and_capabilities; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-users"></i>
                     <?php echo $gb_roles_and_capabilities; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_roles_and_capabilities">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_roles_capabilities_show_menu; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_show_menu_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                           </label>
                           <table class="table table-striped table-bordered table-margin-top" id="ux_tbl_gallery_bank">
                              <thead>
                                 <tr>
                                    <th>
                                       <input type="checkbox" name="ux_chk_administrator" id="ux_chk_administrator" value="1" checked="checked" disabled="disabled" <?php echo $roles_and_capabilities[0] == "1" ? "checked = checked" : "" ?>>
                                       <?php echo $gb_roles_capabilities_administrator; ?>
                                    </th>
                                    <th>
                                       <input type="checkbox" name="ux_chk_author" id="ux_chk_author" value="1" onclick="show_roles_capabilities_gallery_bank(this, 'ux_div_author_roles');" <?php echo $roles_and_capabilities[1] == "1" ? "checked = checked" : "" ?>>
                                       <?php echo $gb_roles_capabilities_author; ?>
                                    </th>
                                    <th>
                                       <input type="checkbox" name="ux_chk_editor" id="ux_chk_editor" value="1" onclick="show_roles_capabilities_gallery_bank(this, 'ux_div_editor_roles');" <?php echo $roles_and_capabilities[2] == "1" ? "checked = checked" : "" ?>>
                                       <?php echo $gb_roles_capabilities_editor; ?>
                                    </th>
                                    <th>
                                       <input type="checkbox" name="ux_chk_contributor" id="ux_chk_contributor" value="1" onclick="show_roles_capabilities_gallery_bank(this, 'ux_div_contributor_roles');" <?php echo $roles_and_capabilities[3] == "1" ? "checked = checked" : "" ?>>
                                       <?php echo $gb_roles_capabilities_contributor; ?>
                                    </th>
                                    <th>
                                       <input type="checkbox" name="ux_chk_subscriber" id="ux_chk_subscriber" value="1" onclick="show_roles_capabilities_gallery_bank(this, 'ux_div_subscriber_roles');" <?php echo $roles_and_capabilities[4] == "1" ? "checked = checked" : "" ?>>
                                       <?php echo $gb_roles_capabilities_subscriber; ?>
                                    </th>
                                    <th>
                                       <input type="checkbox"  name="ux_chk_others_privileges" id="ux_chk_others_privileges" value="1" onclick="show_roles_capabilities_gallery_bank(this, 'ux_div_other_privileges_roles');" <?php echo $roles_and_capabilities[5] == "1" ? "checked = checked" : "" ?>>
                                       <?php echo $gb_roles_capabilities_others; ?>
                                    </th>
                                 </tr>
                              </thead>
                           </table>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_roles_capabilities_topbar_menu; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_topbar_menu_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                           </label>
                           <select name="ux_ddl_gallery_bank_menu" id="ux_ddl_gallery_bank_menu" class="form-control">
                              <option value="enable"><?php echo $gb_enable; ?></option>
                              <option value="disable"><?php echo $gb_disable; ?></option>
                           </select>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <div id="ux_div_administrator_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_administrator_role; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_administrator_role_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_administrator">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_administrator" id="ux_chk_full_control_administrator" checked="checked" disabled="disabled" value="1">
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_galleries_admin" disabled="disabled" checked="checked" id="ux_chk_galleries_admin" value="1">
                                             <?php echo $gb_galleries; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_albums_admin" disabled="disabled" checked="checked" id="ux_chk_albums_admin" value="1">
                                             <?php echo $gb_albums; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_tags_admin" disabled="disabled" checked="checked" id="ux_chk_tags_admin" value="1">
                                             <?php echo $gb_tags; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_layout_settings_admin" disabled="disabled" checked="checked" id="ux_chk_layout_settings_admin" value="1">
                                             <?php echo $gb_layout_settings; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_lightboxes_admin" disabled="disabled" checked="checked" id="ux_chk_lightboxes_admin" value="1">
                                             <?php echo $gb_lightboxes; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_general_settings_admin" disabled="disabled" checked="checked" id="ux_chk_general_settings_admin" value="1">
                                             <?php echo $gb_general_settings; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_shortcode_generator_admin" disabled="disabled" checked="checked" id="ux_chk_shortcode_generator_admin" value="1">
                                             <?php echo $gb_shortcode_generator; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_other_settings_admin" id="ux_chk_other_settings_admin" disabled="disabled" checked="checked" value="1">
                                             <?php echo $gb_other_setting; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_roles_admin" disabled="disabled" checked="checked" id="ux_chk_roles_admin" value="1">
                                             <?php echo $gb_roles_and_capabilities; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_system_information_admin" disabled="disabled" checked="checked" id="ux_chk_system_information_admin" value="1">
                                             <?php echo $gb_system_information; ?>
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div> 
                        </div>
                        <div class="form-group">
                           <div id="ux_div_author_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_author_role; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_author_role_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_author">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_author" id="ux_chk_full_control_author" value="1" onclick="full_control_function_gallery_bank(this, 'ux_div_author_roles');" <?php echo isset($author) && $author[0] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_galleries_author" id="ux_chk_galleries_author" value="1" <?php echo isset($author) && $author[1] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_galleries; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_albums_author" id="ux_chk_albums_author" value="1" <?php echo isset($author) && $author[2] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_albums; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_tags_author" id="ux_chk_tags_author" value="1" <?php echo isset($author) && $author[3] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_tags; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_layout_settings_author" id="ux_chk_layout_settings_author" value="1" <?php echo isset($author) && $author[4] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_layout_settings; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_lightboxes_author" id="ux_chk_lightboxes_author" value="1" <?php echo isset($author) && $author[5] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_lightboxes; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_general_settings_author" id="ux_chk_general_settings_author" value="1" <?php echo isset($author) && $author[6] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_general_settings; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_shortcode_generator_author" id="ux_chk_shortcode_generator_author" value="1" <?php echo isset($author) && $author[7] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_shortcode_generator; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_other_settings_author" id="ux_chk_other_settings_author " value="1" <?php echo isset($author) && $author[8] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_other_setting; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_roles_author" id="ux_chk_roles_author" value="1" <?php echo isset($author) && $author[9] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_and_capabilities; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_system_information_author" id="ux_chk_system_information_author" value="1" <?php echo isset($author) && $author[10] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_system_information; ?>
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div id="ux_div_editor_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_editor_role; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_editor_role_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_editor">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_editor" id="ux_chk_full_control_editor" value="1" onclick="full_control_function_gallery_bank(this, 'ux_div_editor_roles');" <?php echo isset($editor) && $editor[0] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_galleries_editor" id="ux_chk_galleries_editor" value="1" <?php echo isset($editor) && $editor[1] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_galleries; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_albums_editor" id="ux_chk_albums_editor" value="1" <?php echo isset($editor) && $editor[2] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_albums; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_tags_editor" id="ux_chk_tags_editor" value="1" <?php echo isset($editor) && $editor[3] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_tags; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_layout_settings_editor" id="ux_chk_layout_settings_editor" value="1" <?php echo isset($editor) && $editor[4] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_layout_settings; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_lightboxes_editor" id="ux_chk_lightboxes_editor" value="1" <?php echo isset($editor) && $editor[5] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_lightboxes; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_general_settings_editor" id="ux_chk_general_settings_editor" value="1" <?php echo isset($editor) && $editor[6] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_general_settings; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_shortcode_generator_editor" id="ux_chk_shortcode_generator_editor" value="1" <?php echo isset($editor) && $editor[7] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_shortcode_generator; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_other_settings_editor" id="ux_chk_other_settings_editor" value="1" <?php echo isset($editor) && $editor[8] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_other_setting; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_roles_editor" id="ux_chk_roles_editor" value="1" <?php echo isset($editor) && $editor[9] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_and_capabilities; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_system_information_editor" id="ux_chk_system_information_editor" value="1" <?php echo isset($editor) && $editor[10] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_system_information; ?>
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div id="ux_div_contributor_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_contributor_role; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_contributor_role_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_contributor">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_contributor" id="ux_chk_full_control_contributor" value="1" onclick="full_control_function_gallery_bank(this, 'ux_div_contributor_roles');" <?php echo isset($contributor) && $contributor[0] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_galleries_contributor" id="ux_chk_galleries_contributor" value="1" <?php echo isset($contributor) && $contributor[1] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_galleries; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_albums_contributor" id="ux_chk_albums_contributor" value="1" <?php echo isset($contributor) && $contributor[2] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_albums; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_tags_contributor" id="ux_chk_tags_contributor" value="1" <?php echo isset($contributor) && $contributor[3] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_tags; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_layout_settings_contributor" id="ux_chk_layout_settings_contributor" value="1" <?php echo isset($contributor) && $contributor[4] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_layout_settings; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_lightboxes_contributor" id="ux_chk_lightboxes_contributor" value="1" <?php echo isset($contributor) && $contributor[5] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_lightboxes; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_general_settings_contributor" id="ux_chk_general_settings_contributor" value="1" <?php echo isset($contributor) && $contributor[6] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_general_settings; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_shortcode_generator_contributor" id="ux_chk_shortcode_generator_contributor" value="1" <?php echo isset($contributor) && $contributor[7] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_shortcode_generator; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_other_settings_contributor" id="ux_chk_other_settings_contributor" value="1" <?php echo isset($contributor) && $contributor[8] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_other_setting; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_roles_contributor" id="ux_chk_roles_contributor" value="1" <?php echo isset($contributor) && $contributor[9] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_and_capabilities; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_system_information_contributor" id="ux_chk_system_information_contributor" value="1" <?php echo isset($contributor) && $contributor[10] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_system_information; ?>
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div id="ux_div_subscriber_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_subscriber_role; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_subscriber_role_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_subscriber">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_subscriber" id="ux_chk_full_control_subscriber" value="1" onclick="full_control_function_gallery_bank(this, 'ux_div_subscriber_roles');" <?php echo isset($subscriber) && $subscriber[0] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_galleries_subscriber" id="ux_chk_galleries_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[1] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_galleries; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_albums_subscriber" id="ux_chk_albums_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[2] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_albums; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_tags_subscriber" id="ux_chk_tags_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[3] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_tags; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_layout_settings_subscriber" id="ux_chk_layout_settings_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[4] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_layout_settings; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_lightboxes_subscriber" id="ux_chk_lightboxes_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[5] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_lightboxes; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_general_settings_subscriber" id="ux_chk_general_settings_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[6] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_general_settings; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_shortcode_generator_subscriber" id="ux_chk_shortcode_generator_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[7] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_shortcode_generator; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_other_settings_subscriber" id="ux_chk_other_settings_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[8] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_other_setting; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_roles_subscriber" id="ux_chk_roles_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[9] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_and_capabilities; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_system_information_subscriber" id="ux_chk_system_information_subscriber" value="1" <?php echo isset($subscriber) && $subscriber[10] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_system_information; ?>
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div id="ux_div_other_privileges_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_other_role; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_other_role_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_subscriber">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_others" id="ux_chk_full_control_others" value="1" onclick="full_control_function_gallery_bank(this, 'ux_div_other_privileges_roles');" <?php echo isset($other_capability) && $other_capability[0] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_galleries_other" id="ux_chk_galleries_other" value="1" <?php echo isset($other_capability) && $other_capability[1] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_galleries; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_albums_other" id="ux_chk_albums_other" value="1" <?php echo isset($other_capability) && $other_capability[2] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_albums; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_tags_other" id="ux_chk_tags_other" value="1" <?php echo isset($other_capability) && $other_capability[3] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_tags; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_layout_settings_other" id="ux_chk_layout_settings_other" value="1" <?php echo isset($other_capability) && $other_capability[4] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_layout_settings; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_lightboxes_other" id="ux_chk_lightboxes_other" value="1" <?php echo isset($other_capability) && $other_capability[5] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_lightboxes; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_general_settings_other" id="ux_chk_general_settings_other" value="1" <?php echo isset($other_capability) && $other_capability[6] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_general_settings; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_shortcode_generator_other" id="ux_chk_shortcode_generator_other" value="1" <?php echo isset($other_capability) && $other_capability[7] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_shortcode_generator; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_other_setting" id="ux_chk_other_setting" value="1" <?php echo isset($other_capability) && $other_capability[8] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_other_setting; ?>
                                          </td>
                                          <td>
                                             <input type="checkbox" name="ux_chk_roles_other" id="ux_chk_roles_other" value="1" <?php echo isset($other_capability) && $other_capability[9] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_roles_and_capabilities; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <input type="checkbox" name="ux_chk_system_information_other" id="ux_chk_system_information_other" value="1" <?php echo isset($other_capability) && $other_capability[10] == "1" ? "checked = checked" : "" ?>>
                                             <?php echo $gb_system_information; ?>
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div id="ux_div_other_roles">
                              <label class="control-label">
                                 <?php echo $gb_roles_capabilities_other_roles_capabilities; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_roles_capabilities_other_roles_capabilities_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                              </label>
                              <div class="table-margin-top">
                                 <table class="table table-striped table-bordered table-hover" id="ux_tbl_other_roles">
                                    <thead>
                                       <tr>
                                          <th style="width: 40% !important;">
                                             <input type="checkbox" name="ux_chk_full_control_other_roles" id="ux_chk_full_control_other_roles" value="1" onclick="full_control_function_gallery_bank(this, 'ux_div_other_roles');" >
                                             <?php echo $gb_roles_capabilities_full_control; ?>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $flag = 0;
                                       $user_capabilities = get_others_capabilities_gallery_bank();
                                       foreach ($user_capabilities as $key => $value) {
                                          $other_roles = in_array($value, $other_roles_array) ? "checked=checked" : "";
                                          $flag++;
                                          if ($key % 3 == 0) {
                                             ?>
                                             <tr>
                                                <?php
                                             }
                                             ?>
                                             <td>
                                                <input type="checkbox" name="ux_chk_other_capabilities_<?php echo $value; ?>" id="ux_chk_other_capabilities_<?php echo $value; ?>" value="<?php echo $value; ?>" <?php echo $other_roles; ?>>
                                                <?php echo $value; ?>
                                             </td>
                                             <?php
                                             if (count($user_capabilities) == $flag && $flag % 3 == 1) {
                                                ?>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <?php
                                             }
                                             ?>
                                             <?php
                                             if (count($user_capabilities) == $flag && $flag % 3 == 2) {
                                                ?>
                                                <td>
                                                </td>
                                                <?php
                                             }
                                             ?>
                                             <?php
                                             if ($flag % 3 == 0) {
                                                ?>
                                             </tr>
                                             <?php
                                          }
                                       }
                                       ?>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="line-separator"></div>
                           </div>
                        </div>
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
               <span>
                  <?php echo $gb_roles_and_capabilities; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-users"></i>
                     <?php echo $gb_roles_and_capabilities; ?>
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