<?php
/*
Plugin Name: OT Slide Show
Plugin URI: http://oceanthemes.net/
Description: Declares a plugin that will create a custom post type displaying portfolio.
Version: 1.0
Author: OceanThemes Team
Author URI: http://oceanthemes.net/
Text Domain: ot_slide_show
Domain Path: /lang
License: GPLv2
*/

// Slider Show
function ot_slide_show_update() {
    load_plugin_textdomain('ot_slide_show', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_slide_show_update');

add_action( 'init', 'register_ocean_slide_show' );

function register_ocean_slide_show() {

    $labels = array( 

        'name' => __( 'Slide Show', 'ot_slide_show' ),

        'singular_name' => __( 'Slider Show', 'ot_slide_show' ),

        'add_new' => __( 'Add New Slide Show', 'ot_slide_show' ),

        'add_new_item' => __( 'Add Slide Show', 'ot_slide_show' ),

        'edit_item' => __( 'Edit Slide Show', 'ot_slide_show' ),

        'new_item' => __( 'New Slide Show', 'ot_slide_show' ),

        'view_item' => __( 'View Slide Show', 'ot_slide_show' ),

        'search_items' => __( 'Search Slide Show', 'ot_slide_show' ),

        'not_found' => __( 'No Slide Show found', 'ot_slide_show' ),

        'not_found_in_trash' => __( 'No Slide Show found in Trash', 'ot_slide_show' ),

        'parent_item_colon' => __( 'Parent Slide Show:', 'ot_slide_show' ),

        'menu_name' => __( 'Slide Show', 'ot_slide_show' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => true,

        'description' => 'List Slide',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats', 'excerpt' ),

        'taxonomies' => array( 'slider_show_category','categories1' ),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,     
        'menu_position' => null,  

        'menu_icon' => 'dashicons-format-gallery',	

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'slide_show', $args );

}

add_action( 'init', 'slide_show_Categories_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it Skillss for your posts



function slide_show_Categories_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like categories

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Slide Show Categories', 'ot_slide_show' ),

    'singular_name' => __( 'Slider Show Categories', 'ot_slide_show' ),

    'search_items' =>  __( 'Search Categories','ot_slide_show' ),

    'all_items' => __( 'All Categories','ot_slide_show' ),

    'parent_item' => __( 'Parent Categories','ot_slide_show' ),

    'parent_item_colon' => __( 'Parent Categories:','ot_slide_show' ),

    'edit_item' => __( 'Edit Categories','ot_slide_show' ), 

    'update_item' => __( 'Update Categories','ot_slide_show' ),

    'add_new_item' => __( 'Add New Categories','ot_slide_show' ),

    'new_item_name' => __( 'New Categories Name','ot_slide_show' ),

    'menu_name' => __( 'Categories','ot_slide_show' ),

  );     



// Now register the taxonomy



  register_taxonomy('categories1',array('slide_show'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'categories1' ),

  ));



}

?>