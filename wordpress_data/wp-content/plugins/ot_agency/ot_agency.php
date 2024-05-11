<?php
/*
Plugin Name: OT Agency
Plugin URI: http://oceanthemes.net/
Description: Declares a plugin that will create a custom post type displaying portfolio.
Version: 1.0
Author: OceanThemes Team
Author URI: http://oceanthemes.net/
Text Domain: ot_agency
Domain Path: /lang
License: GPLv2
*/

// Slider Text
function ot_agency_update() {
    load_plugin_textdomain('ot_agency', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_agency_update');

add_action( 'init', 'register_ocean_agency' );

function register_ocean_agency() {

    $labels = array( 

        'name' => __( 'Agency', 'ot_agency' ),

        'singular_name' => __( 'Agency', 'ot_agency' ),

        'add_new' => __( 'Add New Agency', 'ot_agency' ),

        'add_new_item' => __( 'Add Agency', 'ot_agency' ),

        'edit_item' => __( 'Edit Agency', 'ot_agency' ),

        'new_item' => __( 'New Agency', 'ot_agency' ),

        'view_item' => __( 'View Agency', 'ot_agency' ),

        'search_items' => __( 'Search Agency', 'ot_agency' ),

        'not_found' => __( 'No Agency found', 'ot_agency' ),

        'not_found_in_trash' => __( 'No Agency found in Trash', 'ot_agency' ),

        'parent_item_colon' => __( 'Parent Agency:', 'ot_agency' ),

        'menu_name' => __( 'Agency', 'ot_agency' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => true,

        'description' => 'List Slide',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats', 'excerpt' ),

        'taxonomies' => array( 'agancy_category','categories1' ),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,     
        'menu_position' => null,  

        'menu_icon' => 'dashicons-admin-multisite',	

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'agency', $args );

}

add_action( 'init', 'agency_Categories_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it Skillss for your posts



function agency_Categories_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like categories

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Agency Categories', 'ot_agency' ),

    'singular_name' => __( 'Agency Categories', 'ot_agency' ),

    'search_items' =>  __( 'Search Categories','ot_agency' ),

    'all_items' => __( 'All Categories','ot_agency' ),

    'parent_item' => __( 'Parent Categories','ot_agency' ),

    'parent_item_colon' => __( 'Parent Categories:','ot_agency' ),

    'edit_item' => __( 'Edit Categories','ot_agency' ), 

    'update_item' => __( 'Update Categories','ot_agency' ),

    'add_new_item' => __( 'Add New Categories','ot_agency' ),

    'new_item_name' => __( 'New Categories Name','ot_agency' ),

    'menu_name' => __( 'Categories','ot_agency' ),

  );     



// Now register the taxonomy



  register_taxonomy('categories1',array('agency'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'categories1' ),

  ));



}

?>