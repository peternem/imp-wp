<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="col-md-12 col-lg-12">
			<header class="entry-header  page-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
			</header><!-- .entry-header -->
		</div>
		<div class="col-md-12">
			
			<footer class="entry-meta ">
			
				<?php upbootwp_posted_on(); ?>
			
				<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<div class="btn-group" role="group" ><div class="btn btn-success">', '</div></div>' ); ?>
			</footer><!-- .entry-meta -->	
		</div>


	<div class="col-md-12">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'upbootwp' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article><!-- #post-## -->
