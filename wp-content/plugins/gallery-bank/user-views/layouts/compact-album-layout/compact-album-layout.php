<?php
/**
 * This file is used for Compact Album Layout.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/layouts
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly 
?>
<div id="control_container_<?php echo $random; ?>">
   <?php
   if (isset($gallery_data_unserialize)) {
      if (count($gallery_data_unserialize) > 0) {
         foreach ($gallery_data_unserialize as $gallery) {
            $filename_thumbs = GALLERY_BANK_THUMBS_CROPPED_URL . $gallery["gallery_cover_image"];
            if (isset($gallery["file_type"]) && $gallery["file_type"] == "image") {
               if (!file_exists(GALLERY_BANK_THUMBS_NON_CROPPED_DIR . $gallery["gallery_cover_image"])) {
                  if (strpos($gallery["gallery_cover_image"], ".") !== false) {
                     $filename_actual = explode(".", $gallery["gallery_cover_image"]);
                     $filename_thumbs = GALLERY_BANK_THUMBS_CROPPED_URL . $filename_actual[0] . "." . strtoupper($filename_actual[1]);
                  } else {
                     $filename_thumbs = GALLERY_BANK_PLUGIN_DIR_URL . "/assets/admin/images/album-cover.png";
                  }
               }
            }
            $redirect_url = esc_url(add_query_arg(array("type" => "gallery", "gallery_id" => intval($gallery["old_gallery_id"]), "album_id" => $id)));
            ?>
            <div id="grid_wrapper_item_album_<?php echo $random . "_" . $gallery["id"]; ?>" class="compact_album_grid_wrapper_item gb_animate"  data-animate="<?php echo isset($animation_effects) ? $animation_effects : 'none'; ?>" data-duration="1.0s" data-delay="0.1s" data-offset="100">
               <a href="<?php echo $redirect_url; ?>">
                  <div id="grid_item_album_image_<?php echo $random . "_" . $gallery["id"]; ?>" class="compact_album_grid_item_image_<?php echo $random; ?>" style="background:url('<?php echo isset($gallery["file_type"]) && $gallery["file_type"] == "video" ? esc_attr($gallery["gallery_cover_image"]) : $filename_thumbs; ?>');">
                     <img src="<?php echo isset($gallery["file_type"]) && $gallery["file_type"] == "video" ? esc_attr($gallery["gallery_cover_image"]) : $filename_thumbs; ?>"/>
                  </div>
               </a>
               <?php
               if ($gallery["gallery_title"] != "" || $gallery["gallery_description"] != "") {
                  ?>
                  <div id="grid_content_item_album" class="compact_album_grid_content_item">
                     <?php
                     if ($gallery_title == "show" && $gallery["gallery_title"] != "") {
                        ?>
                        <a href="<?php echo $redirect_url; ?>" id="grid_album_single_text_title_<?php echo $random . "_" . $gallery["id"]; ?>" class="compact_album_grid_single_text_title">
                           <<?php echo isset($compact_album_layout_settings["compact_album_layout_gallery_title_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_title_html_tag"]) : "h3"; ?>>
                           <?php echo isset($gallery["gallery_title"]) ? htmlspecialchars_decode($gallery["gallery_title"]) : ""; ?>
                           </<?php echo isset($compact_album_layout_settings["compact_album_layout_gallery_title_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_title_html_tag"]) : "h3"; ?>>
                        </a>
                        <?php
                     }
                     if ($gallery_description == "show" && $gallery["gallery_description"] != "") {
                        ?>
                        <a href="<?php echo $redirect_url; ?>" id="grid_album_single_text_desc_<?php echo $random . "_" . $gallery["id"]; ?>" class="compact_album_grid_single_text_desc">
                           <<?php echo isset($compact_album_layout_settings["compact_album_layout_gallery_description_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_description_html_tag"]) : "p"; ?>>
                           <?php echo isset($gallery["gallery_description"]) ? htmlspecialchars_decode($gallery["gallery_description"]) : ""; ?>
                           </<?php echo isset($compact_album_layout_settings["compact_album_layout_gallery_description_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_description_html_tag"]) : "p"; ?>>
                        </a>
                        <?php
                     }
                     ?>
                  </div>
                  <?php
               }
               ?>
            </div>
            <?php
         }
      }
   }
   ?>
</div>