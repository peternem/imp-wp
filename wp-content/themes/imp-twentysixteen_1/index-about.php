<?php
$catName = "about";
$argsd = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> -1,
	//'category_name' 	=> $catName,
	'name' 	=> 'about-this-dev',
	'order'             => 'ASC',
	'orderby'			=> 'title',
	'post_status' 		=> 'publish',
);
$my_posts = get_posts($argsd);
foreach($my_posts as $p) { ?>
	<section id="About" class="parallax-container black">
		<div class="title-desc-inner">
			<div class="mp-row row">
			    <div class="hidden-xs col-sm-6 col-md-6 col-lg-6">
			       <?php
			        // Advanced Custom Fieldset - Featurette
					if(get_field('image_right',$p->ID)) {
			        	$xyz = get_field('image_right',$p->ID);
			            echo '<img class="img-thumbnail" src="'.$xyz[sizes][medium_large].'"/>';
			        }
			        ?>
			    </div>
			    <div class="col-sm-6 col-md-6 col-lg-6">
			    	<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			        <?php echo apply_filters('the_content', $p->post_content); ?>
			    </div>
			</div>
		</div>
		<?php 
// 		echo '<pre>';
// 		echo print_r($p);
// 		echo '<pre>';
		?>

</section>	
<?php } ?>
	
<?php wp_reset_postdata(); ?>