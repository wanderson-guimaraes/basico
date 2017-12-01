<?php
/**
 * This file is used for Frontend CSS.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/albums
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
if (isset($id)) {
   //TODO: Code for General Options
   if (isset($album_type)) {
      $global_options_language_direction = isset($global_options_settings["global_options_language_direction"]) && $global_options_settings["global_options_language_direction"] == "right_to_left" ? "rtl" : "ltr";
      $global_options_alignment = isset($alignment) ? esc_attr($alignment) : "left";
      switch (esc_attr($album_type)) {
         case "compact_album" :
            //font families extract from database
            $font_families_layout[] = isset($compact_album_layout_settings["compact_album_layout_title_font_family"]) ? htmlspecialchars_decode($compact_album_layout_settings["compact_album_layout_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($compact_album_layout_settings["compact_album_layout_description_font_family"]) ? htmlspecialchars_decode($compact_album_layout_settings["compact_album_layout_description_font_family"]) : "Roboto Slab:300";
            $font_families_layout[] = isset($compact_album_layout_settings["compact_album_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($compact_album_layout_settings["compact_album_layout_gallery_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($compact_album_layout_settings["compact_album_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($compact_album_layout_settings["compact_album_layout_gallery_description_font_family"]) : "Roboto Slab:300";
            //code for importing google fonts url
            $unique_font_families_layout = array_unique($font_families_layout);
            $import_font_family_layout = user_helper_gallery_bank::unique_font_families_gallery_bank($unique_font_families_layout);
            $font_family_name_layout = user_helper_gallery_bank::font_families_gallery_bank($font_families_layout);

            //code for extracting compact album settiings
            $compact_album_layout_cover_thumbnail_dimensions = isset($compact_album_layout_settings["compact_album_layout_cover_thumbnail_dimensions"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_thumbnail_dimensions"]) : "180,160";
            $compact_album_layout_cover_background_color_transparency = isset($compact_album_layout_settings["compact_album_layout_cover_background_color_transparency"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_background_color_transparency"]) : array("#ffffff", "50");
            $compact_album_layout_cover_background_color = $compact_album_layout_cover_background_color_transparency[0] != "" ? user_helper_gallery_bank::hex2rgb_gallery_bank($compact_album_layout_cover_background_color_transparency[0]) : "";
            $compact_album_layout_cover_background_transparency = $compact_album_layout_cover_background_color_transparency[1] / 100;
            $compact_album_layout_cover_thumbnail_opacity = isset($compact_album_layout_settings["compact_album_layout_cover_thumbnail_opacity"]) ? floatval($compact_album_layout_settings["compact_album_layout_cover_thumbnail_opacity"]) / 100 : 1;
            $compact_album_layout_cover_border_style = isset($compact_album_layout_settings["compact_album_layout_cover_border_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_border_style"]) : array("2", "solid", "#000000");
            $compact_album_layout_cover_border_radius = isset($compact_album_layout_settings["compact_album_layout_cover_border_radius"]) ? intval($compact_album_layout_settings["compact_album_layout_cover_border_radius"]) : 0;
            $compact_album_layout_cover_shadow = isset($compact_album_layout_settings["compact_album_layout_cover_shadow"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_shadow"]) : array(0, 1, 3, 0);
            $compact_album_layout_cover_shadow_color = isset($compact_album_layout_settings["compact_album_layout_cover_shadow_color"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_cover_shadow_color"]) : "#000000";
            $compact_album_layout_cover_transition_time = isset($compact_album_layout_settings["compact_album_layout_cover_transition_time"]) ? intval($compact_album_layout_settings["compact_album_layout_cover_transition_time"]) : 1;
            $hover_effect = isset($compact_album_layout_settings["compact_album_layout_cover_hover_effect_value"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_hover_effect_value"]) : array("none", "0", "0", "0");
            if (isset($hover_effect[0])) {
               switch (esc_attr($hover_effect[0])) {
                  case "skew":
                  case "rotate":
                     $compact_album_hover_effect = $hover_effect[0] . "(" . $hover_effect[1] . "deg)";
                     break;
                  case "scale":
                     $compact_album_hover_effect = $hover_effect[0] . "(" . $hover_effect[2] . " , " . $hover_effect[3] . ")";
                     break;
                  case "none":
                     $compact_album_hover_effect = "none";
                     break;
               }
            }
            $compact_album_layout_cover_margin = isset($compact_album_layout_settings["compact_album_layout_cover_margin"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_margin"]) : array(10, 0, 0, 10);
            $compact_album_layout_cover_padding = isset($compact_album_layout_settings["compact_album_layout_cover_padding"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_cover_padding"]) : array(5, 5, 5, 5);

            //code for extracting compact album title
            $compact_album_layout_title_html_tag = isset($compact_album_layout_settings["compact_album_layout_title_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_title_html_tag"]) : "h2";
            $compact_album_layout_title_text_alignment = isset($compact_album_layout_settings["compact_album_layout_title_text_alignment"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_title_text_alignment"]) : "left";
            $compact_album_layout_title_font_style = isset($compact_album_layout_settings["compact_album_layout_title_font_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_title_font_style"]) : array(20, "#000000");
            $compact_album_layout_title_margin = isset($compact_album_layout_settings["compact_album_layout_title_margin"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_title_margin"]) : array(10, 0, 10, 0);
            $compact_album_layout_title_padding = isset($compact_album_layout_settings["compact_album_layout_title_padding"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_title_padding"]) : array(10, 0, 10, 0);
            $compact_album_layout_title_line_height = isset($compact_album_layout_settings["compact_album_layout_title_line_height"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_title_line_height"]) : "1.7em";

            //code for extracting compact album description
            $compact_album_layout_description_html_tag = isset($compact_album_layout_settings["compact_album_layout_description_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_description_html_tag"]) : "h3";
            $compact_album_layout_description_text_alignment = isset($compact_album_layout_settings["compact_album_layout_description_text_alignment"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_description_text_alignment"]) : "left";
            $compact_album_layout_description_font_style = isset($compact_album_layout_settings["compact_album_layout_description_font_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_description_font_style"]) : array(16, "#787D85");
            $compact_album_layout_description_margin = isset($compact_album_layout_settings["compact_album_layout_description_margin"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_description_margin"]) : array(10, 0, 10, 0);
            $compact_album_layout_description_padding = isset($compact_album_layout_settings["compact_album_layout_description_padding"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_description_padding"]) : array(0, 0, 10, 0);
            $compact_album_layout_description_line_height = isset($compact_album_layout_settings["compact_album_layout_description_line_height"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_description_line_height"]) : "1.7em";

            //code for extracting compact album gallery title
            $compact_album_layout_gallery_title_html_tag = isset($compact_album_layout_settings["compact_album_layout_gallery_title_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_title_html_tag"]) : "h3";
            $compact_album_layout_gallery_title_text_alignment = isset($compact_album_layout_settings["compact_album_layout_gallery_title_text_alignment"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_title_text_alignment"]) : "left";
            $compact_album_layout_gallery_title_font_style = isset($compact_album_layout_settings["compact_album_layout_gallery_title_font_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_gallery_title_font_style"]) : array(14, "#787D85");
            $compact_album_layout_gallery_title_margin = isset($compact_album_layout_settings["compact_album_layout_gallery_title_margin"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_gallery_title_margin"]) : array(0, 5, 0, 5);
            $compact_album_layout_gallery_title_padding = isset($compact_album_layout_settings["compact_album_layout_gallery_title_padding"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_gallery_title_padding"]) : array(10, 10, 10, 10);
            $compact_album_layout_gallery_title_line_height = isset($compact_album_layout_settings["compact_album_layout_gallery_title_line_height"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_title_line_height"]) : "1.7em";

            //code for extracting compact album gallery description
            $compact_album_layout_gallery_description_html_tag = isset($compact_album_layout_settings["compact_album_layout_gallery_description_html_tag"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_description_html_tag"]) : "p";
            $compact_album_layout_gallery_description_text_alignment = isset($compact_album_layout_settings["compact_album_layout_gallery_description_text_alignment"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_description_text_alignment"]) : "left";
            $compact_album_layout_gallery_description_font_style = isset($compact_album_layout_settings["compact_album_layout_gallery_description_font_style"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_gallery_description_font_style"]) : array(12, "#787D85");
            $compact_album_layout_gallery_description_margin = isset($compact_album_layout_settings["compact_album_layout_gallery_description_margin"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_gallery_description_margin"]) : array(0, 5, 0, 5);
            $compact_album_layout_gallery_description_padding = isset($compact_album_layout_settings["compact_album_layout_gallery_description_padding"]) ? explode(",", $compact_album_layout_settings["compact_album_layout_gallery_description_padding"]) : array(5, 10, 10, 5);
            $compact_album_layout_gallery_description_line_height = isset($compact_album_layout_settings["compact_album_layout_gallery_description_line_height"]) ? esc_attr($compact_album_layout_settings["compact_album_layout_gallery_description_line_height"]) : "1.7em";
            break;
      }
      ?>
      <style type="text/css">
      <?php
      echo isset($import_font_family_layout) ? $import_font_family_layout : "";
      ?>
         .gallery_bank_album_main_container
         {
            direction: <?php echo $global_options_language_direction; ?> !important;
         }
         .gb-filter-holder_<?php echo $random; ?>
         {
            text-align: <?php echo $global_options_alignment; ?>;
         }
      <?php
      if (isset($album_type)) {
         switch ($album_type) {
            case "compact_album" :
               ?>
                  .album_title_container <?php echo $compact_album_layout_title_html_tag; ?>
                  {
                     line-height: <?php echo $compact_album_layout_title_line_height; ?> !important;
                     text-align: <?php echo $compact_album_layout_title_text_alignment; ?> !important;
                     font-size: <?php echo intval($compact_album_layout_title_font_style[0]); ?>px !important;
                     color : <?php echo esc_attr($compact_album_layout_title_font_style[1]); ?> !important;
                     margin: <?php echo intval($compact_album_layout_title_margin[0]); ?>px <?php echo intval($compact_album_layout_title_margin[1]); ?>px <?php echo intval($compact_album_layout_title_margin[2]); ?>px <?php echo intval($compact_album_layout_title_margin[3]); ?>px !important;
                     padding: <?php echo intval($compact_album_layout_title_padding[0]); ?>px <?php echo intval($compact_album_layout_title_padding[1]); ?>px <?php echo intval($compact_album_layout_title_padding[2]); ?>px <?php echo intval($compact_album_layout_title_padding[3]); ?>px !important;
                     font-family: <?php echo $font_family_name_layout[0]; ?>
                  }
                  .album_desc_container <?php echo $compact_album_layout_description_html_tag; ?>
                  {
                     line-height: <?php echo $compact_album_layout_description_line_height; ?> !important;
                     text-align: <?php echo $compact_album_layout_description_text_alignment; ?> !important;
                     font-size: <?php echo intval($compact_album_layout_description_font_style[0]); ?>px !important;
                     color : <?php echo esc_attr($compact_album_layout_description_font_style[1]); ?> !important;
                     margin: <?php echo intval($compact_album_layout_description_margin[0]); ?>px <?php echo intval($compact_album_layout_description_margin[1]); ?>px <?php echo intval($compact_album_layout_description_margin[2]); ?>px <?php echo intval($compact_album_layout_description_margin[3]); ?>px !important;
                     padding: <?php echo intval($compact_album_layout_description_padding[0]); ?>px <?php echo intval($compact_album_layout_description_padding[1]); ?>px <?php echo intval($compact_album_layout_description_padding[2]); ?>px <?php echo intval($compact_album_layout_description_padding[3]); ?>px !important;
                     font-family: <?php echo $font_family_name_layout[1]; ?>
                  }
                  .compact_album_grid_single_text_title <?php echo $compact_album_layout_gallery_title_html_tag; ?>
                  {
                     line-height: <?php echo $compact_album_layout_gallery_title_line_height; ?> !important;
                     text-align: <?php echo $compact_album_layout_gallery_title_text_alignment; ?> !important;
                     font-size: <?php echo intval($compact_album_layout_gallery_title_font_style[0]); ?>px !important;
                     color : <?php echo esc_attr($compact_album_layout_gallery_title_font_style[1]); ?> !important;
                     margin: <?php echo intval($compact_album_layout_gallery_title_margin[0]); ?>px <?php echo intval($compact_album_layout_gallery_title_margin[1]); ?>px <?php echo intval($compact_album_layout_gallery_title_margin[2]); ?>px <?php echo intval($compact_album_layout_gallery_title_margin[3]); ?>px !important;
                     padding: <?php echo intval($compact_album_layout_gallery_title_padding[0]); ?>px <?php echo intval($compact_album_layout_gallery_title_padding[1]); ?>px <?php echo intval($compact_album_layout_gallery_title_padding[2]); ?>px <?php echo intval($compact_album_layout_gallery_title_padding[3]); ?>px !important;
                     font-family: <?php echo $font_family_name_layout[2]; ?>
                  }
                  .compact_album_grid_single_text_desc <?php echo $compact_album_layout_gallery_description_html_tag; ?>
                  {
                     line-height: <?php echo $compact_album_layout_gallery_description_line_height; ?> !important;
                     text-align: <?php echo $compact_album_layout_gallery_description_text_alignment; ?> !important;
                     font-size: <?php echo intval($compact_album_layout_gallery_description_font_style[0]); ?>px !important;
                     color : <?php echo esc_attr($compact_album_layout_gallery_description_font_style[1]); ?> !important;
                     margin: <?php echo intval($compact_album_layout_gallery_description_margin[0]); ?>px <?php echo intval($compact_album_layout_gallery_description_margin[1]); ?>px <?php echo intval($compact_album_layout_gallery_description_margin[2]); ?>px <?php echo intval($compact_album_layout_gallery_description_margin[3]); ?>px !important;
                     padding: <?php echo intval($compact_album_layout_gallery_description_padding[0]); ?>px <?php echo intval($compact_album_layout_gallery_description_padding[1]); ?>px <?php echo intval($compact_album_layout_gallery_description_padding[2]); ?>px <?php echo intval($compact_album_layout_gallery_description_padding[3]); ?>px !important;
                     font-family: <?php echo $font_family_name_layout[3]; ?>
                  }
                  .compact_album_grid_item_image_<?php echo $random; ?> img
                  {
                     display: none !important;
                  }
                  .compact_album_grid_item_image_<?php echo $random; ?>
                  {
                     opacity: <?php echo $compact_album_layout_cover_thumbnail_opacity; ?> !important;
                     background-size: 100% 100% !important;
                     width: <?php echo intval($compact_album_layout_cover_thumbnail_dimensions[0]); ?>px !important;
                     height: <?php echo intval($compact_album_layout_cover_thumbnail_dimensions[1]); ?>px !important;
                     border: <?php echo intval($compact_album_layout_cover_border_style[0]); ?>px <?php echo esc_attr($compact_album_layout_cover_border_style[1]); ?> <?php echo esc_attr($compact_album_layout_cover_border_style[2]); ?> !important;
                     border-radius: <?php echo $compact_album_layout_cover_border_radius; ?>px !important;
                     -webkit-border-radius: <?php echo $compact_album_layout_cover_border_radius; ?>px !important;
                     -moz-border-radius: <?php echo $compact_album_layout_cover_border_radius; ?>px !important;
                  }
                  .compact_album_grid_content_item
                  {
                     width: <?php echo intval($compact_album_layout_cover_thumbnail_dimensions[0]); ?>px !important;
                     background: rgba(<?php echo intval($compact_album_layout_cover_background_color[0]); ?>,<?php echo intval($compact_album_layout_cover_background_color[1]); ?>,<?php echo intval($compact_album_layout_cover_background_color[2]); ?>,<?php echo floatval($compact_album_layout_cover_background_transparency); ?>) !important;
                  }
                  .compact_album_grid_wrapper_item
                  {
                     display: inline-block !important;
                     vertical-align: top !important;
                     overflow: hidden !important;
                     box-shadow: <?php echo intval($compact_album_layout_cover_shadow[0]); ?>px <?php echo intval($compact_album_layout_cover_shadow[1]); ?>px <?php echo intval($compact_album_layout_cover_shadow[2]); ?>px <?php echo intval($compact_album_layout_cover_shadow[3]); ?>px <?php echo $compact_album_layout_cover_shadow_color; ?> !important;
                     -webkit-box-shadow: <?php echo intval($compact_album_layout_cover_shadow[0]); ?>px <?php echo intval($compact_album_layout_cover_shadow[1]); ?>px <?php echo intval($compact_album_layout_cover_shadow[2]); ?>px <?php echo intval($compact_album_layout_cover_shadow[3]); ?>px <?php echo $compact_album_layout_cover_shadow_color; ?> !important;
                     -moz-box-shadow: <?php echo intval($compact_album_layout_cover_shadow[0]); ?>px <?php echo intval($compact_album_layout_cover_shadow[1]); ?>px <?php echo intval($compact_album_layout_cover_shadow[2]); ?>px <?php echo intval($compact_album_layout_cover_shadow[3]); ?>px <?php echo $compact_album_layout_cover_shadow_color; ?> !important;
                     margin: <?php echo intval($compact_album_layout_cover_margin[0]); ?>px <?php echo intval($compact_album_layout_cover_margin[1]); ?>px <?php echo intval($compact_album_layout_cover_margin[2]); ?>px <?php echo intval($compact_album_layout_cover_margin[3]); ?>px !important;
                     padding: <?php echo intval($compact_album_layout_cover_padding[0]); ?>px <?php echo intval($compact_album_layout_cover_padding[1]); ?>px <?php echo intval($compact_album_layout_cover_padding[2]); ?>px <?php echo intval($compact_album_layout_cover_padding[3]); ?>px !important;
                  }
                  .compact_album_grid_item_image_<?php echo $random; ?>:hover
                  {
                     transition: <?php echo $compact_album_layout_cover_transition_time; ?>s !important;
                     transform : <?php echo $compact_album_hover_effect; ?> !important;
                  }
                  .compact_album_grid_content_item a
                  {
                     cursor: pointer !important;
                     text-decoration: none !important;
                  }
               <?php
               break;
         }
      }
      echo htmlspecialchars_decode($custom_css["custom_css"]);
      ?>
      </style>
      <?php
   }
}