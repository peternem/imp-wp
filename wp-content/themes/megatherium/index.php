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
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section id="home-page" class="pages">
            <div id="hero" class="container"></div>
            <div class="my-container black">
                <div id="welcome-section" class="my-inner-container ">
                    <div class="mp-row row">
                        <div class="offset-2 column-8">
                            <div id="welcome" class=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="keyPoints" class="three-col-cta black"></section>
            <section id="recentWork-page"  class="my-container">
                <section id="recentWork-rec"  class="my-container"></section>
            </section>
            <section id="keyPoints" class="three-col-cta black">
                <div id="tag-section" class="my-inner-container ">
                    <div class="mp-row row">
                        <div class="column-12">
                            <div id="tagList" class=" black"></div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="skillset-page" class="my-container black"></div>
        </section>
        <section id="recentWork-page"  class="my-container pages">
            <section id="recentWorkInto" class="my-container black "></section>
            <section id="recentWork-page1"  class="my-container"></section>
        </section>
        <section id="about-page" class="my-container black pages"></section>
        <section id="contact-page" class="my-container black pages"></section>
        <?php //if (have_posts()) : ?>
            <?php //while (have_posts()) : the_post(); ?>
                <?php //get_template_part('content'); ?>
            <?php //endwhile; ?>
        <?php //else : ?>
            <?php //get_template_part('content', 'none'); ?>
        <?php //endif; ?>
    </main><!-- #main -->
</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
