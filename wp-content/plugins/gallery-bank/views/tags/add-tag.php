<?php
/**
 * Template for adding a New Tag or Modifying an Existing Tag.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/tags
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
   } else if (tags_gallery_bank == "1") {
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
               <a href="admin.php?page=gb_manage_tags">
                  <?php echo $gb_tags; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo isset($_REQUEST["id"]) ? $gb_update_tag : $gb_add_tag; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon <?php echo isset($_REQUEST["id"]) ? "icon-custom-note" : "icon-custom-plus"; ?>"></i>
                     <?php echo isset($_REQUEST["id"]) ? $gb_update_tag : $gb_add_tag; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_add_tag">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_tag_name_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_tag_name_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_tag_name" id="ux_txt_tag_name" value="<?php echo isset($manage_tag_data["tag_name"]) ? esc_html($manage_tag_data["tag_name"]) : ""; ?>" placeholder="<?php echo $gb_add_tag_name_placeholder; ?>">
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_tag_description_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_tag_description_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true"><?php echo "( " . $gb_premium_edition . " )"; ?></span>
                           </label>
                           <textarea class="form-control" name="ux_txtarea_tag_description" id="ux_txtarea_tag_description" rows="5" placeholder="<?php echo $gb_add_tag_description_placeholder; ?>"><?php echo isset($manage_tag_data["tag_description"]) ? esc_html($manage_tag_data["tag_description"]) : ""; ?></textarea>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $gb_save_changes; ?>">
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
               <a href="admin.php?page=gb_manage_tags">
                  <?php echo $gb_tags; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo isset($_REQUEST["id"]) ? $gb_update_tag : $gb_add_tag; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-plus"></i>
                     <?php echo $gb_add_tag; ?>
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