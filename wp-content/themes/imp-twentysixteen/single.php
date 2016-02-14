<?php
/**
 * The Template for displaying all single posts.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<!-- single -->
<?php get_template_part('content-featured-image'); ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>

	<?php 
	while ( have_posts() ) : the_post();
// 		if(is_single( 'our-leadership' ) ) { 
// 			get_template_part( 'content', 'single-websites' );
// 		} else {
// 			get_template_part( 'content', 'single' );
// 		}
		get_template_part( 'content', 'single' );
	endwhile; // end of the loop. ?>			

	<?php //upbootwp_content_nav( 'nav-below' ); ?>

<?php get_footer(); ?>