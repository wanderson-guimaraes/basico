<?php
/*
 * This file is used for removing tables at Uninstall.
 *
 * @author   Tech Banker
 * @package  gallery-bank
 * @version  4.0.0
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
   die;
}
if (!current_user_can("manage_options")) {
   return;
} else {
   global $wpdb;
     if (is_multisite()) {
         $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
         foreach ($blog_ids as $blog_id) {
            switch_to_blog($blog_id);
            $gallery_bank_version_number = get_option("gallery-bank-pro-edition");
            if ($gallery_bank_version_number != "") {
               $get_other_settings = $wpdb->get_var
                   (
                   $wpdb->prepare
                       (
                       "SELECT meta_value from " . $wpdb->prefix . "gallery_bank_meta WHERE meta_key = %s", "other_settings"
                   )
               );

               $get_other_settings_data = maybe_unserialize($get_other_settings);

               if ($get_other_settings_data["remove_table_at_uninstall"] == "enable") {
                  $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gallery_bank");
                  $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gallery_bank_meta");

                  delete_option("gallery-bank-pro-edition");
                  delete_option("gallery-bank-api-details");
                  delete_option("external_updates-gallery-bank");
                  delete_option("foobox-free");
                  delete_option("gb_admin_notice");
                  delete_option("gallery-bank-welcome-page");
               }
            }
           restore_current_blog();
        }
    }
    else 
    {
        $gallery_bank_version_number = get_option("gallery-bank-pro-edition");
        if ($gallery_bank_version_number != "") {
           $get_other_settings = $wpdb->get_var
               (
               $wpdb->prepare
                   (
                   "SELECT meta_value from " . $wpdb->prefix . "gallery_bank_meta WHERE meta_key = %s", "other_settings"
               )
           );

           $get_other_settings_data = maybe_unserialize($get_other_settings);

           if ($get_other_settings_data["remove_table_at_uninstall"] == "enable") {
              $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gallery_bank");
              $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gallery_bank_meta");

              delete_option("gallery-bank-pro-edition");
              delete_option("gallery-bank-api-details");
              delete_option("external_updates-gallery-bank");
              delete_option("foobox-free");
              delete_option("gb_admin_notice");
              delete_option("gallery-bank-welcome-page");
           }
        }
    }
}