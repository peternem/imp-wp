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
            
<?php if ( have_posts() ) : ?>
	<?php if( is_home() ) { ?>           
	<!-- Carousel  -->
	<section id="Home" class="parallax-container white opacity hero" data-natural-height="1400" data-natural-width="2500" data-image-src="/wp-content/uploads/2016/02/ten-yrs-sfc-IMG_0107.jpg" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 750px;">
<!-- 		<ul class="list-group spotlight map"> -->
<!-- 			<li class="list-group-item"> -->
<!-- 				<div class="badge"><a id="mapLink" href="#"><i class="fa fa-map-o"></i></a></div> -->
<!-- 				<div class="list-content"> -->
<!-- 					<p><a href="#" target="_blank">Get Directions to<br></a></p>  -->
<!-- 				</div> -->
<!-- 			</li> -->
<!-- 		</ul> -->
		<ul class="list-group spotlight contact">
			<li class="list-group-item">
				<div class="badge"><a id="contactLink" href="#"><i class="fa fa-envelope-o"></i></a></div>
				<div class="list-content">
					<p><a href="/contact-form/">Contact Me</a></p> 
				</div>
			</li>
		</ul>		
		<div class="title-desc-inner">
			<h1 class="entry-title">Welcome to MattPeternell.net</h1>
			<h2>10 years As full-service web developer and designer.</h2>
			<ul>
				
				<li><a class="btn btn-primary" role="button" title="Video" href="#Welcome">Learn More</a></li>
				<li><a class="btn btn-default" role="button" title="Audio" href="#RecentWork">Web Work</a></li>
				<li><a class="btn btn-primary" role="button" title="Audio" href="#RecentPrint">Print Work</a></li>
			</ul>
		</div>
	</section>
	<!-- Service Times and Locations   -->
	<?php get_template_part('index-welcome'); ?>
	<!-- Recent Work -->
	<?php get_template_part('index-recent-work'); ?>
	<!-- Media -->
	<?php get_template_part('index-skillset'); ?>
	<!-- Recent Print -->
	<?php get_template_part('index-recent-print'); ?>
	<!-- Giving-->
	<?php get_template_part('index-about'); ?>
	<!-- Care -->
	<?php get_template_part('index-contact'); ?>


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

<?php get_footer(); ?>