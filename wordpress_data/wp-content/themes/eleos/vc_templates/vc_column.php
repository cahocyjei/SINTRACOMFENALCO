
<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $column_effect
 * @var $time
 * @var $distance
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $width = $css = $offset = $css_animation = $column_effect = $time = $distance = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$animate_effect = '';
if($column_effect == 'bottommove'){
	$animate_effect .= ' data-scroll-reveal="enter bottom and move '. $distance .'px over 1s after '. $time .'s"';
}elseif($column_effect == 'topmove'){
	$animate_effect .= ' data-scroll-reveal="enter top and move '. $distance .'px over 1s after '. $time .'s"';
}elseif($column_effect == 'leftmove'){
	$animate_effect .= ' data-scroll-reveal="enter left and move '. $distance .'px over 1s after '. $time .'s"';
}elseif($column_effect == 'rightmove'){
	$animate_effect .= ' data-scroll-reveal="enter right and move '. $distance .'px over 1s after '. $time .'s"';
}else{
	$animate_effect .= '';
}
$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
	$css_classes[]='vc_col-has-fill';
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '' .$animate_effect. '>';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
echo $output;
