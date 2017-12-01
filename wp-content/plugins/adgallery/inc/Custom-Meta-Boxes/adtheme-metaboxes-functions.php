<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function adgallery_adgallerycmb_metaboxes( array $meta_boxes ) {

	$gallery_image = array(
		array( 
			'id' => 'gallery-image', 
			'name' => 'Image', 
			'type' => 'image', 
			'repeatable' => true, 
			'show_size' => false,
			'size' =>  'height=400&width=1000'
		)
	);
	
	$meta_boxes[] = array(
		'title' => 'Album Image',
		'pages' => 'adgallery_album',
		'fields' => $gallery_image
	);
	
	
	return $meta_boxes;


}
add_filter( 'adgallerycmb_meta_boxes', 'adgallery_adgallerycmb_metaboxes' );
