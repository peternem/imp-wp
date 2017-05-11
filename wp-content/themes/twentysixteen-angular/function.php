<?php

//Check for Dev Environment if true load unminified scripts and css else load minified versions.
$minified = "";
//echo $myDomain = $_SERVER['HTTP_HOST'];
if (($_SERVER['HTTP_HOST'] === 'mattpeternell.dev')) {
    echo $minified = ".min";
    echo get_template_directory_uri();
} else {
    echo $minified = "";
}

function my_scripts() {
    wp_enqueue_style('imp-style', get_template_directory_uri() . '/assets/css/imp-style' . $minified . '.css', array(), '20130908');
    wp_enqueue_script('angularjs', get_template_directory_uri() . '/bower_components/angular/angular.min.js');
    wp_enqueue_script('angularjs-route', get_template_directory_uri() . '/bower_components/angular-route/angular-route.min.js');
//        wp_enqueue_script( 'my-scripts', get_template_directory_uri() . '/js/scripts.js',array( 'angularjs', 'angularjs-route' ));
//	wp_localize_script( 'my-scripts', 'myLocalized', array(
//			'partials' => trailingslashit( get_template_directory_uri() ) . 'partials/'
//			)
//	);
}

add_action('wp_enqueue_scripts', 'my_scripts');


//if (current_user_can('manage_options')) {
//    add_action('admin_notices', 'display_user_token');
//}
//function display_user_token() {
//    $user_id = get_current_user_id();
//    $auth_token = get_user_meta( $user_id, 'wordpress_access_token', true);
//    echo $auth_token;
//}
//
//add_filter( 'login_redirect', 'ab_login_redirect', 10, 3 );
//function ab_login_redirect( $redirect_to, $request, $user ) {
//    return site_url() . '/login';
//}
//
//add_action ( 'login_form_logout' , 'ab_cookie_remove_logout' );
//function ab_cookie_remove_logout() {
//    setcookie('wordpress_access_token', "expired", time() - 3600, '/', preg_replace('#^https?://#', '', rtrim(site_url(),'/')), 0);
//    wp_logout();
//}
//

