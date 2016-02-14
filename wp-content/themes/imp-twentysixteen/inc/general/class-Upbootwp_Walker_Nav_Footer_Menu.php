<?php 

class Footernav_Walker extends Walker_Nav_Menu
{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	function start_el(&$output, $item, $depth, $args)
	{
		if ( ! empty ($item->title) ) {
			$classes     = empty ( $item->classes ) ? array () : (array) $item->classes;
			$class_names = join(
					' '
					,   apply_filters(
							'nav_menu_css_class'
							,   array_filter( $classes ), $item
					)
			);
			! empty ( $class_names )
			and $class_names = '';
			$attributes  = '';
			! empty( $item->attr_title )
			and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
			! empty( $item->target )
			and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
			! empty( $item->xfn )
			and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
			! empty( $item->url )
			and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
			$title =
			apply_filters( 'the_title', $item->title, $item->ID );
			$item_output = $args->before;
			// the following if... statement basically ignores the first menu item
			// (so we don't start the list with a pipe):
			if($item->menu_order>=2) {
			$item_output .= ' '; }
					$item_output .= "<li><a $attributes>"
					. $args->link_before
					. $title
					. '</a>'
					. $args->link_after
					. $args->after;
					// Since $output is called by reference we don't need to return anything.
					$output .= apply_filters(
					'walker_nav_menu_start_el'
					,   $item_output
        ,   $item
        ,   $depth
        ,   $args
					);
		}
	}
	}


?>