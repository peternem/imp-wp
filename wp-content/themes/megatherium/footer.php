<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package megatherium
 */
?>

</div><!-- #content -->
</div><!-- #page -->
<footer class="footer-2" role="contentinfo">
    <div class="outer-container">
        <div class="row">
            <?php
            $footer_argsx = array(
                'theme_location' => 'footer_navigation',
                'container' => 'nav',
                'container_id' => 'footerNav',
                'container_class' => 'column-8 footer-nav',
                'menu_class' => 'footer-nav-main',
                'depth' => '1',
                    //'walker' => new Footernav_Walker ()
            );
            wp_nav_menu($footer_argsx);
            ?>
            <div class="column-4 footer-secondary-links ">
                <ul id="socialLinks" class="social-list"></ul>
                <?php //do_action('my_footer_hook'); ?>
            </div>
        </div>
    </div>
    <div class="site-info">
    <p>
        <?php do_action('impTheme_credits'); ?>
        &copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?>
        <span class="sep"> | </span>
        <?php printf(__('%1$s Theme by %2$s.', 'impTheme'), 'Lewbowski Backbone', '<a href="http://mattpeternell.net" rel="designer">mattPeternell.net</a>'); ?>
        <span class="sep"> | </span> All Rights Reserved</p>
</div>
</footer>



<?php wp_footer(); ?>
<?php get_template_part('underscore-templates-hero'); ?>
<?php get_template_part('underscore-templates-welcome'); ?>
<?php get_template_part('underscore-templates-3-column-cta'); ?>
<?php get_template_part('underscore-template-web-portfolio_recent'); ?>
<?php get_template_part('underscore-templates-tags'); ?>
<?php get_template_part('underscore-templates-skills'); ?>
<?php get_template_part('underscore-template-web-portfolio'); ?>
<?php get_template_part('underscore-templates-about'); ?>
<?php get_template_part('underscore-templates-contact'); ?>
<?php get_template_part('underscore-templates-social-icons'); ?>
<?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) { ?>
    <script src="//localhost:35729/livereload.js"></script>
<?php } ?>
</body>
</html>
