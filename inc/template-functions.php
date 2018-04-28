<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pxmacz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pxmacz_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
		$classes[] = 'archive-view';
	}

	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	// Adds a class whether a sidebar is in uses

	if (is_active_sidebar( 'sidebar-1' )) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

// Ads a class for front page Yaf_Route_Static

if (is_front_page()) {
	$classes[] = 'is-frontpage';
}

	return $classes;
}
add_filter( 'body_class', 'pxmacz_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pxmacz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pxmacz_pingback_header' );
