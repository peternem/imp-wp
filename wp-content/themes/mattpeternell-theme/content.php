<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta ">
			<?php upbootwp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php 
		if(get_field('text_left')){
			echo get_field('text_left');
		}
	?>
	<?php if ( is_search() || is_home() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">

		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'upbootwp')); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'upbootwp' ),
				'after'  => '</div>',
			));
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'upbootwp' ) );
			if ( $categories_list && upbootwp_categorized_blog() ) :
		?>
		<div class="cat-links">
			<?php printf( __( '<p>Posted in: %1$s</p>', 'upbootwp' ), $categories_list ); ?>
				<?php endif; // End if categories ?>
		
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'upbootwp' ) );
					if ( $tags_list ) :
				?>
				<?php printf( __( '<p>Tagged: %1$s</p>', 'upbootwp' ), $tags_list ); ?>
			
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<div class="btn btn-primary">Leave a comment</div>', 'upbootwp' ), __( '1 Comment', 'upbootwp' ), __( '% Comments', 'upbootwp' ) ); ?>
			</div>
		<?php endif; ?>
		<div class="edit-link ">
		<?php //edit_post_link( __( 'Edit', 'upbootwp' ), '<div class="btn btn-success">', '</div>' ); ?>
		</div>
		
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
