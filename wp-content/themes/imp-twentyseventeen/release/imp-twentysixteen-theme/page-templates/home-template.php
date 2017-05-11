<?php

/**
 * Template Name: Home Page
 * The template used for displaying page content in page.php
 *
 * @package Panorama
 * @since RoosterPark 1.
 */
get_header();
?>
<?php

// Start the Loop.
while (have_posts()) : the_post();

endwhile;
?>
<?php get_template_part('index-hero'); ?>
<?php get_template_part('index-welcome'); ?>
<?php get_template_part('inc/three-col-cta'); ?>
<?php get_template_part('index-cta-1'); ?>
<?php get_template_part('index-recent-work'); ?>
<?php get_template_part('index-cta-2'); ?>
<?php get_template_part('index-skillset'); ?>
<?php get_template_part('index-cta-3'); ?>
<?php get_template_part('index-recent-print'); ?>
<?php get_template_part('index-cta-4'); ?>
<?php get_template_part('index-about'); ?>
<?php get_template_part('index-contact'); ?>
<?php

get_footer();
