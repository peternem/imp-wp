<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
</main><!-- #main -->
<footer id="globalFooter" class="blog-footer parallax-footer" role="contentinfo">
	<div class="container-fluid">
		<div class="row">
				<?php
				$footer_argsx = array (
						'theme_location' => 'footer_navigation',
						'container' => 'nav',
						'container_id' => 'footerNav',
						'container_class' => 'col-lg-12',
						'menu_class' => 'footer-nav-main',
						'depth' => '1',
						'walker' => new Footernav_Walker () 
				);
				//wp_nav_menu ( $footer_argsx );
				?>
				<?php get_sidebar( '3col-footer' ); ?>
		</div>
	</div>	
	<div class="site-info">
		<?php do_action( 'upbootwp_credits' ); ?>
		&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?>
		<span class="sep"> | </span>
		<?php printf(__('%1$s Theme by %2$s.', 'upbootwp' ), 'IMPtheme', '<a href="http://mattpeternell.net" rel="designer">mattPeternell.net</a>'); ?>
		
	</div><!-- .site-info -->
	
</footer><!-- #colophon -->	
<?php wp_footer(); ?>
<!-- .site-info --><div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
<?php 
if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) { ?>
	<script src="//localhost:35729/livereload.js"></script>
<?php } ?>
        
</body>
</html>