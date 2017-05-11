<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package megatherium
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <header class="navigation" role="banner">
                <div class="navigation-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <?php get_template_part('inc/logo-svg')//header_image();?>
                    </a>
                    <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
                    <?php imp_primary_menu(); ?>
                </div>
            </header><!-- #masthead -->

            <div id="content" class="site-content">
