<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<section id="keyPointsA" class="three-col-cta black">
    <div class="my-inner-container">
        <div class="mp-row row">
            <?php if (have_rows('cta_repeater', 'option')): ?>
                <?php
                while (have_rows('cta_repeater', 'option')): the_row();
                    // vars
                    $image = get_sub_field('cta_icon', 'option');
                    $title = get_sub_field('cta_title', 'option');
                    $excerpt = get_sub_field('cta_excerpt', 'option');
                    $link = get_sub_field('cta_link', 'option');
                    $link_label = get_sub_field('cta_link_label', 'option');
                    ?>
                    <div class="column-4">
                        <?php if ($image): ?>
                            <div class="icon">
                                <i class="fa <?php echo $image; ?>"aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($title): ?>
                            <h3 class="content-box-heading"><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <?php if ($excerpt): ?>
                            <div class="content-container">
                                <?php echo $excerpt; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($link): ?>
            <!--                            <a href="<?php echo $link; ?>"><?php echo $link_label; ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>-->
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>