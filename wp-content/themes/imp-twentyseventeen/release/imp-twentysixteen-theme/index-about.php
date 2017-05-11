<section id="about" class="outer-container no-parallax black darker-background">
    <div class="inner-container">
        <div class="mp-row row">
            <?php
            $my_dev_query = new WP_Query('name=about-this-dev');
            while ($my_dev_query->have_posts()) {
                $my_dev_query->the_post();
                ?>
                <div class="col-lg-6 align-center hide-sm">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb', array('class' => "svg-thumbnail ")); ?></a>
                    <?php } else { ?>
                        <a href="<?php the_permalink(); ?>"><img src="https://placeholdit.imgix.net/~text?txtsize=12&txt=120%C3%97120&w=120&h=120" class="img-thumbnail"/></a>
                    <?php } ?>
                </div>
                <div class="col-lg-6">
                    <h1 class="entry-title"><?php the_title() ?></h1>
                    <?php the_content(); ?>
                    <div class="see-more-link">
                        <a class="btn btn-light" role="button" title="Web Portfolio" id="scEvent" href="/category/skillset/">See More <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>

                </div>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>