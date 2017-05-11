<?php
/**
 * Template Name: Category Get Connected
 * The template for displaying categorized post 
 *
 * @package WordPress
 * @subpackage ncc-theme
 * @since ncc-theme 1.6
 */
get_header();
?>
<div class="breadcrumb-container">
    <?php if (function_exists('impTheme_breadcrumbs')) impTheme_breadcrumbs(); ?>
</div>
<section id="catSkillset" class="container-fluid white cat-arch">
    <?php
    $argsd = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'name' => 'front-end-web-development',
        'order' => 'ASC',
        'orderby' => 'title',
        'post_status' => 'publish',
    );
    $my_posts = get_posts($argsd);
    foreach ($my_posts as $p) {
        ?>			
        <div class="row">
            <div class="col-lg-6">
                <h1 class="entry-title"><?php echo $p->post_title; ?></h1>
                <?php echo apply_filters('the_content', $p->post_content); ?>
            </div>
            <div class="col-lg-6 align-center">
                <img src="/wp-content/themes/imp-twentysixteen/assets/img/skillset-tools.png" alt="Responsive Mobile Devices" class="catimg img-responsive">
            </div>
        </div>
    </div>

<?php } ?>

<?php wp_reset_postdata(); ?>	
</section>

<section class="my-container">
    <div class="my-inner-container">
        <header class="section-header">
            <h2 class="section-title">Tools of the Trade</h2>
        </header><!-- .entry-header -->
        <!-- <?php echo "Template: category-websites.php" ?> -->

        <?php if (have_posts()) : ?>
            <div class="row flexy">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', 'category', get_post_format());
                    ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('template-parts/no-results', 'index'); ?>
            <?php endif; ?>
        </div>

        <!-- 		<div id="primary" class="content-area"></div> -->
        <?php impTheme_content_nav('nav-below'); ?>
    </div>
</section>
<?php get_template_part('inc/wp-tag-cloud'); ?>
<?php get_footer(); ?>