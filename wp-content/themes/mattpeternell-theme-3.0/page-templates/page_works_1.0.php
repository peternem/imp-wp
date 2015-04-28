<?php
/**
 * Template Name: Page - Works 1.0
 * The template used for displaying page content in page.php
 *
 * @author revised code: mPETERnell.com - original code:Matthias Thom | http://upplex.de
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
					echo '<div class="col-md-5 col-lg-5"><img class="img-thumbnail" src="'.get_field('image_right').'"/></div>';
				}
				 
				?>
			</div>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
				<?php
					wp_link_pages(array(
						'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
						'after'  => '</div>',
					));
				?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<div class=""><span class="edit-link">', '</span></div>' ); ?>
			</footer>
		</div><!-- .col-md-12 -->
	</div><!-- .row -->
	<div class="row">
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 
					'post_type' => 'post',
 					'posts_per_page' =>12,
 					'paged' => $paged,
 					'orderby' => 'post_date',
 					'order' => 'date' , //ASC//DESC
					'category__and' => array( 5, 7 ),
 					'post_status' => 'publish',
				);
				$wp_query = new WP_Query($args);
				
				while ( have_posts() ) : the_post(); ?>
			<div class="col-sm-6 col-md-4 col-lg-4 tiles">
				<div class="panel panel-default">
  					<div class="panel-body">
	  					<div class="panel-heading">
							<h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="panel-body">
							<?php if( function_exists( 'the_subtitle' ) ) the_subtitle( '<div class="slide-txt"><p class="lead">', '</p></div>' ); ?>
							<?php //the_excerpt(); ?>
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
								//the_post_thumbnail('thumbnail');
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
		<?php endwhile; ?>
	</div>
	<div class="row">
	<!-- then the pagination links -->
		<div class="col-md-6 col-lg-6 nav-previous">
			<div class="nav-previous">
				<?php next_posts_link( '&larr; Older posts', $wp_query ->max_num_pages); ?>
			</div>
		</div>
		<div class="col-md-6 col-lg-6 col-nav-next">
			<div class="nav-next">
				<?php previous_posts_link( 'Newer posts &rarr;' ); ?>
			</div>
		</div>
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
