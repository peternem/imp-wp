<?php
/**
 * Template Name: Skillset Page - 1.0
 * The template used for displaying page content in page.php
 *
 * @author Matt Peternell | http://mattpeternell.net
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
            <!-- <div class="sub_page"></div> -->
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <?php the_post_thumbnail('careers-featured-narrow', array( 'class' => 'jumbo-img img-responsive' )); ?>
                <div class="container">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
                    <!-- <p><a class="btn btn-primary btn-sm" href="#" role="button">Learn more &raquo;</a></p> -->
                </div>
            </div>
            <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
			<!-- <div id="recent-work-web" class="content-area container-fluid white odd" >
			    <div class="mp-row row">
    				<div class="col-md-12 col-lg-12">
    				</div>
    			</div>
    		</div> -->
			<div id="recent-work-web" class="content-area container-fluid white even" >
    			<div class="mp-row row">
    				<div class="col-md-8 entry-content">
    				    <?php if(function_exists('the_subtitle')) the_subtitle( '<h2 cclass="panel-title">', '</h2>');?>
    					<?php the_content(); ?>
    				</div>
    				<div id="home-tag-cloud" class="col-md-4">
                       <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
                        
                        <h2>Popular Tags</h2>
                        <ul class="mp-tags">
                        <li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
                        </ul>
                        
                        <?php endif; ?>
                    </div>
    				<footer class="col-md-12 entry-meta">
                        <div class="">
                            <?php edit_post_link( __( 'Edit', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>
                    </footer>		
    			<?php endwhile; // end of the loop. ?>
    			<?php
    				wp_link_pages(array(
    					'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
    					'after'  => '</div>',
    				)); ?>		
    			</div>
			</div>
		    
		        
		        
		        
                  <?php 
                  $postx_counter = 0;
                  $catName =  get_cat_ID("skillset");
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             
            $args = array( 
                'post_type' => 'post',
                'posts_per_page' =>6,
                'paged' => $paged,
                'orderby' => 'post_date',
                'order' => 'DESC' ,
                'cat' => $catName,
                //'category__and' => array( 5, 7 ),
                'post_status' => 'publish',
            );
            $wp_query = new WP_Query($args);
            
            while ( have_posts() ) : the_post(); 
            $postx_counter++;
            ?>
            <?php 
            // if ($postx_counter % 2 == 0) {
                // echo "row";
            // }
            if ( $postx_counter & 1 ) {
              ?>
              <div id="recent-work-web" class="content-area container-fluid grey odd" >
              <?php
            } else {
              ?>
              <div id="recent-work-web" class="content-area container-fluid white even" >
              <?php
            }
                        ?>
          
                <div class="mp-row row" data-ca-item="<?php echo $postx_counter ?>">
                    <div class="col-md-8">
                        <h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php if(function_exists('the_subtitle')) the_subtitle( '<h3 class="subtitle">', '</h3>');?>
                        <?php the_content(); ?>
                    </div>
                     <div class="col-md-4">
                        <?php the_post_thumbnail('homepage-thumb-port', array( 'class' => 'mp-img img-responsive img-thumbnail' )); ?>
                     </div>
                </div>
          </div>
            
            
            
            
            
            <?php endwhile; ?>
            
			
			<!-- <div class="row">
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
			<!--</div> -->
			<?php get_footer(); ?>

