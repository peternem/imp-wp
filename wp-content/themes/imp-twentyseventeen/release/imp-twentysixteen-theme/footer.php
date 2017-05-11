<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 * 
 */
?>
</main><!-- #main -->
<footer class="footer-2" role="contentinfo">
    <div class="outer-container">
        <div class="row">
            <?php
            $footer_argsx = array(
                'theme_location' => 'footer_navigation',
                'container' => 'nav',
                'container_id' => 'footerNav',
                'container_class' => 'col-lg-8 footer-nav',
                'menu_class' => 'footer-nav-main',
                'depth' => '1',
                'walker' => new Footernav_Walker ()
            );
            wp_nav_menu($footer_argsx);
            ?>
            <div class="col-lg-4 footer-secondary-links ">
                <?php do_action('my_footer_hook'); ?>
                
            </div>
        </div>
    </div>
</footer>
<div class="site-info">
    <p>
        <?php do_action('impTheme_credits'); ?>
        &copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?>
        <span class="sep"> | </span>
        <?php printf(__('%1$s Theme by %2$s.', 'impTheme'), 'IMPtheme', '<a href="http://mattpeternell.net" rel="designer">mattPeternell.net</a>'); ?>
        <span class="sep"> | </span> All Rights Reserved</p>
</div>
<?php wp_footer(); ?>
<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
    <?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) { ?>
    <script src="//localhost:35729/livereload.js"></script>
<?php } ?>

</body>
</html>