<?php
/**
 * This file is used for frontend layout.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/galleries
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
// Exit if accessed directly
if (file_exists(GALLERY_BANK_USER_VIEWS_PATH . "includes/galleries/queries.php")) {
   include GALLERY_BANK_USER_VIEWS_PATH . "includes/galleries/queries.php";
}
?>
<div id="<?php echo $random; ?>">
   <div id="gallery_bank_main_container_<?php echo $random; ?>" class="gallery_bank_main_container">
      <?php
      if (isset($album_type) && $album_type == "compact_album") {
         $album_button_text = isset($compact_album_layout_settings["compact_album_layout_button_text"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_button_text"]) : "Back To Album";
      }
      if (isset($_REQUEST["gallery_id"])) {
         if ($id == intval($_REQUEST["gallery_id"])) {
            ?>
            <input onclick="location.href = '<?php echo strtok($_SERVER["REQUEST_URI"], '?'); ?>'" type="button" class="album_layout_button" name="ux_btn_back_albums" id="ux_btn_back_albums" value="<?php echo isset($album_button_text) ? $album_button_text : "Back To Album"; ?>">
            <?php
         }
      }
      if (isset($layout_type)) {
         if (isset($gallery_data) && count($gallery_data) > 0) {
            switch (esc_attr($layout_type)) {
               case "thumbnail_layout" :
                  $gallery_title_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) : "h2";
                  $gallery_desc_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) : "h3";
                  break;
               case "masonry_layout" :
                  $gallery_title_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) : "h2";
                  $gallery_desc_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) : "h3";
                  break;
            }
            if (isset($lightbox_type)) {
               switch (esc_attr($lightbox_type)) {
                  case "foo_box_free_edition":
                     if (!class_exists("fooboxV2")) {
                        wp_enqueue_style("foobox.free.min.css", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/lightboxes/foobox/css/foobox.free.min.css");
                        wp_enqueue_style("foobox.noie7.min.css", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/lightboxes/foobox/css/foobox.noie7.min.css");
                        wp_enqueue_script("foobox.free.min.js", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/lightboxes/foobox/js/foobox.free.min.js");
                     }
                     break;
               }
            }
            if (file_exists(GALLERY_BANK_USER_VIEWS_PATH . "includes/galleries/translations.php")) {
               include GALLERY_BANK_USER_VIEWS_PATH . "includes/galleries/translations.php";
            }
            if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/galleries/style-sheet.php")) {
               include GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/galleries/style-sheet.php";
            }
            if ($gallery_title == "show" && $display_gallery_data["gallery_title"] != "") {
               ?>
               <div id="gallery_title_container_<?php echo $random; ?>" class="gallery_title_container">
                  <<?php echo $gallery_title_html_tag; ?>>
                  <?php echo isset($display_gallery_data["gallery_title"]) ? htmlspecialchars_decode($display_gallery_data["gallery_title"]) : ""; ?>
                  </<?php echo $gallery_title_html_tag; ?>>
               </div>
               <?php
            }
            if ($gallery_description == "show" && $display_gallery_data["gallery_description"] != "") {
               ?>
               <div id="gallery_desc_container_<?php echo $random; ?>" class="gallery_desc_container">
                  <<?php echo $gallery_desc_html_tag; ?>>
                  <?php echo isset($display_gallery_data["gallery_description"]) ? htmlspecialchars_decode($display_gallery_data["gallery_description"]) : ""; ?>
                  </<?php echo $gallery_desc_html_tag; ?>>
               </div>
               <?php
            }
            if (file_exists(GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/galleries/scripts-before.php")) {
               include GALLERY_BANK_PLUGIN_DIR_PATH . "user-views/includes/galleries/scripts-before.php";
            }
            ?>
            <div id="grid_layout_container_<?php echo $random; ?>">
               <?php
               switch (esc_attr($layout_type)) {
                  case "thumbnail_layout" :
                     if (file_exists(GALLERY_BANK_USER_VIEWS_PATH . "layouts/thumbnail-layout/thumbnail-layout.php")) {
                        include GALLERY_BANK_USER_VIEWS_PATH . "layouts/thumbnail-layout/thumbnail-layout.php";
                     }
                     break;

                  case "masonry_layout" :
                     if (file_exists(GALLERY_BANK_USER_VIEWS_PATH . "layouts/masonry-layout/masonry-layout.php")) {
                        include GALLERY_BANK_USER_VIEWS_PATH . "layouts/masonry-layout/masonry-layout.php";
                     }
                     wp_enqueue_script("imageloaded.js", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/layouts/isotope-master/imageloaded.js");
                     wp_enqueue_script("isotope.js", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/layouts/isotope-master/isotope.js");
                     break;
               }
            }
         }
         ?>
      </div>
   </div>
</div>
<?php
