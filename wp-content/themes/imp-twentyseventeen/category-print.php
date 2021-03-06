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
<section id="printPortfolio" class="container-fluid white cat-arch">
    <?php
    $catName = "about";
    $argsd = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        //'category_name' 	=> $catName,
        'name' => 'my-print-portfolio',
        'order' => 'ASC',
        'orderby' => 'title',
        'post_status' => 'publish',
    );
    $my_posts = get_posts($argsd);
    foreach ($my_posts as $p) {
        ?>			
        <div class="row">
            <div class="col-lg-8">
                <h1 class="entry-title"><?php echo $p->post_title; ?></h1>
                <?php echo apply_filters('the_content', $p->post_content); ?>
            </div>
                        <div class="col-lg-4 align-center">
                <img src="/wp-content/themes/imp-twentyseventeen/assets/img/print-graphic-1280x1080.png" alt="Print graphic" class="catimg img-responsive">
            </div>
        </div>
    </div>
<?php } ?>

<?php wp_reset_postdata(); ?>	
</section>
<section class="container-fluid">
    <div class="row">
        <div class="col-lg-12 align-center">
            <h2>Print Work Samples</h2>
        </div>
    </div>
</section>
<section class="container-fluid tile-area">
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
</section><!-- .container -->
<?php get_template_part('inc/wp-tag-cloud'); ?>
<?php get_footer(); ?>