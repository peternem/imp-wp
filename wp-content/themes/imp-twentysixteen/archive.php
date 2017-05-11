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
<div class="breadcrumb-container">
    <?php if (function_exists('impTheme_breadcrumbs')) impTheme_breadcrumbs(); ?>
</div>
<section class="container-fluid white cat-arch">
    <?php
    if (is_category()) :
        single_cat_title('<h1 class="archive-title">', true, '</h1>');
        ?>

        <?php
    elseif (is_tag()) :
        ?>
        <h1 class="archive-title"><?php $singleCat = single_cat_title(); ?></h1>
        <?php
    elseif (is_tax()):
        single_tag_title();
    elseif (is_author()) :
        /* Queue the first post, that way we know
         * what author we're dealing with (if that is the case).
         */
        the_post();
        printf(__('<h1 class="archive-title"> Author: %s', 'impTheme'), '<span class="vcard">' . get_the_author() . '</span></h1>');
        /* Since we called the_post() above, we need to
         * rewind the loop back to the beginning that way
         * we can run the loop properly, in full.
         */
        rewind_posts();

    elseif (is_day()) :
        printf(__('<h1 class="archive-title">Day: %s', 'impTheme'), '<span>' . get_the_date() . '</span></h1>');
    elseif (is_month()) :
        printf(__('<h1 class="archive-title">Month: %s', 'impTheme'), '<span>' . get_the_date('F Y') . '</span></h1>');
    elseif (is_year()) :
        printf(__('<h1 class="archive-title">Year: %s', 'impTheme'), '<span>' . get_the_date('Y') . '</span></h1>');


    elseif (is_tax('post_format', 'post-format-aside')) :
        _e('Asides', 'impTheme');

    elseif (is_tax('post_format', 'post-format-image')) :
        _e('Images', 'impTheme');

    elseif (is_tax('post_format', 'post-format-video')) :
        _e('Videos', 'impTheme');

    elseif (is_tax('post_format', 'post-format-quote')) :
        _e('Quotes', 'impTheme');

    elseif (is_tax('post_format', 'post-format-link')) :
        _e('Links', 'impTheme');

    else :
        _e('<h1 class="archive-title">Archives', 'impTheme' . '</h1>');

    endif;
    ?>
</section>
<section class="my-container">
    <div class="my-inner-container">
        <div class="row flexy">		
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
                                    <?php $posttags = get_the_tags(); ?>
                                    <?php
                                    if (get_the_tag_list()) {
                                        echo get_the_tag_list('<div class="slide-txt"><ul class="tag_list"><li>', ',</li><li>', '</li></ul></div>');
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
</section>
<?php get_template_part('inc/wp-tag-cloud'); ?>
<?php get_footer(); ?>