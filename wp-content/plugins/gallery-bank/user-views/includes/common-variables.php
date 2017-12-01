<?php
/**
 * This file is used for common variables.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
global $wpdb;
$layout_type = str_replace('&quot;', '', $layout_type);
$id = str_replace('&quot;', '', $id);
$buttons_type = str_replace('&quot;', '', $buttons_type);
$gallery_title = str_replace('&quot;', '', $gallery_title);
$gallery_description = str_replace('&quot;', '', $gallery_description);
$thumbnail_title = str_replace('&quot;', '', $thumbnail_title);
$thumbnail_description = str_replace('&quot;', '', $thumbnail_description);
$animation_effects = str_replace('&quot;', '', $animation_effects);
$alignment = str_replace('&quot;', '', $alignment);
$lightbox_type = str_replace('&quot;', '', $lightbox_type);
$columns = str_replace('&quot;', '', $columns);
$row_height = str_replace('&quot;', '', $row_height);
$source_type = str_replace('&quot;', '', $source_type);
$random = rand(100, 10000);

$global_options_settings = user_helper_gallery_bank::get_meta_value_gallery_bank("global_options_settings");
$custom_css = user_helper_gallery_bank::get_meta_value_gallery_bank("custom_css");
if (isset($animation_effects)) {
   wp_enqueue_style("gallery-bank-animation-effects.css", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/css/animation-effects/gb-animation-effects.css");
   wp_enqueue_script("gallery-bank-scrolla.js", GALLERY_BANK_PLUGIN_DIR_URL . "user-views/assets/js/scrolla.jquery.min.js");
}