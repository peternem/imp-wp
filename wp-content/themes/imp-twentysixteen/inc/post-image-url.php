<?php

/* 
 * Post Attachment image function. Image URL for CSS Background.
 */

function the_post_image_url($size = large) {
    global $post;
    $linkedimgurl = get_post_meta($post->ID, 'image_url', true);
    if ($images = get_children(array(
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'numberposts' => 1,
        'post_mime_type' => 'image',))) {
        foreach ($images as $image) {
            $attachmenturl = wp_get_attachment_image_src($image->ID, $size);
            $attachmenturl = $attachmenturl[0];
            $attachmentimage = wp_get_attachment_image($image->ID, $size);
            echo '' . $attachmenturl . '';
        }
    } elseif ($linkedimgurl) {
        echo $linkedimgurl;
    } elseif ($linkedimgurl && $images = get_children(array(
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'numberposts' => 1,
        'post_mime_type' => 'image',))) {
        foreach ($images as $image) {
            $attachmenturl = wp_get_attachment_image_src($image->ID, $size);
            $attachmenturl = $attachmenturl[0];
            $attachmentimage = wp_get_attachment_image($image->ID, $size);
            echo '' . $attachmenturl . '';
        }
    } else {
        echo '' . get_template_directory_uri() . '/img/no-attachment.gif';
    }
}

// Post Attachment image function. Direct link to file.
function the_post_image($size = thumbnail) {
    global $post;
    $linkedimgtag = get_post_meta($post->ID, 'image_tag', true);
    if ($images = get_children(array(
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'numberposts' => 1,
        'post_mime_type' => 'image',))) {
        foreach ($images as $image) {
            $attachmenturl = wp_get_attachment_url($image->ID);
            $attachmentimage = wp_get_attachment_image($image->ID, $size);
            echo '' . $attachmentimage . '';
        }
    } elseif ($linkedimgtag) {
        echo $linkedimgtag;
    } elseif ($linkedimgtag && $images = get_children(array(
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'numberposts' => 1,
        'post_mime_type' => 'image',))) {
        foreach ($images as $image) {
            $attachmenturl = wp_get_attachment_url($image->ID);
            $attachmentimage = wp_get_attachment_image($image->ID, $size);
            echo '' . $attachmentimage . '';
        }
    } else {
        echo '<img src="' . get_template_directory_uri() . '/img/no-attachment-large.gif" />';
    }
}
