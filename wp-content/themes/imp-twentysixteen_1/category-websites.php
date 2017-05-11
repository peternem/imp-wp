<?php
/**
 * Template Name: Category Get Connected
 * The template for displaying categorized post 
 *
 * @package WordPress
 * @subpackage ncc-theme
 * @since ncc-theme 1.6
 */

get_header(); ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<section id="recentPrint" class="container-fluid white cat-arch">
	<?php
$catName = "about";
$argsd = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> -1,
	//'category_name' 	=> $catName,
	'name' 	=> 'my-web-portfolio',
	'order'             => 'ASC',
	'orderby'			=> 'title',
	'post_status' 		=> 'publish',
);
$my_posts = get_posts($argsd);
foreach($my_posts as $p) { ?>			
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-8">
			    	<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			        <?php echo apply_filters('the_content', $p->post_content); ?>
			    </div>
			    <div class="col-lg-4 hidden-xs hidden-sm">
			       <?php
			       $image = get_field('image_right',$p->ID);
			       
			       if( !empty($image) ){
			       // vars
			       $url = $image['url'];
			       $title = $image['title'];
			       $alt = $image['alt'];
			       $caption = $image['caption'];
			       
			       // thumbnail
			       $size = 'homepage-thumb-land';
			       $thumb = $image['sizes'][ $size ];
			       $width = $image['sizes'][ $size . '-width' ];
			       $height = $image['sizes'][ $size . '-height' ];
			        //Advanced Custom Fieldset - Featurette
				        if(get_field('image_right',$p->ID)) { ?>
				           <a  href="<?php echo $url; ?>" title="<?php echo $title; ?>"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"  class="catimg img-responsive"/></a>
				        
				        <?php }  ?>
			        <?php }  ?>
			    </div>
			</div>
		</div>
		<?php 
// 		echo '<pre>';
// 		echo print_r($p);
// 		echo '<pre>';
		?>

<?php } ?>
	
<?php wp_reset_postdata(); ?>	
</section>
<section class="container-fluid">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h2>Past and Present Web Projects</h2>
		</div>
	</div>
</section>
<section class="container-fluid tile-area">
<!-- <?php echo "Template: category-websites.php"?> -->
		
				<?php if ( have_posts() ) : ?>
				<div class="row flexy">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part('content', 'category', get_post_format());
						?>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part( 'no-results', 'index' ); ?>
				<?php endif; ?>
				</div>
				
<!-- 		<div id="primary" class="content-area"></div> -->
		<?php upbootwp_content_nav('nav-below'); ?>
</section><!-- .container -->
<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
<section class="container-fluid tag-cta">
	<h2>Popular Tags</h2>
	<ul class="mp-tags">
		<li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
	</ul>
</section>
<?php endif; ?>
<?php get_footer(); ?>