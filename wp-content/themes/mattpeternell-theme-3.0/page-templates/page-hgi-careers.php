<?php
/**
 * Template Name: Page - HGI Careers
 * The template used for displaying page content in page.php
 *
 * @author revised code: mPETERnell.com - original code:Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="container sub_page">
	<div class="row">
		<div class="col-md-12 col-lg-12">	
			<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
			<?php the_post_thumbnail( 'careers-featured', array( 'class' => 'single-featured' )); ?>
			<header class="entry-header page-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
				<?php
					wp_link_pages(array(
						'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
						'after'  => '</div>',
					));
				?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<div class=""><span class="edit-link">', '</span></div>' ); ?>
			</footer>
		</div><!-- .col-md-12 -->
	</div><!-- .row -->
	<div class="row" style="margin-bottom: 50px;">
        <div class="col-md-12">
        <?php 
       // $out = get_taxonomies(  ); 
       // print_r($out); 
        $args = array(
            'post_type' => 'careers',
            /** Category slug, needs to be dynamic from widget selection **/
           
            
        );
        
        $the_query = new WP_Query( $args ); 
        // echo "<pre>";
        // print_r($the_query);
        // echo "</pre>";
        ?>
       
        <?php if ( $the_query->have_posts() ) : ?>
            <style>
            .xyz {
                    font-weight: bold;
                    margin-bottom: 10px;
                    text-align: left;
                    text-decoration: underline;
                   }
            </style>
            <!-- pagination here -->
            <div class="row">
                <div class="col-md-2 xyz" >Division</div>
                <div class="col-md-6 xyz">Job</div>
                <div class="col-md-2 xyz">Location</div>
                <div class="col-md-2 xyz">Date</div>
            </div>
            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                    <div class="col-md-2">
<?php
$terms = get_the_terms($the_query->ID, 'careers');
echo '';
foreach ($terms as $taxindex => $taxitem) {
    ?>
<?php echo $taxitem->name; ?>

<?php
}
echo ''
?>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="col-md-2">
                        <?php the_tags(); ?>
                    </div>
                    <div class="col-md-2">
                       <?php echo $post_date = get_the_date('m/d/Y'); ?>
                    </div>
                    
                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->
        
            <!-- pagination here -->
        
            <?php wp_reset_postdata(); ?>
        
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        </div>
	</div>
	<div class="row">
	
	</div>
	<div class="row">
		<?php /* Global footer sidebar */ if ( ! is_404() ) : ?>
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
