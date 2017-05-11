<?php

/* 
 * Web Portfolio Post Type Quick Edit 
 * Add custom post type quick edit on WordPress.
 */

// Add to our admin_init function
add_filter('manage_web_portfolio_posts_columns', 'myown_add_post_columns');

function myown_add_post_columns($columns) {
    $columns['website_url'] = 'Website URL';
    return $columns;
}

// Add to our admin_init function
add_action('manage_posts_custom_column', 'myown_render_post_columns', 10, 2);

function myown_render_post_columns($column_name, $id) {
    switch ($column_name) {
        case 'website_url':
            // show my_field
            $my_fieldvalue = get_post_meta($id, 'website_url', TRUE);
            echo $my_fieldvalue;
    }
}

add_action('quick_edit_custom_box', 'myown_add_quick_edit', 10, 2);

function myown_add_quick_edit($column_name, $post_type) {
    if ($column_name != 'website_url')
        return;
    ?>
    <fieldset class="inline-edit-col-left">
        <div class="inline-edit-col">
            <span class="title">Website Url</span>
            <input id="website_url_noncename" type="hidden" name="website_url_noncename" value="" />
            <input id="pt_website_url" type="text" name="website_url" value=""/>
        </div>
    </fieldset>
    <?php
}

// Add to our admin_init function 
add_action('save_post', 'myown_save_quick_edit_data');

function myown_save_quick_edit_data($post_id) {
    // verify if this is an auto save routine.         
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // Check permissions     
    if ('website_url' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } else {
        if (!current_user_can('edit_post', $post_id))
            return $post_id;
    }
    // Authentication passed now we save the data       
    if (isset($_POST['website_url']) && ($post->post_type != 'revision')) {
        $my_fieldvalue = esc_attr($_POST['website_url']);
        if ($my_fieldvalue)
            update_post_meta($post_id, 'website_url', $my_fieldvalue);
        else
            delete_post_meta($post_id, 'website_url');
    }
    return $my_fieldvalue;
}
	
// Add to our admin_init function
add_action('admin_footer', 'myown_quick_edit_javascript');
 
function myown_quick_edit_javascript() {
    global $current_screen;
    if (($current_screen->post_type != 'web_portfolio')) return;
 
    ?>
<script type="text/javascript">
function set_website_url_value(fieldValue, nonce) {
        // refresh the quick menu properly
        inlineEditPost.revert();
        console.log(fieldValue);
        jQuery('#pt_website_url').val(fieldValue);
}
</script>
 <?php 
}
	
// Add to our admin_init function 
add_filter('post_row_actions', 'myown_expand_quick_edit_link', 10, 2);   
function myown_expand_quick_edit_link($actions, $post) {     
    global $current_screen;     
    if (($current_screen->post_type != 'web_portfolio')) {
        return $actions;
    }
    $nonce = wp_create_nonce( 'website_url_'.$post->ID);
    $myfielvalue = get_post_meta( $post->ID, 'website_url', TRUE);
    $actions['inline hide-if-no-js'] = '<a href="#" class="editinline" title="';     
    $actions['inline hide-if-no-js'] .= esc_attr( __( 'Edit this item inline' ) ) . '"';
    $actions['inline hide-if-no-js'] .= " onclick=\"set_website_url_value('{$myfielvalue}')\" >";
    $actions['inline hide-if-no-js'] .= __( 'Quick Edit' );
    $actions['inline hide-if-no-js'] .= '</a>';
    return $actions;
}