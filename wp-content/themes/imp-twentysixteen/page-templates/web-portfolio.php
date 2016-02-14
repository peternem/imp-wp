<?php
/**
 * Template Name: Web Portfolio Page
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<?php if( is_page()) { ?> 
<?php get_template_part('content-featured-image'); ?>
<?php } ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container-fluid white">
	<div class="mp-row row page-content">
		<div class="col-md-8 col-md-offset-2">	
			<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages(array(
					'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
					'after'  => '</div>',
				));
			?>
			</div><!-- .entry-content -->
			<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="col-md-12 entry-meta"><div class=""><span class="edit-link">', '</span></div></footer>' ); ?>
			
		</div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<div class="container-fluid white">

	<div class="row flexy">
	    
		<?php 
		

		    $pageCategory = "";
            
		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		    if(is_page('print-portfolio')) {
               $catName =  get_cat_ID("print");
               $pgName = 'print-portfolio';
               $args = array( 
                    'post_type' => 'post',
                    'posts_per_page' =>12,
                    'paged' => $paged,
                    'orderby' => 'post_date',
                    'order' => 'date' , //ASC//DESC
                    'cat' => $catName,
                    //'post_status' => 'publish',
                );
            } 
            if(is_page('web-portfolio')) {
               $catName =  get_cat_ID("websites");
                
               $args = array( 
                    'post_type' => 'post',
                    'posts_per_page' =>12,
                    'paged' => $paged,
                    'orderby' => 'post_date',
                    'order' => 'date' , //ASC//DESC
                    'cat' => $catName,
                    'post_status' => 'publish',
                );
            }
				$wp_query = new WP_Query($args);
				
				while ( have_posts() ) : the_post(); ?>
			<div class="tiles">
				<div class="panel panel-default">
  					
							<h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
								 if($pgName) { ?>
                                    <a href="<?php the_permalink(); ?>">
                                    <?php 
                                    //the_post_thumbnail('homepage-thumb');
                                    // the_post_thumbnail('homepage-thumb-port');
                                    the_post_thumbnail('web-thumb-4x6' , array( 'class' => 'img-responsive' ));
                                  
                                    ?>
                                    </a>
                                      
								 <?php    
								 } else {
								 ?>
                                    <a href="<?php the_permalink(); ?>">
                                    <?php 
                                    //the_post_thumbnail('thumbnail');
                                    //the_post_thumbnail('homepage-thumb');
                                    //the_post_thumbnail('homepage-thumb-port');
                                    the_post_thumbnail('web-thumb-4x6',  array( 'class' => 'img-responsive' ) );
                                    ?>
                                    </a>
								 <?php   
								 }
							}
							?>
							<!--<p><a class="btn btn-primary btn-xs" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">View details »</a></p>  -->
				
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<div class="mp-row row">
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
	<div class="mp-row row">
		<div id="home-tag-cloud" class="col-md-6 col-md-offset-3 page-cloud">
	       <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
	        
	        <h2 class="text-center">Popular Tags</h2>
	        <ul class="mp-tags">
	        <li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
	        </ul>
	        
	        <?php endif; ?>
	    </div>
	</div>
</div>

<div class="container-fluid">
	<div class="mp-row row">
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
<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
<section class="container-fluid tag-cta">
	<h2>Popular Tags</h2>
	<ul class="mp-tags">
		<li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
	</ul>
</section>
<?php endif; ?>
    <?php get_footer(); ?>



