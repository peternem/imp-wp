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
</div><!-- page .container -->
<footer id="colophon" class="site-footer blog-footer" role="contentinfo">
	<div class="site-info">
		<?php do_action( 'upbootwp_credits' ); ?>
		&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?>
		<span class="sep"> | </span>
		<?php printf(__('Theme: %1$s by %2$s.', 'ImpTheme 3.0' ), 'ImpTheme 3.0', '<a href="'.get_site_url().'" rel="designer">mPeternell.net</a>'); ?>
		
	</div><!-- .site-info -->
</footer><!-- #colophon -->	
<?php wp_footer(); ?>
<!-- .site-info --><div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
</body>
</html>