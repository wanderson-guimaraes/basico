<?php
/**
 * Template for Manage Album.
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
                  <?php echo $gb_manage_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-folder"></i>
                     <?php echo $gb_manage_albums; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_manage_album">
                     <div class="form-body">
                        <div class="table-top-margin">
                           <select name="ux_ddl_manage_albums" id="ux_ddl_manage_albums">
                              <option value=""><?php echo $gb_bulk_action; ?></option>
                              <option value="delete_albums" style="color:red;"><?php echo $gb_manage_delete_album . " ( " . $gb_premium_edition . " )"; ?></option>
                              <option value="duplicate_albums" style="color:red;"><?php echo $gb_manage_duplicate_album . " ( " . $gb_premium_edition . " )"; ?></option>
                           </select>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_manage_albums" id="ux_btn_apply_manage_albums" value="<?php echo $gb_apply; ?>" onclick="premium_edition_notification_gallery_bank();">
                           <a href="admin.php?page=gb_add_album" class="btn vivid-green"><?php echo $gb_add_album; ?></a>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_delete_all_albums" id="ux_btn_apply_delete_all_albums" value="<?php echo $gb_delete_all_albums; ?>" onclick="premium_edition_notification_gallery_bank();">
                        </div>
                        <div class="line-separator"></div>
                        <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_manage_album">
                           <thead>
                              <tr>
                                 <th class="custom-checkbox chk-action">
                                    <input type="checkbox" name="ux_chk_all_albums" id="ux_chk_all_albums">
                                 </th>
                                 <th class="custom-gallery-title">
                                    <label class="control-label">
                                       <?php echo $gb_manage_album_cover_image; ?>
                                    </label>
                                 </th>
                                 <th class="custom-gallery-description">
                                    <label class="control-label">
                                       <?php echo $gb_manage_album_overview; ?>
                                    </label>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
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
                  <?php echo $gb_manage_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-folder"></i>
                     <?php echo $gb_manage_albums; ?>
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