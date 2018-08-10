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
        <meta name="google-site-verification" content="D4ShfHwJgV-tJ6vAIue0T1JlcVTSxdjgMuhiOItv77I" />
        <meta charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

        <?php wp_head(); ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56944843-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-56944843-2');
        </script>

    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <header class="navigation" role="banner">
                <div class="navigation-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <?php get_template_part('inc/logo-svg')//header_image(); ?>
                    </a>
                    <div href="javascript:void(0)" class="hamburger hamburger--squeeze js-hamburger" id="js-mobile-menu">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">
                        <span class="hamburger-bar"></span>
                        <span class="hamburger-bar"></span>
                        <span class="hamburger-bar"></span>
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <?php imp_primary_menu(); ?>
                </div>
            </header><!-- #masthead -->

            <div id="content" class="site-content">
