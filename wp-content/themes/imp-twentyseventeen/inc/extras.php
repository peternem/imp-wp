<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 * 
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function impTheme_page_menu_args($args) {
    $args['show_home'] = true;
    return $args;
}

add_filter('wp_page_menu_args', 'impTheme_page_menu_args');

/**
 * Adds custom classes to the array of body classes.
 */
function impTheme_body_classes($classes) {
    // Adds a class of group-blog to blogs with more than 1 published author
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    return $classes;
}

add_filter('body_class', 'impTheme_body_classes');

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function impTheme_enhanced_image_navigation($url, $id) {
    if (!is_attachment() && !wp_attachment_is_image($id))
        return $url;

    $image = get_post($id);
    if (!empty($image->post_parent) && $image->post_parent != $id)
        $url .= '#main';

    return $url;
}

add_filter('attachment_link', 'impTheme_enhanced_image_navigation', 10, 2);

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function impTheme_wp_title($title, $sep) {
    global $page, $paged;

    if (is_feed())
        return $title;

    // Add the blog name
    $title .= get_bloginfo('name');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title .= " $sep $site_description";

    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        $title .= " $sep " . sprintf(__('Page %s', 'impTheme'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'impTheme_wp_title', 10, 2);

if (!function_exists('imp_primary_menu()')) :

    function imp_primary_menu() {
        // display the WordPress Custom Menu if available

        wp_nav_menu(array(
            'menu' => 'primary',
            'theme_location' => 'primary',
            'menu_id' => 'js-navigation-menu',
            'depth' => 2,
            'container' => null,
            'container_class' => null,
            'menu_class' => 'nav-wrapper',
            'items_wrap' => '<nav class="%2$s" role="navigation" ><ul id="%1$s" class="navigation-menu show">%3$s</ul></nav>',
                //'fallback_cb'       => 'wp_page_menu',
                //'walker'            => new wp_bootstrap_navwalker()
        ));
    }

/* end header menu */
endif;


add_action('my_footer_hook', 'my_footer_echo');

function my_footer_echo() {
    ?>
    <?php
    //        echo '<pre>';
//        print_r(get_field('social_links', 'options'));
//        echo '</pre>';
    //die;
    if (have_rows('social_links', 'option')):
        ?>
        <ul class="social-list">
            <?php
            while (have_rows('social_links', 'option')): the_row();

                // vars
                $social_icon = get_sub_field('social_icon');
                $social_title = get_sub_field('social_title');
                $social_url = get_sub_field('social_url');
                //$social_link_url = get_sub_field('social_link_url');
                ?>

                <li class="social-link-item">  <a href="http://<?php echo "".$social_url; ?>" title="<?php echo $social_title; ?>" target="_blank">
                        <i class="fa <?php echo $social_icon; ?>" aria-hidden="true"></i>    
                    </a>


                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    <?php
}
