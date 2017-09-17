<?php
/**
 * The template for displaying all single posts.
 *
 * @package megatherium
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        if (is_singular('post')) {
            get_template_part('underscore-templates-posts');
        }
        ?>
        <?php
        if (is_singular('web_portfolio')) {
            get_template_part('underscore-templates-web-cpt_posts');
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>