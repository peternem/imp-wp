<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

get_header(); ?>
	<section id="recentPrint" class="container-fluid white cat-arch">
		<div class="row">
			<header class="col-md-12">
				<h1 class="page-title text-center"><?php _e( 'Oops! That page can&rsquo;t be found.', 'upbootwp' ); ?></h1>
			</header><!-- .page-header -->
		</div><!-- .row -->
	</section>
	<section class="container-fluid white cat-arch error-404 tile-area">
		<div id="primary" class="content-area">
					
					<div class="page-content row">
						<div class="col-md-12 text-center">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'upbootwp' ); ?></p>
						</div>
						<div class="col-md-12 text-center">
							<?php get_search_form(); ?>
						</div>
						<div class="col-md-12 text-center">
							<?php //the_widget( 'WP_Widget_Recent_Posts' ); ?>
						</div>
						<div class="col-md-12 text-center">
							<?php if ( upbootwp_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
						</div>
						<div class="widget widget_categories col-md-12 text-center">
							<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'upbootwp' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->
						<?php endif; ?>
						<div class="col-md-12 text-center">
							<?php
							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'upbootwp' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
							?>
						</div>
						
					</div><!-- .page-content -->
		</div><!-- #primary -->
	</section><!-- .container -->
	<section class="container-fluid tag-cta">
		<h2>Popular Tags</h2>
		<ul class="mp-tags">
			<li><?php wp_tag_cloud( 'smallest=8&largest=22' ); ?></li>
		</ul>
	</section>
<?php get_footer(); ?>