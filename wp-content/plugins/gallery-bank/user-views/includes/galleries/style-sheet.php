<?php
/**
 * This file is used for Frontend CSS.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/galleries
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
if (isset($id)) {
   //TODO: Code for General Options
   if (isset($layout_type)) {
      $global_options_language_direction = isset($global_options_settings["global_options_language_direction"]) && $global_options_settings["global_options_language_direction"] == "right_to_left" ? "rtl" : "ltr";
      $global_options_alignment = isset($alignment) ? esc_attr($alignment) : "left";
      switch (esc_attr($layout_type)) {
         case "thumbnail_layout" :
            //font families extract from database
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_gallery_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_gallery_description_font_family"]) : "Roboto Slab:300";
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_family"]) : "Roboto Slab:300";

            //code for importing google fonts url
            $unique_font_families_layout = array_unique($font_families_layout);
            $import_font_family_layout = user_helper_gallery_bank::unique_font_families_gallery_bank($unique_font_families_layout);
            $font_family_name_layout = user_helper_gallery_bank::font_families_gallery_bank($font_families_layout);

            //code for extracting thumbnail layout settiings
            $thumbnail_layout_thumbnail_dimensions = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_dimensions"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_dimensions"]) : "180,160";
            $thumbnail_layout_thumbnail_margin = isset($thumbnail_layout_settings["thumbnail_layout_general_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_margin"]) : array(10, 0, 0, 10);
            $thumbnail_layout_thumbnail_padding = isset($thumbnail_layout_settings["thumbnail_layout_general_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_padding"]) : array(5, 5, 5, 5);
            $thumbnail_layout_thumbnail_border_width = isset($thumbnail_layout_settings["thumbnail_layout_general_border_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_border_style"]) : array("2", "solid", "#000000");
            $thumbnail_layout_general_border_radius = isset($thumbnail_layout_settings["thumbnail_layout_general_border_radius"]) ? intval($thumbnail_layout_settings["thumbnail_layout_general_border_radius"]) : 0;
            $thumbnail_layout_box_shadow = isset($thumbnail_layout_settings["thumbnail_layout_general_shadow"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_shadow"]) : array(0, 1, 3, 0);
            $thumbnail_layout_box_shadow_color = isset($thumbnail_layout_settings["thumbnail_layout_general_shadow_color"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_general_shadow_color"]) : "#000000";
            $thumbnail_layout_general_transition_time = isset($thumbnail_layout_settings["thumbnail_layout_general_transition_time"]) ? intval($thumbnail_layout_settings["thumbnail_layout_general_transition_time"]) : 1;
            $thumbnail_layout_background_color_transparency = isset($thumbnail_layout_settings["thumbnail_layout_general_background_color_transparency"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_background_color_transparency"]) : array("#ffffff", "50");
            $thumbnail_layout_background_color = $thumbnail_layout_background_color_transparency[0] != "" ? user_helper_gallery_bank::hex2rgb_gallery_bank($thumbnail_layout_background_color_transparency[0]) : array("", "", "");
            $thumbnail_layout_background_transparency = $thumbnail_layout_background_color_transparency[1] / 100;
            $thumbnail_layout_general_thumbnail_opacity = isset($thumbnail_layout_settings["thumbnail_layout_general_thumbnail_opacity"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_general_thumbnail_opacity"] / 100) : 1;
            $thumbnail_layout_container_width = isset($thumbnail_layout_settings["thumbnail_layout_container_width"]) ? intval($thumbnail_layout_settings["thumbnail_layout_container_width"]) : 100;
            $thumbnail_layout_thumbnail_position = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_position"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_position"]) : array("center", "center");
            $thumbnail_layout_max_width = $columns != 0 ? ($thumbnail_layout_thumbnail_dimensions[0] + ($thumbnail_layout_thumbnail_margin[1] + $thumbnail_layout_thumbnail_margin[3]) + ($thumbnail_layout_thumbnail_padding[1] + $thumbnail_layout_thumbnail_padding[3]) + ($thumbnail_layout_thumbnail_border_width[0] * 2)) * $columns + 25 : "100%";
            $hover_effect = isset($thumbnail_layout_settings["thumbnail_layout_general_hover_effect_value"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_hover_effect_value"]) : array("none", "0", "0", "0");
            if (isset($hover_effect[0])) {
               switch (esc_attr($hover_effect[0])) {
                  case "skew":
                  case "rotate":
                     $thumbnail_layout_hover_effect = $hover_effect[0] . "(" . $hover_effect[1] . "deg)";
                     break;
                  case "scale":
                     $thumbnail_layout_hover_effect = $hover_effect[0] . "(" . $hover_effect[2] . " , " . $hover_effect[3] . ")";
                     break;
                  case "none":
                     $thumbnail_layout_hover_effect = "none";
                     break;
               }
            }
            $thumbnail_layout_alignment = isset($alignment) && $alignment != "" ? esc_attr($alignment) : "left";
            switch (esc_attr($thumbnail_layout_alignment)) {
               case "left":
                  $thumbnail_text_alignment = "float: left !important;";
                  break;
               case "center":
                  $thumbnail_text_alignment = "margin-left: auto !important;";
                  $thumbnail_text_alignment .= "margin-right: auto !important;";
                  break;
               case "right":
                  $thumbnail_text_alignment = "float: right !important;";
                  break;
            }
            $thumbnail_layout_gallery_title_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) : "h2";
            $thumbnail_layout_gallery_title_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_text_alignment"]) : "left";
            $thumbnail_layout_gallery_title_font_style = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_title_font_style"]) : array(20, "#000000");
            $thumbnail_layout_gallery_title_margin = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_title_margin"]) : array(10, 0, 10, 0);
            $thumbnail_layout_gallery_title_padding = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_title_padding"]) : array(10, 0, 10, 0);
            $thumbnail_layout_gallery_title_line_height = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_line_height"]) : "1.7em";

            $thumbnail_layout_gallery_desc_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) : "h3";
            $thumbnail_layout_gallery_desc_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_text_alignment"]) : "left";
            $thumbnail_layout_gallery_desc_font_style = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_description_font_style"]) : array(16, "#787D85");
            $thumbnail_layout_gallery_desc_margin = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_description_margin"]) : array(10, 0, 10, 0);
            $thumbnail_layout_gallery_desc_padding = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_description_padding"]) : array(0, 0, 10, 0);
            $thumbnail_layout_gallery_desc_line_height = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_line_height"]) : "1.7em";

            $thumbnail_layout_thumbnail_title_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) : "h3";
            $thumbnail_layout_thumbnail_title_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_text_alignment"]) : "left";
            $thumbnail_layout_thumbnail_title_font_style = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_style"]) : array(14, "#787D85");
            $thumbnail_layout_thumbnail_title_margin = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_title_margin"]) : array(0, 5, 0, 5);
            $thumbnail_layout_thumbnail_title_padding = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_title_padding"]) : array(10, 10, 10, 10);
            $thumbnail_layout_thumbnail_title_line_height = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_line_height"]) : "1.7em";

            $thumbnail_layout_thumbnail_description_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) : "p";
            $thumbnail_layout_thumbnail_description_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_text_alignment"]) : "left";
            $thumbnail_layout_thumbnail_desc_font_style = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_style"]) : array(12, "#787D85");
            $thumbnail_layout_thumbnail_desc_margin = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_description_margin"]) : array(0, 5, 0, 5);
            $thumbnail_layout_thumbnail_desc_padding = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_description_padding"]) : array(5, 10, 10, 5);
            $thumbnail_layout_thumbnail_desc_line_height = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_line_height"]) : "1.7em";
            break;

         case "masonry_layout" :
            //font families extract from database
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_gallery_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_gallery_description_font_family"]) : "Roboto Slab:300";
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_thumbnail_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_thumbnail_description_font_family"]) : "Roboto Slab:300";

            //code for importing google fonts url
            $unique_font_families_layout = array_unique($font_families_layout);
            $import_font_family_layout = user_helper_gallery_bank::unique_font_families_gallery_bank($unique_font_families_layout);
            $font_family_name_layout = user_helper_gallery_bank::font_families_gallery_bank($font_families_layout);

            $masonry_layout_thumbnail_width = isset($masonry_layout_settings["masonry_layout_general_thumbnail_width"]) ? intval($masonry_layout_settings["masonry_layout_general_thumbnail_width"]) : "180";
            $masonry_layout_thumbnail_margin = isset($masonry_layout_settings["masonry_layout_general_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_margin"]) : array(15, 15, 0, 0);
            $masonry_layout_thumbnail_padding = isset($masonry_layout_settings["masonry_layout_general_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_padding"]) : array(5, 5, 5, 5);
            $masonry_layout_thumbnail_border_style = isset($masonry_layout_settings["masonry_layout_general_border_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_border_style"]) : array("2", "solid", "#000000");
            $masonry_layout_thumbnail_background_color_transparency = isset($masonry_layout_settings["masonry_layout_general_background_color_transparency"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_background_color_transparency"]) : array("#ffffff", "50");
            $masonry_layout_thumbnail_background_color = $masonry_layout_thumbnail_background_color_transparency[0] != "" ? user_helper_gallery_bank::hex2rgb_gallery_bank($masonry_layout_thumbnail_background_color_transparency[0]) : array("", "", "");
            $masonry_layout_thumbnail_background_transparency = $masonry_layout_thumbnail_background_color_transparency[1] / 100;
            $masonry_layout_thumbnail_opacity = isset($masonry_layout_settings["masonry_layout_general_masonry_opacity"]) ? floatval($masonry_layout_settings["masonry_layout_general_masonry_opacity"] / 100) : "1";
            $masonry_layout_thumbnail_border_radius = isset($masonry_layout_settings["masonry_layout_general_border_radius"]) ? intval($masonry_layout_settings["masonry_layout_general_border_radius"]) : 0;
            $masonry_layout_thumbnail_box_shadow = isset($masonry_layout_settings["masonry_layout_general_shadow"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_shadow"]) : array(0, 1, 3, 0);
            $masonry_layout_thumbnail_box_shadow_color = isset($masonry_layout_settings["masonry_layout_general_shadow_color"]) ? esc_attr($masonry_layout_settings["masonry_layout_general_shadow_color"]) : "#000000";
            $masonry_layout_thumbnail_transition_time = isset($masonry_layout_settings["masonry_layout_general_transition_time"]) ? intval($masonry_layout_settings["masonry_layout_general_transition_time"]) : 1;
            $masonry_layout_thumbnail_hover_effect = isset($masonry_layout_settings["masonry_layout_general_hover_effect_value"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_hover_effect_value"]) : array("none", 0, 0, 0);
            if (isset($masonry_layout_thumbnail_hover_effect[0])) {
               switch (esc_attr($masonry_layout_thumbnail_hover_effect[0])) {
                  case "skew":
                  case "rotate":
                     $masonry_layout_thumbnail_general_hover_effect = $masonry_layout_thumbnail_hover_effect[0] . "(" . $masonry_layout_thumbnail_hover_effect[1] . "deg)";
                     break;
                  case "scale":
                     $masonry_layout_thumbnail_general_hover_effect = $masonry_layout_thumbnail_hover_effect[0] . "(" . $masonry_layout_thumbnail_hover_effect[2] . " , " . $masonry_layout_thumbnail_hover_effect[3] . ")";
                     break;
                  case "none":
                     $masonry_layout_thumbnail_general_hover_effect = "none";
                     break;
               }
            }
            $masonry_alignment = isset($alignment) && $alignment != "" ? esc_attr($alignment) : "left";
            switch (esc_attr($masonry_alignment)) {
               case "left":
                  $masonry_text_alignment = "text-align: left !important;";
                  break;
               case "center":
                  $masonry_text_alignment = "margin-left: auto !important;";
                  $masonry_text_alignment .= "margin-right: auto !important;";
                  break;
               case "right":
                  $masonry_text_alignment = "text-align: right !important;";
                  break;
            }
            $masonry_layout_max_width = $columns != 0 ? ($masonry_layout_thumbnail_width + ($masonry_layout_thumbnail_margin[1] + $masonry_layout_thumbnail_margin[3]) + ($masonry_layout_thumbnail_padding[1] + $masonry_layout_thumbnail_padding[3]) + ($masonry_layout_thumbnail_border_style[0] * 2)) * $columns : "100%";

            $masonry_layout_gallery_title_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) : "h2";
            $masonry_layout_gallery_title_text_alignment = isset($masonry_layout_settings["masonry_layout_gallery_title_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_text_alignment"]) : "left";
            $masonry_layout_gallery_title_font_style = isset($masonry_layout_settings["masonry_layout_gallery_title_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_title_font_style"]) : array(20, "#000000");
            $masonry_layout_gallery_title_margin = isset($masonry_layout_settings["masonry_layout_gallery_title_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_title_margin"]) : array(10, 0, 10, 0);
            $masonry_layout_gallery_title_padding = isset($masonry_layout_settings["masonry_layout_gallery_title_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_title_padding"]) : array(10, 0, 10, 0);
            $masonry_layout_gallery_title_line_height = isset($masonry_layout_settings["masonry_layout_gallery_title_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_line_height"]) : "1.7em";

            $masonry_layout_gallery_description_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) : "h3";
            $masonry_layout_gallery_description_text_alignment = isset($masonry_layout_settings["masonry_layout_gallery_description_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_text_alignment"]) : "left";
            $masonry_layout_gallery_description_font_style = isset($masonry_layout_settings["masonry_layout_gallery_description_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_description_font_style"]) : array(16, "#787D85");
            $masonry_layout_gallery_description_margin = isset($masonry_layout_settings["masonry_layout_gallery_description_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_description_margin"]) : array(10, 0, 10, 0);
            $masonry_layout_gallery_description_padding = isset($masonry_layout_settings["masonry_layout_gallery_description_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_description_padding"]) : array(0, 0, 10, 0);
            $masonry_layout_gallery_description_line_height = isset($masonry_layout_settings["masonry_layout_gallery_description_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_line_height"]) : "1.7em";

            $masonry_layout_thumbnail_title_html_tag = isset($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) : "h3";
            $masonry_layout_thumbnail_title_text_alignment = isset($masonry_layout_settings["masonry_layout_thumbnail_title_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_text_alignment"]) : "left";
            $masonry_layout_thumbnail_title_font_style = isset($masonry_layout_settings["masonry_layout_thumbnail_title_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_title_font_style"]) : array(14, "#787D85");
            $masonry_layout_thumbnail_title_margin = isset($masonry_layout_settings["masonry_layout_thumbnail_title_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_title_margin"]) : array(0, 5, 0, 5);
            $masonry_layout_thumbnail_title_padding = isset($masonry_layout_settings["masonry_layout_thumbnail_title_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_title_padding"]) : array(10, 10, 10, 10);
            $masonry_layout_thumbnail_title_line_height = isset($masonry_layout_settings["masonry_layout_thumbnail_title_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_line_height"]) : "1.7em";

            $masonry_layout_thumbnail_description_html_tag = isset($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) : "p";
            $masonry_layout_thumbnail_description_text_alignment = isset($masonry_layout_settings["masonry_layout_thumbnail_description_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_text_alignment"]) : "left";
            $masonry_layout_thumbnail_description_font_style = isset($masonry_layout_settings["masonry_layout_thumbnail_description_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_description_font_style"]) : array(12, "#787D85");
            $masonry_layout_thumbnail_description_margin = isset($masonry_layout_settings["masonry_layout_thumbnail_description_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_description_margin"]) : array(0, 5, 0, 5);
            $masonry_layout_thumbnail_description_padding = isset($masonry_layout_settings["masonry_layout_thumbnail_description_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_description_padding"]) : array(5, 10, 10, 5);
            $masonry_layout_thumbnail_description_line_height = isset($masonry_layout_settings["masonry_layout_thumbnail_description_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_line_height"]) : "1.7em";
            break;
      }
   }
   if (isset($lightbox_type)) {
      switch (esc_attr($lightbox_type)) {
         case "foo_box_free_edition":
            //font families extract from database
            $font_families_lightbox[] = isset($foobox_meta_data["foo_box_title_font_family"]) ? htmlspecialchars_decode($foobox_meta_data["foo_box_title_font_family"]) : "Roboto Slab:700";
            $font_families_lightbox[] = isset($foobox_meta_data["foo_box_description_font_family"]) ? htmlspecialchars_decode($foobox_meta_data["foo_box_description_font_family"]) : "Roboto Slab:300";

            //code for importing google fonts url
            $unique_font_families_lightbox = array_unique($font_families_lightbox);
            $import_font_family_lightbox = user_helper_gallery_bank::unique_font_families_gallery_bank($unique_font_families_lightbox);
            $foo_box_font_family_name = user_helper_gallery_bank::font_families_gallery_bank($font_families_lightbox);

            //code for extracting foobox lightbox settings
            $foo_box_border_radius = isset($foobox_meta_data["foo_box_border_radius"]) ? intval($foobox_meta_data["foo_box_border_radius"]) : 5;
            $foo_box_border = isset($foobox_meta_data["foo_box_border_style"]) ? explode(",", $foobox_meta_data["foo_box_border_style"]) : array(5, "solid", "#ffffff");
            $foo_box_overlay_color = isset($foobox_meta_data["foo_box_overlay_color"]) ? esc_attr($foobox_meta_data["foo_box_overlay_color"]) : "#000000";
            $foo_box_background_overlay_color = isset($foo_box_overlay_color) != "" ? user_helper_gallery_bank::hex2rgb_gallery_bank($foo_box_overlay_color) : array("", "", "");

            $foo_box_image_title_html_tag = isset($foobox_meta_data["foo_box_image_title_html_tag"]) ? esc_attr($foobox_meta_data["foo_box_image_title_html_tag"]) : "h1";
            $foo_box_title_text_alignment = isset($foobox_meta_data["foo_box_image_title_text_alignment"]) ? esc_attr($foobox_meta_data["foo_box_image_title_text_alignment"]) : "center";
            $foo_box_title_display = isset($foobox_meta_data["foo_box_title"]) && $foobox_meta_data["foo_box_title"] == "true" ? "block" : "none";
            $foo_box_title_font_style = isset($foobox_meta_data["foo_box_title_font_style"]) ? explode(",", $foobox_meta_data["foo_box_title_font_style"]) : array(15, "#ffffff");
            $foo_box_title_margin = isset($foobox_meta_data["foo_box_image_title_margin"]) ? explode(",", $foobox_meta_data["foo_box_image_title_margin"]) : array(5, 0, 5, 0);
            $foo_box_title_padding = isset($foobox_meta_data["foo_box_image_title_padding"]) ? explode(",", $foobox_meta_data["foo_box_image_title_padding"]) : array(0, 0, 0, 0);

            $foo_box_image_description_html_tag = isset($foobox_meta_data["foo_box_image_description_html_tag"]) ? esc_attr($foobox_meta_data["foo_box_image_description_html_tag"]) : "h1";
            $foo_box_desc_text_alignment = isset($foobox_meta_data["foo_box_image_description_text_alignment"]) ? esc_attr($foobox_meta_data["foo_box_image_description_text_alignment"]) : "center";
            $foo_box_desc_font_style = isset($foobox_meta_data["foo_box_description_font_style"]) ? explode(",", $foobox_meta_data["foo_box_description_font_style"]) : array(12, "#ffffff");
            $foo_box_desc_margin = isset($foobox_meta_data["foo_box_image_description_margin"]) ? explode(",", $foobox_meta_data["foo_box_image_description_margin"]) : array(5, 0, 5, 0);
            $foo_box_desc_padding = isset($foobox_meta_data["foo_box_image_description_padding"]) ? explode(",", $foobox_meta_data["foo_box_image_description_padding"]) : array(0, 0, 0, 0);
            $foo_box_desc_display = isset($foobox_meta_data["foo_box_description"]) && $foobox_meta_data["foo_box_description"] == "true" ? "block" : "none";
            $foo_box_overlay_opacity = isset($foobox_meta_data["foo_box_overlay_opacity"]) ? floatval($foobox_meta_data["foo_box_overlay_opacity"]) / 100 : 0.75;
            break;
      }
   }
   if (isset($album_type) && $album_type == "compact_album") {
      $compact_album_button_text_font_family[] = $compact_album_layout_settings["compact_album_layout_button_text_font_family"];
      $import_compact_button_text_font_family = user_helper_gallery_bank::unique_font_families_gallery_bank($compact_album_button_text_font_family);
      $font_family_compact_button_text = user_helper_gallery_bank::font_families_gallery_bank($compact_album_button_text_font_family);

      //code for extracting compact album Button settiings
      $compact_album_button_font_style = isset($compact_album_layout_settings["compact_album_layout_button_font_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_button_font_style"]) : array(14, "#ffffff");
      $compact_album_button_color = isset($compact_album_layout_settings["compact_album_layout_button_color"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_button_color"]) : "#a4cd39";
      $compact_album_button_hover_color = isset($compact_album_layout_settings["compact_album_layout_button_hover_color"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_button_hover_color"]) : "#a4cd39";
      $compact_album_button_font_hover_color = isset($compact_album_layout_settings["compact_album_layout_button_font_hover_color"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_button_font_hover_color"]) : "#ffffff";
      $compact_album_button_text_alignment = isset($compact_album_layout_settings["compact_album_layout_button_text_alignment"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_button_text_alignment"]) : "left";
      $compact_album_button_border_style = isset($compact_album_layout_settings["compact_album_layout_button_border_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_button_border_style"]) : array(1, "solid", "#a4cd39");
      $compact_album_button_border_hover_color = isset($compact_album_layout_settings["compact_album_layout_button_border_hover_color"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_button_border_hover_color"]) : "#a4cd39";
      $compact_album_button_border_radius = isset($compact_album_layout_settings["compact_album_layout_button_border_radius"]) ? intval($compact_album_layout_settings["compact_album_layout_button_border_radius"]) : 4;
      $compact_album_button_margin = isset($compact_album_layout_settings["compact_album_layout_button_margin"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_button_margin"]) : array(0, 0, 0, 0);
      $compact_album_button_padding = isset($compact_album_layout_settings["compact_album_layout_button_padding"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_button_padding"]) : array(10, 14, 10, 14);
   }
   ?>
   <style type="text/css">
      #gallery_bank_main_container_<?php echo $random; ?>
      {
         direction: <?php echo $global_options_language_direction; ?> !important;
      }
      .gb-filter-holder_<?php echo $random; ?>
      {
         text-align: <?php echo $global_options_alignment; ?>;
      }
      <?php
      echo isset($import_font_family_layout) ? $import_font_family_layout : "";
      echo isset($import_font_family_lightbox) ? $import_font_family_lightbox : "";
      echo isset($import_compact_button_text_font_family) ? $import_compact_button_text_font_family : "";
      if (isset($layout_type)) {
         switch ($layout_type) {
            case "thumbnail_layout" :
               ?>
               #gallery_bank_main_container_<?php echo $random; ?>
               {
                  width: <?php echo $thumbnail_layout_container_width; ?>% !important;
                  max-width: <?php echo $thumbnail_layout_max_width; ?>px !important;
                  <?php echo $thumbnail_text_alignment; ?>
               }
               #gallery_title_container_<?php echo $random; ?> <?php echo $thumbnail_layout_gallery_title_html_tag; ?>
               {
                  line-height: <?php echo $thumbnail_layout_gallery_title_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_gallery_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_gallery_title_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_gallery_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_gallery_title_margin[0]); ?>px <?php echo intval($thumbnail_layout_gallery_title_margin[1]); ?>px <?php echo intval($thumbnail_layout_gallery_title_margin[2]); ?>px <?php echo intval($thumbnail_layout_gallery_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_gallery_title_padding[0]); ?>px <?php echo intval($thumbnail_layout_gallery_title_padding[1]); ?>px <?php echo intval($thumbnail_layout_gallery_title_padding[2]); ?>px <?php echo intval($thumbnail_layout_gallery_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[0]; ?>
               }
               #gallery_desc_container_<?php echo $random; ?> <?php echo $thumbnail_layout_gallery_desc_html_tag; ?>
               {
                  line-height: <?php echo $thumbnail_layout_gallery_desc_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_gallery_desc_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_gallery_desc_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_gallery_desc_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_gallery_desc_margin[0]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_margin[1]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_margin[2]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_gallery_desc_padding[0]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_padding[1]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_padding[2]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[1]; ?>

               }
               .grid_wrapper_item
               {
                  display: inline-block !important;
                  vertical-align: top !important;
                  margin: <?php echo intval($thumbnail_layout_thumbnail_margin[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_margin[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_margin[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_thumbnail_padding[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_padding[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_padding[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_padding[3]); ?>px !important;
                  box-shadow: <?php echo intval($thumbnail_layout_box_shadow[0]); ?>px <?php echo intval($thumbnail_layout_box_shadow[1]); ?>px <?php echo intval($thumbnail_layout_box_shadow[2]); ?>px <?php echo intval($thumbnail_layout_box_shadow[3]); ?>px <?php echo $thumbnail_layout_box_shadow_color; ?> !important;
                  -webkit-box-shadow: <?php echo intval($thumbnail_layout_box_shadow[0]); ?>px <?php echo intval($thumbnail_layout_box_shadow[1]); ?>px <?php echo intval($thumbnail_layout_box_shadow[2]); ?>px <?php echo intval($thumbnail_layout_box_shadow[3]); ?>px <?php echo $thumbnail_layout_box_shadow_color; ?> !important;
                  -moz-box-shadow: <?php echo intval($thumbnail_layout_box_shadow[0]); ?>px <?php echo intval($thumbnail_layout_box_shadow[1]); ?>px <?php echo intval($thumbnail_layout_box_shadow[2]); ?>px <?php echo intval($thumbnail_layout_box_shadow[3]); ?>px <?php echo $thumbnail_layout_box_shadow_color; ?> !important;
                  overflow: hidden !important;
               }
               #grid_layout_container_<?php echo $random; ?>
               {
                  clear: both !important;
               }
               .grid_item_image_<?php echo $random; ?>
               {
                  opacity: <?php echo $thumbnail_layout_general_thumbnail_opacity; ?> !important;
                  width: <?php echo intval($thumbnail_layout_thumbnail_dimensions[0]); ?>px !important;
                  height: <?php echo intval($thumbnail_layout_thumbnail_dimensions[1]); ?>px !important;
                  background-position: <?php echo esc_attr($thumbnail_layout_thumbnail_position[0]); ?> <?php echo esc_attr($thumbnail_layout_thumbnail_position[1]); ?> !important;
                  overflow: hidden !important;
                  border: <?php echo intval($thumbnail_layout_thumbnail_border_width[0]); ?>px <?php echo esc_attr($thumbnail_layout_thumbnail_border_width[1]); ?> <?php echo esc_attr($thumbnail_layout_thumbnail_border_width[2]); ?> !important;
                  border-radius: <?php echo $thumbnail_layout_general_border_radius; ?>px !important;
                  -webkit-border-radius: <?php echo $thumbnail_layout_general_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $thumbnail_layout_general_border_radius; ?>px !important;
               }
               .grid_item_image_<?php echo $random; ?> img
               {
                  display: none !important;
               }
               .grid_item_image_<?php echo $random; ?>:hover
               {
                  transition: <?php echo $thumbnail_layout_general_transition_time; ?>s !important;
                  transform : <?php echo $thumbnail_layout_hover_effect; ?> !important;
               }
               .grid_content_item
               {
                  width: <?php echo intval($thumbnail_layout_thumbnail_dimensions[0]); ?>px !important;
                  <?php
                  if ($thumbnail_layout_background_color_transparency[0] != "") {
                     ?>
                     background: rgba(<?php echo intval($thumbnail_layout_background_color[0]); ?>,<?php echo intval($thumbnail_layout_background_color[1]); ?>,<?php echo intval($thumbnail_layout_background_color[2]); ?>,<?php echo floatval($thumbnail_layout_background_transparency); ?>) !important;
                     <?php
                  }
                  ?>
               }
               .grid_single_text_title <?php echo $thumbnail_layout_thumbnail_title_html_tag; ?>
               {
                  display: block !important;
                  line-height: <?php echo $thumbnail_layout_thumbnail_title_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_thumbnail_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_thumbnail_title_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_thumbnail_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_thumbnail_title_margin[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_margin[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_margin[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_thumbnail_title_padding[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_padding[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_padding[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[2]; ?>
               }
               .grid_single_text_desc <?php echo $thumbnail_layout_thumbnail_description_html_tag; ?>
               {
                  display: block !important;
                  line-height: <?php echo $thumbnail_layout_thumbnail_desc_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_thumbnail_description_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_thumbnail_desc_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_thumbnail_desc_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_thumbnail_desc_margin[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_margin[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_margin[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_thumbnail_desc_padding[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_padding[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_padding[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[3]; ?>
               }
               <?php
               break;

            case "masonry_layout" :
               ?>
               #gallery_bank_main_container_<?php echo $random; ?>
               {
                  max-width: <?php echo $masonry_layout_max_width; ?>px !important;
                  <?php echo $masonry_text_alignment; ?>
               }
               #gallery_title_container_<?php echo $random; ?> <?php echo $masonry_layout_gallery_title_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_gallery_title_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_gallery_title_text_alignment; ?>!important;
                  font-size: <?php echo intval($masonry_layout_gallery_title_font_style[0]) ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_gallery_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_gallery_title_margin[0]); ?>px <?php echo intval($masonry_layout_gallery_title_margin[1]) ?>px <?php echo intval($masonry_layout_gallery_title_margin[2]); ?>px <?php echo intval($masonry_layout_gallery_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_gallery_title_padding[0]); ?>px <?php echo intval($masonry_layout_gallery_title_padding[1]); ?>px <?php echo intval($masonry_layout_gallery_title_padding[2]); ?>px <?php echo intval($masonry_layout_gallery_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[0]; ?>
               }
               #gallery_desc_container_<?php echo $random; ?> <?php echo $masonry_layout_gallery_description_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_gallery_description_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_gallery_description_text_alignment; ?> !important;
                  font-size: <?php echo intval($masonry_layout_gallery_description_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_gallery_description_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_gallery_description_margin[0]); ?>px <?php echo intval($masonry_layout_gallery_description_margin[1]); ?>px <?php echo intval($masonry_layout_gallery_description_margin[2]); ?>px <?php echo intval($masonry_layout_gallery_description_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_gallery_description_padding[0]); ?>px <?php echo intval($masonry_layout_gallery_description_padding[1]); ?>px <?php echo intval($masonry_layout_gallery_description_padding[2]); ?>px <?php echo intval($masonry_layout_gallery_description_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[1]; ?>
               }
               .masonry_grid_layout_container
               {
                  clear:both !important;
               }
               .masonry_grid_wrapper_item
               {
                  <?php
                  if ($masonry_layout_thumbnail_background_color_transparency[0] != "") {
                     ?>
                     background: rgba(<?php echo intval($masonry_layout_thumbnail_background_color[0]); ?>,<?php echo intval($masonry_layout_thumbnail_background_color[1]); ?>,<?php echo intval($masonry_layout_thumbnail_background_color[2]); ?>,<?php echo floatval($masonry_layout_thumbnail_background_transparency); ?>) !important;
                     <?php
                  }
                  ?>
                  margin: <?php echo intval($masonry_layout_thumbnail_margin[0]); ?>px <?php echo intval($masonry_layout_thumbnail_margin[1]); ?>px <?php echo intval($masonry_layout_thumbnail_margin[2]); ?>px <?php echo intval($masonry_layout_thumbnail_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_thumbnail_padding[0]); ?>px <?php echo intval($masonry_layout_thumbnail_padding[1]); ?>px <?php echo intval($masonry_layout_thumbnail_padding[2]); ?>px <?php echo intval($masonry_layout_thumbnail_padding[3]); ?>px !important;
                  overflow: hidden !important;
                  box-shadow: <?php echo intval($masonry_layout_thumbnail_box_shadow[0]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[1]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[2]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[3]); ?>px <?php echo $masonry_layout_thumbnail_box_shadow_color; ?>!important;
                  -webkit-box-shadow: <?php echo intval($masonry_layout_thumbnail_box_shadow[0]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[1]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[2]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[3]); ?>px <?php echo $masonry_layout_thumbnail_box_shadow_color; ?>!important;
                  -moz-box-shadow: <?php echo intval($masonry_layout_thumbnail_box_shadow[0]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[1]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[2]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[3]); ?>px <?php echo $masonry_layout_thumbnail_box_shadow_color; ?>!important;
               }
               .masonry_grid_item_image_<?php echo $random; ?>
               {
                  width: <?php echo $masonry_layout_thumbnail_width; ?>px !important;
                  opacity: <?php echo $masonry_layout_thumbnail_opacity; ?> !important;
               }
               .masonry_grid_item_image_<?php echo $random; ?>:hover
               {
                  transition: <?php echo $masonry_layout_thumbnail_transition_time; ?>s !important;
                  transform: <?php echo $masonry_layout_thumbnail_general_hover_effect; ?> !important;
               }
               .masonry_grid_item_image_<?php echo $random; ?> img
               {
                  border: <?php echo intval($masonry_layout_thumbnail_border_style[0]); ?>px <?php echo esc_attr($masonry_layout_thumbnail_border_style[1]); ?> <?php echo esc_attr($masonry_layout_thumbnail_border_style[2]); ?> !important;
                  border-radius: <?php echo $masonry_layout_thumbnail_border_radius; ?>px !important;
                  -webkit-border-radius: <?php echo $masonry_layout_thumbnail_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $masonry_layout_thumbnail_border_radius; ?>px !important;
                  width: <?php echo $masonry_layout_thumbnail_width; ?>px !important;
               }
               .masonry_grid_content_item
               {
                  width: <?php echo $masonry_layout_thumbnail_width; ?>px !important;
               }
               .masonry_grid_single_text_title <?php echo $masonry_layout_thumbnail_title_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_thumbnail_title_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_thumbnail_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($masonry_layout_thumbnail_title_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_thumbnail_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_thumbnail_title_margin[0]); ?>px <?php echo intval($masonry_layout_thumbnail_title_margin[1]); ?>px <?php echo intval($masonry_layout_thumbnail_title_margin[2]); ?>px <?php echo intval($masonry_layout_thumbnail_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_thumbnail_title_padding[0]); ?>px <?php echo intval($masonry_layout_thumbnail_title_padding[1]); ?>px <?php echo intval($masonry_layout_thumbnail_title_padding[2]); ?>px <?php echo intval($masonry_layout_thumbnail_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[2]; ?>
               }
               .masonry_grid_single_text_desc <?php echo $masonry_layout_thumbnail_description_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_thumbnail_description_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_thumbnail_description_text_alignment; ?> !important;
                  font-size: <?php echo intval($masonry_layout_thumbnail_description_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_thumbnail_description_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_thumbnail_description_margin[0]); ?>px <?php echo intval($masonry_layout_thumbnail_description_margin[1]); ?>px <?php echo intval($masonry_layout_thumbnail_description_margin[2]); ?>px <?php echo intval($masonry_layout_thumbnail_description_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_thumbnail_description_padding[0]); ?>px <?php echo intval($masonry_layout_thumbnail_description_padding[1]); ?>px <?php echo intval($masonry_layout_thumbnail_description_padding[2]); ?>px <?php echo intval($masonry_layout_thumbnail_description_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[3]; ?>
               }
               <?php
               break;
         }
      }
      if (isset($lightbox_type)) {
         switch (esc_attr($lightbox_type)) {
            case "foo_box_free_edition":
               ?>
               .fbx-caption
               {
                  text-align: left !important;
                  border-bottom-left-radius: <?php echo $foo_box_border_radius; ?>px !important;
                  border-bottom-right-radius: <?php echo $foo_box_border_radius; ?>px !important;
               }
               .fbx-caption
               {
                  cursor: pointer !important;
               }
               .fbx-caption-title <?php echo $foo_box_image_title_html_tag; ?>
               {
                  line-height: 1.7em !important;
                  display: <?php echo $foo_box_title_display; ?>!important;
                  text-align: <?php echo $foo_box_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($foo_box_title_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($foo_box_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($foo_box_title_margin[0]); ?>px <?php echo intval($foo_box_title_margin[1]); ?>px <?php echo intval($foo_box_title_margin[2]); ?>px <?php echo intval($foo_box_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($foo_box_title_padding[0]); ?>px <?php echo intval($foo_box_title_padding[1]); ?>px <?php echo intval($foo_box_title_padding[2]); ?>px <?php echo intval($foo_box_title_padding[3]); ?>px !important;
                  font-family: <?php echo $foo_box_font_family_name[0]; ?>
               }
               .fbx-caption-desc <?php echo $foo_box_image_description_html_tag; ?>
               {
                  line-height: 1.7em !important;
                  display: <?php echo $foo_box_desc_display; ?>!important;
                  text-align: <?php echo $foo_box_desc_text_alignment; ?> !important;
                  font-size: <?php echo intval($foo_box_desc_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($foo_box_desc_font_style[1]); ?> !important;
                  margin: <?php echo intval($foo_box_desc_margin[0]); ?>px <?php echo intval($foo_box_desc_margin[1]); ?>px <?php echo intval($foo_box_desc_margin[2]); ?>px <?php echo intval($foo_box_desc_margin[3]); ?>px !important;
                  padding: <?php echo intval($foo_box_desc_padding[0]); ?>px <?php echo intval($foo_box_desc_padding[1]); ?>px <?php echo intval($foo_box_desc_padding[2]); ?>px <?php echo intval($foo_box_desc_padding[3]); ?>px !important;
                  font-family: <?php echo $foo_box_font_family_name[1]; ?>
               }
               .fbx-modal
               {
                  <?php
                  if ($foo_box_overlay_color != "") {
                     ?>
                     background-color: rgba(<?php echo intval($foo_box_background_overlay_color[0]); ?>,<?php echo intval($foo_box_background_overlay_color[1]); ?>,<?php echo intval($foo_box_background_overlay_color[2]); ?>,<?php echo $foo_box_overlay_opacity; ?>) !important;
                     <?php
                  }
                  ?>
               }
               .fbx-inner
               {
                  border: <?php echo intval($foo_box_border[0]); ?>px <?php echo esc_attr($foo_box_border[1]); ?> <?php echo esc_attr($foo_box_border[2]); ?> !important;
                  -webkit-border-radius: <?php echo $foo_box_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $foo_box_border_radius; ?>px !important;
                  border-radius: <?php echo $foo_box_border_radius; ?>px !important;
               }
               .fbx-item-image
               {
                  -webkit-border-radius: <?php echo $foo_box_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $foo_box_border_radius; ?>px !important;
                  border-radius: <?php echo $foo_box_border_radius; ?>px !important;
               }
               <?php
               break;
         }
      }
      if (isset($album_type) && $album_type == "compact_album") {
         ?>
         .album_layout_button:hover, .album_layout_button:focus, .album_layout_button.focus
         {
            color: <?php echo esc_attr($compact_album_button_font_hover_color); ?> !important;
            text-decoration: none;
            background-color: <?php echo esc_attr($compact_album_button_hover_color); ?> !important;
            border-color: <?php echo esc_attr($compact_album_button_border_hover_color); ?> !important;
         }
         .album_layout_button
         {
            color: <?php echo esc_attr($compact_album_button_font_style[1]); ?> !important;
            background-color: <?php echo esc_attr($compact_album_button_color); ?> !important;
         }
         .album_layout_button
         {
            display: inline-block;
            padding: <?php echo intval($compact_album_button_padding[0]); ?>px <?php echo intval($compact_album_button_padding[1]); ?>px <?php echo intval($compact_album_button_padding[2]); ?>px <?php echo intval($compact_album_button_padding[3]); ?>px !important;
            font-size: <?php echo intval($compact_album_button_font_style[0]); ?>px !important;
            margin: <?php echo intval($compact_album_button_margin[0]); ?>px <?php echo intval($compact_album_button_margin[1]); ?>px <?php echo intval($compact_album_button_margin[2]); ?>px <?php echo intval($compact_album_button_margin[3]); ?>px !important;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: <?php echo $compact_album_button_text_alignment; ?> !important;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: <?php echo intval($compact_album_button_border_style[0]); ?>px <?php echo esc_attr($compact_album_button_border_style[1]); ?> <?php echo esc_attr($compact_album_button_border_style[2]); ?> !important;
            border-radius: <?php echo intval($compact_album_button_border_radius); ?>px !important;
            font-family: <?php echo isset($font_family_compact_button_text[0]) ? htmlspecialchars_decode($font_family_compact_button_text[0]) : "Roboto Slab:300"; ?>
         }
         <?php
      }
      echo htmlspecialchars_decode($custom_css["custom_css"]);
      ?>
   </style>
   <?php
}