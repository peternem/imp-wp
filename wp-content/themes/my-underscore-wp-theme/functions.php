<?php

/**
 * my-underscore-wp-theme functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package my-underscore-wp-theme
 * @since my-underscore-wp-theme 0.1.0
 */
// Useful global constants
define('MY_UNDERSCORE_THEME_VERSION', '0.1.0');

/**
 * Add humans.txt to the <head> element.
 */
function my_underscore_theme_header_meta() {
    $humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';

    echo apply_filters('my_underscore_theme_humans', $humans);
}

add_action('wp_head', 'my_underscore_theme_header_meta');

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since my-underscore-wp-theme 1.0
 */
if (!isset($content_width))
    $content_width = 640; /* pixels */

if (!function_exists('my_underscore_theme_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     *
     * @since my-underscore-wp-theme 1.0
     */
    function my_underscore_theme_setup() {

        /**
         * Custom template tags for this theme.
         */
        require( get_template_directory() . '/inc/template-tags.php' );

        /**
         * Custom functions that act independently of the theme templates
         */
        require( get_template_directory() . '/inc/extras.php' );

        /**
         * Customizer additions
         */
        require( get_template_directory() . '/inc/customizer.php' );

        /**
         * WordPress.com-specific functions and definitions
         */
        //require( get_template_directory() . '/inc/wpcom.php' );

        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         */
        load_theme_textdomain('my_underscore_theme', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for Post Thumbnails
         */
        add_theme_support('post-thumbnails');

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'my_underscore_theme'),
        ));

        /**
         * Add support for the Aside Post Formats
         */
        add_theme_support('post-formats', array('aside',));
    }

endif; // my_underscore_theme_setup
add_action('after_setup_theme', 'my_underscore_theme_setup');

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since my-underscore-wp-theme 1.0
 */
function my_underscore_theme_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'my_underscore_theme'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'my_underscore_theme_widgets_init');

/**
 * Enqueue scripts and styles
 */
function my_underscore_theme_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('small-menu', get_template_directory_uri() . '/js/small-menu.js', array('jquery'), '20120206', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20120202');
    }

    $postfix = ( defined('SCRIPT_DEBUG') && true === SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_script('my_underscore_theme', get_template_directory_uri() . "/assets/js/my_underscore_wp_theme{$postfix}.js", array(), MY_UNDERSCORE_THEME_VERSION, true);

    wp_enqueue_style('my_underscore_theme', get_template_directory_uri() . "/assets/css/src/my_underscore_wp_theme{$postfix}.css", array(), MY_UNDERSCORE_THEME_VERSION);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/assets/bootstrap/css/bootstrap.css", array(), MY_UNDERSCORE_THEME_VERSION);
}

add_action('wp_enqueue_scripts', 'my_underscore_theme_scripts');

/**
 * Enqueue scripts and styles
 */
function my_angular_scripts() {

//Load angular
        wp_enqueue_script( 'wp-api' );
//	wp_enqueue_script('angularjs', get_template_directory_uri() .'/node_modules/angular/angular.min.js');
//	wp_enqueue_script('angularjs-route', get_template_directory_uri() .'/node_modules/angular-route/angular-route.min.js');
//	wp_enqueue_script('angularjs-sanitize', get_stylesheet_directory_uri() . '/node_modules/angular-sanitize/angular-sanitize.min.js');
//	wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'angularjs', 'angularjs-route' ));
//	wp_enqueue_script('theme-service', get_stylesheet_directory_uri() . '/js/services.js');
//
//	wp_localize_script('scripts', 'localized',
//			array(
//				'partials' => 'http://mattpeternell.dev/wp-content/themes/my-underscore-wp-theme/partials/'
//				)
//	);

}

add_action('wp_enqueue_scripts', 'my_angular_scripts');

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );