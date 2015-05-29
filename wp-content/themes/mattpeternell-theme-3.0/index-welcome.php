<?php $my_query = new WP_Query('name=welcome');
while($my_query->have_posts()){
        $my_query->the_post();
?>
<div class="mp-row row">
    <div id="home-tag-cloud" class="col-md-4">
       <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
        
        <h2>Popular Tags</h2>
        <ul class="mp-tags">
        <li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
        </ul>
        
        <?php endif; ?>
    </div>
    <div class="col-md-8">
        <h2><?php the_title() ?></h2>
        <?php if(function_exists('the_subtitle')) { ?>
        <p class="subtitle"><strong><?php echo the_subtitle();?></strong></p>
        <?php } ?> 
        <?php the_content(); ?>
    </div>
</div>
<?php   } ?>