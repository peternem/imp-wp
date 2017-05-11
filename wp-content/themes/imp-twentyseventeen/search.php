<?php
/**
 * The template for displaying Search Results pages.
 *
 * @author Matthias Thom | http://upplex.de
 * @package impTheme 0.1
 * 
 */
get_header();
?>

<div class="container sub_page">
    <?php if (have_posts()) : ?>
        <section class="my-container">
            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'impTheme'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header><!-- .page-header -->
        </section>  
        <section id="primary" class="my-container white my-search-results content-area">
            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'search'); ?>
            <?php endwhile; ?>
        </section><!-- #primary -->
        <section id="searchAgain" class="my-container white search-again-cta tag-cta">
            <div class="row">
                <div class="col-lg-6 align-center">
                    <h2>Couldn't Find What Your Looking For?<br>Search Again!</h2>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
    <?php else : ?>
        <?php get_template_part('template-parts/no-results', 'search'); ?> 
    <?php endif; ?>

</div><!-- .container -->
<?php get_footer(); ?>