<?php
/**
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
?>
<div class="container-fluid white">
    <div class="mp-row row page-conten">
        <article id="post-<?php the_ID(); ?>" <?php post_class('t'); ?>>
            <div class="col-lg-6">
                <?php get_template_part('inc/content-single-web-entrymeta'); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'impTheme'),
                    'after' => '</div>',
                ));
                ?>
            </div>
            <div class="col-lg-6">
                    <ul id="webCarousel" class="bxslider">
                    <?php
                    $image = get_field('port_image_one');

                    if (!empty($image)) {
                        // vars
                        $url = $image['url'];
                        $title = $image['title'];
                        $alt = $image['alt'];
                        $caption = $image['caption'];

                        // thumbnail
                        $size = 'careers-featured-1080';
                        $thumb = $image['sizes'][$size];
                        $width = $image['sizes'][$size . '-width'];
                        $height = $image['sizes'][$size . '-height'];
                        ?>
                        <li class="slide">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"  class="img-responsive right-col-img"/>

                            <?php if ($caption): ?>
                                <div class="wp-caption-text"><?php echo $caption; ?></div>

                            <?php endif; ?>
                        </li>
                        <?php
                    }
                    $image2 = get_field('port_image_two');

                    if (!empty($image2)) {
                        // vars
                        $url = $image2['url'];
                        $title = $image2['title'];
                        $alt = $image2['alt'];
                        $caption = $image2['caption'];

                        // thumbnail
                        $size = 'careers-featured-1080';
                        $thumb = $image2['sizes'][$size];
                        $width = $image2['sizes'][$size . '-width'];
                        $height = $image2['sizes'][$size . '-height'];
                        ?>
                        <li class="slide">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"  class="img-responsive right-col-img"/>
                            <?php if ($caption): ?>
                                <div class="wp-caption-text"><?php echo $caption; ?></div>
                            <?php endif; ?>
                        </li>
                        <?php
                    }
                    $image3 = get_field('port_image_three');

                    if (!empty($image3)) {
                        // vars
                        $url = $image3['url'];
                        $title = $image3['title'];
                        $alt = $image3['alt'];
                        $caption = $image2['caption'];

                        // thumbnail
                        $size = 'careers-featured-1080';
                        $thumb = $image3['sizes'][$size];
                        $width = $image3['sizes'][$size . '-width'];
                        $height = $image3['sizes'][$size . '-height'];
                        ?>
                        <li class="slide">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"  class="img-responsive right-col-img"/>
                            <?php if ($caption): ?>
                                <div class="wp-caption-text"><?php echo $caption; ?></div>
                            <?php endif; ?>
                        </li>
                        <?php
                    }
                    $image4 = get_field('port_image_four');

                    if (!empty($image4)) {
                        // vars
                        $url = $image4['url'];
                        $title = $image4['title'];
                        $alt = $image4['alt'];
                        $caption = $image4['caption'];

                        // thumbnail
                        $size = 'homepage-thumb-port';
                        $thumb = $image4['sizes'][$size];
                        $width = $image4['sizes'][$size . '-width'];
                        $height = $image4['sizes'][$size . '-height'];
                        ?>
                        <li class="slide">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"  class="img-responsive right-col-img"/>
                            <?php if ($caption): ?>
                                <div class="wp-caption-text"><?php echo $caption; ?></div>

                            <?php endif; ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </article><!-- #post-## -->
    </div>
</div>
<?php
/* Restore original Post Data */
wp_reset_postdata();
?>