<?php

/* 
 * 
 * Register custom footer and sidbar widget widgets
 * 
 */
/**
 * Register widgetized area and update sidebar with default widgets
 */
add_action('widgets_init', 'impTheme_widgets_init');
function impTheme_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'impTheme'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

// Register custom footer and sidbar widget widgets
register_sidebar(array(
    'name' => __('Global Footer 1', 'impTheme'),
    'id' => 'sidebar-4',
    'description' => __('Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'impTheme'),
    'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
    'after_widget' => "</div></div></aside>",
    'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
    'after_title' => '</div></h3>',
));

register_sidebar(array(
    'name' => __('Global Footer 2', 'impTheme'),
    'id' => 'sidebar-5',
    'description' => __('Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'impTheme'),
    'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
    'after_widget' => "</div></div></aside>",
    'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
    'after_title' => '</div></h3>',
));

register_sidebar(array(
    'name' => __('Global Footer 3', 'impTheme'),
    'id' => 'sidebar-6',
    'description' => __('Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'impTheme'),
    'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
    'after_widget' => "</div></div></aside>",
    'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
    'after_title' => '</div></h3>',
));

register_sidebar(array(
    'name' => __('Global Footer - Left', 'impTheme'),
    'id' => 'sidebar-7',
    'description' => __('Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'impTheme'),
    'before_widget' => '<aside id="%1$s" class="col-lg-12 widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'name' => __('Global Footer - Middle', 'impTheme'),
    'id' => 'sidebar-8',
    'description' => __('Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'impTheme'),
    'before_widget' => '<aside id="%1$s" class="col-lg-12 center-block widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));

register_sidebar(array(
    'name' => __('Global Footer - Right', 'impTheme'),
    'id' => 'sidebar-9',
    'description' => __('Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'impTheme'),
    'before_widget' => '<aside id="%1$s" class="col-lg-12 center-block widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));