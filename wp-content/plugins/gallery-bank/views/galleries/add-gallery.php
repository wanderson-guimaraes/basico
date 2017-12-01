<?php
/**
 * Template for add Gallery.
 *
 * @author 	Tech Banker
 * @package 	gallery-bank/views/galleries
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
   } else if (galleries_gallery_bank == "1") {
      global $wp_version;
      $gallery_images_effect_nonce = wp_create_nonce("gallery_images_effect_nonce");
      $watermark_image_nonce = wp_create_nonce("watermark_image_nonce");
      $save_image_detail_nonce = wp_create_nonce("save_image_detail_nonce");
      $get_previous_image_nonce = wp_create_nonce("get_previous_image_nonce");
      $generate_edited_image_thumbs_nonce = wp_create_nonce("generate_edited_image_thumbs_nonce");
      $scale_image_nonce = wp_create_nonce("scale_image_nonce");
      $get_original_image_dimension_nonce = wp_create_nonce("get_original_image_dimension_nonce");
      $crop_gallery_image_nonce = wp_create_nonce("crop_gallery_image_nonce");
      $gallery_images_restore_nonce = wp_create_nonce("gallery_images_restore_nonce");
      $gallery_images_rotate_nonce = wp_create_nonce("gallery_images_rotate_nonce");
      $gallery_images_flip_nonce = wp_create_nonce("gallery_images_flip_nonce");
      $gallery_images_move_nonce = wp_create_nonce("gallery_images_move_nonce");
      $gallery_images_copy_nonce = wp_create_nonce("gallery_images_copy_nonce");
      $gallery_update_data_nonce = wp_create_nonce("gallery_update_data_nonce");
      $gallery_images_delete_nonce = wp_create_nonce("gallery_images_delete_nonce");
      $upload_local_system_files_nonce = wp_create_nonce("upload_local_system_files_nonce");
      $gallery_upload_images_nonce = wp_create_nonce("gallery_upload_images_nonce");
      $gb_delete_uploaded_image_nonce = wp_create_nonce("gb_delete_uploaded_image_nonce");
      $gb_check_id_nonce = wp_create_nonce("gb_check_id_nonce");
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
               <a href="admin.php?page=gallery_bank">
                  <?php echo $gb_galleries; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? $gb_update_gallery : $gb_add_gallery; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? "icon-custom-note" : "icon-custom-plus"; ?>"></i>
                     <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? $gb_update_gallery : $gb_add_gallery; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gb_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gb_documentation ?></a><?php echo $gb_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gb_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_add_gallery">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gb_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_gallery_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_title_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">*</span>
                           </label>
                           <textarea rows="1" class="form-control" name="ux_txt_gallery_title" id="ux_txt_gallery_title" placeholder="<?php echo $gb_add_gallery_title_placeholder; ?>"><?php echo isset($get_gallery_meta_data_unserialize["gallery_title"]) ? esc_html($get_gallery_meta_data_unserialize["gallery_title"]) : ""; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gb_gallery_description_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_description_tooltip; ?>" data-placement="right"></i>
                           </label>
                           <?php
                           $gallery_description = isset($get_gallery_meta_data_unserialize["gallery_description"]) ? htmlspecialchars_decode($get_gallery_meta_data_unserialize["gallery_description"]) : "";
                           wp_editor($gallery_description, 'ux_heading_content', array('teeny' => TRUE, 'textarea_name' => 'description', 'media_buttons' => FALSE, 'textarea_rows' => 5));
                           ?>
                           <textarea rows="10" class="form-control" name="ux_txtarea_gallery_heading_content" style="display:none;" id="ux_txtarea_gallery_heading_content" placeholder="<?php echo $gb_add_gallery_description_placeholder; ?>"></textarea>
                        </div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs">
                              <li class="active">
                                 <a aria-expanded="false" href="#wp_media" data-toggle="tab">
                                    <?php echo $gb_add_gallery_wp_media_manager; ?>
                                 </a>
                              </li>
                              <li class="">
                                 <a aria-expanded="true" href="#local_system" data-toggle="tab">
                                    <?php echo $gb_add_gallery_local_system; ?>
                                 </a>
                              </li>
                              <li class="">
                                 <a aria-expanded="false" href="#upload_videos" data-toggle="tab">
                                    <?php echo $gb_add_gallery_upload_videos; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane" id="local_system">
                                 <div id="local_file_upload">
                                    <p><?php echo $gb_add_gallery_local_system_notification; ?></p>
                                 </div>
                              </div>
                              <div class="tab-pane active" id="wp_media" style="text-align:center">
                                 <div class="form-group">
                                    <a class="media-dashicons-style" id="wp_media_upload_button">
                                       <div class="dashicons dashicons-format-gallery"></div>
                                       <span>Add Media</span>
                                    </a>

                                    <p id="wp_media_upload_error_message" style="display:none;">
                                       <?php echo $gb_add_gallery_wp_media_notification; ?>
                                    </p>
                                 </div>
                              </div>
                              <div class="tab-pane" id="upload_videos">
                                 <div class="form-group">
                                    <h4>Give the URL to upload video</h4>
                                 </div>
                                 <div class="form-group">
                                    <label><?php echo $gb_add_gallery_videos_url; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_url_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" id="ux_text_videos_url" name="ux_text_videos_url" class="form-control" placeholder="<?php echo $gb_add_gallery_videos_url_placeholder; ?>" value="">
                                 </div>
                                 <div class="form-group" style="text-align:right">
                                    <input type="button" class="btn vivid-green" value="<?php echo $gb_add_gallery_embed_video; ?>" onclick="gallery_bank_upload_video_url('ux_text_videos_url')">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_seperator" class="line-separator"></div>
                        <div class="form-actions tabbable-custom" id="ux_div_bind_data">
                           <div class="table-top-margin">
                              <select name="ux_ddl_add_gallery" id="ux_ddl_add_gallery">
                                 <option value=""><?php echo $gb_bulk_action; ?></option>
                                 <option value="delete" style="color:red;"><?php echo $gb_add_gallery_option_delete_images . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="copy" style="color:red;"><?php echo $gb_add_gallery_option_copy_images . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="move" style="color:red;"><?php echo $gb_add_gallery_option_move_images . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="rotate_clockwise" style="color:red;"><?php echo $gb_add_gallery_option_rotate_clockwise_images . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="rotate_anticlockwise" style="color:red;"><?php echo $gb_add_gallery_option_rotate_anti_clockwise_images . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="flip_vertically" style="color:red;"><?php echo $gb_add_gallery_option_flip_images_vertically . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="flip_horizontally" style="color:red;"><?php echo $gb_add_gallery_option_flip_images_horizontally . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="restore_image" style="color:red;"><?php echo $gb_add_gallery_option_restore_image . " (" . $gb_premium_edition . " )"; ?></option>
                                 <option value="watermark_image" style="color:red;"><?php echo $gb_add_gallery_option_apply_watermark . " (" . $gb_premium_edition . " )"; ?></option>
                              </select>
                              <input type="button" class="btn vivid-green" name="ux_btn_bulk_action" id="ux_btn_bulk_action" value="<?php echo $gb_apply; ?>" onclick="premium_edition_notification_gallery_bank();">
                           </div>
                           <div id="ux_div_clone" style="display:none;">
                              <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_add_gallery_clone">
                                 <thead>
                                    <tr>
                                       <th class="chk-action">
                                          <input type="checkbox" name="ux_chk_add_gallery" id="ux_chk_add_gallery">
                                       </th>
                                       <th>
                                          <label class="control-label">
                                             <?php echo $gb_add_gallery_table_thumbnail; ?>
                                          </label>
                                       </th>
                                       <th>
                                          <label class="control-label">
                                             <?php echo $gb_add_gallery_table_file_details; ?>
                                          </label>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr id="ux_dynamic_tr_0" style="display:none;">
                                       <td>
                                          <input type="checkbox" id="ux_chk_select_items_" name="ux_chk_select_items_" value="" onclick="">
                                       </td>
                                       <td>
                                          <div class="image-style">
                                             <img file_type="" src="" id="ux_gb_file_" name="ux_gb_file_"/>
                                          </div>
                                          <div class="custom-div-gap">
                                             <input type="radio" name="ux_rdl_set_cover_image" id="ux_rdl_set_cover_image_" value="1" />
                                             <?php echo $gb_add_gallery_cover_image_title; ?>
                                          </div>
                                          <div class="custom-div-gap">
                                             <input type="checkbox" id="ux_exclude_image_" name="ux_exclude_image_" value="" />
                                             <?php echo $gb_add_gallery_exclude_title; ?>
                                          </div>
                                          <div class="custom-div-gap">
                                             <?php
                                             if ($wp_version >= "4.0") {
                                                ?>
                                                <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $gb_add_gallery_edit_tooltip; ?>" data-placement="right" onclick="premium_edition_notification_gallery_bank();">
                                                   <i class="icon-custom-note" ></i>
                                                   <?php echo $gb_edit_tooltip; ?>
                                                </a>
                                                <label>|</label>
                                                <?php
                                             }
                                             ?>
                                             <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $gb_add_gallery_delete_tooltip; ?>" data-placement="right" onclick="delete_upload_image_gallery_bank(this)" control_id="">
                                                <i class="icon-custom-trash" ></i>
                                                <?php echo $gb_delete; ?>
                                             </a>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $gb_add_gallery_image_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_image_tooltip; ?>" data-placement="right"></i>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <input type="text" placeholder="<?php echo $gb_add_gallery_image_placeholder; ?>" class="form-control" name="ux_txt_img_title_" id="ux_txt_img_title_" value="">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $gb_add_gallery_image_alt_text_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_image_alt_text_tooltip; ?>" data-placement="right"></i>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <input type="text" placeholder="<?php echo $gb_add_gallery_image_alt_text_placeholder; ?>" class="form-control" name="ux_img_alt_text_" id="ux_img_alt_text_" value="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_add_gallery_image_description_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_image_description_tooltip; ?>" data-placement="right"></i>
                                             </label>
                                             <div class="input-icon right">
                                                <textarea placeholder="<?php echo $gb_add_gallery_image_description_placeholder; ?>" class="form-control" name="ux_txt_img_desc_" id="ux_txt_img_desc_"></textarea>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_tags; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required"><?php echo "( " . $gb_premium_edition . " )"; ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <select id="ux_ddl_tags_" name="ux_ddl_tags_" class="form-control" multiple>
                                                   <?php
                                                   if (isset($tag_data_unserialize) && count($tag_data_unserialize) > 0) {
                                                      foreach ($tag_data_unserialize as $value) {
                                                         ?>
                                                         <option value="<?php echo intval($value["id"]) ?>"><?php echo esc_attr($value["tag_name"]) ?></option>
                                                         <?php
                                                      }
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_add_gallery_enable_url_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_enable_url_tooltip; ?>" data-placement="right"></i>
                                             </label>
                                             <div class="input-group">
                                                <label>
                                                   <input type="radio" name="ux_rdl_redirect_" id="ux_rdl_enable_redirect_" value="1" onclick="">
                                                   <?php echo $gb_enable; ?>
                                                </label>
                                                <label style="margin-left:15px;">
                                                   <input type="radio" checked="checked" name="ux_rdl_redirect_" id="ux_rdl_disable_redirect_" value="0" onclick="">
                                                   <?php echo $gb_disable; ?>
                                                </label>
                                             </div>
                                          </div>
                                          <div class="form-group" id="ux_div_url_redirect_" style="display:none;">
                                             <label class="control-label"><?php echo $gb_add_gallery_url_link_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_url_link_tooltip; ?>" data-placement="right"></i>
                                             </label>
                                             <div class="input-icon right">
                                                <input placeholder="<?php echo $gb_add_gallery_url_link_placeholder; ?>" class="form-control" type="text" name="ux_txt_img_url_" id="ux_txt_img_url_" value="http://">
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <!-- For Videos -->
                                    <tr id="ux_dynamic_tr_vd_0" style="display:none;">
                                       <td>
                                          <input type="checkbox" id="ux_chk_select_items_" name="ux_chk_select_items_" value="" onclick="">
                                       </td>
                                       <td>
                                          <div class="image-style">
                                             <img file_type="" src="" image_thumb_path="" id="ux_gm_file_" name="ux_gm_file_"/>
                                          </div>
                                          <div class="custom-div-gap">
                                             <input type="radio" name="ux_rdl_set_cover_image" id="ux_rdl_set_cover_image_" value="1" />
                                             <?php echo $gb_add_gallery_cover_image_title; ?>
                                          </div>
                                          <div class="custom-div-gap">
                                             <input type="checkbox" id="ux_exclude_image_" name="ux_exclude_image_" value="" />
                                             <?php echo $gb_add_gallery_exclude_title; ?>
                                          </div>
                                          <div class="custom-div-gap">
                                             <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $gb_add_gallery_delete_tooltip; ?>" data-placement="right" onclick="delete_upload_image_gallery_bank(this)" control_id="">
                                                <i class="icon-custom-trash" ></i>
                                                <?php echo $gb_delete; ?>
                                             </a>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $gb_add_gallery_video_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_tooltip; ?>" data-placement="right"></i>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <input type="text" placeholder="<?php echo $gb_add_gallery_video_placeholder; ?>" class="form-control" name="ux_txt_img_title_" id="ux_txt_img_title_" value="">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $gb_add_gallery_video_alt_text_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_alt_text_tooltip; ?>" data-placement="right"></i>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <input type="text" placeholder="<?php echo $gb_add_gallery_video_alt_text_placeholder; ?>" class="form-control" name="ux_img_alt_text_" id="ux_img_alt_text_" value="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_add_gallery_video_description_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_description_tooltip; ?>" data-placement="right"></i>
                                             </label>
                                             <div class="input-icon right">
                                                <textarea placeholder="<?php echo $gb_add_gallery_video_description_placeholder; ?>" class="form-control" name="ux_txt_img_desc_" id="ux_txt_img_desc_"></textarea>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_tags; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required"><?php echo "( " . $gb_premium_edition . " )"; ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <select id="ux_ddl_tags_" name="ux_ddl_tags_" class="form-control" multiple>
                                                   <?php
                                                   foreach ($tag_data_unserialize as $value) {
                                                      ?>
                                                      <option value="<?php echo $value["meta_id"] ?>"><?php echo $value["tag_name"] ?></option>
                                                      <?php
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gb_add_gallery_enable_url_video_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_enable_url_tooltip; ?>" data-placement="right"></i>
                                             </label>
                                             <div class="input-group">
                                                <label>
                                                   <input type="radio" name="ux_rdl_redirect_" id="ux_rdl_enable_redirect_" value="1" onclick="">
                                                   <?php echo $gb_enable; ?>
                                                </label>
                                                <label style="margin-left:15px;">
                                                   <input type="radio" checked="checked" name="ux_rdl_redirect_" id="ux_rdl_disable_redirect_" value="0" onclick="">
                                                   <?php echo $gb_disable; ?>
                                                </label>
                                             </div>
                                          </div>
                                          <div class="form-group" id="ux_div_url_redirect_" style="display:none;">
                                             <label class="control-label"><?php echo $gb_add_gallery_url_link_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_url_link_tooltip; ?>" data-placement="right"></i>
                                             </label>
                                             <div class="input-icon right">
                                                <input placeholder="<?php echo $gb_add_gallery_url_link_placeholder; ?>" class="form-control" type="text" name="ux_txt_img_url_" id="ux_txt_img_url_" value="http://">
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_add_gallery">
                              <thead>
                                 <tr>
                                    <th class="custom-checkbox chk-action">
                                       <input type="checkbox" class="custom-chkbox-operation" name="ux_chk_all_gallery" id="ux_chk_all_gallery">
                                    </th>
                                    <th class="custom-gallery-title">
                                       <label class="control-label">
                                          <?php echo $gb_add_gallery_table_thumbnail; ?>
                                       </label>
                                    </th>
                                    <th>
                                       <label class="control-label">
                                          <?php echo $gb_add_gallery_table_file_details; ?>
                                       </label>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 if (isset($get_gallery_image_meta_data_unserialize) && count($get_gallery_image_meta_data_unserialize) > 0) {
                                    foreach ($get_gallery_image_meta_data_unserialize as $pic) {
                                       ?>
                                       <tr id="ux_dynamic_tr_<?php echo intval($pic["id"]); ?>">
                                          <td style="width:5%;text-align:center">
                                             <input type="checkbox" file_type="<?php echo esc_attr($pic["file_type"]); ?>" id="ux_chk_select_items_<?php echo intval($pic["id"]); ?>" onclick="check_value_checkbox_gallery_bank();" name="ux_chk_select_items_<?php echo intval($pic["id"]); ?>" value="<?php echo intval($pic["id"]); ?>"/>
                                          </td>
                                          <td style="width:20%">
                                             <?php
                                             if ($pic["file_type"] == "image") {
                                                $filename_thumbs = GALLERY_BANK_THUMBS_NON_CROPPED_URL . $pic["image_name"];
                                                if (!file_exists(GALLERY_BANK_THUMBS_NON_CROPPED_DIR . $pic["image_name"])) {
                                                   if (strpos($pic["image_name"], ".") !== false) {
                                                      $filename_actual = explode(".", $pic["image_name"]);
                                                      $filename_thumbs = GALLERY_BANK_THUMBS_NON_CROPPED_URL . $filename_actual[0] . "." . strtoupper($filename_actual[1]);
                                                   } else {
                                                      $filename_thumbs = GALLERY_BANK_PLUGIN_DIR_URL . "/assets/admin/images/gallery-cover.png";
                                                   }
                                                }
                                                ?>
                                                <div class="image-style">
                                                   <img file_type="<?php echo esc_attr($pic["file_type"]); ?>" src="<?php echo $filename_thumbs; ?>" img_name="<?php echo esc_attr($pic["image_name"]); ?>" id="ux_gb_file_<?php echo intval($pic["id"]); ?>" name="ux_gb_file_<?php echo intval($pic["id"]); ?>" style="width: 100%;display: block;"/>
                                                </div>
                                                <?php
                                             } else {
                                                ?>
                                                <div class="image-style">
                                                   <img file_type="<?php echo esc_attr($pic["file_type"]); ?>" src="<?php echo esc_attr($pic["video_thumb"]); ?>"  id="ux_gm_file_<?php echo intval($pic["id"]); ?>" name="ux_gm_file_<?php echo intval($pic["id"]); ?>" style="width: 100%;display: block;"/>
                                                </div>
                                                <?php
                                             }
                                             ?>
                                             <div class="custom-div-gap">
                                                <input type="radio" name="ux_rdl_set_cover_image" onclick="set_cover_image_dynamically_gallery_bank(<?php echo $pic["id"]; ?>);" <?php echo intval($pic["gallery_cover_image"]) == 1 ? "checked=\"checked\"" : ""; ?> id="ux_rdl_set_cover_image_<?php echo intval($pic["id"]); ?>" value="1" image_data="<?php echo intval($pic["id"]); ?>"/> <?php echo $gb_add_gallery_cover_image_title; ?>
                                             </div>
                                             <div class="custom-div-gap">
                                                <input type="checkbox" id="ux_exclude_image_<?php echo intval($pic["id"]); ?>" <?php echo intval($pic["exclude_image"]) == 1 ? "checked=\"checked\"" : ""; ?> name="ux_exclude_image_<?php echo intval($pic["id"]); ?>" /><?php echo $gb_add_gallery_exclude_title; ?>
                                             </div>
                                             <div class="custom-div-gap">
                                                <?php
                                                if ($wp_version >= "4.0") {
                                                   if ($pic["file_type"] == "image") {
                                                      ?>
                                                      <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $gb_add_gallery_edit_tooltip; ?>" data-placement="right" id="ux_a_edit_<?php echo intval($pic["id"]); ?>" onclick="premium_edition_notification_gallery_bank();" control_id="<?php echo intval($pic["id"]); ?>">
                                                         <i class="icon-custom-note" ></i> <?php echo $gb_edit_tooltip; ?>
                                                      </a><label>|</label>
                                                      <?php
                                                   }
                                                }
                                                ?>
                                                <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $gb_add_gallery_delete_tooltip; ?>" data-placement="right" onclick="delete_upload_image_gallery_bank(this)" control_id="<?php echo intval($pic["id"]); ?>">
                                                   <i class="icon-custom-trash" ></i> <?php echo $gb_delete; ?>
                                                </a>
                                             </div>
                                          </td>
                                          <td>
                                             <?php
                                             if ($pic["file_type"] == "image") {
                                                ?>
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label class="control-label"><?php echo $gb_add_gallery_image_title; ?> :
                                                            <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_image_tooltip; ?>" data-placement="right"></i>
                                                         </label>
                                                         <div class="input-icon right">
                                                            <input type="text" placeholder="<?php echo $gb_add_gallery_image_placeholder; ?>" class="form-control edit" name="ux_txt_img_title_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_title_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr($pic["image_title"]); ?>"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label class="control-label"><?php echo $gb_add_gallery_image_alt_text_title; ?> :
                                                            <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_image_alt_text_tooltip; ?>" data-placement="right"></i>
                                                         </label>
                                                         <div class="input-icon right">
                                                            <input type="text" placeholder="<?php echo $gb_add_gallery_image_alt_text_placeholder; ?>" class="form-control edit" name="ux_img_alt_text_<?php echo intval($pic["id"]); ?>" id="ux_img_alt_text_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr(stripcslashes(urldecode($pic["alt_text"]))); ?>"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label"><?php echo $gb_add_gallery_image_description_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_image_description_tooltip; ?>" data-placement="right"></i>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <textarea placeholder="<?php echo $gb_add_gallery_image_description_placeholder; ?>" class="form-control" rows="3" name="ux_txt_img_desc_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_desc_<?php echo intval($pic["id"]); ?>"><?php echo stripcslashes(urldecode($pic["image_description"])); ?></textarea>
                                                   </div>
                                                </div>
                                                <?php
                                             } else {
                                                ?>
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label class="control-label"><?php echo $gb_add_gallery_video_title; ?> :
                                                            <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_tooltip; ?>" data-placement="right"></i>
                                                         </label>
                                                         <div class="input-icon right">
                                                            <input type="text" placeholder="<?php echo $gb_add_gallery_video_placeholder; ?>" class="form-control edit" name="ux_txt_img_title_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_title_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr(stripcslashes(urldecode($pic["image_title"]))); ?>"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label class="control-label"><?php echo $gb_add_gallery_video_alt_text_title; ?> :
                                                            <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_alt_text_tooltip; ?>" data-placement="right"></i>
                                                         </label>
                                                         <div class="input-icon right">
                                                            <input type="text" placeholder="<?php echo $gb_add_gallery_video_alt_text_placeholder; ?>" class="form-control edit" name="ux_img_alt_text_<?php echo intval($pic["id"]); ?>" id="ux_img_alt_text_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr(stripcslashes(urldecode($pic["alt_text"]))); ?>"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label"><?php echo $gb_add_gallery_video_description_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_video_description_tooltip; ?>" data-placement="right"></i>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <textarea placeholder="<?php echo $gb_add_gallery_video_description_placeholder; ?>" class="form-control" rows="3" name="ux_txt_img_desc_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_desc_<?php echo intval($pic["id"]); ?>"><?php echo stripcslashes(urldecode($pic["image_description"])); ?></textarea>
                                                   </div>
                                                </div>
                                                <?php
                                             }
                                             ?>
                                             <div class="form-group">
                                                <label class="control-label"><?php echo $gb_tags; ?> :
                                                   <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_tag_tooltip; ?>" data-placement="right"></i>
                                                   <span class="required"><?php echo "( " . $gb_premium_edition . " )"; ?></span>
                                                </label>
                                                <div class="input-icon right">
                                                   <select name="ux_ddl_tags_<?php echo intval($pic["id"]); ?>[]" id="ux_ddl_tags_<?php echo intval($pic["id"]); ?>" class="form-control" multiple>
                                                      <?php
                                                      $tag_array = isset($pic["tags"]) ? (is_array($pic["tags"]) ? $pic["tags"] : array()) : "";
                                                      if (isset($tag_data_unserialize) && count($tag_data_unserialize) > 0) {
                                                         foreach ($tag_data_unserialize as $value) {
                                                            ?>
                                                            <option onclick="remove_selected_attr_gallery_bank(this.id)" id="ux_tag_<?php echo intval($value["id"]) . "_" . intval($pic["id"]); ?>" value="<?php echo $value["id"] ?>" class="<?php echo in_array($value["id"], $tag_array) == true ? "tag" : ""; ?>" <?php echo in_array($value["id"], $tag_array) == true ? "selected" : ""; ?>><?php echo $value["tag_name"] ?></option>
                                                            <?php
                                                         }
                                                      }
                                                      ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label"> <?php echo $gb_add_gallery_enable_url_title; ?> :
                                                   <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_enable_url_tooltip; ?>" data-placement="right"></i>
                                                </label>
                                                <div class="input-group">
                                                   <label>
                                                      <input type="radio" <?php echo intval($pic["enable_redirect"]) == 1 ? "checked=\"checked\"" : ""; ?> name="ux_rdl_redirect_<?php echo intval($pic["id"]); ?>" id="ux_rdl_enable_redirect_<?php echo intval($pic["id"]); ?>" value="1" onclick="show_image_url_redirect_gallery_bank(<?php echo intval($pic["id"]); ?>);"><?php echo $gb_enable; ?>
                                                   </label>
                                                   <label style="margin-left:15px;">
                                                      <input type="radio" <?php echo intval($pic["enable_redirect"]) == 0 ? "checked=\"checked\"" : ""; ?> name="ux_rdl_redirect_<?php echo intval($pic["id"]); ?>" id="ux_rdl_disable_redirect_<?php echo intval($pic["id"]); ?>" value="0" onclick="show_image_url_redirect_gallery_bank(<?php echo intval($pic["id"]); ?>);"><?php echo $gb_disable; ?>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="form-group" id="ux_div_url_redirect_<?php echo intval($pic["id"]); ?>" style="display: none;">
                                                <label class="control-label"><?php echo $gb_add_gallery_url_link_title; ?> :
                                                   <i class="icon-custom-question tooltips" data-original-title="<?php echo $gb_add_gallery_url_link_tooltip; ?>" data-placement="right"></i>
                                                </label>
                                                <div class="input-icon right">
                                                   <input placeholder="<?php echo $gb_add_gallery_url_link_placeholder; ?>" class="form-control" type="text" name="ux_txt_img_url_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_url_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr($pic["redirect_url"]); ?>"/>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       <?php
                                    }
                                 }
                                 ?>
                              </tbody>
                           </table>
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
               <a href="admin.php?page=gallery_bank">
                  <?php echo $gb_galleries; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? $gb_update_gallery : $gb_add_gallery; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon icon-custom-plus"></i>
                     <?php echo $gb_add_gallery; ?>
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