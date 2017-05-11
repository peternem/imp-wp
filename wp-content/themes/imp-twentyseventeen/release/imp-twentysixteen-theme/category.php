<?php
/**
 * Template Name: Category 
 * The template for displaying categorized post 
 *
 * @package WordPress
 * @subpackage ncc-theme
 * @since ncc-theme 1.6
 */
get_header();
?>
<div class="breadcrumb-container">
    <?php
    if (function_exists('impTheme_breadcrumbs')) {
        impTheme_breadcrumbs();
    }
    ?>
</div>
<div class="my-container white category_page">
    <div class="my-inner-container">
        <!-- <?php echo "Template: Category.php" ?> -->
        <div id="primary" class="content-area ">
            <?php if (have_posts()) : ?>
                <div class="slidetile-area flexy">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'category', get_post_format());
                        ?>
                    <?php endwhile; ?>
                    <?php impTheme_content_nav('nav-below'); ?>
                </div>
            <?php else : ?>
                <?php get_template_part('template-parts/no-results', 'index'); ?>
            <?php endif; ?>

        </div>
    </div>
</div><!-- .container -->
<?php get_footer(); ?>