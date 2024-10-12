<?php

if(!function_exists('bwp_create_type_ourteam')  ){
    function bwp_create_type_ourteam(){
    $labels_ourteam = array(
        'name' => __( 'Our Team', "polariva" ),
        'singular_name' => __( 'Our Team', "polariva" ),
        'add_new' => __( 'Add New Our Team', "polariva" ),
        'add_new_item' => __( 'Add New Our Team', "polariva" ),
        'edit_item' => __( 'Edit Our Team', "polariva" ),
        'new_item' => __( 'New Our Team', "polariva" ),
        'view_item' => __( 'View Our Team', "polariva" ),
        'search_items' => __( 'Search Our Teams', "polariva" ),
        'not_found' => __( 'No Our Teams found', "polariva" ),
        'not_found_in_trash' => __( 'No Our Teams found in Trash', "polariva" ),
        'parent_item_colon' => __( 'Parent Our Team:', "polariva" ),
        'menu_name' => __( 'Our Teams', "polariva" ),
      );

    $args_ourteam = array(
          'labels' => $labels_ourteam,
          'hierarchical' => true,
          'description' => __( 'List OurTeam', "polariva" ),
          'supports' => array( 'title', 'editor', 'thumbnail'),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 6,
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
    register_post_type( 'ourteam', $args_ourteam ); 
  }
  add_action( 'init','bwp_create_type_ourteam',0 );
}

