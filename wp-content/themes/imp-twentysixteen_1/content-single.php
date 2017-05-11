<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
<div class="container-fluid white">
<article id="post-<?php the_ID(); ?>" <?php post_class('mp-row row page-content'); ?>>
	<div class="col-sm-7 col-md-7">
		<div class="entry-content">
			<?php the_content(); ?>
	            <?php
	            wp_link_pages( array(
	                'before' => '<div class="page-links">' . __( 'Pages:', 'upbootwp' ),
	                'after'  => '</div>',
	            ));
	            ?>
				<?php get_template_part( 'inc/content-single-entrymeta' ); ?>
		</div>
	</div>
	<div class="col-sm-5 col-md-5 xx">
		<?php 

$image = get_field('image_right');

if( !empty($image) ): 
	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'homepage-thumb-port';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	if( $caption ): ?>

		<div class="wp-caption">

	<?php endif; ?>

	<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">

		<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"  class="img-responsive right-col-img"/>

	</a>

	<?php if( $caption ): ?>

			<div class="wp-caption-text"><?php echo $caption; ?></div>

		</div>

	<?php endif; ?>

<?php endif; ?>
	</div>
</article><!-- #post-## -->
</div>
<?php
/* Restore original Post Data */
wp_reset_postdata();

?>