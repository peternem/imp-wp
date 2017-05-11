<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */

get_header(); ?>
 <?php if( is_page()) { ?> 
        <?php get_template_part('content-featured-image'); ?>
<?php } ?>
<div class="container-fluid sub_page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->
<?php get_footer(); ?>
