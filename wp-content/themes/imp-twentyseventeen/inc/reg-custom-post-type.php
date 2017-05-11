<?php

/*
 * 
 * For anyone else looking for this, add this to your functions.php and you can have the functionality, inside or outside of the loop:
 * 
 */

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

//so you can now use the following:
//
//if (is_single() && is_post_type('post_type')){
//  //work magic
//}


/* 
 * To register Custom Post Types and link them to Post Meta data.
 */

function impTheme_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'web_portfolio', 'print_portfolio'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'impTheme_add_custom_types' );