<?php

/**
 * _s_backbone functions and definitions
 *
 * @package megatherium
 */
/**
 * Load util functions
 */
require get_template_directory() . '/inc/utils.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}

if (!function_exists('megatherium_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function megatherium_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on _s_backbone, use a find and replace
         * to change 'megatherium' to the name of your theme in all the template files
         */
        load_theme_textdomain('megatherium', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        //add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'megatherium'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        add_theme_support('title-tag');
        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link'
        ));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('_s_backbone_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

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
    }

endif; // _s_backbone_setup
add_action('after_setup_theme', 'megatherium_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function megatherium_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'megatherium'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'megatherium_widgets_init');

// Local dev live relaod content
 if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
	wp_register_script('livereload', 'http://mattpeternell.dev:35729/livereload.js?snipver=1', null, false, true);
}

/**
 * Enqueue scripts and styles.
 */
function megatherium_scripts() {
    //Check for Dev Environment if true load unminified scripts and css else load minified versions.
    $minified = "";
    if (($_SERVER['HTTP_HOST'] === 'mattpeternell.net') || ($_SERVER['HTTP_HOST'] === 'www.mattpeternell.net')) {
        $minified = ".min";
    } else {
        $minified = "";
    }

    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
    wp_enqueue_script('jquery');
    wp_enqueue_style('_s_backbone-style', get_template_directory_uri() . '/assets/css//theme-style' . $minified . '.css', array(), '20130908');
    wp_enqueue_style('font-awesome-icons', get_template_directory_uri() . '/assets/css/font-awesome' . $minified . '.css');
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.custom.92053' . $minified . '.js', array('jquery'), 'v2.8.3');
    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/vendor/parallax' . $minified . '.js', array('jquery'), '20130905', true);
    wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/assets/js/vendor/jquery.bxslider' . $minified . '.js', array('jquery'), '20130905', true);
    wp_enqueue_script('jquery-main', get_template_directory_uri() . '/assets/js/main' . $minified . '.js', array('jquery'), '20130905', true);




    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    } elseif (is_home() || is_front_page() || is_search()) {
        global $wp_rewrite;

        wp_enqueue_script('_s_backbone-loop', get_template_directory_uri() . '/assets/js/loop' . $minified . '.js', array('wp-api', 'jquery', 'backbone', 'underscore'), '1.0', true);

        $key = explode('/', $_SERVER["REQUEST_URI"]);
        $queried_object = get_queried_object();
        $local = array(
            'loopType' => 'home',
            'queriedObject' => $queried_object,
            'pathInfo' => array(
                'author_permastruct' => $wp_rewrite->get_author_permastruct(),
                'host' => preg_replace('#^http(s)?://#i', '', untrailingslashit(get_option('home'))),
                'path' => _s_backbone_get_request_path(),
                'path_base' => $key[1],
                'path_base_page' => $key[2],
                'path_base' => $uri = $_SERVER['REQUEST_URI'],
                'use_trailing_slashes' => $wp_rewrite->use_trailing_slashes,
                'parameters' => _s_backbone_get_request_parameters(),
            ),
        );
//        echo '<pre>';
//        print_r($local);
//        echo '</pre>';
        if (is_category() || is_tag() || is_tax()) {
            $local['loopType'] = 'archive';
            $local['taxonomy'] = get_taxonomy($queried_object->taxonomy);
            print_r($local);
        } elseif (is_search()) {
            $local['loopType'] = 'search';
            $local['searchQuery'] = get_search_query();
        } elseif (is_author()) {
            $local['loopType'] = 'author';
        }

        //set the page we're on so that Backbone can load the proper state
        if (is_paged()) {
            $local['page'] = absint(get_query_var('paged')) + 1;
        }

        wp_localize_script('_s_backbone-loop', 'settings', $local, 'wpApiSettings');
    }

    if (is_singular('post')) {
        global $wp_rewrite;
        wp_enqueue_script('_s_backbone-post-loop', get_template_directory_uri() . '/assets/js/post' . $minified . '.js', array('wp-api', 'jquery', 'backbone', 'underscore'), '1.0', true);

        $key = explode('/', $_SERVER["REQUEST_URI"]);
        $queried_object = get_queried_object();
        $local = array(
            'loopType' => 'home',
            'queriedObject' => $queried_object,
            'pathInfo' => array(
                'author_permastruct' => $wp_rewrite->get_author_permastruct(),
                'host' => preg_replace('#^http(s)?://#i', '', untrailingslashit(get_option('home'))),
                'path' => _s_backbone_get_request_path(),
                'path_base' => $key[1],
                'path_base_page' => $key[2],
                'use_trailing_slashes' => $wp_rewrite->use_trailing_slashes,
                'parameters' => _s_backbone_get_request_parameters(),
            ),
        );
//        echo '<pre>';
//        print_r($local);
//        echo '</pre>';

        wp_localize_script('_s_backbone-post-loop', 'settings', $local, 'wpApiSettings');
    }
    if (is_singular('web_portfolio')) {
        global $wp_rewrite;
        wp_enqueue_script('web-cpt-loop', get_template_directory_uri() . '/assets/js/web-cpt-post' . $minified . '.js', array('wp-api', 'jquery', 'backbone', 'underscore'), '1.0', true);

        $queried_object = get_queried_object();

        $key = explode('/', $_SERVER["REQUEST_URI"]);

        $local = array(
            'loopType' => 'home',
            'queriedObject' => $queried_object,
            'pathInfo' => array(
                'author_permastruct' => $wp_rewrite->get_author_permastruct(),
                'host' => preg_replace('#^http(s)?://#i', '', untrailingslashit(get_option('home'))),
                'path' => _s_backbone_get_request_path(),
                'path_base' => $key[1],
                'path_base_page' => $key[2],
                'use_trailing_slashes' => $wp_rewrite->use_trailing_slashes,
                'parameters' => _s_backbone_get_request_parameters(),
            ),
        );
//        echo '<pre>';
//        print_r($local);
//        echo '</pre>';
        wp_localize_script('web-cpt-loop', 'settings', $local, 'wpApiSettings');
    }
}

