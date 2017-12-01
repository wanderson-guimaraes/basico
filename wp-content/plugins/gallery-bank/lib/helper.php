<?php
/**
 * This file is used for creating dbHelper class.
 *
 * @author  Tech Banker
 * @package gallery-bank/lib
 * @version 4.0.0
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
      /*
        Class Name: dbHelper_gallery_bank
        Parameters: No
        Description: This Class is used for Insert, Update and Delete operations.
        Created On: 01-06-2017 09:00
        Created By: Tech Banker Team
       */
      class dbHelper_gallery_bank {
         /*
           Function Name: insertCommand
           Parameters: Yes($table_name,$data)
           Description: This Function is used for Insert data in database.
           Created On: 01-06-2017 09:00
           Created By: Tech Banker Team
          */
         function insertCommand($table_name, $data) {
            global $wpdb;
            $wpdb->insert($table_name, $data);
            return $wpdb->insert_id;
         }
         /*
           Function Name: updateCommand
           Parameters: Yes($table_name,$data,$where)
           Description: This function is used for Update data.
           Created On: 01-06-2017 09:00
           Created By: Tech Banker Team
          */
         function updateCommand($table_name, $data, $where) {
            global $wpdb;
            $wpdb->update($table_name, $data, $where);
         }
         /*
           Function Name: deleteCommand
           Parameters: Yes($table_name,$where)
           Description: This function is used for delete data.
           Created On: 01-06-2017 09:00
           Created By: Tech Banker Team
          */
         function deleteCommand($table_name, $where) {
            global $wpdb;
            $wpdb->delete($table_name, $where);
         }
         /*
           Function Name: bulk_deleteCommand
           Parameters: Yes($table_name,$data,$where)
           Decription: This function is being used to delete bulk Data.
           Created On: 01-06-2017 09:00
           Created By: Tech Banker Team
          */
         function bulk_deleteCommand($table_name, $where, $data) {
            global $wpdb;
            $wpdb->query
                (
                "DELETE FROM $table_name WHERE $where IN ($data)"
            );
         }
      }
      /*
        Class Name: plugin_info_gallery_bank
        Parameters: No
        Description: This Class is used to get the the information about plugins.
        Created On: 13-06-2017 10:07
        Created By: Tech Banker Team
       */
      if(!class_exists("plugin_info_gallery_bank"))
      {
          class plugin_info_gallery_bank {
            /*
              Function Name: get_plugin_info_gallery_bank
              Parameters: No
              Decription: This function is used to return the information about plugins.
              Created On: 13-06-2017 10:07
              Created By: Tech Banker Team
             */
            function get_plugin_info_gallery_bank() {
               $active_plugins = (array) get_option("active_plugins", array());
               if (is_multisite())
                  $active_plugins = array_merge($active_plugins, get_site_option("active_sitewide_plugins", array()));
               $plugins = array();
               if (count($active_plugins) > 0) {
                  $get_plugins = array();
                  foreach ($active_plugins as $plugin) {
                     $plugin_data = @get_plugin_data(WP_PLUGIN_DIR . "/" . $plugin);

                     $get_plugins["plugin_name"] = strip_tags($plugin_data["Name"]);
                     $get_plugins["plugin_author"] = strip_tags($plugin_data["Author"]);
                     $get_plugins["plugin_version"] = strip_tags($plugin_data["Version"]);
                     array_push($plugins, $get_plugins);
                  }
                  return $plugins;
               }
            }
         }
      }
      global $uploaded_images;
      $uploaded_images = array();
      class image_process_gallery_bank {
         /*
           Function Name: online_video_thumb_gallery_bank
           Parameters: Yes($dir)
           Decription: This function is being used to make Thumb.
           Created On: 06-07-2017 02:13
           Created By: Tech Banker Team
          */
         function online_video_thumb_gallery_bank($url) {
            if (preg_match("/youtube\.com\/watch/i", $url)) {
               $id = explode("?", $url);
               $new_id = explode("v=", $id[1]);
               $video_thumbnail_path = "http://img.youtube.com/vi/" . $new_id[1] . "/mqdefault.jpg";
            } elseif (preg_match("/youtu\.be\//i", $url)) {
               $id = explode(".be/", $url);
               $video_thumbnail_path = "http://img.youtube.com/vi/" . $id[1] . "/mqdefault.jpg";
            } elseif (preg_match("/(?:vimeo(?:pro)?.com)\/(?:[^\d]+)?(\d+)(?:.*)/", $url)) {
               $path = explode("/", $url);
               $id = end($path);
               $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
               $video_thumbnail_path = $hash[0]["thumbnail_medium"];
            } elseif (preg_match("/dailymotion\.com/i", $url)) {
               $path = explode("/[_]/", $url);
               $id = explode("/", $path[0]);
               $video_thumbnail_path = json_decode(file_get_contents("https://api.dailymotion.com/video/" . $id[4] . "?fields=thumbnail_medium_url"));
               $video_thumbnail_path = $video_thumbnail_path->thumbnail_medium_url;
            } elseif (preg_match("/metacafe\.com\/watch/i", $url)) {
               $path = explode("/", $url);
               $parse = file_get_contents("http://www.metacafe.com/embed/" . $path[4] . "/" . $path[5]);
               preg_match_all('/{(.*?)}/', $parse, $matches);
               $get_thumb = explode('"', $matches[0][1]);
               $video_thumbnail_path = stripslashes($get_thumb[7]);
            } elseif (preg_match("/facebook\.com/i", $url)) {
               $id = explode("v=", $url);
               if (count($id) == 1) {
                  $id = explode("/", $url);
                  $path = $id[6];
                  $video_thumbnail_path = "https://graph.facebook.com/" . $path . "/picture";
               } else {
                  $path = explode("&", $id[1]);
                  $video_thumbnail_path = "https://graph.facebook.com/" . $path[0] . "/picture";
               }
            } elseif (preg_match("/flickr\.com(?!.+\/show\/)/i", $url)) {
               $get_video_info = file_get_contents("http://www.flickr.com/services/oembed/?url={$url}&format=json");
               $data = json_decode($get_video_info, true);
               $video_thumbnail_path = $data["thumbnail_url"];
            } elseif (preg_match("/youku\.com/", $url)) {
               $video = explode("id_", $url);
               $video_id = explode("==", $video[1]);
               $video_thumbnail_path = "http://events.youku.com/global/api/video-thumb.php?vid=" . $video_id[0];
            }
            return $video_thumbnail_path;
         }
         /*
           Function Name: fetch_folder_files
           Parameters: Yes($dir)
           Decription: This function is being used to fetch images in the Directory.
           Created On: 23-06-2017 10:07
           Created By: Tech Banker Team
          */
         function fetch_folder_files($dir) {
            global $uploaded_images;
            $folder_files = scandir($dir);
            foreach ($folder_files as $folder_file) {
               if ($folder_file != "." && $folder_file != "..") {
                  if (is_dir($dir . "/" . $folder_file)) {
                     $this->fetch_folder_files($dir . "/" . $folder_file);
                  }
                  if (is_file($dir . "/" . $folder_file)) {
                     $path = $dir . "/" . $folder_file;
                     array_push($uploaded_images, $path);
                  }
               }
            }
            return $uploaded_images;
         }
         function copy_images_gallery_bank($src, $destination) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $src);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $data = curl_exec($ch);
            curl_close($ch);
            if ($data) {
               $fp = fopen($destination, "wb");
               if ($fp) {
                  fwrite($fp, $data);
                  fclose($fp);
               } else {
                  fclose($fp);
                  return false;
               }
            } else {
               return false;
            }
         }
         function createThumbs_gallery_bank($fname, $image_data) {
            $fileName = wp_unique_filename(GALLERY_BANK_THUMBS_CROPPED_DIR, $fname);
            if (function_exists("wp_get_image_editor")) {
               $image_original = wp_get_image_editor(GALLERY_BANK_ORIGINAL_DIR . $fname);
               $image_thumbnail_cropped = wp_get_image_editor(GALLERY_BANK_ORIGINAL_DIR . $fname);
               $image_thumbnail_non_cropped = wp_get_image_editor(GALLERY_BANK_ORIGINAL_DIR . $fname);
               if (!is_wp_error($image_original) || !is_wp_error($image_thumbnail_cropped) || !is_wp_error($image_thumbnail_non_cropped)) {
                  $image_original->resize($image_data[0], $image_data[1], false);
                  $image_original->save(GALLERY_BANK_ORIGINAL_DIR . $fileName);

                  $image_thumbnail_cropped->resize($image_data[2], $image_data[3], true);
                  $image_thumbnail_cropped->save(GALLERY_BANK_THUMBS_CROPPED_DIR . $fileName);

                  $image_thumbnail_non_cropped->resize($image_data[2], $image_data[3], false);
                  $image_thumbnail_non_cropped->save(GALLERY_BANK_THUMBS_NON_CROPPED_DIR . $fileName);
               }
            } else {
               image_resize(GALLERY_BANK_ORIGINAL_DIR . $fname, $image_data[0], $image_data[1], false);
               image_resize(GALLERY_BANK_THUMBS_CROPPED_DIR . $fname, $image_data[2], $image_data[3], true);
               image_resize(GALLERY_BANK_THUMBS_NON_CROPPED_DIR . $fname, $image_data[2], $image_data[3], false);
            }
            return $fileName;
         }
         function file_exif_information_gallery_bank($file) {
            $meta_data_array = array();
            $image_data = getimagesize($file);
            $meta_data_array["width"] = $image_data[0];
            $meta_data_array["height"] = $image_data[1];
            if (preg_match("!^image/!", $image_data["mime"]) && file_is_displayable_image($file)) {
               $meta_data_array["mime_type"] = $image_data["mime"];
               $meta_data_array["file"] = _wp_relative_upload_path($file);
               $meta_data_array["exif_information"] = wp_read_image_metadata($file);
            }
            return $meta_data_array;
         }
         function generate_thumbs_edited_image_gallery_bank($fileName, $thumb_dimension) {
            if (function_exists("wp_get_image_editor")) {
               $image = wp_get_image_editor(GALLERY_BANK_ORIGINAL_DIR . $fileName);
               $image_non_cropped = wp_get_image_editor(GALLERY_BANK_ORIGINAL_DIR . $fileName);
               if (!is_wp_error($image) || !is_wp_error($image_non_cropped)) {
                  $image->resize($thumb_dimension[0], $thumb_dimension[1], true);
                  $image->save(GALLERY_BANK_THUMBS_CROPPED_DIR . $fileName);

                  $image_non_cropped->resize($thumb_dimension[0], $thumb_dimension[1], false);
                  $image_non_cropped->save(GALLERY_BANK_THUMBS_NON_CROPPED_DIR . $fileName);
               }
            } else {
               $img = image_resize(GALLERY_BANK_ORIGINAL_DIR . $fileName, $thumb_dimension[0], $thumb_dimension[1], true);
               copy($img, GALLERY_BANK_THUMBS_CROPPED_DIR . $fileName);
               unlink($img);

               $img = image_resize(GALLERY_BANK_ORIGINAL_DIR . $fileName, $thumb_dimension[0], $thumb_dimension[1], false);
               copy($img, GALLERY_BANK_THUMBS_NON_CROPPED_DIR . $fileName);
               unlink($img);
            }
         }
         function alter_thumbs_gallery_bank($image_names, $thumb_dimension) {
            foreach ($image_names as $image_name) {
               $this->generate_thumbs_edited_image_gallery_bank($image_name, $thumb_dimension);
            }
         }
      }
   }
}