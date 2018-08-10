<?php
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
