<?php
/**
 * Template Name: Documents
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
 <?php if( is_page()) { ?> 
<?php get_template_part('content-featured-image'); ?>
<?php } ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<?php while (have_posts()) : the_post(); ?>
<div class="container-fluid white">
	<div class="mp-row row">
		<div class="col-md-8">
			<div class="page-entry-content entry-content">
                <?php the_content(); ?>
            </div>
            <footer class="entry-meta">
            <?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit Page', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
            </footer>
		</div>
		<div class="col-md-4">
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
	</div>
	<?php endwhile; // end of the loop. ?>
	<?php
		wp_link_pages(array(
			'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
			'after'  => '</div>',
		)); ?>		
</div>


    </section>
</div>
    <?php get_footer(); ?>



