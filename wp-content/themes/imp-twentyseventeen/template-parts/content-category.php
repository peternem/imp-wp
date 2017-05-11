<?php
/**
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
?>
<!-- Content-category.php -->
<div class="home-tiles-2">
    <article id="post-<?php the_ID(); ?>" <?php post_class('panel panel-default'); ?>>
        <div class="panel-body">
            <div class="tile-col-1">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('web-thumb-6x5', array('class' => 'img-responsive'));
                }
                ?>
            </div>
            <div class="tile-col-2">
                <div class="panel-heading">
                    <h1 class="panel-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                </div>
                <?php
                if (function_exists('the_subtitle')) {
                    the_subtitle('<p>', '</p>');
                }
                ?>
                <?php if ('web_portfolio' == get_post_type() || 'post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
                    <?php
                    /* translators: used between list items, there is a space after the comma */
//                        $categories_list = get_the_category_list(__('', 'impTheme'));
//                        if ($categories_list && impTheme_categorized_blog()) :
//                            printf(__('<p>Posted in: %1$s</p>', 'impTheme'), $categories_list);
//                        endif; // End if categories 
                    /* translators: used between list items, there is a space after the comma */
                    //$tags_list = get_the_tag_list('', __('', 'impTheme'));

                    if (get_the_tag_list()) {
                        echo get_the_tag_list('<ul class="tag_list"><li>', '</li><li>', '</li></ul>');
                    }

//                        if ($tags_list) :
//                            printf(__('<p>Tagged: %1$s</p>', 'impTheme'), $tags_list);
//                        endif; // End if $tags_list 
                    ?>
                <?php endif; ?>
                <?php edit_post_link(__('<i class="fa fa-pencil-square-o"></i> Edit', 'impTheme'), '<footer class="slide-txt">', '</footer>'); ?>

            </div>
        </div>
    </article>
</div>
