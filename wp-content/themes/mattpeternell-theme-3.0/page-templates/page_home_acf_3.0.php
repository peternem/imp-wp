<?php
/**
 * Template Name: Page - Home Hero - ACF 3.0
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<!-- <div class="jumbotron"> -->
<!-- 	<div class="container"> -->
<!-- 	    <div id='slideshow' class="home-slideshow" data-cycle-fx="scrollHorz"  data-cycle-slides=".slide_tile" data-cycle-pause-on-hover="true"  data-cycle-speed="1000"  data-cycle-timeout="6000" data-cycle-prev="#prev" data-cycle-next="#next"> -->
<!-- 			<div class="slide_tile"> -->
				<?php
// 				// Advanced Custom Fieldset - Featurette
// 				if(get_field('slide_1_image')){
// 					echo '<img class="img-responsive" src="' . get_field('slide_1_image') . '"/>';
// 					?>
<!-- 					<div class="carousel-caption"> -->
						<?php
// 						echo "<h1>".get_field('slide_1_title')."</h1>";
// 						echo "<p>".get_field('slide_1_subtitle')."</p>";
// 					?>
<!-- 					</div> -->
				<?php
// 				} 
// 				?>
<!-- 			</div> -->
<!-- 			<div class="slide_tile"> -->
				<?php
// 				// Advanced Custom Fieldset - Featurette
// 				if(get_field('slide_2_image'))
// 				{
// 					echo '<img class="img-responsive" src="' . get_field('slide_2_image') . '"/>';
// 					?>
<!-- 					<div class="carousel-caption"> -->
						<?php
// 						echo "<h1>".get_field('slide_2_title')."</h1>";
// 						echo "<p>".get_field('slide_2_subtitle')."</p>";
// 						?>
<!-- 					</div> -->
				<?php
// 				} 
// 				?>
<!-- 			</div> -->
<!-- 			<div class="slide_tile"> -->
				<?php
// 				// Advanced Custom Fieldset - Featurette
// 				if(get_field('slide_3_image'))
// 				{
// 					echo '<img class="img-responsive" src="' . get_field('slide_3_image') . '"/>';
// 					?>
<!-- 					<div class="carousel-caption"> -->
						<?php
// 						echo "<h1>".get_field('slide_3_title')."</h1>";
// 						echo "<p>".get_field('slide_3_subtitle')."</p>";
// 						?>
<!-- 					</div> -->
				<?php
// 				} 
// 				?>
<!-- 			</div>		 -->
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </div> -->


		<div class="container home_page">
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
					echo '<div class="col-md-12 col-lg-12">' . get_field('text_left') . '</div>';
				}
				?>
			</div>
			<!-- include Cycle2 -->
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
					
			<div class="row cycle-slideshow"  >
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 
					'post_type' => 'post',
 					'posts_per_page' =>6,
 					'paged' => $paged,
 					'orderby' => 'post_date',
 					'order' => 'date' , //ASC//DESC
					'cat' => 5,
 					'post_status' => 'publish',
				);
				$wp_query = new WP_Query($args);
				
				while ( have_posts() ) : the_post(); ?>
			<div class="slidetiles">
				<div class="panel panel-default ">
  					<div class="panel-body">
	  					<div class="panel-heading">
							<h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="panel-body">
							<?php if( function_exists( 'the_subtitle' ) ) the_subtitle( '<div class="slide-txt"><p class="lead">', '</p></div>' ); ?>
							<?php //the_excerpt(); ?>
							
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

