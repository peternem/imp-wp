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
		<div class="col-md-7 col-lg-7">
			<?php
			// Advanced Custom Fieldset - Featurette
			if(get_field('text_left'))
			{
				echo get_field('text_left');
			}
			?>
			
			<footer class="entry-meta ">
			
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'upbootwp' ) );			
				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'upbootwp' ) );
				if ( ! upbootwp_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = __( '<p class="tags">This website utilizes the following web technologies:<br/>%2$s</p>', 'upbootwp' );
						//$meta_text = __( '<p>This website utilizes the following web technologies: %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'upbootwp' );
					} else {
						$meta_text = __( '<p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'upbootwp' );
					}
				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = __( '<p>This entry was posted in:<br/>%1$s </p> <p class="tags">This website utilizes the following web technologies:<br/>%2$s</p >', 'upbootwp' );
						//$meta_text = __( '<p>This entry was posted in:<br/>%1$s </p> <p class="tags">This website utilizes the following web technologies:<br/>%2$s</p ><p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'upbootwp' );
					} else {
						$meta_text = __( '<p>This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'upbootwp' );
					}
				} // end check for categories on this blog
				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink(),
					the_title_attribute( 'echo=0' )
				);
				?>
				<?php if(get_field('website_url')) { ?>
				<p><a target="_blank" href="<?php echo get_field('website_url'); ?>" title="View <?php echo get_field('website_url'); ?>">View Website &raquo;</a></p>
				<?php } ?>
				<?php //upbootwp_posted_on(); ?>
			
				<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<div class="btn-group" role="group" ><div class="btn btn-success">', '</div></div>' ); ?>
			</footer><!-- .entry-meta -->	
		</div>
		<?php
		// Advanced Custom Fieldset - Featurette
		if(get_field('image_right'))
		{
			echo '<div class="col-md-4 col-lg-4 col-md-offset-1"><img class="img-thumbnail" src="'.get_field('image_right').'"/></div>';
		}
		 
		?>


	<div class="content-area row entry-content wp">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'upbootwp' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article><!-- #post-## -->
