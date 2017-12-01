<?php
/**
 * This file is used for frontend layout.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/albums
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
// Exit if accessed directly
if (file_exists(GALLERY_BANK_USER_VIEWS_PATH . "includes/albums/queries.php")) {
   include GALLERY_BANK_USER_VIEWS_PATH . "includes/albums/queries.php";
}
?>
<div id="<?php echo $random; ?>">
   <div id="gallery_bank_album_main_container_<?php echo $random; ?>" class="gallery_bank_album_main_container">
      <?php
      if (isset($album_type)) {
         if (count($album_data) > 0) {
            switch (esc_attr($album_type)) {
               case "compact_album" :
                  $album_title_html_tag = isset($compact_album_layout_settings["compact_album_layout_title_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_title_html_tag"]) : "h2";
                  $album_desc_html_tag = isset($compact_album_layout_settings["compact_album_layout_description_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_description_html_tag"]) : "h3";
                  break;
            }
            if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/albums/style-sheet.php")) {
               include GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/albums/style-sheet.php";
            }
            if ($album_title == "show" && $display_album_data["album_name"] != "") {
               ?>
               <div id="album_title_container_<?php echo $random; ?>" class="album_title_container">
                  <<?php echo $album_title_html_tag; ?>>
                  <?php echo isset($display_album_data["album_name"]) ? htmlspecialchars_decode($display_album_data["album_name"]) : ""; ?>
                  </<?php echo $album_title_html_tag; ?>>
               </div>
               <?php
            }
            if ($album_description == "show" && $display_album_data["album_description"] != "") {
               ?>
               <div id="album_desc_container_<?php echo $random; ?>" class="album_desc_container">
                  <<?php echo $album_desc_html_tag; ?>>
                  <?php echo isset($display_album_data["album_description"]) ? htmlspecialchars_decode($display_album_data["album_description"]) : ""; ?>
                  </<?php echo $album_desc_html_tag; ?>>
               </div>
               <?php
            }

            if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/albums/scripts-before.php")) {
               include GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/albums/scripts-before.php";
            }
            switch (esc_attr($album_type)) {
               case "compact_album" :
                  if (file_exists(GALLERY_BANK_USER_VIEWS_PATH . "layouts/compact-album-layout/compact-album-layout.php")) {
                     include GALLERY_BANK_USER_VIEWS_PATH . "layouts/compact-album-layout/compact-album-layout.php";
                  }
                  break;
            }
         }
      }
      ?>
   </div>
</div>