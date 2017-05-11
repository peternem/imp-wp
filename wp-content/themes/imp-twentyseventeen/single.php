<?php
/**
 * The Template for displaying all single posts.
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 * 
 */
get_header();
?>
<!-- single -->
<?php get_template_part('template-parts/content','featured-image'); ?>
<div class="breadcrumb-container">
    <?php if (function_exists('impTheme_breadcrumbs')) impTheme_breadcrumbs(); ?>
</div>
<?php
while (have_posts()) : the_post();
    if (is_single() && is_post_type('web_portfolio')) {
        get_template_part('template-parts/content', 'single-web_portfolio');
    } else {
        get_template_part('template-parts/content', 'single');
    }
endwhile; // end of the loop. 
?>		
<?php get_footer(); ?>