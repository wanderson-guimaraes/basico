<?php
/*
File: inc/shortcodes.php
Description: Plugin shortcodes
Plugin: AD Gallery
Author: Ad-theme.com
*/

function adgallery_button( $page = null, $target = null ) {



  echo '<a href="#" class="button" title="ADD GALLERY" id="adgallery-generator-button"><span class="adgallery-button-portfolio"></span>Add Gallery</a>';	


 }

add_action( 'media_buttons', 'adgallery_button', 100 );

function adgallery_generator() {

	?>

	<div id="adgallery-generator-overlay" class="adgallery-overlay-bg" style="display:none"></div>

  <div id="adgallery-generator-wrap" style="display:none">

   <div id="adgallery-generator">

       <a href="#" id="adgallery-generator-close"><span class="adgallery-close">x</span></a>
       
     <p class="position"><?php _e('Style: ', 'adgallery'); ?></p>			



     <select id="adgallery-style" name="adgallery-style" class="">

	   <?php 		
	    $query = 'post_type=Post&post_status=publish&post_type=adgallery&posts_per_page=-1';
	    $loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
		echo '<option class="adgallery-shortcode" value="'.get_the_id().'">';
		echo the_title() . ' : [adgallery id="'.get_the_id().'"]';
		echo '</option>'; 
		
		
		endwhile;
		}
		?>
		
       </select>
       
        </div>
        <br />      
       <input name="adgallery-generator-insert" type="submit" class="button button-primary button-large" id="adgallery-generator-insert" value="Insert Shortcodes">
       
       </div>

   </div>
   
	<?php

}

add_action( 'admin_footer', 'adgallery_generator' );