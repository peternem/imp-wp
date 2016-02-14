<?php
/**
 * Template Name: Blog Page x
 * The template used for displaying page content in page.php
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

get_header(); ?>
	<div class="container sub_page">
		<div class="row">
			<div id="primary" class="col-sm-8 col-md-8 content-area">
				<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) : ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part('content', get_post_format());
							?>
			
						<?php endwhile; ?>
			
						<?php upbootwp_content_nav('nav-below'); ?>
			
					<?php else : ?>
						<?php get_template_part( 'no-results', 'index' ); ?>
					<?php endif; ?>
			
				</main><!-- #main -->
			</div><!-- .col-md-8 -->
			
			<div class="col-sm-4 col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>