<?php
/*
    Plugin Name: OT Slider Text
    Plugin URI: http://oceanthemes.net/
    Description: Declares a plugin that will create a custom post type displaying portfolio.
    Version: 1.0
    Author: OceanThemes Team
    Author URI: http://oceanthemes.net/
    Text Domain: ot_slider_text
    Domain Path: /lang
    License: GPLv2 or later
*/

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_slider_text_update() {
    load_plugin_textdomain('ot_slider_text', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_slider_text_update');


add_action( 'init', 'register_ocean_slider_text' );
function register_ocean_slider_text() {

    $labels = array( 

        'name' => __( 'Slider Text', 'ot_slider_text' ),

        'singular_name' => __( 'Slider Text', 'ot_slider_text' ),

        'add_new' => __( 'Add New Slide', 'ot_slider_text' ),

        'add_new_item' => __( 'Add Slide', 'ot_slider_text' ),

        'edit_item' => __( 'Edit Slide', 'ot_slider_text' ),

        'new_item' => __( 'New Slide', 'ot_slider_text' ),

        'view_item' => __( 'View Slide', 'ot_slider_text' ),

        'search_items' => __( 'Search Slide', 'ot_slider_text' ),

        'not_found' => __( 'No Slide found', 'ot_slider_text' ),

        'not_found_in_trash' => __( 'No Slide found in Trash', 'ot_slider_text' ),

        'parent_item_colon' => __( 'Parent Slide:', 'ot_slider_text' ),

        'menu_name' => __( 'Slider Text', 'ot_slider_text' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => false,

        'description' => 'List Slide',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats', 'excerpt' ),

        'taxonomies' => array( 'slider_text_category','categories1' ),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,   
        
        'menu_position' => null,  

        'menu_icon' => 'dashicons-slides',  

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'slider_text', $args );

}

add_action( 'init', 'slider_text_Categories_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it Skillss for your posts



function slider_text_Categories_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like categories

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Slider Text Categories', 'ot_slider_text' ),

    'singular_name' => __( 'Slider Text Categories', 'ot_slider_text' ),

    'search_items' =>  __( 'Search Categories','ot_slider_text' ),

    'all_items' => __( 'All Categories','ot_slider_text' ),

    'parent_item' => __( 'Parent Categories','ot_slider_text' ),

    'parent_item_colon' => __( 'Parent Categories:','ot_slider_text' ),

    'edit_item' => __( 'Edit Categories','ot_slider_text' ), 

    'update_item' => __( 'Update Categories','ot_slider_text' ),

    'add_new_item' => __( 'Add New Categories','ot_slider_text' ),

    'new_item_name' => __( 'New Categories Name','ot_slider_text' ),

    'menu_name' => __( 'Categories','ot_slider_text' ),

  );     



// Now register the taxonomy



  register_taxonomy('categories1',array('slider_text'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'categories1' ),

  ));



}

?>