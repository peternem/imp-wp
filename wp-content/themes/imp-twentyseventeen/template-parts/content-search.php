<?php
/**
 * The template part for displaying results in search pages
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 * 
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <div class="search-col-8">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <?php
            if (function_exists('the_subtitle')) {
                the_subtitle('<h3>', '</h3>');
            }
            ?>
        </header><!-- .entry-header -->
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
        <?php if (in_array(get_post_type(), array('post', 'web_portfolio'))) : ?>
            <footer class="entry-footer">
                <?php impTheme_entry_meta(); ?>
                <?php edit_post_link(__('Edit', 'impTheme'), '<span class="edit-link">', '</span>'); ?>
            </footer><!-- .entry-footer -->
        <?php else : ?>
            <?php edit_post_link(__('Edit', 'impTheme'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'); ?>
        <?php endif; ?>
    </div>
    <div class="search-col-4">
        <?php the_post_thumbnail('homepage-thumb'); ?>
    </div>
    <!--    <div class="search-col-12"></div>-->
</article><!-- #post-## -->
