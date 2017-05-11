<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package megatherium
 */

if (! is_active_sidebar('sidebar-1')) {
    return;
}
?>

<div id="secondary" class="column-4 widget-area" role="complementary">
	<?php dynamic_sidebar('sidebar-1'); ?>
</div><!-- #secondary -->
