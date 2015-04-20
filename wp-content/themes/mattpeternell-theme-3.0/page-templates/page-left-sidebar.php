<?php
/**
 * Template Name: Page - Left Sidebar x
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
	<div class="container sub_page">
		<div class="row">
			<div class="col-sm-8 col-md-8">
				<div id="primary" class="content-area">
					<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
				
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
				</div><!-- #primary -->
			</div><!-- .col-md-8 -->
			<div class="col-sm-4 col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
			
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>