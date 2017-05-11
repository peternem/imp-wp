    <section id="welcome" class="my-container black">
    <div class="my-inner-container">
        <?php
        $my_query = new WP_Query('name=full-service-web-developer');
        while ($my_query->have_posts()) {
            $my_query->the_post();
            ?>
            <div class="mp-row row">
                <div class="col-lg-8 margin-bottom-50">
                    <h1 class="entry-title"><?php the_title() ?></h1>
                    <?php the_content(); ?>
                </div>
                <div class="col-lg-4 hidden-xs">
                    <?php if (function_exists('wp_tag_cloud')) : ?>

                        <h2 class="align-center">Popular Tags</h2>
                        <ul class="mp-tags">
                            <li><?php wp_tag_cloud('smallest=8&largest=22'); ?></li>
                        </ul>

                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>
