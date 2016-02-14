<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
<!-- Content-category.php -->

	<div class="tiles">
		<article id="post-<?php the_ID(); ?>" <?php post_class('panel panel-default'); ?>>
				<h1 class="panel-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="slide-txt">
					<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="lead">', '</p>');?>
				</div>
				
			<?php 
	// 			if(get_field('text_left')){
	// 				echo get_field('text_left');
	// 			}
			?>
		<?php if ( is_search() || is_home() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php //the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php //the_excerpt(); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	
		<footer class="entry-meta slide-txt">
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
			</div>	
			<div class="edit-link ">
			<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit', 'upbootwp' ), '', '' ); ?>
			</div>
			
		</footer><!-- .entry-meta -->	
		<?php 

$image = get_field('single_post_image');

if( !empty($image) ): 
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

		if( $caption ): ?>
		<div class="wp-caption">
		<?php endif; ?>
	
		<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"  class="img-responsive right-col-img"/></a>
			<?php if( $caption ): ?>
			<div class="wp-caption-text"><?php echo $caption; ?></div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php //the_post_thumbnail('homepage-thumb-port', array( 'class' => 'img-responsive' )); ?>
		<?php 
		if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>">
		<?php 
		//the_post_thumbnail('thumbnail');
		//the_post_thumbnail('homepage-thumb');
		the_post_thumbnail('web-thumb-4x6',  array( 'class' => 'img-responsive' ) );
		?>
		</a><?php 
		}
		?>

		</article>
	</div>
