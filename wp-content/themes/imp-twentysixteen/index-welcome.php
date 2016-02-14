<section id="Welcome" class="parallax-container black">
<div class="title-desc-inner">
<?php $my_query = new WP_Query('name=full-service-web-developer');
while($my_query->have_posts()){
        $my_query->the_post();
?>
    <div class="mp-row row">
    	<div class="col-sm-12 col-md-6 col-lg-6">
    		<h1 class="entry-title"><?php the_title() ?></h1>
       		<?php the_content(); ?>
    	</div>
     	<div class="col-sm-12 col-md-6 col-lg-6 hidden-xs">
       		<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
        
        	<h2>Popular Tags</h2>
        	<ul class="mp-tags">
        		<li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
        	</ul>
        
        	<?php endif; ?>
    	</div>
    
	</div>
<?php   } ?>
<?php wp_reset_postdata(); ?>
</div>
</section>
