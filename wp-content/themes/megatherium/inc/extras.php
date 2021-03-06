<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package megatherium
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function _s_backbone_page_menu_args($args)
{
    $args['show_home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', '_s_backbone_page_menu_args');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _s_backbone_body_classes($classes)
{
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    return $classes;
}
add_filter('body_class', '_s_backbone_body_classes');

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function _s_backbone_wp_title($title, $sep)
{
    if (is_feed()) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo('name', 'display');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if (($paged >= 2 || $page >= 2) && ! is_404()) {
        $title .= " $sep " . sprintf(esc_html__('Page %s', 'megatherium'), max($paged, $page));
    }

    return $title;
}
add_filter('wp_title', '_s_backbone_wp_title', 10, 2);

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function _s_backbone_setup_author()
{
    global $wp_query;

    if ($wp_query->is_author() && isset($wp_query->post)) {
        $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
    }
}
add_action('wp', '_s_backbone_setup_author');

if (!function_exists('imp_primary_menu()')) :

    function imp_primary_menu()
    {
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
add_filter('wp_title', 'impTheme_wp_title', 10, 2);


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