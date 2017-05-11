<?php
/**
 * The template for displaying search forms in impTheme
 *
 * @author MattPeternell.net | http://mattpeternell.net
 * @package impTheme 1.0
 */
?>
<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-group">
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'impTheme'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _ex('Search for:', 'label', 'impTheme'); ?>">
    </div>
    <input type="submit" class="search-submit btn btn-default" value="<?php echo esc_attr_x('Search', 'submit button', 'impTheme'); ?>">
</form>
