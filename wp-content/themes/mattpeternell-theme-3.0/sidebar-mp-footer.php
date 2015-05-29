<?php /* Global footer sidebar */ ?>
	<?php if ( ! is_404() ) : ?>
	<div class="mp-row row">
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
	</div>
	<?php endif; ?>