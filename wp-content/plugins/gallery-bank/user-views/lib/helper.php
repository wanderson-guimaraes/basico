<?php
/**
 * This file is used for creating user_helper class.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/lib
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
/*
  Class Name: user_helper_gallery_bank
  Parameters: No
  Description: This Class is used for return data in unserialize form and convert HEX-color into RGB values.
  Created On: 01-6-2017 09:00AM
  Created By: Tech Banker Team
 */
if (!class_exists("user_helper_gallery_bank")) {

   class user_helper_gallery_bank {
      /*
        Function Name: get_unserialize_mode_data_gallery_bank
        Parameters: Yes($manage_data)
        Description: This function is used for return data in unserialize form.
        Created On: 01-6-2017 09:00AM
        Created By: Tech Banker Team
       */
      public static function get_unserialize_mode_data_gallery_bank($type, $meta_key) {
         global $wpdb;
         $manage_data = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT * FROM " . gallery_bank_meta() . " WHERE " . $type . " ORDER BY meta_id DESC ", $meta_key
             )
         );
         $unserialize_complete_data = array();
         foreach ($manage_data as $value) {
            $unserialize_data = unserialize($value->meta_value);
            $unserialize_data["id"] = $value->id;
            $unserialize_data["old_gallery_id"] = $value->old_gallery_id;
            $unserialize_data["meta_id"] = $value->meta_id;
            array_push($unserialize_complete_data, $unserialize_data);
         }
         return $unserialize_complete_data;
      }
      /*
        Function Name: hex2rgb_gallery_bank
        Parameters: Yes($hex)
        Description: This function is used for convert a normal HEX-color into RGB values.
        Created On: 01-6-2017 09:00AM
        Created By: Tech Banker Team
       */
      public static function hex2rgb_gallery_bank($hex) {
         $hex = str_replace("#", "", $hex);
         if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
         } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
         }
         $rgb = array($r, $g, $b);
         return $rgb;
      }
      /*
        Function Name: get_meta_value
        Parameters: Yes($meta_key)
        Description: This function is used for return data in unserialize form.
        Created On: 01-6-2017 09:00AM
        Created By: Tech Banker Team
       */
      public static function get_meta_value_gallery_bank($meta_key) {
         global $wpdb;
         $meta_value = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . gallery_bank_meta() . " WHERE meta_key = %s", $meta_key
             )
         );
         return unserialize($meta_value);
      }
      /*
        Function Name: gallery_bank_font_families
        Parameters: Yes($font_families)
        Description: This function is used for font-family.
        Created On: 01-6-2017 09:00AM
        Created By: Tech Banker Team
       */
      public static function font_families_gallery_bank($font_families) {
         foreach ($font_families as $font_family) {
            if ($font_family != "inherit") {
               if (strpos($font_family, ":") != false) {
                  $position = strpos($font_family, ":");
                  $font_style = (substr($font_family, $position + 4, 6) == "italic") ? "\r\n\tfont-style: italic !important;" : "";
                  $font_family_name[] = "'" . substr($font_family, 0, $position) . "'" . " !important;\r\n\tfont-weight: " . substr($font_family, $position + 1, 3) . " !important;" . $font_style;
               } else {
                  $font_family_name[] = (strpos($font_family, "&") != false) ? "'" . strstr($font_family, "&", 1) . "' !important;" : "'" . $font_family . "' !important;";
               }
            } else {
               $font_family_name[] = "inherit";
            }
         }
         return $font_family_name;
      }
      /*
        Function Name: unique_font_families
        Parameters: Yes($unique_font_families,$import_font_family)
        Description: This function is used for font-family.
        Created On: 01-6-2017 09:00AM
        Created By: Tech Banker Team
       */
      public static function unique_font_families_gallery_bank($unique_font_families) {
         $import_font_family = "";
         foreach ($unique_font_families as $font_family) {
            if ($font_family != "inherit") {
               $font_family = urlencode($font_family);
               if (is_ssl()) {
                  $import_font_family .= "@import url('https://fonts.googleapis.com/css?family=" . $font_family . "');\r\n";
               } else {
                  $import_font_family .= "@import url('http://fonts.googleapis.com/css?family=" . $font_family . "');\r\n";
               }
            }
         }
         return $import_font_family;
      }
   }
}