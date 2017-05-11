<?php
/*
 * 
 * Add Class to All Excerpts in WordPress
 * 
 */
add_filter("the_excerpt", "add_class_to_excerpt");
function add_class_to_excerpt($excerpt) {
    return str_replace('<p', '<p class="lead"', $excerpt);
};

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
    return ' <a class="readmore" href="' . get_permalink(get_the_ID()) . '">' . __('...', 'impTheme') . '</a>';
}

//Control Excerpt Length using Filters
add_filter('excerpt_length', 'custom_excerpt_length', 999);
function custom_excerpt_length($length) {
    return 20;
}


