<section id="Skillset" class="parallax-container black">
	<?php
$catName = "about";
$argsd = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> -1,
	//'category_name' 	=> $catName,
	'name' 	=> 'my-skillset',
	'order'             => 'ASC',
	'orderby'			=> 'title',
	'post_status' 		=> 'publish',
);
$my_posts = get_posts($argsd);
foreach($my_posts as $p) { ?>
		<div class="title-desc-inner">
			
			<div class="mp-row row">
			    <div class="hidden-xs col-sm-6 col-sm-6 col-md-6 col-lg-6">
			       <?php
			        // Advanced Custom Fieldset - Featurette
			        if(get_field('image_right',$p->ID)) {
			        	$xya = get_field('image_right',$p->ID);
			            echo '<img class="img-thumbnail" src="'.$xya[sizes][medium_large].'"/>';
			        }
			        ?>
			    </div>
			    <div class="col-sm-6 col-md-6 col-lg-6">
			    	<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			        <?php echo apply_filters('the_content', $p->post_content); ?>
			       	 <div class="see-more-link">
						<a class="btn btn-primary" role="button" title="Web Portfolio" id="scEvent" href="/category/skillset/">See More <i class="fa fa-angle-double-right"></i>
						</a>
					</div>
			    </div>
			</div>
			
		</div>
<?php } ?>
	
<?php wp_reset_postdata(); ?>	
</section>