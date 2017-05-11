<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
get_header();
?>
<?php if (have_posts()) : ?>

    <?php if (is_home()) { ?>  
        <?php get_template_part('index-hero'); ?>
        <?php get_template_part('index-welcome'); ?>
        <?php get_template_part('inc/three-col-cta'); ?>
        <?php get_template_part('index-recent-work'); ?>
        <?php get_template_part('index-skillset'); ?>
        <?php get_template_part('index-recent-print'); ?>
        <?php get_template_part('index-about'); ?>
        <?php get_template_part('index-contact'); ?>
   
    <?php } else { ?>
        
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
            <div id="intro-about" class="content-area container-fluid white">
                <?php get_sidebar('mp-footer'); ?>
            </div>
        <?php endwhile; ?>
        
            <?php impTheme_content_nav('nav-below'); ?>

    <?php } ?>
<?php else : ?>
    <?php get_template_part('template-parts/no-results', 'index'); ?>
<?php endif; ?>

<?php get_footer(); ?>