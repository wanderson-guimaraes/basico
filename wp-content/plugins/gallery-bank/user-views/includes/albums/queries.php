<?php
/**
 * This file is used for fetching data from database.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/albums
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
if (isset($id)) {
   if (isset($type) && $type != "") {
      $gallery_ids = urldecode(isset($show_albums) ? $show_albums : $album_id);
      if ($id == "all") {
         $album_data = $wpdb->get_row(
             $wpdb->prepare("SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s", "gallery_data")
         );
      } else if (preg_match("/^\d+(?:,\d+)*$/", $gallery_ids)) {
         $album_data = $wpdb->get_row(
             $wpdb->prepare("SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s AND old_gallery_id IN (%s)", "gallery_data", $gallery_ids)
         );
      } else {
         $album_data = $wpdb->get_row(
             $wpdb->prepare("SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s AND old_gallery_id = %d", "gallery_data", $id)
         );
      }
      if (count($album_data) > 0) {
         $display_album_data = unserialize($album_data->meta_value);
         if ($id == "all") {
            $gallery_data_unserialize = user_helper_gallery_bank::get_unserialize_mode_data_gallery_bank("meta_key = %s ", "gallery_data");
         } else if (preg_match("/^\d+(?:,\d+)*$/", $gallery_ids)) {
            $gallery_data_unserialize = user_helper_gallery_bank::get_unserialize_mode_data_gallery_bank("old_gallery_id IN ($gallery_ids) AND meta_key = %s ", "gallery_data");
         } else {
            $gallery_data_unserialize = user_helper_gallery_bank::get_unserialize_mode_data_gallery_bank("old_gallery_id = $id AND meta_key = %s ", "gallery_data");
         }
         if (count($gallery_data_unserialize) > 0) {
            if (isset($album_type)) {
               switch ($album_type) {
                  case "compact_album":
                     $compact_album_layout_settings = user_helper_gallery_bank::get_meta_value_gallery_bank("compact_album_layout_settings");
                     break;
               }
            }
         }
      }
   } else {
      $album_data = $wpdb->get_row(
          $wpdb->prepare("SELECT * FROM " . gallery_bank_meta() . " WHERE meta_key = %s AND meta_id = %d", "album_data", $id)
      );

      if (count($album_data) > 0) {

         $display_album_data = unserialize($album_data->meta_value);

         $gallery_ids = implode(",", $display_album_data["selected_galleries"]);

         $gallery_data_unserialize = user_helper_gallery_bank::get_unserialize_mode_data_gallery_bank("meta_id IN($gallery_ids) AND meta_key = %s ", "gallery_data");

         if (isset($album_type)) {
            switch ($album_type) {
               case "compact_album":
                  $compact_album_layout_settings = user_helper_gallery_bank::get_meta_value_gallery_bank("compact_album_layout_settings");
                  break;
            }
         }
      }
   }
}