add_action('wp_enqueue_scripts', 'megatherium_scripts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/*
 * ACF Theme Options
 */
require get_template_directory() . '/inc/acf-theme-options.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Breadcrumb trail........
 */
require get_template_directory() . '/inc/breadcrumb.php';


add_action('rest_api_init', 'add_thumbnail_to_JSON');

function add_thumbnail_to_JSON() {
//Add featured image
    register_rest_field(array('post', 'web_portfolio', 'print_portfolio'), 'featured_image_src', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
            array(
        'get_callback' => 'get_image_src',
        'update_callback' => null,
        'schema' => null
            )
    );
}

add_action('rest_api_init', 'add_web_thumbnail_to_JSON');

function add_web_thumbnail_to_JSON() {
//Add featured image
    register_rest_field(array('post', 'web_portfolio', 'print_portfolio'), 'featured_image_web_thumb', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
            array(
        'get_callback' => 'get_image_src_web_thumb',
        'update_callback' => null,
        'schema' => null
            )
    );
}

function get_image_src($object, $field_name, $request) {
    $feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'thumbnail', true);
    return $feat_img_array[0];
}

function get_image_src_web_thumb($object, $field_name, $request) {
    $feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'homepage-thumb', true);
    return $feat_img_array[0];
}

/**
 * REST API - Add Kia Subtitle field.
 */
add_action('rest_api_init', 'add_kia_subtitle_to_JSON');

function add_kia_subtitle_to_JSON() {
//Add to rest api
    register_rest_field(array('post', 'web_portfolio', 'print_portfolio'), 'kia_subtitle', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
            array(
        'get_callback' => 'get_kia_subtitle',
        'update_callback' => null,
        'schema' => null
            )
    );
}

function get_kia_subtitle($response, $post, $context) {
    $k_subtitle = get_the_subtitle($post->ID);
    return $k_subtitle;
}

/**
 * REST API - Get the Category object for each CPT post
 */
add_action('rest_api_init', 'add_cpt_cat_to_JSON');

