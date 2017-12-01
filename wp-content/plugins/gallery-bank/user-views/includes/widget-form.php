<?php
/**
 * This File displays Gallery Bank Widget Form.
 *
 * @author  Tech Banker
 * @package gallery-bank/user-views/includes
 * @version 4.0.0
 */
if (!defined("ABSPATH"))
   exit; //exit if accessed directly
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
      ?>
      <div style="width:100%;margin-top:5px; border-spacing:0;clear:both;">
         <div style="margin-bottom:10px;margin-top:10px;">
            <label title="Shortcode"><?php echo $gb_shortcode; ?> : <span>(<a href="admin.php?page=gallery_bank" target="_blank"><?php echo $gb_add_shortcode; ?></a>)</span></label>
            <textarea rows="5" cols="4" style="width:100%;margin-top:5px; border-spacing:0;clear:both;" id='<?php echo $this->get_field_id("ux_txt_gallery_bank_shortcode"); ?>' name='<?php echo $this->get_field_name("ux_txt_gallery_bank_shortcode"); ?>' placeholder="<?php echo $gb_shortcode_placeholder; ?>"><?php echo isset($instance["shortcode"]) ? $instance["shortcode"] : ""; ?></textarea>
         </div>
      </div>
      <?php
   }
}

