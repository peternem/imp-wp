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
 * @package megatherium
 */
get_header();
?>

<div id="primary" class="column-12 content-area">
    <main id="main" class="site-main" role="main">
        <section id="home-page" class="pages">
            <?php get_template_part('underscore-templates-hero'); ?>
            <div class="my-container black">
                <div id="welcome-section" class="my-inner-container ">
                    <div class="mp-row row">
                        <div class="column-8">
                            <?php get_template_part('underscore-templates-welcome'); ?>
                        </div>
                        <div class="column-4 entry-image">
                            <?php get_template_part('underscore-templates-tags'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('underscore-templates-3-column-cta'); ?>
            <?php get_template_part('underscore-templates-skills'); ?>
        </section>
        <?php get_template_part('underscore-template-web-portfolio'); ?>
        <?php get_template_part('underscore-templates-about'); ?>
        <?php get_template_part('underscore-templates-contact'); ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php //get_template_part('content'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </main><!-- #main -->
</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
