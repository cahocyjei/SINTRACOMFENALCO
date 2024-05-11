<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

function eleos_register_meta_boxes( $meta_boxes ) {

	$prefix = '_cmb_';
	$meta_boxes[] = array(

		'id'       => 'format_detail',

		'title'    => esc_html__( 'Format Details', 'eleos' ),

		'pages'    => array( 'post' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(

			array(

				'name'             => esc_html__( 'Image', 'eleos' ),

				'id'               => $prefix . 'image',

				'type'             => 'image_advanced',

				'class'            => 'image',

				'max_file_uploads' => 1,

			),

			array(

				'name'  => esc_html__( 'Gallery', 'eleos' ),

				'id'    => $prefix . 'images',

				'type'  => 'image_advanced',

				'class' => 'gallery',

			),

			array(

				'name'  => esc_html__( 'Quote', 'eleos' ),

				'id'    => $prefix . 'quote',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'quote',

			),

			array(

				'name'  => esc_html__( 'Author', 'eleos' ),

				'id'    => $prefix . 'quote_author',

				'type'  => 'text',

				'class' => 'quote',

			),

			array(

				'name'  => esc_html__( 'Audio', 'eleos' ),

				'id'    => $prefix . 'link_audio',

				'type'  => 'oembed',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'audio',

				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',

			),

			array(

				'name'  => esc_html__( 'Video', 'eleos' ),

				'id'    => $prefix . 'link_video',

				'type'  => 'oembed',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'video',

				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',

			),			

		),

	);
	$meta_boxes[] = array(

		'id'       => 'page_settings',

		'title'    => esc_html__( 'Page Settings', 'eleos' ),

		'pages'    => array( 'page' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
                'name' => esc_html__( 'Page SubTitle', 'eleos' ),
                'desc' => esc_html__( 'Enter page subtitle.', 'eleos' ),
                'id'   => $prefix . 'page_subtitle',
                'type' => 'textarea',
            ),	
		),

	);

	$meta_boxes[] = array(

		'id'       => 'service_settings',

		'title'    => esc_html__( 'Service Settings', 'eleos' ),

		'pages'    => array( 'service' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
                'name' => esc_html__( 'Number', 'eleos' ),
                'desc' => esc_html__( 'Enter number post', 'eleos' ),
                'id'   => $prefix . 'number',
                'type' => 'text',
            ),	
		),

	);

	$meta_boxes[] = array(

		'id'       => 'slider_text_setting',

		'title'    => esc_html__( 'Slider Settings', 'eleos' ),

		'pages'    => array( 'slider_text' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
                'name' => esc_html__( 'Select Position Text on Image', 'eleos' ),
                'desc' => esc_html__( 'Select Position Text on Image, Default: Text on Left, Display on home page.', 'eleos' ),
                'id'   => $prefix . 'text_position',
                'type'    => 'select',
                'options' => array(
					'left' => esc_html__( 'Text on Left Image', 'eleos' ),
					'right' => esc_html__( 'Text on Right Image', 'eleos' ),                       
				),
				'std' => 'left'	
            )
		),

	);	

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'eleos_register_meta_boxes' );

