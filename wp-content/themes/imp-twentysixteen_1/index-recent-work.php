<?php
$catName = "recent-work";
$argsd = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> -1,
	'name' 	=> 'recent-work',
);
$my_posts = get_posts($argsd);
foreach($my_posts as $p) { 
	if ($p->post_name == $catName ) { ?>
	<section id="RecentWork" class="parallax-container white opacity" data-natural-height="1406" data-natural-width="2500" data-image-src="<?php echo $feat_image = wp_get_attachment_url( get_post_thumbnail_id($p->ID) ); ?>" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 611px;">
		<div class="title-desc-inner">
			<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			<?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
	<?php } ?>
<?php } ?>
<?php wp_reset_postdata(); ?>
<div class="slidetile-area row flexy">
<?php $catName =  get_cat_ID("websites");
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             
            $args = array( 
                'post_type' => 'post',
                'posts_per_page' =>4,
                'paged' => $paged,
                'orderby' => 'post_date',
                'order' => 'date' ,
                'cat' => $catName,
                //'category__and' => array( 5, 7 ),
                'post_status' => 'publish',
            );
            $wp_query = new WP_Query($args);
        
            while ( have_posts() ) : the_post(); ?>
        <div class="tiles">
            <div class="panel panel-default">
            	<div class="panel-heading">
					<h1 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</div>
				<div class="panel-body">
                        <?php if( function_exists( 'the_subtitle' ) ) the_subtitle( '<div class="slide-txt"><p class="lead">', '</p></div>' ); ?>
                        <?php //the_excerpt(); ?>
                        
                        <?php 
                        if ( has_post_thumbnail() ) {
                            ?>
                            
                            <a href="<?php the_permalink(); ?>">
                            <?php 
                            //the_post_thumbnail('thumbnail');
                            the_post_thumbnail('homepage-thumb');
                            ?>
                            </a><?php 
                        }
                        ?>
                        <!--<p><a class="btn btn-primary btn-xs" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">View details »</a></p>  -->
				</div>
            </div>
        </div>
<?php endwhile; ?>
</div>
<ul class="see-more-link">
		<li><a class="btn btn-primary" role="button" title="Web Portfolio" id="scEvent" href="/category/websites/">See More <i class="fa fa-angle-double-right"></i>
		</a></li>
</ul>
	</div>
</section>