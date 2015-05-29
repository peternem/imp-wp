<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<div class="container sub_page">
	<div class="blog-header">	
		<?php
			if ( is_category() ) :
				single_cat_title( '<h1 class="blog-title">Categorized: ', true, '</h1>');

			elseif ( is_tag() ) :
				single_tag_title( '<h1 class="blog-title">Tagged: ', true, '</h1>');
			
			elseif (is_tax() ):
                 single_tag_title();
        
			elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
				printf( __( '<h1 class="blog-title"> Author: %s', 'upbootwp' ), '<span class="vcard">' . get_the_author() . '</span></h1>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
		
			elseif ( is_day() ) :
				printf( __( '<h1 class="blog-title">Day: %s', 'upbootwp' ), '<span>' . get_the_date() . '</span></h1>' );
			elseif ( is_month() ) :
				printf( __( '<h1 class="blog-title">Month: %s', 'upbootwp' ), '<span>' . get_the_date( 'F Y' ) . '</span></h1>' );
			elseif ( is_year() ) :
				printf( __( '<h1 class="blog-title">Year: %s', 'upbootwp' ), '<span>' . get_the_date( 'Y' ) . '</span></h1>' );
                
                	
			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'upbootwp' );
		
			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'upbootwp');
		
			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'upbootwp' );
		
			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'upbootwp' );
		
			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'upbootwp' );
		
			else :
				_e( '<h1 class="blog-title">Archives', 'upbootwp' . '</h1>');
		
			endif;
		?>
		</h1>
		<?php
		// Show an optional term description.
		$term_description = term_description();
		if ( ! empty( $term_description ) ) :
			printf( '<div class="taxonomy-description">%s</div>', $term_description );
		endif;
		?>
		
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 blog-main">
			<div class="row">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-md-4 col-lg-4 tiles">
				<div id="post-<?php the_ID(); ?>" class="panel panel-default <?php if(is_category('featured')): ?>featured-post<?php endif; ?>">
					<div class="panel-body">
						<div class="panel-heading">
						<h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="panel-body">
							<?php if( function_exists( 'the_subtitle' ) ) the_subtitle( '<div class="slide-txt"><p class="lead">', '</p></div>' ); ?>
							<?php
							$posttags = get_the_tags();
							?>
							<?php
							if(get_the_tag_list()) {
							    echo get_the_tag_list('<div class="slide-txt"><ul class="tag_list"><li>',',</li><li>','</li></ul></div>');
							}
							?>
							<?php 
							if ( has_post_thumbnail() ) {
								?>
								<a href="<?php the_permalink(); ?>">
								<?php 
								the_post_thumbnail('homepage-thumb');
								?>
								</a><?php 
							}
							?>
							<!--<p><a class="btn btn-primary btn-xs" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">View details »</a></p>  -->
						</div>
					</div>
				</div>
			</div>
				<?php endwhile; else: ?>
					<p>Sorry, this post does not exist</p>
				<?php endif; ?>
			</div>
		</div>
		<!--<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			<?php //get_sidebar(); ?>
		</div>-->
	</div>
	<div class="row">
		<?php /* Global footer sidebar */ if ( ! is_404() ) : ?>
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
<?php get_footer(); ?>