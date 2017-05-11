<?php
/**
 * my-underscore-wp-theme Theme Customizer
 *
 * @package my-underscore-wp-theme
 * @since my-underscore-wp-theme 1.2
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since my-underscore-wp-theme 1.2
 */
function my_underscore_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'my_underscore_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since my-underscore-wp-theme 1.2
 */
function my_underscore_theme_customize_preview_js() {
	wp_enqueue_script( 'my_underscore_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'my_underscore_theme_customize_preview_js' );
