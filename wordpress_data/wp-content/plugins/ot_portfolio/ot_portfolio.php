<?php
/*
    Plugin Name: OT Portfolios
    Plugin URI: http://oceanthemes.net/
    Description: Declares a plugin that will create a custom post type displaying portfolio.
    Version: 1.0
    Author: OceanThemes Team
    Author URI: http://oceanthemes.net/
    Text Domain: ot-portfolio
    Domain Path: /lang
    License: GPLv2 or later
*/

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_portfolio_update() {
    load_plugin_textdomain('ot-portfolio', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_portfolio_update');

add_action( 'init', 'register_ocean_Portfolio' );
function register_ocean_Portfolio() {
    
    $labels = array( 
        'name' => __( 'Portfolio', 'ot-portfolio' ),
        'singular_name' => __( 'Portfolio', 'ot-portfolio' ),
        'add_new' => __( 'Add New Portfolio', 'ot-portfolio' ),
        'add_new_item' => __( 'Add New Portfolio', 'ot-portfolio' ),
        'edit_item' => __( 'Edit Portfolio', 'ot-portfolio' ),
        'new_item' => __( 'New Portfolio', 'ot-portfolio' ),
        'view_item' => __( 'View Portfolio', 'ot-portfolio' ),
        'search_items' => __( 'Search Portfolios', 'ot-portfolio' ),
        'not_found' => __( 'No Portfolios found', 'ot-portfolio' ),
        'not_found_in_trash' => __( 'No Portfolios found in Trash', 'ot-portfolio' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'ot-portfolio' ),
        'menu_name' => __( 'Portfolio', 'ot-portfolio' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'List Portfolio',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats' ),
        'taxonomies' => array( 'Portfolio_category','categories','tags' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'show_in_nav_menus' => true,
        'show_in_admin_bar'   => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug'=>'portfolio'),
        'capability_type' => 'post'
    );

    register_post_type( 'Portfolio', $args );
}
add_action( 'init', 'create_Categories_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Categories_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Categories', 'ot-portfolio' ),
    'singular_name' => __( 'Categories', 'ot-portfolio' ),
    'search_items' =>  __( 'Search Categories','ot-portfolio' ),
    'all_items' => __( 'All Categories','ot-portfolio' ),
    'parent_item' => __( 'Parent Categories','ot-portfolio' ),
    'parent_item_colon' => __( 'Parent Categories:','ot-portfolio' ),
    'edit_item' => __( 'Edit Categories','ot-portfolio' ), 
    'update_item' => __( 'Update Categories','ot-portfolio' ),
    'add_new_item' => __( 'Add New Categories','ot-portfolio' ),
    'new_item_name' => __( 'New Categories Name','ot-portfolio' ),
    'menu_name' => __( 'Categories','ot-portfolio' ),
  );     

// Now register the taxonomy

  register_taxonomy('categories',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
  ));

}
add_action( 'init', 'create_Tags_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Tags_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Tags', 'ot-portfolio' ),
    'singular_name' => __( 'Tags', 'ot-portfolio' ),
    'search_items' =>  __( 'Search Tags','ot-portfolio' ),
    'all_items' => __( 'All Tags','ot-portfolio' ),
    'parent_item' => __( 'Parent Tags','ot-portfolio' ),
    'parent_item_colon' => __( 'Parent Tags:','ot-portfolio' ),
    'edit_item' => __( 'Edit Tags','ot-portfolio' ), 
    'update_item' => __( 'Update Tags','ot-portfolio' ),
    'add_new_item' => __( 'Add New Tags','ot-portfolio' ),
    'new_item_name' => __( 'New Tags Name','ot-portfolio' ),
    'menu_name' => __( 'Tags','ot-portfolio' ),
  );     

// Now register the taxonomy
  register_taxonomy('tags',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tags' ),
  ));
}

/**
 * Load template file for portfolio single
 *
 * @since  1.0.0
 *
 * @param  string $template
 *
 * @return string
 */
add_filter( 'template_include', 'include_template_function', 1 ); 
function include_template_function( $template_path ) {
    if ( get_post_type() == 'Portfolio' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-portfolio.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path(__FILE__) . 'template/single-portfolio.php';
            }
        }
    }
    return $template_path;
}

?>