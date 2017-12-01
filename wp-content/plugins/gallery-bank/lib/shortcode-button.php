<?php
/**
 * Template for Short-code Button
 *
 * @author 	tech-banker
 * @package gallery-bank/lib
 * @version	4.0.15
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
   } else {
      ?>
      <div id="gallery-bank" style="display:none;">
         <div class="fluid-layout responsive">
            <div style="padding:20px 0 10px -1px;">
               <h3 class="label-shortcode"><?php echo "Insert Gallery Bank Shortcode"; ?></h3>
               <span>
                  <i><?php echo "Select a Gallery below to add it to your post or page"; ?></i>
               </span>
            </div>
            <div class="layout-span12 responsive" style="padding:15px 15px 0 0;">
               <div class="layout-control-group">
                  <label class="custom-layout-label" for="ux_form_name"><?php echo $gb_choose_gallery_title; ?> : </label>
                  <select id="ux_ddl_gallery_id" class="layout-span9">
                     <option value=""><?php echo $gb_choose_gallery_title; ?>  </option>
                     <?php
                     global $wpdb;
                     $manage_data = $wpdb->get_results
                         (
                         $wpdb->prepare
                             (
                             "SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s ORDER BY meta_id DESC", "gallery_data"
                         )
                     );
                     $thumbnail_layout_get_data = array();
                     foreach ($manage_data as $value) {
                        $unserialize_data = maybe_unserialize($value->meta_value);
                        $unserialize_data["id"] = $value->id;
                        $unserialize_data["meta_id"] = $value->old_gallery_id;
                        array_push($thumbnail_layout_get_data, $unserialize_data);
                     }
                     foreach ($thumbnail_layout_get_data as $value) {
                        ?>
                        <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["gallery_title"]) && $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $gb_untitled; ?></option>
                        <?php
                     }
                     ?>
                  </select>
               </div>
               <div class="layout-control-group" style="padding:20px 0 0 0;">
                  <label class="custom-layout-label" for="ux_gallery_template"><?php echo $gb_gallery_template; ?> : </label>
                  <select id="ux_ddl_gallery_template" class="layout-span9">
                     <option value="thumbnail_layout"><?php echo $gb_grid_style_layout; ?>  </option>
                     <option value="masonry_layout"><?php echo $gb_masonry_style_layout; ?>  </option>
                  </select>
               </div>
               <div class="layout-control-group" style="padding:20px 0 0 0;">
                  <label class="custom-layout-label"><?php echo $gb_alignment_title; ?> : </label>
                  <select id="ux_ddl_alignment" class="layout-span3">
                     <option value="left"><?php echo $gb_left; ?></option>
                     <option value="center"><?php echo $gb_center; ?></option>
                     <option value="right"><?php echo $gb_right; ?></option>
                  </select>
                  <label class="custom-layout-label description-contact-bank"><?php echo $gb_no_of_columns_title; ?> :</label>
                  <input type="text" id="ux_txt_columns" value="4" class="layout-span3">
               </div>
               <div class="layout-control-group" style="padding:20px 0 0 0;">
                  <label class="custom-layout-label"><?php echo $gb_gallery_title; ?> : </label>
                  <select id="ux_ddl_gallery_title" class="layout-span3">
                     <option value="show"><?php echo $gb_show; ?></option>
                     <option value="hide"><?php echo $gb_hide; ?></option>
                  </select>
                  <label class="custom-layout-label description-contact-bank"><?php echo $gb_gallery_description_title; ?> :</label>
                  <select id="ux_ddl_gallery_description" class="layout-span3">
                     <option value="show"><?php echo $gb_show; ?></option>
                     <option value="hide"><?php echo $gb_hide; ?></option>
                  </select>
               </div>
               <div class="layout-control-group" style="padding:20px 0 0 0;">
                  <label class="custom-layout-label"><?php echo $gb_thumbnail_title; ?> : </label>
                  <select id="ux_ddl_thumbnail_title" class="layout-span3">
                     <option value="show"><?php echo $gb_show; ?></option>
                     <option value="hide"><?php echo $gb_hide; ?></option>
                  </select>
                  <label class="custom-layout-label description-contact-bank"><?php echo $gb_thumbnail_description_title; ?> :</label>
                  <select id="ux_ddl_thumbnail_description" class="layout-span3">
                     <option value="show"><?php echo $gb_show; ?></option>
                     <option value="hide"><?php echo $gb_hide; ?></option>
                  </select>
               </div>
               <div class="layout-control-group" style="padding:25px 0 0 0;">
                  <label class="custom-layout-label"></label>
                  <input type="button" class="button-primary" value="<?php echo "Insert"; ?>" onclick="generate_shortcode_gallery_bank();"/>&nbsp;&nbsp;&nbsp;
                  <a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php echo "Cancel"; ?></a>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         function generate_shortcode_gallery_bank()
         {
            var gallery_id = jQuery("#ux_ddl_gallery_id").val();
            var gallery_title = jQuery("#ux_ddl_gallery_title").val();
            var gallery_description = jQuery("#ux_ddl_gallery_description").val();
            var thumbnail_title = jQuery("#ux_ddl_thumbnail_title").val();
            var thumbnail_description = jQuery("#ux_ddl_thumbnail_description").val();
            var gallery_template = jQuery("#ux_ddl_gallery_template").val();
            var gallery_alignment = jQuery("#ux_ddl_alignment").val();
            var gallery_columns = jQuery("#ux_txt_columns").val();
            if (gallery_id == "")
            {
               alert("<?php echo $gb_choose_gallery; ?>");
               return;
            }
            window.send_to_editor("[gallery_bank source_type=\"gallery\" id=\"" + gallery_id + "\" layout_type=\"" + gallery_template + "\" alignment=\"" + gallery_alignment + "\" lightbox_type=\"foo_box_free_edition\" order_images_by=\"sort_asc\" sort_images_by=\"sort_order\" gallery_title=\"" + gallery_title + "\" gallery_description=\"" + gallery_description + "\" thumbnail_title=\"" + thumbnail_title + "\" thumbnail_description=\"" + thumbnail_description + "\" filters=\"disable\" lazy_load=\"disable\" search_box=\"disable\" order_by=\"disable\" columns=\"" + gallery_columns + "\" page_navigation=\"disable\" animation_effects=\"fadeIn\" special_effects=\"none\"][/gallery_bank]");
         }
      </script>
      <?php
   }
}