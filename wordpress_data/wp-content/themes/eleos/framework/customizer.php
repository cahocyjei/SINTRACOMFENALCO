<?php
/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function eleos_color_scheme_css() {
	global $eleos_option; 
	wp_add_inline_style( 'eleos-style', eleos_get_color_scheme_css() );
}
add_action( 'wp_enqueue_scripts', 'eleos_color_scheme_css' );

/**
 * Returns CSS for the color schemes.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function eleos_get_color_scheme_css() {
	global $eleos_option;

	$css = <<<CSS
	/* Color Scheme */	

	/* default color: #FAB702 */
	.menu-back {
		background-color:{$eleos_option['bghead']};
	}
	.cbp-af-header.cbp-af-header-shrink {
		background-color:{$eleos_option['bghead_scroll']};
	}
	ul.slimmenu li a {
		color:{$eleos_option['menu_color']};
	}

	#royal_preloader.royal_preloader_progress .royal_preloader_meter,
	.hero-text p:before,
	.section-title h2:before,
	.section-title h4:before,
	#cd-zoom-in, #cd-zoom-out,
	#ajax-form button:hover,
	.comments .form-submit input:hover,
	.con-details:hover .icon,
	.sidebar input:active,
	.sidebar input:focus,
	.link-tag a:hover,
	.shop-item  .link-items a:hover,
	.shop-item .hot, .mb_YTVTime, 
	.sin-shop-item .item-text-wrap .button:hover,
	.action--open, .action--open:focus, .action--open:hover,
	.wpcf7-form button#send:hover
	{
		background-color:{$eleos_option['main-color']};
	}
	.navbutton__line {
		stroke: {$eleos_option['main-color']};
	}
	ul.slimmenu li a.mPS2id-highlight,
	#sync2 .item:hover h6,
	#sync2 .synced .item h6,
	#filter li .current,
	#filter li a:hover,
	.post h6:hover,
	.post .subtext a,
	.all-news-link:hover h6,
	.counters h6 span,
	.footer-down p span,
	.footer-down p i,
	.con-details .icon,
	.comm-number p a,
	.name-aut-replay a,
	.widget_recent_entries a:hover,
	.shop-item .price,
	.shop-item h6:hover,
	.logged-in-as a, .mb_YTVPBar,
	.sin-shop-item .item-text-wrap h3
	{
		color:{$eleos_option['main-color']};
	}
	.comments textarea:focus,
	.comments input:focus,
	.comments textarea:active,
	.comments input:active,
	.wpcf7-form textarea:focus,
	.wpcf7-form input:focus,
	.wpcf7-form textarea:active,
	.wpcf7-form input:active,
	ul.slimmenu li a:hover,
	#sync2 .synced .item
	{
		border-bottom:1px solid {$eleos_option['main-color']};
		outline: 0px;
	}
	.con-details .icon {
		border: 1px solid {$eleos_option['main-color']};
	}
	::selection {
		background: {$eleos_option['main-color']};
	}
	::-moz-selection {
		background: {$eleos_option['main-color']};
	}
	}
	.sidebar input:-ms-input-placeholder  {
		color:{$eleos_option['main-color']};
	}
	.sidebar input::-moz-placeholder  {
		color:{$eleos_option['main-color']};
	}
	.sidebar input:-moz-placeholder  {
		color:{$eleos_option['main-color']};
	}
	.sidebar input::-webkit-input-placeholder  {
		color:{$eleos_option['main-color']};
	}
	.logo-footer-background{
		background-image:url({$eleos_option['bgfooter']['url']});
	}
	
	/* custom logo */
	.logo img {
		width: {$eleos_option['widthlg']}px;
		height: {$eleos_option['heightlg']}px;
		top:{$eleos_option['toplg']}px;
	}

	.cbp-af-header.cbp-af-header-shrink .logo img {
		width: {$eleos_option['widthlg_scroll']}px;
		height: {$eleos_option['heightlg_scroll']}px;
		top:{$eleos_option['toplg_scroll']}px;
	}

	@media only screen and (max-width: 1200px) {
		.logo img, .cbp-af-header.cbp-af-header-shrink .logo img {
			width: {$eleos_option['widthlg_mobie']}px;
			height: {$eleos_option['heightlg_mobie']}px;
			top:{$eleos_option['toplg_mobie']}px;
		}
	}

CSS;

	return $css;
}