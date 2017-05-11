<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
get_header();
?>
<!-- archive-web_portfolio.php -->
<div class="breadcrumb-container">
    <?php
    if (function_exists('impTheme_breadcrumbs')) {
        impTheme_breadcrumbs();
    }
    ?>
</div>
<section class="container-fluid white cat-arch">
    <div class="row">
        <div class="col-lg-8">
            <h1><?php post_type_archive_title(); ?></h1>
            <p style="text-align: justify;">My code written to be standards compliant, validated and supported in the latest browsers. Most of the sites I do nowadays are responsive, making them easier and faster to use on smaller devices.</p>
        </div>
        <div class="col-lg-4 align-center">
            <img src="/wp-content/themes/imp-twentyseventeen/assets/img/print-graphic-1280x1080.png" alt="Print graphic" class="catimg img-responsive">

        </div>
    </div>
</section>
<section class="my-container">
    <div class="my-inner-container">
        <header class="row section-header">
            <h2 class="section-title">Past and Present Print Projects</h2>
        </header>
        <div class="slidetile-area flexy">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="home-tiles-2">
                        <div id="post-<?php the_ID(); ?>" class="panel">
                            <div class="panel-heading">
                                <?php if (get_field('category_archive')) { ?>
                                    <h2 class="panel-title"><a href="<?php echo get_field('category_archive'); ?>"><?php the_title(); ?></a></h2>
                                <?php } else { ?>
                                    <h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <div class="tile-col-1">
                                    <?php
                                    if (function_exists('the_subtitle')) {
                                        the_subtitle('<p class="lead">', '</p>');
                                    }
                                    ?>	
                                    <?php
                                    $posttags = get_the_tags();
                                    ?>
                                    <?php
                                    if (get_the_tag_list()) {
                                        echo get_the_tag_list('<ul class="tag_list"><li>', ', </li><li>', '</li></ul>');
                                    }
                                    ?>
                                    <?php edit_post_link(__('<i class="fa fa-pencil-square-o"></i> Edit', 'impTheme'), '<footer class="slide-txt">', '</footer>'); ?>
                                </div>
                                <div class="tile-col-2">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            the_post_thumbnail('web-thumb-5x6', array('class' => 'img-responsive'));
                                            ?>
                                        </a>
                                        <?php
                                    }
                                    ?>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            else:
                ?>
                <article class="container-fluid white">
                    <div class="mp-row row">
                        <div class="col-md-12">
                            <h2>Sorry, this Category, Tag, Post or Page does not exist yet!</h2>
                        </div>
                    </div>
                </article>

            <?php endif; ?>

        </div>
    </div>
    <?php impTheme_content_nav('nav-below'); ?>
</section>
<?php get_template_part('inc/wp-tag-cloud'); ?>
<?php get_footer(); ?>