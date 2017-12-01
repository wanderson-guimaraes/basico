<?php
/*
 * This file is used for displaying admin bar menus.
 *
 * @author   Tech Banker
 * @package  gallery-bank/lib
 * @version  4.0.0
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
      $flag = 0;
      $role_capabilities = $wpdb->get_var
          (
          $wpdb->prepare
              (
              "SELECT meta_value from " . gallery_bank_meta() . "
				WHERE " . gallery_bank_meta() . " . meta_key = %s", "roles_and_capabilities_settings"
          )
      );
      $roles_and_capabilities_unserialized = maybe_unserialize($role_capabilities);
      $capabilities = explode(",", isset($roles_and_capabilities_unserialized["roles_and_capabilities"]) ? esc_attr($roles_and_capabilities_unserialized["roles_and_capabilities"]) : "1,1,1,0,0,0");

      if (is_super_admin()) {
         $gb_role = "administrator";
      } else {
         $gb_role = check_user_roles_gallery_bank($current_user);
      }
      switch ($gb_role) {
         case "administrator":
            $flag = $capabilities[0];
            break;

         case "author":
            $flag = $capabilities[1];
            break;

         case "editor":
            $flag = $capabilities[2];
            break;

         case "contributor":
            $flag = $capabilities[3];
            break;

         case "subscriber":
            $flag = $capabilities[4];
            break;
      }

      if ($flag == "1") {
         $wp_admin_bar->add_menu(array
             (
             "id" => "gallery_bank",
             "title" => "<img style=\"width:16px; height:16px; vertical-align:middle; margin-right:3px;\" src=" . GALLERY_BANK_PLUGIN_DIR_URL . "assets/global/img/icon.png" . "> " . $gallery_bank,
             "href" => admin_url("admin.php?page=gallery_bank"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_galleries",
             "title" => $gb_galleries,
             "href" => admin_url("admin.php?page=gallery_bank"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_albums",
             "title" => $gb_albums,
             "href" => admin_url("admin.php?page=gb_manage_albums"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_tags",
             "title" => $gb_tags,
             "href" => admin_url("admin.php?page=gb_manage_tags"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_layout_settings",
             "title" => $gb_layout_settings,
             "href" => admin_url("admin.php?page=gb_thumbnail_layout"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_lightboxes",
             "title" => $gb_lightboxes,
             "href" => admin_url("admin.php?page=gb_lightcase"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_general_settings",
             "title" => $gb_general_settings,
             "href" => admin_url("admin.php?page=gb_global_options"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_shortcode_generator",
             "title" => $gb_shortcode_generator,
             "href" => admin_url("admin.php?page=gb_thumbnail_layout_shortcode"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_other_settings",
             "title" => $gb_other_setting,
             "href" => admin_url("admin.php?page=gb_other_settings"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_roles_and_capabilities",
             "title" => $gb_roles_and_capabilities,
             "href" => admin_url("admin.php?page=gb_roles_and_capabilities"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_support_forum",
             "title" => $gb_feature_requests,
             "href" => "https://wordpress.org/support/plugin/gallery-bank",
             'meta' => array('target' => '_blank')
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_system_information",
             "title" => $gb_system_information,
             "href" => admin_url("admin.php?page=gb_system_information"),
         ));
         $wp_admin_bar->add_menu(array
             (
             "parent" => "gallery_bank",
             "id" => "gb_pricing_plans",
             "title" => $gb_pricing_plans,
             "href" => "https://gallery-bank.tech-banker.com/pricing/",
             'meta' => array('target' => '_blank')
         ));
      }
   }
}