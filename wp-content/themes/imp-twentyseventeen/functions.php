<?php
/**
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 * 
 */
if (!isset($content_width))
    $content_width = 680;

/**
 * impTheme_setup function.
 * 
 * @access public
 * @return void
 */
add_action('after_setup_theme', 'impTheme_setup');

function impTheme_setup() {
    require 'inc/general/class-Upbootwp_Walker_Nav_Menu.php';
    require 'inc/general/class-Upbootwp_Walker_Nav_Footer_Menu.php';

    load_theme_textdomain('impTheme', get_template_directory() . '/languages');

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */

    function my_theme_add_editor_styles() {
        add_editor_style('css/custom-editor-style.css');
    }

    add_theme_support( 'title-tag' );
    
    add_action('init', 'my_theme_add_editor_styles');

    add_theme_support('automatic-feed-links');

    /**
     * Enable support for Post Thumbnails on posts and pages
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails', array('post'));          // Posts only
    add_theme_support('post-thumbnails', array('page'));
    add_theme_support('post-thumbnails');

    add_image_size('careers-featured', 1920, 1080, true);
    add_image_size('careers-featured-1080', 1080, 1920, true);
    add_image_size('careers-featured-narrow', 1920, 768, array('left', 'top'));
    add_image_size('people-featured-6x8', 600, 800, true);
    add_image_size('homepage-thumb', 768, 768, array('left', 'top')); // Hard crop left top
    add_image_size('homepage-thumb-port', 578, 885, array('left', 'top'));
    add_image_size('homepage-thumb-land', 885, 578, array('center', 'top'));
    add_image_size('web-thumb-5x6', 540, 640, array('center', 'top'));
    add_image_size('web-thumb-6x5', 640, 540, array('center', 'top'));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'impTheme'),
        'secondary' => __('Secondary Menu', 'impTheme'),
        'primary' => __('Primary Menu', 'impTheme'),
        'secondary' => __('Secondary Menu', 'impTheme'),
    ));
    register_nav_menu('footer_navigation', 'Footer navigation');
    register_nav_menu('footer_aux_navigation', 'Footer aux navigation');

    /**
     * Enable support for Post Formats
     */
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

    /**
     * Setup the WordPress core custom background feature.
     */
    add_theme_support('custom-background', apply_filters('impTheme_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));
}

// Local dev live relaod content
// if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
// 	wp_register_script('livereload', 'http://mattpeternell.dev:35729/livereload.js?snipver=1', null, false, true);

function impTheme_scripts() {
    //Check for Dev Environment if true load unminified scripts and css else load minified versions.
    $minified = "";
    if (($_SERVER['HTTP_HOST'] === 'mattpeternell.net') || ($_SERVER['HTTP_HOST'] === 'www.mattpeternell.net')) {
        $minified = ".min";
    } else {
        $minified = "";
    }
    wp_enqueue_style('imp-style', get_template_directory_uri() . '/assets/css/imp-style' . $minified . '.css', array(), '20130908');
    wp_enqueue_style('font-awesome-icons', get_template_directory_uri() . '/assets/css/font-awesome' . $minified . '.css');
    wp_enqueue_script('impTheme-jQuery-ui', get_template_directory_uri() . '/assets/js/vendor/jquery-ui' . $minified . '.js', array(), '1.11.2', true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.custom.92053' . $minified . '.js', array('jquery'), 'v2.8.3');
    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/vendor/parallax' . $minified . '.js', array(), '20130905', true);
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/js/vendor/jquery.bxslider' . $minified . '.js', array(), '20130905', true);
    wp_enqueue_script('javascript', get_template_directory_uri() . '/assets/js/main' . $minified . '.js', array(), '20130905', true);
}

add_action('wp_enqueue_scripts', 'impTheme_scripts');

/**
 * Register Custom Post Types and other CPT stuff
 */
require get_template_directory() . '/inc/reg-custom-post-type.php';

/**
 * Add Class to All Excerpts in WordPress
 */
require get_template_directory() . '/inc/excerpts.php';

/**
 * Custom SVG Support to media library.
 */
require get_template_directory() . '/inc/mime-type.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * Register custom footer and sidbar widget widgets
 */
require get_template_directory() . '/inc/reg-widgets.php';

/*
 * Post Attachment image function. Image URL for CSS Background.
 */
require get_template_directory() . '/inc/post-image-url.php';

/*
 * Breadcrumb trail........
 */
require get_template_directory() . '/inc/breadcrumb.php';

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Home Page Settings',
        'menu_title' => 'Home Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme CTA Settings',
        'menu_title' => 'Global CTA',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}


/*
 * Custom Post Type Quick Edit Panel Up
 */
//require get_template_directory() . '/admin/web-portfolio-quick-website-url.php';


function my_columns_filter( $columns ) {
   unset($columns['author']);
   //unset($columns['categories']);
//   unset($columns['tags']);
//   unset($columns['comments']);
   return $columns;
   }
       
    // Filter pages
    //add_filter( 'manage_edit-page_columns', 'my_columns_filter',10, 1 );	

    // Filter Posts
    //add_filter( 'manage_edit-post_columns', 'my_columns_filter',10, 1 );

    // Custom Post Type
    add_filter( 'manage_edit-web_portfolio_columns', 'my_columns_filter',10, 1 );
    
    
    
    /* * **** Add Thumbnails in Manage Posts/Pages List ***** */
if (!function_exists('AddThumbColumn') && function_exists('add_theme_support')) {
    // for post and page
    add_theme_support('post-thumbnails', array('post', 'page'));

    function AddThumbColumn($cols) {
        $cols['thumbnail'] = __('Featured Image');
        return $cols;
    }

    function AddThumbValue($column_name, $post_id) {
        $width = (int) 60;
        $height = (int) 60;
        if ('thumbnail' == $column_name) {
            // thumbnail of WP 2.9
            $thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);
            // image from gallery
            $attachments = get_children(array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image'));
            if ($thumbnail_id)
                $thumb = wp_get_attachment_image($thumbnail_id, array($width, $height), true);
            elseif ($attachments) {
                foreach ($attachments as $attachment_id => $attachment) {
                    $thumb = wp_get_attachment_image($attachment_id, array($width, $height), true);
                }
            }
            if (isset($thumb) && $thumb) {
                echo $thumb;
            } else {
                echo __('None');
            }
        }
    }

    // for posts
    add_filter('manage_posts_columns', 'AddThumbColumn');
    add_action('manage_posts_custom_column', 'AddThumbValue', 10, 3);
    // for pages
    add_filter('manage_pages_columns', 'AddThumbColumn');
    add_action('manage_pages_custom_column', 'AddThumbValue', 10, 3);
}

/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function searchfilter($query) {

    if ($query->is_main_query() && !is_admin() && $query->is_search()) {
        $query->set('post_type', array('web_portfolio', 'print_portfolio', 'posts'));
        // Change the query parameters
        $query->set('posts_per_page', 10);
    }
    return $query;
}

add_filter('pre_get_posts', 'searchfilter');


/* ------------------------------------*\
  Actions + Filters + ShortCodes
  \*------------------------------------ */


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

function disable_self_trackback( &$links ) {
  foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'disable_self_trackback' );

function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    add_filter('emoji_svg_url', '__return_false');

    // filter to remove TinyMCE emojis
    //add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action('init', 'disable_wp_emojicons');


// Add Filters
//add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
//add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
//add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
//add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
//add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
//add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
//add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
////add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
//add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
//add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
//add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
//add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
//add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images