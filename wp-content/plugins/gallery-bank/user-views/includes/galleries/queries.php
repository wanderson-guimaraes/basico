<?php
/**
 * This file is used for fetching data from database.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/galleries
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
if (isset($id)) {
   if (isset($_REQUEST["gallery_id"])) {
      if ($id == intval($_REQUEST["album_id"])) {
         $id = intval($_REQUEST["gallery_id"]);
         $gallery_data = $wpdb->get_row(
             $wpdb->prepare("SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s AND old_gallery_id = %d", "gallery_data", $id)
         );
      }
   } else {
      $gallery_data = $wpdb->get_row(
          $wpdb->prepare("SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s AND old_gallery_id = %d", "gallery_data", $id)
      );
   }

   if (isset($gallery_data) && count($gallery_data) > 0) {
      $display_gallery_data = unserialize($gallery_data->meta_value);
      if (isset($display) && $display == "selected") {
         $images_count = isset($no_of_images) && $no_of_images != "" ? $no_of_images : "";
         $gallery_image_data_detail = array();
         $manage_data = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT * FROM " . gallery_bank_meta() . " WHERE old_gallery_id = %d AND meta_key != %s ORDER BY meta_id DESC LIMIT $images_count", $id, "gallery_data"
             )
         );
         $unserialize_complete_data = array();
         foreach ($manage_data as $value) {
            $unserialize_data = unserialize($value->meta_value);
            $unserialize_data["id"] = $value->id;
            $unserialize_data["old_gallery_id"] = $value->old_gallery_id;
            $unserialize_data["meta_id"] = $value->meta_id;
            array_push($gallery_image_data_detail, $unserialize_data);
         }
      } else {
         $gallery_image_data_detail = user_helper_gallery_bank::get_unserialize_mode_data_gallery_bank("old_gallery_id = $id AND meta_key != %s ", "gallery_data");
      }
      $gallery_image_detail_only_included_images = array();
      //loop to only include images that were not exculded to be displayed.
      foreach ($gallery_image_data_detail as $images) {
         if ($images["exclude_image"] != 1) {
            $gallery_image_detail_only_included_images[] = $images;
         }
      }


      if (isset($lightbox_type)) {
         switch (esc_attr($lightbox_type)) {
            case "foo_box_free_edition":
               $foobox_meta_data = user_helper_gallery_bank::get_meta_value_gallery_bank("foo_box_settings");
               break;
         }
      }
      if (isset($layout_type)) {
         switch ($layout_type) {
            case "thumbnail_layout":
               $thumbnail_layout_settings = user_helper_gallery_bank::get_meta_value_gallery_bank("thumbnail_layout_settings");
               break;

            case "masonry_layout" :
               $masonry_layout_settings = user_helper_gallery_bank::get_meta_value_gallery_bank("masonry_layout_settings");
               break;
         }
      }

      if (isset($album_type)) {
         switch ($album_type) {
            case "compact_album":
               $compact_album_layout_settings = user_helper_gallery_bank::get_meta_value_gallery_bank("compact_album_layout_settings");
               break;
         }
      }
   }
}