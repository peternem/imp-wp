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
<script>
$(document).ready(function() {
	/* -------------------------------------------------
	 * Slideshow Pause and Play Button GLOBAL FUNCTIONs
	 * ------------------------------------------------- */
	
	$('#pauseToggle').click(function() {
		var slideshow = $('.cycle-slideshow');
		var playIcon = '<span class=\"glyphicon glyphicon-play\"></span>';
		var pauseIcon = '<span class=\"glyphicon glyphicon-pause\"></span>';

		if (slideshow.is('.cycle-paused')) {
			slideshow.cycle('resume');
			$(this).text('Pause').append(pauseIcon);
		} else {
			slideshow.cycle('pause');
			$(this).text('Play').append(playIcon);
		}
	});
});
</script>
</body>
</html>