<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @author Matthias Thom | http://upplex.de
 * @package impTheme 1.0
 */

if ( ! function_exists( 'impTheme_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own impTheme_entry_meta() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function impTheme_entry_meta() {
	if (in_array(get_post_type(), array('post', 'web_portfolio'))) {
		$author_avatar_size = apply_filters( 'impTheme_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'impTheme' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment', 'web_portfolio' ) ) ) {
		impTheme_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'twentysixteen' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment', 'web_portfolio' ) ) ) {
		impTheme_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentysixteen' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'impTheme_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own impTheme_entry_date() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function impTheme_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'twentysixteen' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'impTheme_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own impTheme_entry_taxonomies() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function impTheme_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $categories_list && impTheme_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'twentysixteen' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'twentysixteen' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'impTheme_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own impTheme_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function impTheme_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'impTheme_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own impTheme_excerpt() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function impTheme_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'impTheme_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own impTheme_excerpt_more() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function impTheme_excerpt_more() {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'impTheme_excerpt_more' );
endif;

if ( ! function_exists( 'impTheme_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own impTheme_categorized_blog() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function impTheme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'impTheme_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'impTheme_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so impTheme_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so impTheme_categorized_blog should return false.
		return false;
	}
}
endif;

/**
 * Flushes out the transients used in impTheme_categorized_blog().
 *
 * @since Twenty Sixteen 1.0
 */
function impTheme_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'impTheme_categories' );
}
add_action( 'edit_category', 'impTheme_category_transient_flusher' );
add_action( 'save_post',     'impTheme_category_transient_flusher' );

if ( ! function_exists( 'impTheme_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Twenty Sixteen 1.2
 */
function impTheme_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


























if (!function_exists( 'impTheme_content_nav')):
/**
 * Display navigation to next/previous pages when applicable
 */
function impTheme_content_nav($nav_id) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="row <?php echo $nav_class; ?>">
			<div class="col-md-12">
			    <h4 class="screen-reader-text text-center"><?php _e( 'Post navigation', 'impTheme' ); ?></h4>
			</div>
	<?php if ( is_single() ) : // navigation links for single posts ?>
			<div class="col-md-6">
				<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="fa fa-arrow-left"></i>', 'Previous post link', 'impTheme' ) . '</span> %title' ); ?>
			</div><!-- .col-md-4 -->
			<div class="col-md-6 col-nav-next">
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '<i class="fa fa-arrow-right"></i>', 'Next post link', 'impTheme' ) . '</span>' ); ?>
			</div><!-- .col-md-4 -->
	<?php elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) : // navigation links for home, archive, and search pages ?>
			<div class="col-md-6">
			
				<?php if (get_next_posts_link()) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'impTheme' ) ); ?></div>
				<?php endif; ?>
				
			</div><!-- .col-md-4 -->
			<div class="col-md-6 col-nav-next">
			
				<?php if (get_previous_posts_link()) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'impTheme' ) ); ?></div>
				<?php endif; ?>
				
			</div><!-- .col-md-4 -->
	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // impTheme_content_nav

if ( ! function_exists( 'impTheme_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function impTheme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'impTheme' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '<i class="fa fa-pencil-square-o"></i> Edit', 'impTheme' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'impTheme' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'impTheme' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( '<i class="fa fa-pencil-square-o"></i> Edit', 'impTheme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'impTheme' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for impTheme_comment()

if (!function_exists( 'impTheme_the_attached_image')) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function impTheme_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'impTheme_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'impTheme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function impTheme_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s"> %2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<span class="revise">Updated:</span><time class="updated" datetime="%3$s"> %4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted: %1$s</span><span class="byline"> By: %2$s</span>', 'impTheme' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by: %s', 'impTheme' ), get_the_author() ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function impTheme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so impTheme_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so impTheme_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in impTheme_categorized_blog
 */
//function impTheme_category_transient_flusher() {
//	// Like, beat it. Dig?
//	delete_transient( 'all_the_cool_cats' );
//}
//add_action( 'edit_category', 'impTheme_category_transient_flusher' );
//add_action( 'save_post',     'impTheme_category_transient_flusher' );
