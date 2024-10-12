<?php
if(!function_exists('bwp_create_type_testimonial')  ){
    function bwp_create_type_testimonial(){
	$labels_testimonial = array(
		'name' => __( 'Testimonial', "polariva" ),
		'singular_name' => __( 'Testimonial', "polariva" ),
		'add_new' => __( 'Add New Testimonial', "polariva" ),
		'add_new_item' => __( 'Add New Testimonial', "polariva" ),
		'edit_item' => __( 'Edit Testimonial', "polariva" ),
		'new_item' => __( 'New Testimonial', "polariva" ),
		'view_item' => __( 'View Testimonial', "polariva" ),
		'search_items' => __( 'Search Testimonials', "polariva" ),
		'not_found' => __( 'No Testimonials found', "polariva" ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash', "polariva" ),
		'parent_item_colon' => __( 'Parent Testimonial:', "polariva" ),
		'menu_name' => __( 'Testimonials', "polariva" ),
	);

	$args_testimonial = array(
	  'labels' => $labels_testimonial,
	  'hierarchical' => true,
	  'description' => __( 'List Testimonial', "polariva" ),
	  'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
	  'public' => true,
	  'show_ui' => true,
	  'show_in_menu' => true,
	  'menu_position' => 5,
	  'show_in_menu' => false,
	  'show_in_nav_menus' => true,
	  'publicly_queryable' => true,
	  'exclude_from_search' => false,
	  'has_archive' => true,
	  'query_var' => true,
	  'can_export' => true,
	  'rewrite' => true,
	  'capability_type' => 'post'
	);
	register_post_type( 'testimonial', $args_testimonial ); 
  }
  add_action( 'init','bwp_create_type_testimonial',0 );
}

