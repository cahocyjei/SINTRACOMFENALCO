<?php
/*
	Plugin Name: OT Testimonials
	Plugin URI: http://oceanthemes.net/
	Description: Declares a plugin that will create a custom post type displaying portfolio.
	Version: 1.0
	Author: OceanThemes Team
	Author URI: http://oceanthemes.net/
	Text Domain: ot_testimonial
	Domain Path: /lang
	License: GPLv2 or later
*/

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_testimonial_update() {
	load_plugin_textdomain('ot_testimonial', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_testimonial_update');

function ot_testimonials_type() {
	$testimoniallabels = array (	

		'name' => __('Testimonial','ot_testimonial'),

		'singular_name' => __('Testimonial','ot_testimonial'),

		'add_new' => __('Add testimonial','ot_testimonial'),

		'add_new_item' => __('Add new testimonial','ot_testimonial'),

		'edit_item' => __('Edit testimonial','ot_testimonial'),

		'new_item' => __('Add new testimonial','ot_testimonial'),

		'all_items' => __('All testimonial','ot_testimonial'),

		'view_item' => __('View testimonial','ot_testimonial'),

		'search_item' => __('Search testimonial','ot_testimonial'),

		'not_found' => __('No testimonial found..','ot_testimonial'),

		'not_found_in_trash' => __('No testimonial found in Trash.','ot_testimonial'),

		'menu_name' => 'Testimonial'

	

	);

	$args = array(

		'labels' => $testimoniallabels,
		'hierarchical' => false,
		'description' => 'Manages testimonial',
		'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => null,
		'menu_icon' => 'dashicons-testimonial',		
		'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug'=>'testimonial'),
        'capability_type' => 'post',
		'supports' => array( 'title','editor','thumbnail','excerpt','comments','custom-fields'),
	);
		register_post_type ('testimonial',$args);
	}
add_action ('init','ot_testimonials_type');

function ot_testimonial_taxonomy () {
	$taxonomylabels = array(

	'name' => __('Category testimonial','ot_testimonial'),

	'singular_name' => __('Category testimonial','ot_testimonial'),

	'search_items' => __('Search Category testimonial','ot_testimonial'),

	'all_items' => __('All Category testimonial','ot_testimonial'),

	'edit_item' => __('Edit Category testimonial','ot_testimonial'),

	'add_new_item' => __('Add new Category testimonial','ot_testimonial'),

	'menu_name' => __('Category testimonial','ot_testimonial'),

	);

	$args = array(

	'labels' => $taxonomylabels,

	'hierarchical' => true,

);
	register_taxonomy('category_testimonial','testimonial',$args);
}
add_action ('init','ot_testimonial_taxonomy',0);

?>