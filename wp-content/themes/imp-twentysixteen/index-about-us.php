<section id="aboutUs" class="content-area container-fluid white">
<?php $my_query = new WP_Query('name=welcome-to-npcc');
while($my_query->have_posts()){
        $my_query->the_post();
?>
<div class="mp-row row">
    <div class="row-title col-md-12">
        <h1 class="section-title">A Little Bit About Us</h1>
    </div>
    <div class="col-md-6">
        <header class="entry-header page-header">
            <h2><?php the_title() ?></h2>
            <?php if(function_exists('the_subtitle')) { ?>
            <p class="subtitle"><?php echo the_subtitle();?></p>
        </header>
        <?php } ?> 
        <?php the_content(); ?>
    </div>
    <div class="col-md-6">
       <?php
        // Advanced Custom Fieldset - Featurette
        if(get_field('image_right')) {
            echo '<img class="img-thumbnail" src="'.get_field('image_right').'"/>';
        }
        ?>
    </div>
</div>
<?php   } ?>
</section>