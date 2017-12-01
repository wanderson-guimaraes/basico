<?php
/**
 * This file represents the Data Access Layer for Gallery Bank.
 *
 * @author	Tech Banker
 * @package	gallery-bank/lib
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

      function get_parent_id_gallery_bank($type) {
         global $wpdb;
         $parent_id = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT id FROM " . gallery_bank_parent() . "
						WHERE " . gallery_bank_parent() . ". type = %s", $type
             )
         );
         return $parent_id;
      }
      function get_delete_all_galleries_module_gallery_bank($type) {
         global $wpdb;
         $get_all_galleries_and_image = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT meta_id FROM " . gallery_bank_meta() . "
						INNER JOIN " . gallery_bank_parent() . " ON " . gallery_bank_meta() . ".meta_id = " . gallery_bank_parent() . ".id
						WHERE " . gallery_bank_parent() . ".type = %s", $type
             )
         );
         return $get_all_galleries_and_image;
      }
      function get_thumbnail_dimension_gallery_bank() {
         global $wpdb;
         $thumbnail_data = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . gallery_bank_meta() . "
						WHERE " . gallery_bank_meta() . ".meta_key = %s", "global_options_settings"
             )
         );

         $thumbnail_data_unserialize = maybe_unserialize($thumbnail_data);
         $image_dimension = explode(",", $thumbnail_data_unserialize["global_options_generated_image_dimensions"]);
         $thumbnail_dimensions = explode(",", $thumbnail_data_unserialize["global_options_thumbnail_dimensions"]);
         $image_data = array_merge($image_dimension, $thumbnail_dimensions);
         return $image_data;
      }
      function get_dir_contents_gallery_bank($dir, &$results = array()) {
         $files = scandir($dir);
         foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
               $results[] = $path;
            } elseif ($value != "." && $value != "..") {
               get_dir_contents_gallery_bank($path, $results);
               $results[] = $path;
            }
         }
         return $results;
      }
      if (isset($_REQUEST["param"])) {
         $obj_dbHelper_gallery_bank = new dbHelper_gallery_bank();
         $obj_image_process_gallery_bank = new image_process_gallery_bank();
         switch (sanitize_text_field($_REQUEST["param"])) {
            case "wizard_gallery_bank":
               if (wp_verify_nonce(isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : "", "gallery_bank_check_status")) {
                    $type = isset($_REQUEST["type"]) ? sanitize_text_field($_REQUEST["type"]) : "";
                    $user_admin_email = isset($_REQUEST["id"]) ? sanitize_text_field($_REQUEST["id"]) : "";
                  
                    update_option("gallery-bank-welcome-page", $type);
                    if ($user_admin_email == "") {
                        $user_admin_email = get_option("admin_email");
                    }
                    update_option("gallery-bank-admin-email", $user_admin_email);
                        
                    if ($type == "opt_in") {
                    $plugin_info_gallery_bank = new plugin_info_gallery_bank();
                    global $wp_version;
                    $url = tech_banker_stats_url . "/wp-admin/admin-ajax.php";
                    $theme_details = array();
                    if ($wp_version >= 3.4) {
                       $active_theme = wp_get_theme();
                       $theme_details["theme_name"] = strip_tags($active_theme->Name);
                       $theme_details["theme_version"] = strip_tags($active_theme->Version);
                       $theme_details["author_url"] = strip_tags($active_theme->{"Author URI"});
                    }
                    $plugin_stat_data = array();
                    $plugin_stat_data["plugin_slug"] = "gallery-bank";
                    $plugin_stat_data["type"] = "standard_edition";
                    $plugin_stat_data["version_number"] = gallery_bank_wizard_version_number;
                    $plugin_stat_data["status"] = $type;
                    $plugin_stat_data["event"] = "activate";
                    $plugin_stat_data["domain_url"] = site_url();
                    $plugin_stat_data["wp_language"] = defined("WPLANG") && WPLANG ? WPLANG : get_locale();
                    $plugin_stat_data["email"] = $user_admin_email;
                    $plugin_stat_data["wp_version"] = $wp_version;
                    $plugin_stat_data["php_version"] = sanitize_text_field(phpversion());
                    $plugin_stat_data["mysql_version"] = $wpdb->db_version();
                    $plugin_stat_data["max_input_vars"] = ini_get("max_input_vars");
                    $plugin_stat_data["operating_system"] = PHP_OS . "  (" . PHP_INT_SIZE * 8 . ") BIT";
                    $plugin_stat_data["php_memory_limit"] = ini_get("memory_limit") ? ini_get("memory_limit") : "N/A";
                    $plugin_stat_data["extensions"] = get_loaded_extensions();
                    $plugin_stat_data["plugins"] = $plugin_info_gallery_bank->get_plugin_info_gallery_bank();
                    $plugin_stat_data["themes"] = $theme_details;
                    $response = wp_safe_remote_post($url, array
                        (
                        "method" => "POST",
                        "timeout" => 45,
                        "redirection" => 5,
                        "httpversion" => "1.0",
                        "blocking" => true,
                        "headers" => array(),
                        "body" => array("data" => serialize($plugin_stat_data), "site_id" => get_option("gb_tech_banker_site_id") != "" ? get_option("gb_tech_banker_site_id") : "", "action" => "plugin_analysis_data")
                    ));

                    if (!is_wp_error($response)) {
                       $response["body"] != "" ? update_option("gb_tech_banker_site_id", $response["body"]) : "";
                    }
                }
            }
            break;
            case "gallery_bank_upload_images":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "gallery_upload_images_nonce")) {
                  $gallery_id = isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0;
                  $image_meta_data = array();
                  $get_old_gallery_id = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT old_gallery_id FROM " . gallery_bank_meta() . " WHERE meta_id = %d and meta_key = %s", $gallery_id, "gallery_data"
                      )
                  );
                  $image_data = get_thumbnail_dimension_gallery_bank();
                  $image_name = isset($_REQUEST["image_name"]) ? sanitize_text_field($_REQUEST["image_name"]) : "";
                  $upload_type = isset($_REQUEST["upload_method"]) ? sanitize_text_field($_REQUEST["upload_method"]) : "";
                  $file_type = isset($_REQUEST["file_type"]) ? sanitize_text_field($_REQUEST["file_type"]) : "";
                  $video_type = isset($_REQUEST["video_type"]) ? sanitize_text_field($_REQUEST["video_type"]) : "";

                  $gallery_images_count = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT count(meta_key) FROM " . gallery_bank_meta() . " WHERE meta_id = %d and meta_key = %s", $gallery_id, "image_data"
                      )
                  );
                  if ($file_type == "image") {
                     if ($upload_type != "") {
                        $attachment_file_id = isset($_REQUEST["attachment_id"]) ? intval($_REQUEST["attachment_id"]) : "";
                        $fileName = wp_unique_filename(GALLERY_BANK_ORIGINAL_DIR, $image_name);
                        if (function_exists("copy")) {
                           $src_file = get_attached_file($attachment_file_id);
                           copy($src_file, GALLERY_BANK_ORIGINAL_DIR . $fileName);
                           copy($src_file, GALLERY_BANK_UPLOAD_DIR . $fileName);
                        } else if (function_exists("curl_init")) {
                           $src_file = wp_get_attachment_image_src($attachment_file_id, "");

                           $obj_image_process_gallery_bank->copy_images_gallery_bank($src_file[0], GALLERY_BANK_ORIGINAL_DIR . $fileName);
                           $obj_image_process_gallery_bank->copy_images_gallery_bank($src_file[0], GALLERY_BANK_UPLOAD_DIR . $fileName);
                        }
                        $thumbnail_image_name = $obj_image_process_gallery_bank->createThumbs_gallery_bank($image_name, $image_data);
                        $image_exif_detail = $obj_image_process_gallery_bank->file_exif_information_gallery_bank(GALLERY_BANK_UPLOAD_DIR . $image_name, "FILE");
                        $image_meta_data["image_title"] = isset($_REQUEST["image_title"]) ? sanitize_text_field($_REQUEST["image_title"]) : "";
                        $image_meta_data["image_name"] = $thumbnail_image_name;
                     } else {
                        $thumbnail_image_name = $obj_image_process_gallery_bank->createThumbs_gallery_bank($image_name, $image_data);
                        $image_exif_detail = $obj_image_process_gallery_bank->file_exif_information_gallery_bank(GALLERY_BANK_UPLOAD_DIR . $image_name, "FILE");
                        if ($image_exif_detail["exif_information"]["title"] == "") {
                           $image_name_data = pathinfo(GALLERY_BANK_UPLOAD_DIR . $image_name);
                           $image_data = $image_name_data["filename"];
                        } else {
                           $image_data = $image_exif_detail["exif_information"]["title"];
                        }
                        $image_meta_data["image_title"] = $image_data;
                        $image_meta_data["image_name"] = isset($_REQUEST["image_name"]) ? sanitize_text_field($_REQUEST["image_name"]) : "";
                     }
                     $image_meta_data["width"] = intval($image_exif_detail["width"]);
                     $image_meta_data["height"] = intval($image_exif_detail["height"]);
                     $image_meta_data["mime_type"] = sanitize_text_field($image_exif_detail["mime_type"]);
                     $image_meta_data["aperture"] = sanitize_text_field($image_exif_detail["exif_information"]["aperture"]);
                     $image_meta_data["upload_type"] = "";
                  } else {
                     $image_meta_data["video_url"] = isset($_REQUEST["embed_video_src"]) ? esc_url(urldecode($_REQUEST["embed_video_src"])) : "";
                     $embed_video_src = $image_meta_data["video_url"];
                     $image_meta_data["image_title"] = "";
                     $image_meta_data["video_type"] = $video_type;
                     $image_meta_data["image_name"] = isset($_REQUEST["video_url"]) ? esc_url(urldecode($_REQUEST["video_url"])) : "";
                     $image_meta_data["video_thumb"] = $obj_image_process_gallery_bank->online_video_thumb_gallery_bank(isset($_REQUEST["video_url"]) ? sanitize_text_field(urldecode($_REQUEST["video_url"])) : "");
                     $embed_video_thumb = $image_meta_data["video_thumb"];
                  }
                  $image_meta_data["enable_redirect"] = "";
                  $image_meta_data["redirect_url"] = "http://";
                  $image_meta_data["gallery_cover_image"] = $gallery_images_count == 0 ? "1" : "";
                  $image_meta_data["image_description"] = isset($_REQUEST["image_dec"]) ? esc_html($_REQUEST["image_dec"]) : "";
                  $image_meta_data["alt_text"] = isset($_REQUEST["alt_text"]) ? sanitize_text_field($_REQUEST["alt_text"]) : "";
                  $image_meta_data["sort_order"] = "";
                  $image_meta_data["tags"] = array();
                  $image_meta_data["upload_date"] = time();
                  $image_meta_data["file_type"] = isset($_REQUEST["file_type"]) ? sanitize_text_field($_REQUEST["file_type"]) : "";
                  $image_meta_data["exclude_image"] = "";

                  if ($gallery_images_count == 0) {
                     $selected_gallery_data = $wpdb->get_var
                         (
                         $wpdb->prepare
                             (
                             "SELECT meta_value FROM " . gallery_bank_meta() . " WHERE meta_id = %d AND meta_key = %s", $gallery_id, "gallery_data"
                         )
                     );
                     $selected_gallery_unserialized_data = maybe_unserialize($selected_gallery_data);
                     $selected_gallery_unserialized_data["gallery_cover_image"] = $file_type == "image" ? $image_name : $embed_video_thumb;
                     $selected_gallery_unserialized_data["file_type"] = $file_type;

                     $gallery_meta_data_insert = array();
                     $where = array();
                     $where["meta_id"] = $gallery_id;
                     $where["meta_key"] = "gallery_data";
                     $gallery_meta_data_insert["meta_value"] = serialize($selected_gallery_unserialized_data);
                     $obj_dbHelper_gallery_bank->updateCommand(gallery_bank_meta(), $gallery_meta_data_insert, $where);
                  }
                  $image_meta_data_insert = array();
                  $image_meta_data_insert["meta_id"] = $gallery_id;
                  $image_meta_data_insert["old_gallery_id"] = $get_old_gallery_id;
                  $image_meta_data_insert["meta_key"] = $file_type == "image" ? "image_data" : "video_data";
                  $image_meta_data_insert["meta_value"] = serialize($image_meta_data);
                  $image_id = $obj_dbHelper_gallery_bank->insertCommand(gallery_bank_meta(), $image_meta_data_insert);

                  if ($file_type == "image") {
                     $image_bind_data = array($image_id, $thumbnail_image_name, $image_data);
                     echo json_encode($image_bind_data);
                  } else {
                     $video_bind_data = array($image_id, $embed_video_thumb, $embed_video_src);
                     echo json_encode($video_bind_data);
                  }
               }
               break;

            case "gb_get_gallery_id_gallery_bank":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "get_gallery_id_gallery_bank")) {
                  $gallery_parent_id = get_parent_id_gallery_bank("galleries");
                  $insert_gallery = array();
                  $insert_gallery["type"] = "gallery";
                  $insert_gallery["parent_id"] = $gallery_parent_id;
                  $gallery_id = $obj_dbHelper_gallery_bank->insertCommand(gallery_bank_parent(), $insert_gallery);

                  $insert_gallery_meta = array();
                  $insert_gallery_meta["gallery_title"] = "";
                  $insert_gallery_meta["gallery_description"] = "";
                  $insert_gallery_meta["created_date"] = time();
                  $insert_gallery_meta["edited_on"] = time();
                  $insert_gallery_meta["gallery_cover_image"] = "";
                  $insert_gallery_meta["file_type"] = "";
                  $insert_gallery_meta["edited_by"] = $current_user->display_name;
                  $insert_gallery_meta["author"] = $current_user->display_name;

                  $insert_gallery_data = array();
                  $insert_gallery_data["meta_id"] = $gallery_id;
                  $insert_gallery_data["old_gallery_id"] = $gallery_id;
                  $insert_gallery_data["meta_key"] = "gallery_data";
                  $insert_gallery_data["meta_value"] = serialize($insert_gallery_meta);
                  $obj_dbHelper_gallery_bank->insertCommand(gallery_bank_meta(), $insert_gallery_data);
                  echo $gallery_id;
               }
               break;

            case "delete_gallery_images":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "gallery_images_delete_nonce")) {
                  $delete_image_data = isset($_REQUEST["delete_image_data"]) ? array_map("intval", is_array(json_decode(stripcslashes($_REQUEST["delete_image_data"]))) ? json_decode(stripcslashes($_REQUEST["delete_image_data"])) : array()) : array();
                  $obj_dbHelper_gallery_bank->bulk_deleteCommand(gallery_bank_meta(), "id", implode(",", $delete_image_data));
               }
               break;

            case "update_gallery_data":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "gallery_update_data_nonce")) {
                  $gallery_id = isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0;
                  parse_str(isset($_REQUEST["gallery_title"]) ? base64_decode($_REQUEST["gallery_title"]) : "", $gallery_title_data);
                  parse_str(isset($_REQUEST["gallery_description"]) ? base64_decode($_REQUEST["gallery_description"]) : "", $gallery_description_data);
                  $gallery_title = sanitize_text_field($gallery_title_data["ux_txt_gallery_title"]) != "" ? $gallery_title_data["ux_txt_gallery_title"] : "Untitled Gallery";
                  $gallery_description = esc_html($gallery_description_data["ux_txtarea_gallery_heading_content"]);
                  parse_str((isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : ""), $data);
                  $gallery_cover_image = isset($_REQUEST["gallery_cover_image"]) ? intval($_REQUEST["gallery_cover_image"]) : 0;
                  $gallery_images_data = isset($_REQUEST["array_gallery_images_data"]) ? array_map("intval", is_array(json_decode(stripcslashes(urldecode($_REQUEST["array_gallery_images_data"])))) ? json_decode(stripcslashes(urldecode($_REQUEST["array_gallery_images_data"]))) : array()) : array();
                  $insert_data = array();
                  $insert_images_array_data = array();
                  foreach ($gallery_images_data as $value) {
                     $get_image_meta_data = $wpdb->get_var
                         (
                         $wpdb->prepare
                             (
                             "SELECT meta_value from " . gallery_bank_meta() .
                             " WHERE id = %d and meta_key != %s", $value, "gallery_data"
                     ));
                     $image_meta_data_unserialize = maybe_unserialize($get_image_meta_data);
                     $image_meta_data_unserialize["image_title"] = isset($data["ux_txt_img_title_" . $value]) ? sanitize_text_field($data["ux_txt_img_title_" . $value]) : "";
                     $image_meta_data_unserialize["image_description"] = isset($data["ux_txt_img_desc_" . $value]) ? esc_html($data["ux_txt_img_desc_" . $value]) : "";
                     $image_meta_data_unserialize["alt_text"] = isset($data["ux_img_alt_text_" . $value]) ? sanitize_text_field($data["ux_img_alt_text_" . $value]) : "";
                     $image_meta_data_unserialize["tags"] = isset($data["ux_ddl_tags_" . $value]) ? $data["ux_ddl_tags_" . $value] : array();
                     $image_meta_data_unserialize["exclude_image"] = isset($data["ux_exclude_image_" . $value]) ? "1" : "";
                     $image_meta_data_unserialize["enable_redirect"] = isset($data["ux_rdl_redirect_" . $value]) ? sanitize_text_field($data["ux_rdl_redirect_" . $value]) : "";
                     $image_meta_data_unserialize["redirect_url"] = isset($data["ux_txt_img_url_" . $value]) ? sanitize_text_field($data["ux_txt_img_url_" . $value]) : "";
                     $image_meta_data_unserialize["gallery_cover_image"] = $gallery_cover_image == $value ? "1" : "";

                     $update_image_meta_data = array();
                     $where = array();
                     $where["id"] = $value;
                     $where["meta_key"] = $image_meta_data_unserialize["file_type"] == "image" ? "image_data" : "video_data";
                     $update_image_meta_data["meta_value"] = serialize($image_meta_data_unserialize);
                     $obj_dbHelper_gallery_bank->updateCommand(gallery_bank_meta(), $update_image_meta_data, $where);
                  }
                  $gallery_cover_meta_value = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value from " . gallery_bank_meta() .
                          " WHERE id = %d and meta_key != %s", $gallery_cover_image, "gallery_data"
                      )
                  );
                  $gallery_cover_unserialized_meta_value = maybe_unserialize($gallery_cover_meta_value);

                  $gallery_meta_value = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value from " . gallery_bank_meta() .
                          " WHERE meta_id = %d and meta_key = %s", $gallery_id, "gallery_data"
                      )
                  );

                  $gallery_meta_id_unserialize = maybe_unserialize($gallery_meta_value);

                  $gallery_meta_data = array();
                  $gallery_meta_data["gallery_title"] = sanitize_text_field($gallery_title);
                  $gallery_meta_data["gallery_description"] = $gallery_description;
                  $gallery_meta_data["created_date"] = doubleval($gallery_meta_id_unserialize["created_date"]);
                  $gallery_meta_data["edited_on"] = time();
                  $gallery_meta_data["gallery_cover_image"] = isset($gallery_cover_unserialized_meta_value["file_type"]) && $gallery_cover_unserialized_meta_value["file_type"] == "video" ? $gallery_cover_unserialized_meta_value["video_thumb"] : (isset($gallery_cover_unserialized_meta_value["image_name"]) ? $gallery_cover_unserialized_meta_value["image_name"] : $gallery_meta_id_unserialize["gallery_cover_image"]);
                  $gallery_meta_data["file_type"] = isset($gallery_cover_unserialized_meta_value["file_type"]) ? $gallery_cover_unserialized_meta_value["file_type"] : $gallery_meta_id_unserialize["file_type"];
                  $gallery_meta_data["edited_by"] = $current_user->display_name;
                  $gallery_meta_data["author"] = sanitize_text_field($gallery_meta_id_unserialize["author"]);

                  $gallery_update_data = array();
                  $where = array();
                  $where["meta_id"] = $gallery_id;
                  $where["meta_key"] = "gallery_data";
                  $gallery_update_data["meta_value"] = serialize($gallery_meta_data);
                  $obj_dbHelper_gallery_bank->updateCommand(gallery_bank_meta(), $gallery_update_data, $where);
               }
               break;

            case "get_image_path":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "get_image_path_nonce")) {
                  $attachment_id = isset($_REQUEST["attachment_id"]) ? intval($_REQUEST["attachment_id"]) : "";
                  echo get_attached_file($attachment_id);
               }
               break;

            case "manage_gallery_module":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "gb_manage_gallery_nonce")) {
                  $gallery_id = isset($_REQUEST["meta_id"]) ? intval($_REQUEST["meta_id"]) : "";

                  $delete_gallery = array();
                  $delete_gallery_parent = array();
                  $delete_gallery["meta_id"] = $gallery_id;
                  $delete_gallery_parent["id"] = $gallery_id;
                  $obj_dbHelper_gallery_bank->deleteCommand(gallery_bank_meta(), $delete_gallery);
                  $obj_dbHelper_gallery_bank->deleteCommand(gallery_bank_parent(), $delete_gallery_parent);
               }
               break;

            case "custom_css_module":
               if (wp_verify_nonce(isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : "", "custom_css_nonce")) {
                  parse_str(isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : "", $custom_css_form_data);
                  $custom_css_data = array();
                  $custom_css_data["custom_css"] = esc_html($custom_css_form_data["ux_txt_custom_css"]);
                  $update_custom_css_array = array();
                  $where = array();
                  $where["meta_key"] = "custom_css";
                  $update_custom_css_array["meta_value"] = serialize($custom_css_data);
                  $obj_dbHelper_gallery_bank->updateCommand(gallery_bank_meta(), $update_custom_css_array, $where);
               }
               break;

            case "global_options_module":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "global_options_nonce")) {
                  set_time_limit(1800);
                  parse_str((isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : ""), $data_array);

                  $global_options = array();
                  $global_options["global_options_generated_image_dimensions"] = sanitize_text_field(implode(",", $data_array["ux_txt_height_width"]));
                  $global_options["global_options_thumbnail_dimensions"] = sanitize_text_field(implode(",", $data_array["ux_txt_thumbnail_height_width"]));
                  $global_options["global_options_language_direction"] = sanitize_text_field($data_array["ux_ddl_language_direction"]);
                  $global_options["global_options_right_click_protection"] = sanitize_text_field($data_array["ux_ddl_right_click"]);

                  $where = array();
                  $global_options_data = array();
                  $where["meta_key"] = "global_options_settings";
                  $global_options_data["meta_value"] = serialize($global_options);
                  $obj_dbHelper_gallery_bank->updateCommand(gallery_bank_meta(), $global_options_data, $where);

                  $get_image_data = $wpdb->get_results
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value FROM " . gallery_bank_meta() . "
								WHERE meta_key = %s ORDER BY RAND()", "image_data"
                      )
                  );
                  $get_image_data_unserialize = array();
                  foreach ($get_image_data as $val) {
                     $unserialize_image_data_value = array();
                     $unserialize_image_data_value = maybe_unserialize($val->meta_value);
                     $get_image_data_unserialize[] = $unserialize_image_data_value["image_name"];
                  }

                  $generated_image_dimension = explode(",", $global_options["global_options_generated_image_dimensions"]);
                  $exploded_thumbnail_dimension = explode(",", $global_options["global_options_thumbnail_dimensions"]);
                  $thumbnail_dimension = array_merge($exploded_thumbnail_dimension, $generated_image_dimension);
                  $obj_image_process_gallery_bank->alter_thumbs_gallery_bank($get_image_data_unserialize, $thumbnail_dimension);
               }
               break;

            case "other_settings_module":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? $_REQUEST["_wp_nonce"] : ""), "other_settings_nonce")) {
                  parse_str((isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : ""), $other_settings_data);
                  $update_other_settings = array();
                  $update_other_settings["remove_table_at_uninstall"] = sanitize_text_field($other_settings_data["ux_ddl_remove_table"]);
                  $update_other_settings["automatic_updates"] = "disable";

                  $where = array();
                  $update_other_settings_data = array();
                  $where["meta_key"] = "other_settings";
                  $update_other_settings_data["meta_value"] = serialize($update_other_settings);
                  $obj_dbHelper_gallery_bank->updateCommand(gallery_bank_meta(), $update_other_settings_data, $where);
               }
               break;
         }
         die();
      }
   }
}