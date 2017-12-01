<?php
/*
File: inc/posttype.php
Description: Register AD Gallery Post Type
Plugin: AD Gallery
Author: Ad-theme.com
*/


// Post Type Registration
add_action( 'init', 'adgallery_register_posttype' );

function adgallery_register_posttype() {

	$labels = array(
		'name'               => __('AD Gallery', PLG_NAME),
		'singular_name'      => __('AD Gallery Panel', PLG_NAME),
		'add_new'            => __('Add New Gallery', PLG_NAME),
		'add_new_item'       => __('Add New Gallery', PLG_NAME),
		'edit_item'          => __('Edit Gallery', PLG_NAME),
		'new_item'           => __('New Gallery', PLG_NAME),
		'all_items'          => __('All Gallery', PLG_NAME),
		'view_item'          => __('View Gallery', PLG_NAME),
		'search_items'       => __('Search Gallery', PLG_NAME),
		'not_found'          => __('No Gallery found', PLG_NAME),
		'not_found_in_trash' => __('No Gallery found in Trash', PLG_NAME),
		'parent_item_colon'  => '',
		'menu_name'          => __('AD Gallery', PLG_NAME)
	  );
	
	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adgallery' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME.'/assets/img/main_icon.png'),
		'supports'           => array( 'title' )
	  );
	
	  register_post_type( 'adgallery', $args );

}

// Post Type Registration
add_action( 'init', 'adgallery_register_posttype_gallery_post' );

function adgallery_register_posttype_gallery_post() {

	$labels = array(
		'name'               => __('AD Gallery Post', PLG_NAME),
		'singular_name'      => __('AD Gallery Post', PLG_NAME),
		'add_new'            => __('Add New Gallery Post', PLG_NAME),
		'add_new_item'       => __('Add New Gallery Post', PLG_NAME),
		'edit_item'          => __('Edit Gallery', PLG_NAME),
		'new_item'           => __('New Gallery', PLG_NAME),
		'all_items'          => __('All Gallery Post', PLG_NAME),
		'view_item'          => __('View Gallery', PLG_NAME),
		'search_items'       => __('Search Gallery', PLG_NAME),
		'not_found'          => __('No Gallery found', PLG_NAME),
		'not_found_in_trash' => __('No Gallery found in Trash', PLG_NAME),
		'parent_item_colon'  => '',
		'menu_name'          => __('AD Gallery Post', PLG_NAME)
	  );
	
	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adgallery_post' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME.'/assets/img/main_icon.png'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	  );
	
	  register_post_type( 'adgallery_post', $args );

}

// Custom Taxonomy

function add_adgallery_post_cat_taxonomies() {

	register_taxonomy('adgallery_post_cat', 'adgallery_post', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Gallery Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Gallery Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Gallery Category' ),
			'all_items' => __( 'All Gallery Category' ),
			'parent_item' => __( 'Parent Gallery Category' ),
			'parent_item_colon' => __( 'Parent Gallery Category:' ),
			'edit_item' => __( 'Edit Gallery Category' ),
			'update_item' => __( 'Update Gallery Category' ),
			'add_new_item' => __( 'Add New Gallery Category' ),
			'new_item_name' => __( 'New Gallery Category' ),
			'menu_name' => __( 'Gallery Category' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'adgallery_post_cat', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_adgallery_post_cat_taxonomies', 0 );


// Post Type Registration
add_action( 'init', 'adgallery_register_posttype_gallery_album' );

function adgallery_register_posttype_gallery_album() {

	$labels = array(
		'name'               => __('AD Album', PLG_NAME),
		'singular_name'      => __('AD Album', PLG_NAME),
		'add_new'            => __('Add New Album', PLG_NAME),
		'add_new_item'       => __('Add New Album', PLG_NAME),
		'edit_item'          => __('Edit Album', PLG_NAME),
		'new_item'           => __('New Album', PLG_NAME),
		'all_items'          => __('All Album', PLG_NAME),
		'view_item'          => __('View Album', PLG_NAME),
		'search_items'       => __('Search Album', PLG_NAME),
		'not_found'          => __('No Album found', PLG_NAME),
		'not_found_in_trash' => __('No Album found in Trash', PLG_NAME),
		'parent_item_colon'  => '',
		'menu_name'          => __('AD Album', PLG_NAME)
	  );
	
	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adgallery_album' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME.'/assets/img/main_icon.png'),
		'supports'           => array( 'title' )
	  );
	
	  register_post_type( 'adgallery_album', $args );

}
