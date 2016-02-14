<?php
/**
 * Template Name: Page - Full Width - ACF 1.0
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
		<div class="container sub_page">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
					<header class="entry-header page-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
					</header><!-- .entry-header -->
				</div>
			</div>
			<div class="row">
			
				<?php
				// Advanced Custom Fieldset - Featurette
				if(get_field('text_left'))
				{
					echo '<div class="col-md-7 col-lg-7">' . get_field('text_left') . '</div>';
				}
				 
				?>
				<?php
				// Advanced Custom Fieldset - Featurette
				if(get_field('image_right'))
				{
					echo '<div class="col-md-4 col-lg-4 col-md-offset-1"><img class="img-thumbnail" src="'.get_field('image_right').'"/></div>';
				}
				 
				?>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-12 entry-content">
					<?php the_content(); ?>
				</div><!-- .col-md-12 -->		
			<?php endwhile; // end of the loop. ?>
			<?php
				wp_link_pages(array(
					'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
					'after'  => '</div>',
				)); ?>		
			</div>
			<footer class="entry-meta">
				<div class="">
			<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</footer>
			<div class="row">
				<?php
				/* Global footer sidebar */
				if ( ! is_404() ) : ?>
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
			<?php endif; ?>
			</div>
			<?php get_footer(); ?>
		</div>

