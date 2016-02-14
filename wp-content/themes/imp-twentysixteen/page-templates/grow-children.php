<?php
/**
 * Template Name: Grow - Chldren
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
 <?php if( is_page()) { ?> 
<?php get_template_part('content-featured-image'); ?>
<?php } ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<?php endwhile; // end of the loop. ?>
<?php
wp_link_pages(array(
	'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
	'after'  => '</div>',
)); ?>		
<?php 
$catName =  get_cat_ID("Children");
$pgName = 'print-portfolio';
$args = array( 
    'post_type' => 'post',
    'posts_per_page' =>12,
    'paged' => $paged,
    'orderby' => 'post_date',
    'order' => 'date' , //ASC//DESC
    'cat' => $catName,
	'category__not_in' => array( 7,9 )
	
);
        
$wp_query = new WP_Query($args);
$postx_counter = 0;                
while ( have_posts() ) : the_post(); ?>
<?php $postx_counter++;  ?>

<div class="container-fluid <?php echo $colour = ( $postx_counter %2 == 0 ) ? "grey" : "white";?>" data-post-count="<?php echo $postx_counter ?>">
    <section class="mp-row row">
        <!-- <div class="row-title col-md-12">
            <h1 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </div> -->
        
        <?php if ($postx_counter %2 == 0) { ?>
        <div class="col-md-6">
            <header class="entry-header page-header">
                <h1 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php if(function_exists('the_subtitle')) { ?>
                <p class="subtitle"><?php echo the_subtitle();?></p>
                <?php } ?> 
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
				<p>
				<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit Post', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
                </p>
            </div>
        </div>
        <div class="col-md-6">
           <?php if(get_field('image_right')){ ?>
            <a href="<?php the_permalink(); ?>"><img class="img-thumbnail" src=" <?php echo get_field('image_right');?>"/></a>
           <?php } ?>
        </div>
        
        <?php } else {  ?>
        
        <div class="col-md-6">
            <?php if(get_field('image_right')){ ?>
            <a href="<?php the_permalink(); ?>"><img class="img-thumbnail" src="<?php echo get_field('image_right'); ?>"/></a>
            <?php } ?>
        </div>   
        <div class="col-md-6">
            <header class="entry-header page-header">
                <h1 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php if(function_exists('the_subtitle')) { ?>
                <p class="subtitle"><?php echo the_subtitle();?></p>
                <?php } ?> 
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
                <div class="link-group">
					<a class="btn btn-primary" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">View details <i class="fa fa-angle-double-right"></i></a>
				</div>
				<p>
				<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit Post', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
                </p>
            </div>
        </div>         
        <?php }
   ?>

    </section>
</div>
<?php endwhile; ?>

<div class="container-fluid">
	<div class="mp-row row">
		<?php
		/* Global footer sidebar */
		if ( ! is_404() ) : ?>
			<div id="footer-widgets" class="widget-area four">
				<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-7' ); ?>
					
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-8' ); ?>
					
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-9' ); ?>
					
				<?php endif; ?>
			</div><!-- #footer-widgets -->
	<?php endif; ?>
	</div>
</div>
    <?php get_footer(); ?>



