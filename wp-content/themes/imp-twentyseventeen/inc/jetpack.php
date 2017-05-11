<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function impTheme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'impTheme_jetpack_setup' );
