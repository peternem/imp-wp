<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
                
                get_header(); ?>
                <?php if( is_home() ) { ?> 
                        <?php get_template_part('index-feature-image'); ?>
                <?php } ?>
                                    
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
					
					<?php if ( have_posts() ) : ?>
					    <?php if( is_home() ) { ?>
					        
					        <div id="welcome" class="content-area container-fluid white">
                                <?php get_template_part('index-welcome'); ?>
                            </div>
                            <!-- About Section -->
                            <div id="recent-work-web" class="content-area container-fluid grey">
                                <?php get_template_part('index-recent-web-carousel'); ?>
                            </div>
                            <div id="intro-about" class="content-area container-fluid white">
                                <?php get_template_part('index-about-site'); ?>
                            </div>
                            <div id="recent-work-print" class="content-area container-fluid grey">
                                <?php get_template_part('index-recent-print-carousel'); ?>
                            </div>
                            <div id="intro-about-mp" class="content-area container-fluid white">
                                <?php get_template_part('index-about-mp'); ?>
                            </div>
                        <?php } else { ?>
					
    						<?php while ( have_posts() ) : the_post(); ?>
    			
    							<?php get_template_part('content', get_post_format()); ?>
                            <div id="intro-about" class="content-area container-fluid white">
                                <?php get_sidebar('mp-footer'); ?>
                            </div>
    						<?php endwhile; ?>
    			
    						<?php upbootwp_content_nav('nav-below'); ?>
    
                        <?php } ?>
					<?php else : ?>
						<?php get_template_part( 'no-results', 'index' ); ?>

					<?php endif; ?>
			                
					</main><!-- #main -->
				</div><!-- #primary -->

<?php get_footer(); ?>