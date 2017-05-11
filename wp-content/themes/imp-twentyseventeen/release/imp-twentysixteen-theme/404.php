<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
get_header();
?>
<section id="primary" class="container-fluid white error-404 content-area">
    <div class="row">
        <header class="col-md-12">
            <h1 class="page-title text-center"><?php _e('Oops! That page can&rsquo;t be found.', 'impTheme'); ?></h1>
        </header><!-- .page-header -->
        <div class="col-lg-8">
            <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'impTheme'); ?></p>
            <?php get_search_form(); ?>
        </div>
        <div class="col-lg-4 single-sidebar">
            <?php the_widget('WP_Widget_Recent_Posts'); ?>
            <?php if (impTheme_categorized_blog()) : // Only show the widget if site has multiple categories. ?>

                <div class="widget widget_categories">
                    <h2 class="widgettitle"><?php _e('Most Used Categories', 'impTheme'); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories(array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'show_count' => 1,
                            'title_li' => '',
                            'number' => 10,
                        ));
                        ?>
                    </ul>
                </div><!-- .widget -->
            <?php endif; ?>
        </div>
    </div><!-- .page-content -->
</section><!-- .container -->
<?php get_template_part('inc/wp-tag-cloud'); ?>
<?php get_footer(); ?>