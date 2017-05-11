<section id="recentWork" class="my-container black" >
    <div class="my-inner-container">
        <header class="entry-header">
            <h1 style="text-align: center;">Recent Work</h1>
            <!--<h3 style="text-align: center;">Here are a few of the project I recently have worked on.</h3>-->
        </header>

        <div class="slidetile-area flexy">
            <?php
            $catName = get_cat_ID("websites");

            $web_args = array(
                'post_type' => 'web_portfolio',
                'posts_per_page' => 8,
                'orderby' => 'post_date',
                'order' => 'date',
                'cat' => $catName,
                //'category__and' => array( 5, 7 ),
                'post_status' => 'publish',
            );
            $wp_web_query = new WP_Query($web_args);

            while ($wp_web_query->have_posts()) : $wp_web_query->the_post();
                ?>
                <div class="home-tiles-2">
                    <div class="panel">

                        <div class="panel-body">
                            <div class="tile-col-1">
                                <?php if (has_post_thumbnail('')) : ?>
                                    <a  class="slide-img" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('web-thumb-6x5'); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                            <div class="tile-col-2">
                                <div class="panel-heading">
                                    <h1 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                </div>
                                <?php
                                if (function_exists('the_subtitle')) {
                                    the_subtitle('<p>', '</p>');
                                }
                                ?>
                                <?php //the_excerpt(); ?>
                                <?php
                                $posttags = get_the_tags();
                                ?>
                                <?php
                                if (get_the_tag_list()) {
                                    echo get_the_tag_list('<ul class="tag_list"><li>', '</li><li>', '</li></ul>');
                                }
                                ?>
                                <a class="c-call-to-action c-glyph" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
                                    <span>Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <ul class="see-more-link align-center">
            <li><a class="btn btn-light" role="button" title="Web Portfolio" id="scEvent" href="/web-portfolio/">More Work <i class="fa fa-angle-double-right"></i></a></li>

        </ul>
    </div>
</section>
