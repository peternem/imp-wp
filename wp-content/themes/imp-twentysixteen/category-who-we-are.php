<?php
/**
 * Template Name: Category Who We Are
 * The template for displaying categorized post 
 *
 * @package WordPress
 * @subpackage ncc-theme
 * @since ncc-theme 1.6
 */

get_header(); ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container-fluid white category_page">
<!-- <?php echo "Template: category-who-we-are.php"?> -->
		<div id="primary" class="content-area">
			
				<?php if ( have_posts() ) : ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							
							get_template_part('content', 'category', get_post_format());
						?>
		
					<?php endwhile; ?>
		
					<?php upbootwp_content_nav('nav-below'); ?>
		
				<?php else : ?>
					<?php get_template_part( 'no-results', 'index' ); ?>
				<?php endif; ?>
		</div>
</div><!-- .container -->
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<?php get_footer(); ?>