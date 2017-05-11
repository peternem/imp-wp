<?php

/* -------------------------------------- */
/* Add SVG Support to media library
  /*-------------------------------------- */

function impTheme_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'impTheme_mime_types');

// Add SVG Thumbnails to media library grid

function custom_admin_head() {
    $css = '';
    $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';
    echo '<style type="text/css">' . $css . '</style>';
}