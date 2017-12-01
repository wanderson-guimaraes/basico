<?php
/**
 * This file is used for fetching data from database.
 *
 * @author	Tech Banker
 * @package	gallery-bank/includes
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
   } else {

      function get_meta_value_gallery_bank($meta_key) {
         global $wpdb;
         $meta_value = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . gallery_bank_meta() . " WHERE meta_key = %s", $meta_key
             )
         );
         return maybe_unserialize($meta_value);
      }
      function get_unserialize_data_gallery_bank($type, $meta_key) {
         global $wpdb;
         $manage_data = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT * FROM " . gallery_bank_meta() . " WHERE " . $type . " ORDER BY meta_id DESC", $meta_key
             )
         );
         $unserialize_complete_data = array();
         foreach ($manage_data as $value) {
            $unserialize_data = maybe_unserialize($value->meta_value);
            $unserialize_data["id"] = $value->id;
            $unserialize_data["meta_id"] = $value->meta_id;
            $unserialize_data["old_gallery_id"] = $value->old_gallery_id;
            array_push($unserialize_complete_data, $unserialize_data);
         }
         return $unserialize_complete_data;
      }
      function get_unserialize_gallery_data_gallery_bank($type, $meta_key) {
         global $wpdb;
         $manage_data = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT * FROM " . gallery_bank_meta() . " WHERE " . $type . " ORDER BY meta_id DESC", $meta_key
             )
         );
         $unserialize_complete_gallery_data = array();
         foreach ($manage_data as $value) {
            $unserialize_data = maybe_unserialize($value->meta_value);
            $unserialize_data["id"] = $value->id;
            $unserialize_data["meta_id"] = $value->old_gallery_id;
            array_push($unserialize_complete_gallery_data, $unserialize_data);
         }
         return $unserialize_complete_gallery_data;
      }
      $page_navigation_get_data = get_meta_value_gallery_bank("page_navigation_settings");
      $check_gallery_bank_wizard = get_option("gallery-bank-welcome-page");
      $check_url = $check_gallery_bank_wizard == "" ? "gb_welcome_gallery_bank" : esc_attr($_GET["page"]);
      if (isset($_GET["page"])) {
         switch ($check_url) {
            case "gb_add_gallery":
               $gallery_id = isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0;

               $gallery_data_unserialize = get_unserialize_data_gallery_bank("meta_id != $gallery_id and meta_key = %s", "gallery_data");

               $get_gallery_meta_data = $wpdb->get_var
                   (
                   $wpdb->prepare
                       (
                       "SELECT meta_value FROM " . gallery_bank_meta() . " WHERE meta_id = %d and meta_key = %s", $gallery_id, "gallery_data"
                   )
               );
               $get_gallery_meta_data_unserialize = maybe_unserialize($get_gallery_meta_data);

               $get_gallery_image_meta_data_unserialize = get_unserialize_data_gallery_bank("meta_id = $gallery_id and meta_key != %s", "gallery_data");
               $sort_order = array();
               foreach ($get_gallery_image_meta_data_unserialize as $key => $value) {
                  $sort_order[$key] = $value["sort_order"];
               }
               array_multisort($sort_order, SORT_ASC, $get_gallery_image_meta_data_unserialize);
               $tag_data_unserialize = get_unserialize_data_gallery_bank("meta_key = %s", "tag_data");
               break;

            case "gallery_bank":
               $manage_gallery_data_unserialize = get_unserialize_data_gallery_bank("meta_key = %s", "gallery_data");
               $count_manage_gallery_data = count($manage_gallery_data_unserialize);
               break;

            case "gb_sort_galleries":
               $sort_galleries_get_title = get_unserialize_data_gallery_bank("meta_key = %s", "gallery_data");
               if (isset($_REQUEST["gallery_id"])) {
                  $gallery_id = intval($_REQUEST["gallery_id"]);
                  $sort_gallery_images = $wpdb->get_results
                      (
                      $wpdb->prepare
                          (
                          "SELECT * FROM " . gallery_bank_meta() . " WHERE meta_id = %d and meta_key != %s", $gallery_id, "gallery_data"
                      )
                  );

                  $sort_order = array();
                  $images_data = array();
                  if (count($sort_gallery_images) > 0) {

                     foreach ($sort_gallery_images as $key => $value) {
                        $image_data_unserialize = unserialize($value->meta_value);
                        $sort_order[$key] = $image_data_unserialize["sort_order"];
                        $image_data_unserialize["id"] = $value->id;
                        $images_data[] = $image_data_unserialize;
                     }
                     array_multisort($sort_order, SORT_ASC, $images_data);
                  }
               }
               $thumbnail_dimensions_data = get_meta_value_gallery_bank("global_options_settings");
               break;
            case "gb_add_album":
               $get_galleries_data_for_album = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               if (isset($_REQUEST["album_id"])) {
                  $album_id = intval($_REQUEST["album_id"]);
                  $get_album_data = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value from " . gallery_bank_meta() .
                          " WHERE meta_id = %d and meta_key = %s", $album_id, "album_data"
                      )
                  );
                  $get_album_data_unserialize = maybe_unserialize($get_album_data);
                  if (count($get_album_data_unserialize["selected_galleries"]) > 0) {
                     $galleries_data_array = isset($get_album_data_unserialize["selected_galleries"]) ? implode(",", $get_album_data_unserialize["selected_galleries"]) : "";
                     $get_galleries_data_selected_albums_array = get_unserialize_gallery_data_gallery_bank("old_gallery_id IN ($galleries_data_array) and meta_key = %s", "gallery_data");
                  }
               }
               break;
            case "gb_sort_albums":
               $sort_albums_get_title = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               if (isset($_REQUEST["album_id"])) {
                  $album_id = intval($_REQUEST["album_id"]);
                  $sort_gallery_type = $wpdb->get_var(
                      $wpdb->prepare
                          (
                          "SELECT meta_value FROM " . gallery_bank_meta() . " WHERE meta_id = %d and meta_key = %s", $album_id, "album_data"
                  ));
                  $sort_albums_serialized_data = maybe_unserialize($sort_gallery_type);
                  if (count($sort_albums_serialized_data["selected_galleries"]) > 0) {
                     $galleries_data_array = isset($sort_albums_serialized_data["selected_galleries"]) ? implode(",", $sort_albums_serialized_data["selected_galleries"]) : "";
                     $get_galleries_data_selected_album = $wpdb->get_results
                         (
                         "SELECT * FROM " . gallery_bank_meta() . " WHERE old_gallery_id IN ($galleries_data_array)"
                     );
                     $get_galleries_data_selected_albums_array = array();
                     foreach ($get_galleries_data_selected_album as $value) {
                        $unserialize_data = maybe_unserialize($value->meta_value);
                        $unserialize_data["meta_id"] = $value->old_gallery_id;
                        array_push($get_galleries_data_selected_albums_array, $unserialize_data);
                     }
                  }
               }
               $thumbnail_dimensions_data = get_meta_value_gallery_bank("global_options_settings");
               break;
            case "gb_add_tag":
               if (isset($_REQUEST["id"])) {
                  $meta_id = intval($_REQUEST["id"]);
                  $update_data = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value FROM " . gallery_bank_meta() . " WHERE " . gallery_bank_meta() . ".id = %d", $meta_id
                      )
                  );
                  $manage_tag_data = maybe_unserialize($update_data);
               }
               break;
            case "gb_manage_tags":
               $manage_tag_data = get_unserialize_data_gallery_bank("meta_key = %s", "tag_data");
               $get_image_data_unserialize = get_unserialize_data_gallery_bank("meta_key = %s", "image_data");
               $tags_data = array();
               $gallery_tags = array();
               $get_gallery_tags = array();
               foreach ($manage_tag_data as $val) {
                  array_push($tags_data, intval($val["id"]));
               }
               foreach ($get_image_data_unserialize as $tag) {
                  array_push($gallery_tags, $tag["tags"]);
               }
               foreach ($gallery_tags as $id) {
                  if (is_array($id)) {
                     foreach ($tags_data as $value) {
                        if (in_array($value, $id) == true) {
                           array_push($get_gallery_tags, $value);
                        }
                     }
                  }
               }
               break;

            case "gb_thumbnail_layout":
               $manage_thumbnail_data = get_meta_value_gallery_bank("thumbnail_layout_settings");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               break;

            case "gb_masonry_layout":
               $manage_masonry_data = get_meta_value_gallery_bank("masonry_layout_settings");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               break;
            case "gb_justified_grid_layout":
               $manage_justified_grid_data = get_meta_value_gallery_bank("justified_grid_layout_settings");
               break;
            case "gb_blog_style_layout":
               $blog_style_layout_data = get_meta_value_gallery_bank("blog_style_layout_settings");
               break;
            case "gb_slideshow_layout":
               $manage_slideshow_data = get_meta_value_gallery_bank("slideshow_layout_settings");
               break;

            case "gb_blog_style_layout":
               $blog_style_layout_data = get_meta_value_gallery_bank("blog_style_layout_settings");
               break;

            case "gb_custom_css":
               $details_custom_css = get_meta_value_gallery_bank("custom_css");
               break;
            case "gb_lightcase" :
               $gb_lightcase_meta_data = get_meta_value_gallery_bank("lightcase_settings");
               break;
            case "gb_fancy_box":
               $gb_fancy_box_get_data = get_meta_value_gallery_bank("fancy_box_settings");
               break;
            case "gb_global_options":
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               break;

            case "gb_watermark_settings":
               $watermark_settings_get_data = get_meta_value_gallery_bank("watermark_settings");
               break;

            case "gb_advertisement":
               $advertisement_get_data = get_meta_value_gallery_bank("advertisement_settings");
               break;

            case "gb_other_settings":
               $details_other_setting = get_meta_value_gallery_bank("other_settings");
               break;

            case "gb_roles_and_capabilities":
               $details_roles_capabilities = get_meta_value_gallery_bank("roles_and_capabilities_settings");
               $other_roles_array = $details_roles_capabilities["capabilities"];
               break;
            case "gb_search_box_settings":
               $searchbox_settings_get_data = get_meta_value_gallery_bank("search_box_settings");
               break;

            case "gb_page_navigation":
               $page_navigation_get_data = get_meta_value_gallery_bank("page_navigation_settings");
               break;

            case "gb_order_by_settings":
               $orderby_settings_get_data = get_meta_value_gallery_bank("order_by_settings");
               break;

            case "gb_filter_settings":
               $filter_settings_get_data = get_meta_value_gallery_bank("filter_settings");
               break;

            case "gb_lazy_load_settings":
               $lazyload_settings_get_data = get_meta_value_gallery_bank("lazy_load_settings");
               break;
            case "gb_color_box":
               $color_box_get_data = get_meta_value_gallery_bank("color_box_settings");
               break;

            case "gb_foo_box_free_edition":
               $foo_box = get_meta_value_gallery_bank("foo_box_settings");
               break;
            case "gb_nivo_lightbox":
               $gb_nivo_lightbox_meta_data = get_meta_value_gallery_bank("nivo_lightbox_settings");
               break;
            case "gb_thumbnail_layout_shortcode":
               $thumbnail_layout_get_data = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               $thumbnail_layout_get_album_data = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               break;
            case "gb_masonry_layout_shortcode":
               $masonry_layout_get_data = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               $masonry_layout_get_album_data = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               break;

            case "gb_compact_album_layout":
               $compact_album_layout_data = get_meta_value_gallery_bank("compact_album_layout_settings");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               break;
            case "gb_extended_album_layout":
               $extended_album_layout_data = get_meta_value_gallery_bank("extended_album_layout_settings");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               break;
            case "gb_slideshow_layout_shortcode":
               $slideshow_layout_shortcode = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               $slideshow_layout_get_album_data = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               break;

            case "gb_image_browser_layout_shortcode":
               $image_browser_layout_shortcode = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               $image_browser_layout_get_album_data = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               break;

            case "gb_justified_grid_layout_shortcode":
               $justified_grid_layout_title = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               $justified_grid_layout_get_album_data = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               break;

            case "gb_blog_style_layout_shortcode":
               $blog_style_layout_title = get_unserialize_gallery_data_gallery_bank("meta_key = %s", "gallery_data");
               $global_options_get_data = get_meta_value_gallery_bank("global_options_settings");
               $blog_style_layout_get_album_data = get_unserialize_data_gallery_bank("meta_key = %s", "album_data");
               break;
         }
      }
   }
}