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
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<section id="recentPrint" class="container-fluid white cat-arch">

			<?php
				if ( is_category() ) :
					//single_cat_title( '<h1 class="archive-title">', true, '</h1>');
					?>
					 <div class="jumbotron">
                                <?php if (function_exists('z_taxonomy_image')){
                                $attr = array(
                                'class' => 'single-featured img-responsive category_image',
                                'alt' => 'image alt',
                                'title' => 'category title',
                                );
                                z_taxonomy_image(NULL, 'careers-featured', $attr); 
                                
                                } ?>  
                                <div class="container">  
                                    <h1 class="entry-title"><?php $singleCat = single_cat_title(); ?> </h1>
                                    <?php
                                    // Show an optional term description.
                                   $term_description = category_description( $category_id );
                                    if ( ! empty( $term_description ) ) :
                                        echo $term_description;
                                    endif;
                                    ?>
                                    <div class="jumbo-btn">
                                        <a class="btn btn-primary" href="#welcome" role="button">Learn more <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
					<?php 
				elseif ( is_tag() ) :
					?>
					<h1 class="archive-title"><?php $singleCat = single_cat_title(); ?></h1>
					<?php
				elseif (is_tax() ):
	                 single_tag_title();
				elseif ( is_author() ) :
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					*/
					the_post();
					printf( __( '<h1 class="archive-title"> Author: %s', 'upbootwp' ), '<span class="vcard">' . get_the_author() . '</span></h1>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
			
				elseif ( is_day() ) :
					printf( __( '<h1 class="archive-title">Day: %s', 'upbootwp' ), '<span>' . get_the_date() . '</span></h1>' );
				elseif ( is_month() ) :
					printf( __( '<h1 class="archive-title">Month: %s', 'upbootwp' ), '<span>' . get_the_date( 'F Y' ) . '</span></h1>' );
				elseif ( is_year() ) :
					printf( __( '<h1 class="archive-title">Year: %s', 'upbootwp' ), '<span>' . get_the_date( 'Y' ) . '</span></h1>' );
	                
	                	
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
					_e( '<h1 class="archive-title">Archives', 'upbootwp' . '</h1>');
			
				endif;
			?>
</section>
<section class="container-fluid tile-area">
		<div class="row flexy">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="tiles">
				<div id="post-<?php the_ID(); ?>" class="panel panel-default">
<?php 
							if(get_field('category_archive')){ ?>
							<h2 class="panel-title"><a href="<?php echo  get_field('category_archive'); ?>"><?php the_title(); ?></a></h2>
							<?php } else { ?>
							<h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php } ?>
							<?php if(function_exists('the_subtitle')) the_subtitle('<div class="slide-txt"><p class="lead">', '</p></div>' );?>	
								<?php
								$posttags = get_the_tags();
								?>
								<?php
								if(get_the_tag_list()) {
								    echo get_the_tag_list('<ul class="tag_list"><li>',',</li><li>','</li></ul><div class="slide-txt"></div>');
								}
								?>
								
								<?php //the_content(); ?>

							<footer class="entry-meta ">
								<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit', 'upbootwp' ), '', '' ); ?>
							</footer><!-- .entry-meta -->	
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
				
				
				</div>
			</div>
		<?php endwhile; else: ?>
				<article class="container-fluid white">
				<div class="mp-row row">
					<div class="col-md-12">
						<h2>xxxSorry, this Category, Tag, Post or Page does not exist yet!</h2>
					</div>
				</div>
				</article>
					
		<?php endif; ?>

	</div>
</section>
<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
<section class="container-fluid tag-cta">
	<h2>Popular Tags</h2>
	<ul class="mp-tags">
		<li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
	</ul>
</section>
<?php endif; ?>
<?php get_footer(); ?>