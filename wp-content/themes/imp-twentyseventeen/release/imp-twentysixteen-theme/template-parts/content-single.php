<?php
/**
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
?>

<div class="container-fluid white">
    <div class="mp-row row page-conten">
        <article id="post-<?php the_ID(); ?>" <?php post_class('t'); ?>>
            <div class="col-lg-8">
                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'impTheme'),
                        'after' => '</div>',
                    ));
                    ?>
                    <?php get_template_part('inc/content-single-entrymeta'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php the_post_thumbnail('careers-featured'); ?>
            </div>
        </article><!-- #post-## -->
    </div>
</div>
<?php
/* Restore original Post Data */
wp_reset_postdata();
?>