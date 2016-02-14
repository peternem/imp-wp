<?php $my_query = new WP_Query('name=about-this-site');
while($my_query->have_posts()){
        $my_query->the_post();
?>
<div class="mp-row row">
    <div class="col-md-4">
       <?php
        // Advanced Custom Fieldset - Featurette
        if(get_field('image_right')) {
            echo '<img class="img-thumbnail" src="'.get_field('image_right').'"/>';
        }
        ?>
    </div>
    <div class="col-md-8">
        <h2><?php the_title() ?></h2>
        <?php if(function_exists('the_subtitle')) { ?>
        <p class="subtitle"><strong><?php echo the_subtitle();?></strong></p>
        <?php } ?> 
        <?php the_content(); ?>
    </div>
    
</div>
<?php } ?>