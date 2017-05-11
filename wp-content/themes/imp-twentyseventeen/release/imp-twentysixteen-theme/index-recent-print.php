<section id="recentPrint" class="my-container black" >
    <div class="my-inner-container">
                <header class="entry-header">
<h1 style="text-align: center;">Recent Print</h1>
<h3 style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
</header>

        <div class="slidetile-area flexy">
            <?php
            $catName = get_cat_ID("print");

            $pr_args = array(
                'post_type' => 'print_portfolio',
                'posts_per_page' => 6,
                'orderby' => 'post_date',
                'order' => 'date',
                'cat' => $catName,
                //'category__and' => array( 5, 7 ),
                'post_status' => 'publish',
            );
            $wp_pr_query = new WP_Query($pr_args);

            while ( $wp_pr_query->have_posts()) :  $wp_pr_query->the_post();
                ?>
                <div class="home-tiles-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        </div>
                        <div class="panel-body">
                            <div class="tile-col-1">
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
                                    echo get_the_tag_list('<ul class="tag_list"><li>', ',</li><li>', '</li></ul>');
                                }
                                ?>
                                <a class="c-call-to-action c-glyph" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
                                    <span>Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                            <div class="tile-col-2">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a  class="slide-img" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('homepage-thumb'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <ul class="see-more-link align-center">
            <li><a class="btn btn-light" role="button" title="Print Portfolio" id="scEvent" href="/print-portfolio/">See More <i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>
</section>
