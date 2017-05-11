<footer class="entry-meta ">
	<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'impTheme' ) );			
		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'impTheme' ) );
		if ( ! impTheme_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = __( '<p class="tags">This website utilizes the following web technologies:<br/>%2$s</p>', 'impTheme' );
				//$meta_text = __( '<p>This website utilizes the following web technologies: %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme' );
			} else {
				$meta_text = __( '<p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme' );
			}
		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( '<p>This entry was posted in:<br/>%1$s </p> <p class="tags">This website utilizes the following web technologies:<br/>%2$s</p >', 'impTheme' );
				//$meta_text = __( '<p>This entry was posted in:<br/>%1$s </p> <p class="tags">This website utilizes the following web technologies:<br/>%2$s</p ><p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme' );
			} else {
				$meta_text = __( '<p>This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme' );
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
		<p><a class="btn btn-default" href="<?php echo get_field('website_url'); ?>" title="View <?php echo get_field('website_url'); ?>" target="_blank" role="button">View Website &raquo;</a></p>
		<?php } ?>
		<?php //impTheme_posted_on(); ?>
	
		<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit ', 'impTheme' ), '', '' ); ?>
	</footer><!-- .entry-meta -->	