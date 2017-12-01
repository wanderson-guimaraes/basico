<?php
/**
 * This file is used for sidebar menus.
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
            $privileges = "administrator_privileges";
            $flag = $capabilities[0];
            break;

         case "author":
            $privileges = "author_privileges";
            $flag = $capabilities[1];
            break;

         case "editor":
            $privileges = "editor_privileges";
            $flag = $capabilities[2];
            break;

         case "contributor":
            $privileges = "contributor_privileges";
            $flag = $capabilities[3];
            break;

         case "subscriber":
            $privileges = "subscriber_privileges";
            $flag = $capabilities[4];
            break;

         default:
            $privileges = "other_privileges";
            $flag = $capabilities[5];
      }
      $privileges_value = "0,0,0,0,0,0,0,0,0,0,0,0";
      foreach ($roles_and_capabilities_unserialized as $key => $value) {
         if ($privileges == $key) {
            $privileges_value = $value;
            break;
         }
      }
      $full_control = explode(",", $privileges_value);
      if (!defined("full_control")) {
         define("full_control", "$full_control[0]");
      }
      if (!defined("galleries_gallery_bank")) {
         define("galleries_gallery_bank", "$full_control[1]");
      }
      if (!defined("albums_gallery_bank")) {
         define("albums_gallery_bank", "$full_control[2]");
      }
      if (!defined("tags_gallery_bank")) {
         define("tags_gallery_bank", "$full_control[3]");
      }
      if (!defined("layout_settings_gallery_bank")) {
         define("layout_settings_gallery_bank", "$full_control[4]");
      }
      if (!defined("lightboxes_gallery_bank")) {
         define("lightboxes_gallery_bank", "$full_control[5]");
      }
      if (!defined("general_settings_gallery_bank")) {
         define("general_settings_gallery_bank", "$full_control[6]");
      }
      if (!defined("shortcode_generator_gallery_bank")) {
         define("shortcode_generator_gallery_bank", "$full_control[7]");
      }
      if (!defined("other_settings_gallery_bank")) {
         define("other_settings_gallery_bank", "$full_control[8]");
      }
      if (!defined("roles_and_capabilities_gallery_bank")) {
         define("roles_and_capabilities_gallery_bank", "$full_control[9]");
      }
      if (!defined("system_information_gallery_bank")) {
         define("system_information_gallery_bank", "$full_control[10]");
      }
      $check_gallery_bank_wizard = get_option("gallery-bank-welcome-page");
      if ($flag == "1") {
         $icon = GALLERY_BANK_PLUGIN_DIR_URL . "assets/global/img/icon.png";
         if ($check_gallery_bank_wizard) {
            add_menu_page($gallery_bank, $gallery_bank, "read", "gallery_bank", "", $icon);
         } else {
            add_menu_page($gallery_bank, $gallery_bank, "read", "gb_welcome_gallery_bank", "", plugins_url("assets/global/img/icon.png", dirName(__FILE__)));
            add_submenu_page($gallery_bank, $gallery_bank, "", "read", "gb_welcome_gallery_bank", "gb_welcome_gallery_bank");
         }
         add_submenu_page("gallery_bank", $gb_galleries, $gb_galleries, "read", "gallery_bank", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gallery_bank");
         add_submenu_page("gallery_bank", $gb_albums, $gb_albums, "read", "gb_manage_albums", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_manage_albums");
         add_submenu_page("gallery_bank", $gb_tags, $gb_tags, "read", "gb_manage_tags", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_manage_tags");
         add_submenu_page("gallery_bank", $gb_layout_settings, $gb_layout_settings, "read", "gb_thumbnail_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_thumbnail_layout");
         add_submenu_page("gallery_bank", $gb_lightboxes, $gb_lightboxes, "read", "gb_lightcase", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_lightcase");
         add_submenu_page("gallery_bank", $gb_general_settings, $gb_general_settings, "read", "gb_global_options", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_global_options");
         add_submenu_page("gallery_bank", $gb_shortcode_generator, $gb_shortcode_generator, "read", "gb_slideshow_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_slideshow_layout_shortcode");
         add_submenu_page("gallery_bank", $gb_other_setting, $gb_other_setting, "read", "gb_other_settings", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_other_settings");
         add_submenu_page("gallery_bank", $gb_roles_and_capabilities, $gb_roles_and_capabilities, "read", "gb_roles_and_capabilities", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_roles_and_capabilities");
         add_submenu_page("gallery_bank", $gb_feature_requests, $gb_feature_requests, "read", "https://wordpress.org/support/plugin/gallery-bank");
         add_submenu_page("gallery_bank", $gb_system_information, $gb_system_information, "read", "gb_system_information", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_system_information");

         add_submenu_page($gb_galleries, $gb_add_gallery, "", "read", "gb_add_gallery", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_add_gallery");
         add_submenu_page($gb_galleries, $gb_sort_galleries, "", "read", "gb_sort_galleries", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_sort_galleries");

         add_submenu_page($gb_albums, $gb_add_album, "", "read", "gb_add_album", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_add_album");
         add_submenu_page($gb_albums, $gb_sort_albums, "", "read", "gb_sort_albums", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_sort_albums");

         add_submenu_page($gb_tags, $gb_add_tag, "", "read", "gb_add_tag", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_add_tag");
         add_submenu_page($gb_tags, $gb_manage_tags, "", "read", "gb_manage_tags", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_manage_tags");

         add_submenu_page($gb_layout_settings, $gb_thumbnail_layout, "", "read", "gb_thumbnail_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_thumbnail_layout");
         add_submenu_page($gb_layout_settings, $gb_masonry_layout, "", "read", "gb_masonry_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_masonry_layout");
         add_submenu_page($gb_layout_settings, $gb_slideshow_layout, "", "read", "gb_slideshow_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_slideshow_layout");
         add_submenu_page($gb_layout_settings, $gb_image_browser_layout, "", "read", "gb_image_browser_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_image_browser_layout");
         add_submenu_page($gb_layout_settings, $gb_justified_grid_layout, "", "read", "gb_justified_grid_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_justified_grid_layout");
         add_submenu_page($gb_layout_settings, $gb_blog_style_layout, "", "read", "gb_blog_style_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_blog_style_layout");
         add_submenu_page($gb_layout_settings, $gb_compact_album_layout, "", "read", "gb_compact_album_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_compact_album_layout");
         add_submenu_page($gb_layout_settings, $gb_extended_album_layout, "", "read", "gb_extended_album_layout", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_extended_album_layout");
         add_submenu_page($gb_layout_settings, $gb_custom_css, "", "read", "gb_custom_css", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_custom_css");

         add_submenu_page($gb_lightboxes, $gb_fancy_box, "", "read", "gb_fancy_box", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_fancy_box");
         add_submenu_page($gb_lightboxes, $gb_color_box, "", "read", "gb_color_box", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_color_box");
         add_submenu_page($gb_lightboxes, $gb_foo_box_free_edition, "", "read", "gb_foo_box_free_edition", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_foo_box_free_edition");
         add_submenu_page($gb_lightboxes, $gb_nivo_lightbox, "", "read", "gb_nivo_lightbox", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_nivo_lightbox");
         add_submenu_page($gb_lightboxes, $gb_lightcase, "", "read", "gb_lightcase", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_lightcase");

         add_submenu_page($gb_general_settings, $gb_global_options, "", "read", "gb_global_options", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_global_options");
         add_submenu_page($gb_general_settings, $gb_lazy_load_settings, "", "read", "gb_lazy_load_settings", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_lazy_load_settings");
         add_submenu_page($gb_general_settings, $gb_filter_settings, "", "read", "gb_filter_settings", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_filter_settings");
         add_submenu_page($gb_general_settings, $gb_order_by_settings, "", "read", "gb_order_by_settings", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_order_by_settings");
         add_submenu_page($gb_general_settings, $gb_search_box_settings, "", "read", "gb_search_box_settings", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_search_box_settings");
         add_submenu_page($gb_general_settings, $gb_page_navigation, "", "read", "gb_page_navigation", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_page_navigation");
         add_submenu_page($gb_general_settings, $gb_watermark_settings, "", "read", "gb_watermark_settings", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_watermark_settings");
         add_submenu_page($gb_general_settings, $gb_advertisement, "", "read", "gb_advertisement", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_advertisement");

         add_submenu_page($gb_shortcode_generator, $gb_thumbnail_layout, "", "read", "gb_thumbnail_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_thumbnail_layout_shortcode");
         add_submenu_page($gb_shortcode_generator, $gb_masonry_layout, "", "read", "gb_masonry_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_masonry_layout_shortcode");
         add_submenu_page($gb_shortcode_generator, $gb_slideshow_layout, "", "read", "gb_slideshow_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_slideshow_layout_shortcode");
         add_submenu_page($gb_shortcode_generator, $gb_image_browser_layout, "", "read", "gb_image_browser_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_image_browser_layout_shortcode");
         add_submenu_page($gb_shortcode_generator, $gb_justified_grid_layout, "", "read", "gb_justified_grid_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_justified_grid_layout_shortcode");
         add_submenu_page($gb_shortcode_generator, $gb_blog_style_layout, "", "read", "gb_blog_style_layout_shortcode", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_blog_style_layout_shortcode");
         add_submenu_page("gallery_bank", $gb_pricing_plans, $gb_pricing_plans, "read", "https://gallery-bank.tech-banker.com/pricing/", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "");

         add_submenu_page($gb_galleries, $gb_add_gallery, "", "read", "gb_add_gallery", $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : "gb_add_gallery");
      }

      /*
        Function Name: gb_welcome_gallery_bank
        Parameters: No
        Description: This function is used for creating gb_wizard_gallery_bank menu.
        Created On: 13-04-2017 10:22
        Created By: Tech Banker Team
       */
      function gb_welcome_gallery_bank() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/wizard/wizard.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/wizard/wizard.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gallery_bank
        Parameter: No
        Description: This function is used for manage-galleries menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gallery_bank() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/galleries/manage-galleries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/galleries/manage-galleries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_add_gallery
        Parameter: No
        Description: This function is used for add-gallery menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_add_gallery() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/galleries/add-gallery.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/galleries/add-gallery.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_sort_galleries
        Parameter: No
        Description: This function is used for sort-galleries menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_sort_galleries() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/galleries/sort-galleries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/galleries/sort-galleries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_manage_albums
        Parameter: No
        Description: This function is used for manage-albums menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_manage_albums() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/albums/manage-albums.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/albums/manage-albums.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_add_album
        Parameter: No
        Description: This function is used for add-album menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_add_album() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/albums/add-album.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/albums/add-album.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_sort_albums
        Parameter: No
        Description: This function is used for sort-album menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_sort_albums() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/albums/sort-albums.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/albums/sort-albums.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_add_tag
        Parameter: No
        Description: This function is used for add-tag menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_add_tag() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/tags/add-tag.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/tags/add-tag.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_manage_tags
        Parameter: No
        Description: This function is used for manage-tags menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_manage_tags() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/tags/manage-tags.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/tags/manage-tags.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_thumbnail_layout
        Parameter: No
        Description: This function is used for thumbnail-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_thumbnail_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }

         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/thumbnail-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/thumbnail-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_masonry_layout
        Parameter: No
        Description: This function is used for masonry-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_masonry_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/masonry-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/masonry-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_slideshow_layout
        Parameter: No
        Description: This function is used for slideshow-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_slideshow_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/slideshow-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/slideshow-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_image_browser_layout
        Parameter: No
        Description: This function is used for image-browser-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_image_browser_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/image-browser-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/image-browser-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_justified_grid_layout
        Parameter: No
        Description: This function is used for justified-grid-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_justified_grid_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/justified-grid-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/justified-grid-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_blog_style_layout
        Parameter: No
        Description: This function is used for blog-style-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_blog_style_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/blog-style-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/blog-style-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_compact_album_layout
        Parameter: No
        Description: This function is used for blog-style-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_compact_album_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/compact-album-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/compact-album-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_extended_album_layout
        Parameter: No
        Description: This function is used for blog-style-layout menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_extended_album_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/extended-album-layout.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/extended-album-layout.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_custom_css
        Parameter: No
        Description: This function is used for custom css menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_custom_css() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/custom-css.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/layout-settings/custom-css.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_fancy_box
        Parameter: No
        Description: This function is used for fancy-box menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_fancy_box() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/fancy-box.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/fancy-box.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_color_box
        Parameter: No
        Description: This function is used for color-box menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_color_box() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/color-box.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/color-box.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_foo_box_free_edition
        Parameter: No
        Description: This function is used for foo-box-free-edition menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_foo_box_free_edition() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/foo-box-free-edition.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/foo-box-free-edition.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_nivo_lightbox
        Parameter: No
        Description: This function is used for lightbox menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_nivo_lightbox() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/nivo-lightbox.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/nivo-lightbox.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_lightcase
        Parameter: No
        Description: This function is used for lightbox menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_lightcase() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/lightcase.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/lightboxes/lightcase.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_global_options
        Parameter: No
        Description: This function is used for global-options menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_global_options() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/global-options.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/global-options.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_filter_settings
        Parameter: No
        Description: This function is used for filter_settings menu.
        Created On: 07-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_filter_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/filters-settings.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/filters-settings.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_lazy_load_settings
        Parameter: No
        Description: This function is used for lazy_load_settings menu.
        Created On: 07-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_lazy_load_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/lazy-load-settings.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/lazy-load-settings.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_search_box_settings
        Parameter: No
        Description: This function is used for search_box_settings menu.
        Created On: 07-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_search_box_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/search-box-settings.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/search-box-settings.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_order_by_settings
        Parameter: No
        Description: This function is used for order_by_settings menu.
        Created On: 07-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_order_by_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/order-by-settings.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/order-by-settings.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_page_navigation
        Parameter: No
        Description: This function is used for page-navigation menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_page_navigation() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/page-navigation.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/page-navigation.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_watermark_settings
        Parameter: No
        Description: This function is used for watermark-settings menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_watermark_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/watermark-settings.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/watermark-settings.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_advertisement
        Parameter: No
        Description: This function is used for advertisment menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_advertisement() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/advertisement.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/general-settings/advertisement.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_other_settings
        Parameter: No
        Description: This function is used for other-settings menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_other_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/other-settings/other-settings.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/other-settings/other-settings.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_roles_and_capabilities
        Parameter: No
        Description: This function is used for roles-and-capabilities menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_roles_and_capabilities() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/roles-and-capabilities/roles-and-capabilities.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/roles-and-capabilities/roles-and-capabilities.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_thumbnail_layout_shortcode
        Parameter: No
        Description: This unction is used for thumbnail-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_thumbnail_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/thumbnail-layout-shortcode.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/thumbnail-layout-shortcode.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_masonry_layout_shortcode
        Parameter: No
        Description:This function is used for masonry-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_masonry_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/masonry-layout-shortcode.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/masonry-layout-shortcode.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_slideshow_layout_shortcode
        Parameter: No
        Description: This function is used for slideshow-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_slideshow_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/slideshow-layout-shortcode.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/slideshow-layout-shortcode.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_image_browser_layout_shortcode
        Parameter: No
        Description: This function is used for image-browser-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_image_browser_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/image-browser-layout-shortcode.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/image-browser-layout-shortcode.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_justified_grid_layout_shortcode
        Parameter: No
        Description:This function is used for justified-grid-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_justified_grid_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/justified-grid-layout-shortcode.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/justified-grid-layout-shortcode.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_blog_style_layout_shortcode
        Parameter: No
        Description: This function is used for blog-style-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_blog_style_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/blog-style-layout-shortcode.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/shortcodes/blog-style-layout-shortcode.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: gb_system_information
        Parameter: No
        Description: This function is used for system-information menu.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      function gb_system_information() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_bank();
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_BANK_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "views/system-information/system-information.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "views/system-information/system-information.php";
         }
         if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once GALLERY_BANK_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
   }
}

