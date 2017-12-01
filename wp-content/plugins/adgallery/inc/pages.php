<?php
/*
File: inc/pages.php
Description: Plugin admin pages
Plugin: AD Gallery
Author: Ad-theme.com
*/


function adgallery_main_page() {
	
	
	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.', 'adgallery') );

	}
	
	echo '<h2 class="adsidebarpanel-title">AD Gallery - Options Page</h2>';
	
?>

    <h4><strong>NOTE: after save you need to regenerate thumbnail. Use This free plugin: <a href="http://wordpress.org/plugins/regenerate-thumbnails/">Regenerate Thumbanils</a></strong></h4>

	<div class="adgallery-shortcode-list">
   
    <div class="clear"></div>

<?php
	
	if (!empty($_POST['update'])) {
	
	// Check Posted Options
	if(empty($_POST['adgallery_custom_css'])) {$adgallery_custom_css = $_POST['adgallery_custom_css'];}
	
	if(empty($_POST['adgallery_custom1_size_width'])) {$adgallery_custom1_size_width = '';} else { $adgallery_custom1_size_width = $_POST['adgallery_custom1_size_width']; }
	if(empty($_POST['adgallery_custom1_size_height'])) {$adgallery_custom1_size_height = '';} else { $adgallery_custom1_size_height = $_POST['adgallery_custom1_size_height']; }
	if(empty($_POST['adgallery_custom1_size_crop'])) {$adgallery_custom1_size_crop = '';} else { $adgallery_custom1_size_crop = $_POST['adgallery_custom1_size_crop']; }	
	
	if(empty($_POST['adgallery_custom2_size_width'])) {$adgallery_custom2_size_width = '';} else { $adgallery_custom2_size_width = $_POST['adgallery_custom2_size_width']; }
	if(empty($_POST['adgallery_custom2_size_height'])) {$adgallery_custom2_size_height = '';} else { $adgallery_custom2_size_height = $_POST['adgallery_custom2_size_height']; }
	if(empty($_POST['adgallery_custom2_size_crop'])) {$adgallery_custom2_size_crop = '';} else { $adgallery_custom2_size_crop = $_POST['adgallery_custom2_size_crop']; }
	
	if(empty($_POST['adgallery_custom3_size_width'])) {$adgallery_custom3_size_width = '';} else { $adgallery_custom3_size_width = $_POST['adgallery_custom3_size_width']; }
	if(empty($_POST['adgallery_custom3_size_height'])) {$adgallery_custom3_size_height = '';} else { $adgallery_custom3_size_height = $_POST['adgallery_custom3_size_height']; }
	if(empty($_POST['adgallery_custom3_size_crop'])) {$adgallery_custom3_size_crop = '';} else { $adgallery_custom3_size_crop = $_POST['adgallery_custom3_size_crop']; }
	
	if(empty($_POST['adgallery_custom4_size_width'])) {$adgallery_custom4_size_width = '';} else { $adgallery_custom4_size_width = $_POST['adgallery_custom4_size_width']; }
	if(empty($_POST['adgallery_custom4_size_height'])) {$adgallery_custom4_size_height = '';} else { $adgallery_custom4_size_height = $_POST['adgallery_custom4_size_height']; }
	if(empty($_POST['adgallery_custom4_size_crop'])) {$adgallery_custom4_size_crop = '';} else { $adgallery_custom4_size_crop = $_POST['adgallery_custom4_size_crop']; }
	
	if(empty($_POST['adgallery_custom_size_grid'])) {$adgallery_custom_size_grid = '';} else { $adgallery_custom_size_grid = $_POST['adgallery_custom_size_grid']; }

	// Update Options
	update_option('adgallery_custom_css', $adgallery_custom_css );
	
	update_option('adgallery_custom1_size_width', $adgallery_custom1_size_width );
	update_option('adgallery_custom1_size_height', $adgallery_custom1_size_height );
	update_option('adgallery_custom1_size_crop', $adgallery_custom1_size_crop );

	update_option('adgallery_custom2_size_width', $adgallery_custom2_size_width );
	update_option('adgallery_custom2_size_height', $adgallery_custom2_size_height );
	update_option('adgallery_custom2_size_crop', $adgallery_custom2_size_crop );
		
	update_option('adgallery_custom3_size_width', $adgallery_custom3_size_width );
	update_option('adgallery_custom3_size_height', $adgallery_custom3_size_height );
	update_option('adgallery_custom3_size_crop', $adgallery_custom3_size_crop );

	update_option('adgallery_custom4_size_width', $adgallery_custom4_size_width );
	update_option('adgallery_custom4_size_height', $adgallery_custom4_size_height );
	update_option('adgallery_custom4_size_crop', $adgallery_custom4_size_crop );
	
	update_option('adgallery_custom_size_grid', $adgallery_custom_size_grid );		
	}
	// Check Saved Options
	$adgallery_custom_css = get_option( 'adgallery_custom_css', '' );	

	$adgallery_custom1_size_width = get_option( 'adgallery_custom1_size_width', '' );
	$adgallery_custom1_size_height = get_option( 'adgallery_custom1_size_height', '' );
	$adgallery_custom1_size_crop = get_option( 'adgallery_custom1_size_crop', '' );

	$adgallery_custom2_size_width = get_option( 'adgallery_custom2_size_width', '' );
	$adgallery_custom2_size_height = get_option( 'adgallery_custom2_size_height', '' );
	$adgallery_custom2_size_crop = get_option( 'adgallery_custom2_size_crop', '' );
	
	$adgallery_custom3_size_width = get_option( 'adgallery_custom3_size_width', '' );
	$adgallery_custom3_size_height = get_option( 'adgallery_custom3_size_height', '' );
	$adgallery_custom3_size_crop = get_option( 'adgallery_custom3_size_crop', '' );
	
	$adgallery_custom4_size_width = get_option( 'adgallery_custom4_size_width', '' );
	$adgallery_custom4_size_height = get_option( 'adgallery_custom4_size_height', '' );
	$adgallery_custom4_size_crop = get_option( 'adgallery_custom4_size_crop', '' );
	
	$adgallery_custom_size_grid = get_option( 'adgallery_custom_size_grid', '' );
	
	// Load option fields
	echo '<form method="POST" action="'.$_SERVER['REQUEST_URI'].'">';
	?>
    
    <h4 class="position"><?php _e('Custom1 Size 1: ', 'adgallery'); ?></h4>  
      
    <?php _e('With: ', 'adgallery'); ?><input type="text" class="adgallery_custom1_size_width" name="adgallery_custom1_size_width" value="<?php echo $adgallery_custom1_size_width; ?>"> 
	<?php _e('Height: ', 'adgallery'); ?><input type="text" class="adgallery_custom1_size_height" name="adgallery_custom1_size_height" value="<?php echo $adgallery_custom1_size_height; ?>">
    <?php _e('Crop: ', 'adgallery'); ?><select id="adgallery_custom1_size_crop" name="adgallery_custom1_size_crop">
  	<option value="true" <?php if ($adgallery_custom1_size_crop == 'true') { echo 'selected'; } ?>>On
  	<option value="false" <?php if ($adgallery_custom1_size_crop == 'false') { echo 'selected'; } ?>>Off
  	</select>
    <h4 class="position"><?php _e('Custom2 Size 2: ', 'adgallery'); ?></h4>  
      
    <?php _e('With: ', 'adgallery'); ?><input type="text" class="adgallery_custom2_size_width" name="adgallery_custom2_size_width" value="<?php echo $adgallery_custom2_size_width; ?>"> 
	<?php _e('Height: ', 'adgallery'); ?><input type="text" class="adgallery_custom2_size_height" name="adgallery_custom2_size_height" value="<?php echo $adgallery_custom2_size_height; ?>">
    <?php _e('Crop: ', 'adgallery'); ?><select id="adgallery_custom2_size_crop" name="adgallery_custom2_size_crop">
  	<option value="true" <?php if ($adgallery_custom2_size_crop == 'true') { echo 'selected'; } ?>>On
  	<option value="false" <?php if ($adgallery_custom2_size_crop == 'false') { echo 'selected'; } ?>>Off
  	</select>

    <h4 class="position"><?php _e('Custom3 Size 3: ', 'adgallery'); ?></h4>  
      
    <?php _e('With: ', 'adgallery'); ?><input type="text" class="adgallery_custom3_size_width" name="adgallery_custom3_size_width" value="<?php echo $adgallery_custom3_size_width; ?>"> 
	<?php _e('Height: ', 'adgallery'); ?><input type="text" class="adgallery_custom3_size_height" name="adgallery_custom3_size_height" value="<?php echo $adgallery_custom3_size_height; ?>">
    <?php _e('Crop: ', 'adgallery'); ?><select id="adgallery_custom3_size_crop" name="adgallery_custom3_size_crop">
  	<option value="true" <?php if ($adgallery_custom3_size_crop == 'true') { echo 'selected'; } ?>>On
  	<option value="false" <?php if ($adgallery_custom3_size_crop == 'false') { echo 'selected'; } ?>>Off
  	</select> 

    <h4 class="position"><?php _e('Custom4 Size 4: ', 'adgallery'); ?></h4>  
      
    <?php _e('With: ', 'adgallery'); ?><input type="text" class="adgallery_custom4_size_width" name="adgallery_custom4_size_width" value="<?php echo $adgallery_custom4_size_width; ?>"> 
	<?php _e('Height: ', 'adgallery'); ?><input type="text" class="adgallery_custom4_size_height" name="adgallery_custom4_size_height" value="<?php echo $adgallery_custom4_size_height; ?>">
    <?php _e('Crop: ', 'adgallery'); ?><select id="adgallery_custom4_size_crop" name="adgallery_custom4_size_crop">
  	<option value="true" <?php if ($adgallery_custom4_size_crop == 'true') { echo 'selected'; } ?>>On
  	<option value="false" <?php if ($adgallery_custom4_size_crop == 'false') { echo 'selected'; } ?>>Off
  	</select>

	<h2>Thumbs For Grid Masonry Layout</h2>

    <h4 class="position"><?php _e('Custom Size Grid: ', 'adgallery'); ?></h4>  
      
    <?php _e('With: ', 'adgallery'); ?><input type="text" class="adgallery_custom_size_grid" name="adgallery_custom_size_grid" value="<?php echo $adgallery_custom_size_grid; ?>">
    
	
	<?php
	echo '<h4>Custom CSS</h4>';
	echo '<p><textarea class="large" name="adgallery_custom_css" id="adgallery_custom_css">';
	if (!empty( $adgallery_custom_css )){ echo $adgallery_custom_css; }
    echo '</textarea></p>';
	echo '<p><input type="hidden" name="update" value="update">
	<input type="submit" value="'.__('Save Changes', PLG_NAME).'" class="button-primary" id="submit" name="submit"></p>';
	echo '</form>';
	
}