function add_cpt_cat_to_JSON() {
//Add to rest api
    register_rest_field(array('web_portfolio', 'print_portfolio'), 'cpt_category', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
            array(
        'get_callback' => 'get_cpt_cat_name',
        'update_callback' => null,
        'schema' => null
            )
    );
}

function get_cpt_cat_name($response, $post, $context) {
    return $category = get_the_category($post->ID);
}

/**
 * REST API - Get the Tag object for each CPT post
 */
add_action('rest_api_init', 'add_cpt_tag_to_JSON');

function add_cpt_tag_to_JSON() {
//Add to rest api
    register_rest_field(array('web_portfolio', 'print_portfolio'), 'cpt_tag', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
            array(
        'get_callback' => 'get_cpt_tag_name',
        'update_callback' => null,
        'schema' => null
            )
    );
}

function get_cpt_tag_name($response, $post, $context) {
    return $tags = $posttags = get_the_tags($post->ID);
}

/**
 * REST API - Add post tag name to json field.
 */
function ag_filter_post_tag_json($response, $post, $context) {
    $tags = wp_get_post_tags($post->ID);
    $response->data['tag_names'] = [];

    foreach ($tags as $tag) {
        $response->data['tag_names'][] = $tag->name;
    }

    return $response;
}

add_filter('rest_prepare_post', 'ag_filter_post_tag_json', 10, 3);

/**
 * REST API - Add Category names instead of ID #'s.
 */
function ag_filter_post_cat_json($response_cat, $post, $context) {
    $cat_tags = get_the_category($post->ID);
    $response_cat->data['category_names'] = [];

    foreach ($cat_tags as $ctag) {
        $response_cat->data['category_names'][] = $ctag->name;
    }
    return $response_cat;
}

add_filter('rest_prepare_post', 'ag_filter_post_cat_json', 10, 3);

/**
 * REST API - Add Autho info
 */
function wpse_20160421_get_author_meta($object, $field_name, $request) {

    $user_data = get_userdata($object['author']); // get user data from author ID.

    $array_data = (array) ($user_data->data); // object to array conversion.

    $array_data['first_name'] = get_user_meta($object['author'], 'first_name', true);
    $array_data['last_name'] = get_user_meta($object['author'], 'last_name', true);
    $array_data['nickname'] = get_user_meta($object['author'], 'nickname', true);


    // prevent user enumeration.
    unset($array_data['user_email']);
    unset($array_data['user_login']);
    unset($array_data['user_pass']);
    unset($array_data['user_activation_key']);

    return array_filter($array_data);
}

function wpse_20160421_register_author_meta_rest_field() {

    register_rest_field(array('post', 'web_portfolio', 'print_portfolio'), 'author_meta', [
        'get_callback' => 'wpse_20160421_get_author_meta',
        'update_callback' => 'null',
        'schema' => 'null',
    ]);
}

add_action('rest_api_init', 'wpse_20160421_register_author_meta_rest_field');

/**
 * REST API - Add custom fields to posts, pages and CPT's
 */
function wp_rest_api_alter() {
    register_rest_field('post', 'fields', array(
        'get_callback' => function($data, $field, $request, $type) {
            if (function_exists('get_fields')) {
                return get_fields($data['id']);
            }
            return [];
        },
        'update_callback' => null,
        'schema' => null,
            )
    );
    register_rest_field('page', 'fields', array(
        'get_callback' => function($data, $field, $request, $type) {
            if (function_exists('get_fields')) {
                return get_fields($data['id']);
            }
            return [];
        },
        'update_callback' => null,
        'schema' => null,
            )
    );
    register_rest_field(array('web_portfolio', 'print_portfolio'), 'fields', array(
        'get_callback' => function($data, $field, $request, $type) {
            if (function_exists('get_fields')) {
                return get_fields($data['id']);
            }
            return [];
        },
        'update_callback' => null,
        'schema' => null,
            )
    );
}

add_action('rest_api_init', 'wp_rest_api_alter');

function wpse28145_add_custom_types($query) {
    if (is_tag() && $query->is_main_query()) {

        // this gets all post types:
        $post_types = get_post_types();
        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );

        $query->set('post_type', $post_types);
    }
}

add_filter('pre_get_posts', 'wpse28145_add_custom_types');
