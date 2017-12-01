<?php
/**
 * This file is used to call script.
 *
 * @author	Tech Banker
 * @package	gallery-bank/user-views/includes/albums
 * @version	4.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
// Exit if accessed directly
?>
<script type="text/javascript">
   var ajaxurl = "<?php echo admin_url("admin-ajax.php"); ?>";
   var global_options_right_click_protection = "<?php echo isset($global_options_settings["global_options_right_click_protection"]) ? esc_attr($global_options_settings["global_options_right_click_protection"]) : "disable"; ?>";
   var animation_effect = "<?php echo isset($animation_effects) ? esc_attr($animation_effects) : "none"; ?>";
   jQuery(document).ready(function ()
   {
      if (animation_effect !== "none")
      {
         jQuery(".gb_animate").scrolla_gb();
      }
      if (global_options_right_click_protection === "enable") {
         jQuery(".gallery_bank_album_main_container").on("contextmenu", function (e)
         {
            return false;
         });
      }
   });
</script>