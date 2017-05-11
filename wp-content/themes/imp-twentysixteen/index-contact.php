<?php
$my_dev_query = new WP_Query('name=contact');
while ($my_dev_query->have_posts()) {
    $my_dev_query->the_post();
    ?>
    <?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id()); ?>
    <!--    <section id="contact" class="outer-container parallax-container black opacity" data-natural-height="1406" data-natural-width="2500" data-image-src="<?php echo $feat_image = wp_get_attachment_url(get_post_thumbnail_id($p->ID)); ?>" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 50vh;">
            <div class="inner-container">
                <div class="mp-row row opac-30-bground" style="padding-top: 2em;">
                    <div class="col-lg-8 align-center hide-sm">
                        <h1 class="entry-title"><?php the_title() ?></h1>
    <?php the_excerpt(); ?>
                    </div>
                    <div class="col-lg-2">
                        <div class="see-more-link">
                            <a class="btn btn-primary" role="button" title="Web Portfolio" id="scEvent" href="<?php the_permalink(); ?>">Contact Me! <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
    <?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($p->ID)); ?>
    <style>
        .parallax-background {
            background: url('<?php echo $feat_image; ?>') repeat;
        }
    </style>
    <div id="js-parallax-window" class="parallax-window">
        <div class="parallax-static-content">
            <div class="col-lg-8 align-center hide-sm">
                <h1 class="entry-title"><?php the_title() ?></h1>
                <?php the_excerpt(); ?>
            </div>
            <div class="col-lg-2">
                <div class="see-more-link">
                    <a class="btn btn-primary" role="button" title="Web Portfolio" id="scEvent" href="<?php the_permalink(); ?>">Contact Me! <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        <div id="js-parallax-background" class="parallax-background"></div>
    </div>
<?php } ?>
<?php wp_reset_postdata(); ?>

