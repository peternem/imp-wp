<?php
$image_hero = get_field('home_page_hero_image', 'option');
//echo "<pre>";
//print_r($image_hero);
//echo "</pre>";
if (!empty($image_hero)):
    // vars
    $url = $image_hero['url'];
    $title = $image_hero['title'];
    $alt = $image_hero['alt'];
    $caption = $image_hero['caption'];

    // thumbnail
    $size = 'careers-featured';
    $thumb_url = $image_hero['sizes'][$size];
    $width = $image_hero['sizes'][$size . '-width'];
    $height = $image_hero['sizes'][$size . '-height'];
endif;
?>
<section id="Home" class="parallax-container white opacity hero" data-natural-height="<?php echo $height; ?>" data-natural-width="<?php echo $width; ?>" data-image-src="<?php echo $thumb_url; ?>" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 750px;">
    <?php
    if (get_field('flyout_link_text', 'option')) {
        $flyout_link_text = get_field('flyout_link_text', 'option');
        echo $flyout_link_url = get_field('flyout_link_url', 'option');
        ?>
        <ul class="list-group spotlight contact">
            <li class="list-group-item">
                <div class="badge"><a id="contactLink" href="#"><i class="fa fa-envelope-o"></i></a></div>
                <div class="list-content">
                    <p><?php echo $flyout_link_text; ?></p>
                    <p><a href="<?php echo $flyout_link_url; ?>">Contact <i class="fa fa-angle-double-right"></i></a></p> 
                </div>
            </li>
        </ul>	
    <?php } ?>
    <div class="title-desc-inner">
        <?php
        if (get_field('hero_title', 'option')) {
            $hero_title = get_field('hero_title', 'option');
            $hero_subtitle = get_field('hero_subtitle', 'option');
            ?>
            <h1 class="entry-title"><?php echo $hero_title; ?></h1>
            <h2><?php echo $hero_subtitle; ?></h2>
        <?php } ?>

        <ul id="heroLinks" class="hero-links">
            <li><a class="btn btn-primary" role="button" title="Video" href="#welcome">Learn More</a></li>
            <li><a class="btn btn-default" role="button" title="Recent Work" href="#recentWork">Web Work</a></li>
            <li><a class="btn btn-primary" role="button" title="Recent Print" href="#recentPrint">Print Work</a></li>
        </ul>
    </div>
</section>