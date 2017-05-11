<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri()); ?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri()); ?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri()); ?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri()); ?>/ico/apple-touch-icon-57-precomposed.png">

        <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/ico/favicon.png">
        <meta name="theme-color" content="#ffffff">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php //include_once("analyticstracking.php") ?>
        <?php do_action('before'); ?>

        <header class="navigation" role="banner">
            <div class="navigation-wrapper">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">

                    <?php get_template_part('inc/logo-svg')//header_image(); ?>
                </a>
                <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
                <?php imp_primary_menu(); ?>
            </div>
        </header>


        <main id="main" class="site-main" role="main">