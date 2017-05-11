<?php
/**
 * The template used for displaying page content in page.php
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
?>
<div class="breadcrumb-container">
    <?php if (function_exists('impTheme_breadcrumbs')) impTheme_breadcrumbs(); ?>
</div>
<section class="container-fluid white default-page">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-lg-6">
                <div class="entry-content">
                    <header class="page-header">
                        <h1 class="section-title"><?php the_title(); ?></h1>
                        <?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
                    </header>
                    <h1></h1>
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'impTheme'),
                        'after' => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->
                <?php edit_post_link(__('<i class="fa fa-pencil-square-o"></i> Edit', 'impTheme'), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>'); ?>
            </div>
            <div class="col-lg-6">
                <?php
                // Check if the post has a Post Thumbnail assigned to it.
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
            </div>
        </div>
    </article><!-- #post-## -->
</section>