<h3>Project Description:</h3>
<div class="entry-content"><?php the_content(); ?></div>
<?php
$portfolio_description = get_field("portfolio_description");
if ($portfolio_description) {
    echo '<div class="port_desc">' . $portfolio_description . '</div>';
}
?>
<h3 class="entry-content-header">Project Details:</h3>
<?php
$website_url = get_field("website_url");
if ($website_url) {
    echo '<div class="port_web_url"><strong>Web URL:</strong> <a href="' . $website_url . '" target="_blank">' . $website_url . '</a></div>';
}

$port_web_developement = get_field("port_web_developement");
if ($port_web_developement) {
    echo '<div class="port_web_dev"><strong>Web Developement:</strong> ' . $port_web_developement . '</a></div>';
}

$port_site_design = get_field("port_site_design");
if ($port_site_design) {
    echo '<div class="port_web_des"><strong>Web Design:</strong> <a href="' . $port_site_design . '" target="_blank">' . $port_site_design . '</a></div>';
}
?>
<?php
wp_link_pages(array(
    'before' => '<div class="page-links">' . __('Pages:', 'impTheme'),
    'after' => '</div>',
));
?>

<footer class="entry-meta ">
    <?php
    /* translators: used between list items, there is a space after the comma */
    $category_list = get_the_category_list(__(', ', 'impTheme'));
    /* translators: used between list items, there is a space after the comma */
    $tag_list = get_the_tag_list('', __(', ', 'impTheme'));
    if (!impTheme_categorized_blog()) {
        // This blog only has 1 category so we just need to worry about tags in the meta text
        if ('' != $tag_list) {
            $meta_text = __('<p class="tags">This website utilizes the following web technologies:<br/>%2$s</p>', 'impTheme');
            //$meta_text = __( '<p>This website utilizes the following web technologies: %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme' );
        } else {
            $meta_text = __('<p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme');
        }
    } else {
        // But this blog has loads of categories so we should probably display them here
        if ('' != $tag_list) {
            $meta_text = __('<p><strong>Posted in:</strong> %1$s </p> <p class="tags"><strong>Web Technologies Utilized:</strong><br/>%2$s</p >', 'impTheme');
            //$meta_text = __( '<p>This entry was posted in:<br/>%1$s </p> <p class="tags">This website utilizes the following web technologies:<br/>%2$s</p ><p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme' );
        } else {
            $meta_text = __('<p>This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'impTheme');
        }
    } // end check for categories on this blog
    printf(
            $meta_text, $category_list, $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
    ?>
<?php

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

//			if ( '' !== get_the_author_meta( 'description' ) ) {
//				get_template_part( 'template-parts/biography' );
//			}
                        
//                        impTheme_posted_on();
		?>

    <?php edit_post_link(__('<i class="fa fa-pencil-square-o"></i> Edit ', 'impTheme'), '', ''); ?>
</footer><!-- .entry-meta -->	