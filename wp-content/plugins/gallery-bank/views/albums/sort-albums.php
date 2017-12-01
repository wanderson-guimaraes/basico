<?php
/**
 * Template for Sort Album.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/album
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
   } else if (albums_gallery_bank == "1") {
      $thumbnail_dimensions_gallery_bank = explode(",", isset($thumbnail_dimensions_data["global_options_thumbnail_dimensions"]) ? $thumbnail_dimensions_data["global_options_thumbnail_dimensions"] : "200,150");
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
               <a href="admin.php?page=gb_manage_albums">
                  <?php echo $gb_albums; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_sort_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-list"></i>
                     <?php echo $gb_sort_albums; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_sort_album">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" id="ux_ddl_submit" name="ux_ddl_submit" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_choose_album_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_sort_albums_choose_album_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "( " . $gb_premium_edition . " )"; ?></span>
                           </label>
                           <select name="ux_ddl_sort_albums" id="ux_ddl_sort_albums" class="form-control" onchange="choose_album_gallery_bank(this.value);">
                              <option value=""><?php echo $gb_sort_albums_choose_album_title; ?></option>
                              <?php
                              foreach ($sort_albums_get_title as $value) {
                                 ?>
                                 <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["album_name"]) != "" ? esc_attr($value["album_name"]) : $gb_untitled_album; ?></option>
                                 <?php
                              }
                              ?>
                           </select>
                        </div>
                        <div id="ux_div_sort_images" >
                           <ul class="custom-top-space-img" id="ux_ul_sort_images">
                           </ul>
                           <div style="clear:both;"></div>
                        </div>
                        <div class="line-separator" style="clear:both;"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" id="ux_ddl_submit" name="ux_ddl_submit" value="<?php echo $gb_save_changes; ?>">
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
               <a href="admin.php?page=gb_manage_albums">
                  <?php echo $gb_albums; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gb_sort_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-list"></i>
                     <?php echo $gb_sort_albums; ?>
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