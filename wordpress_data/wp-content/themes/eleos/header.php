<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eleos
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php eleos_custom_favicon(); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php eleos_custom_preload(); ?>
<nav id="menu-wrap" class="menu-back cbp-af-header">
    <div class="container">
        <div class="twelve columns">
            <?php eleos_custom_logo(); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'onepage', 'menu_class' => 'slimmenu' ) ); ?>
        </div>
    </div>
</nav>