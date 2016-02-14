<?php
/**
 * The Template for displaying all single posts.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<div class="container sub_page">
	<div id="primary" class="content-area row">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
                $PostTypeName =  get_post_type( get_the_ID() ); 
                
                if ($PostTypeName == "careers") {
                    get_template_part('content', 'single-career');
                } else {
                    get_template_part( 'content', 'single' );
                }
                ?>
			<div class="row">
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						//comments_template();
				?>
			</div>
			<?php endwhile; // end of the loop. ?>			
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="content-area row">
		<div class="col-md-12">
			<?php upbootwp_content_nav( 'nav-below' ); ?>
		</div>
	</div>
	
	<?php /* Global footer sidebar */ ?>
	<?php if ( ! is_404() ) : ?>
	<div class="row">
		<div id="footer-widgets" class="widget-area four">
			<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-7' ); ?>
				
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-8' ); ?>
				
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-9' ); ?>
				
			<?php endif; ?>
		</div><!-- #footer-widgets -->
	</div>
	<?php endif; ?>

</div><!-- .container -->

<?php get_footer(); ?>