<?php
/**
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

if (!isset($content_width)) $content_width = 770;

/**
 * upbootwp_setup function.
 * 
 * @access public
 * @return void
 */
function upbootwp_setup() {

	require 'inc/general/class-Upbootwp_Walker_Nav_Menu.php';
	require 'inc/general/class-Upbootwp_Walker_Nav_Footer_Menu.php';

	load_theme_textdomain('upbootwp', get_template_directory().'/languages');

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	function my_theme_add_editor_styles() {
    	add_editor_style( 'css/custom-editor-style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );

	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'careers-featured', 1920, 1080, true );
    add_image_size( 'careers-featured-narrow', 1920, 768, array( 'left', 'top' ) );
    add_image_size( 'people-featured-6x8', 600, 800, true );
	add_image_size( 'homepage-thumb', 300, 300, array( 'left', 'top' )  ); // Hard crop left top
	add_image_size( 'homepage-thumb-port', 578, 885,  array( 'left', 'top' ));
	add_image_size( 'homepage-thumb-land', 885, 578,  array( 'center', 'top' ));
	add_image_size( 'web-thumb-4x6', 400, 600,  array( 'center', 'top' ));
	add_image_size( 'web-thumb-6x4', 600, 400,  array( 'center', 'top' ));
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'upbootwp' ),
		'secondary' => __( 'Secondary Menu', 'upbootwp' ),
		'primary' => __( 'Primary Menu', 'upbootwp' ),
			'secondary' => __( 'Secondary Menu', 'upbootwp' ),
		
	) );
	register_nav_menu('footer_navigation', 'Footer navigation');
	register_nav_menu('footer_aux_navigation', 'Footer aux navigation');

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'upbootwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
}

/*--------------------------------------*/
/* Add SVG Support to media library
 /*--------------------------------------*/

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
// Add SVG Thumbnails to media library grid

function custom_admin_head() {
	$css = '';
	$css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';
	echo '<style type="text/css">'.$css.'</style>';
}


// Add Class to All Excerpts in WordPress
add_filter( "the_excerpt", "add_class_to_excerpt" );
function add_class_to_excerpt( $excerpt ) {
	return str_replace('<p', '<p class="lead"', $excerpt);
}


//add_action( 'init', 'themes_taxonomy');

function new_excerpt_more( $more ) {
	return ' <a class="readmore" href="'. get_permalink( get_the_ID() ) . '">' . __('...', 'upbootwp') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Control Excerpt Length using Filters
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_action( 'after_setup_theme', 'upbootwp_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function upbootwp_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar','upbootwp'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}

add_action( 'widgets_init', 'upbootwp_widgets_init' );

// Local dev live relaod content
// if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
// 	wp_register_script('livereload', 'http://mattpeternell.dev:35729/livereload.js?snipver=1', null, false, true);
// 	wp_enqueue_script('livereload');
// }

function upbootwp_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/bootstrap-34/css/bootstrap.min.css', array(), '20130908');
	wp_enqueue_style( 'customized-bootstrap', get_template_directory_uri().'/css/theme-style.css', array(), '20130908');
	wp_enqueue_style( 'font-awesome-icons', get_template_directory_uri().'/css/font-awesome.min.css' );
	//wp_enqueue_style( 'sparkling-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );
	
	wp_enqueue_script('upbootwp-jQuery-ui', get_template_directory_uri().'/js/vendor/jquery-ui.js',array(),'1.11.2',true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr.custom.92053.js', array('jquery'), 'v2.8.3');
	wp_enqueue_script('upbootwp-basefile', get_template_directory_uri().'/bootstrap-34/js/bootstrap.js',array(),'20130905',true);

	wp_enqueue_script('parallax', get_template_directory_uri().'/js/vendor/parallax.min.js',array(),'20130905',true);
    wp_enqueue_script( 'javascript', get_template_directory_uri().'/js/main.js',array(),'20130905',true);

}
add_action( 'wp_enqueue_scripts', 'upbootwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory().'/inc/jetpack.php';



/**
 * upbootwp_breadcrumbs function.
 * Edit the standart breadcrumbs to fit the bootstrap style without producing more css
 * @access public
 * @return void
 */
function upbootwp_breadcrumbs() {

	$delimiter = '<i class="fa fa-angle-double-right"></i>';
	$home = 'Home';
	$before = '<li class="active">';
	$after = '</li>';

	if (!is_home() && !is_front_page() || is_paged()) {
		echo '<ol class="breadcrumb">';
		global $post;
		$homeLink = home_url();
		
		echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';
		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false) . $after;
		} elseif (is_day()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $before . get_the_title() . $after;
			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) {
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;
		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;
		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo ': ' . __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</ol>';
	}
}


// Register custom footer and sidbar widget widgets
register_sidebar( array(
	'name' => __( 'Global Footer 1', 'upbootwp' ),
	'id' => 'sidebar-4',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'upbootwp' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</div></h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer 2', 'upbootwp' ),
	'id' => 'sidebar-5',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'upbootwp' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</div></h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer 3', 'upbootwp' ),
	'id' => 'sidebar-6',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'upbootwp' ),
	'before_widget' => '<aside id="%1$s" class="col-md-4 col-lg-4 center-block widget %2$s"><div class="panel panel-default"><div class="panel-body">',
	'after_widget' => "</div></div></aside>",
	'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
	'after_title' => '</div></h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer - Left', 'upbootwp' ),
	'id' => 'sidebar-7',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'upbootwp' ),
	'before_widget' => '<aside id="%1$s" class="col-lg-12 widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3>',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer - Middle', 'upbootwp' ),
	'id' => 'sidebar-8',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'upbootwp' ),
	'before_widget' => '<aside id="%1$s" class="col-lg-12 center-block widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => __( 'Global Footer - Right', 'upbootwp' ),
	'id' => 'sidebar-9',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'upbootwp' ),
	'before_widget' => '<aside id="%1$s" class="col-lg-12 center-block widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3>',
	'after_title' => '</h3>',
) );

// Post Attachment image function. Image URL for CSS Background.
function the_post_image_url($size=large) {
	global $post;
	$linkedimgurl = get_post_meta ($post->ID, 'image_url', true);
	if ( $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_image_src($image->ID, $size);
			$attachmenturl=$attachmenturl[0];
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmenturl.'';
		}
	} elseif ( $linkedimgurl ) {
		echo $linkedimgurl;
	} elseif ( $linkedimgurl && $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_image_src($image->ID, $size);
			$attachmenturl=$attachmenturl[0];
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmenturl.'';
		}
	} else {
		echo ''.get_template_directory_uri().'/img/no-attachment.gif';
	}
}

// Post Attachment image function. Direct link to file.
function the_post_image($size=thumbnail) {
	global $post;
	$linkedimgtag = get_post_meta ($post->ID, 'image_tag', true);
	if ( $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmentimage.'';
		}
	} elseif ( $linkedimgtag ) {
		echo $linkedimgtag;
	} elseif ( $linkedimgtag && $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );
			echo ''.$attachmentimage.'';
		}
	} else {
		echo '<img src="'.get_bloginfo ('template_url').'/img/no-attachment-large.gif" />';
	}
}


?>