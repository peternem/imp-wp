<script type = "text/html" id="print-wp">
    <header class="entry-header">
        <h1 style="text-align: center;">Recent Print</h1>
        <!--<h3 style="text-align: center;">Here are a few of the project I recently have worked on.</h3>-->
    </header>

    <div class="slidetile-area flexy">
        <% _.each(data_print, function(item,key,list){ %>
        <div id="post-<%= item.id %>" class="home-tiles-2 post">
            <div class="panel">
                <div class="panel-body">
                    <div class="tile-col-1">
                        <img src="<%= item.featured_image_web_thumb %>" class="wp-image"/>
                    </div>
                    <div class="tile-col-2">
                        <div class="panel-heading">
                            <h1 class="panel-title"><a href="<%= item.link %>" title="<%= item.title.rendered %>"><%= item.title.rendered %></a></h1>
                        </div>
                         <p><%= item.kia_subtitle %></p>
                        <% if ( item.cpt_tag ) { %>
                        <ul class="tag-list">
                            <% _.each(  item.cpt_tag, function( tag ) { %>
                            <li><a href="/tag/<%= tag.slug %>"><%= tag.name %></a></li>
                            <% } ); %>
                        </ul>
                        <% } %>
                        <a class="c-call-to-action c-glyph" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
                            <span>Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <% }); %>
    </div>
    <ul class="see-more-link align-center">
        <li><a class="btn btn-light" id="btn-signin" role="button" title="Web Portfolio" id="scEvent" href="/print-portfolio">More Work <i class="fa fa-angle-double-right"></i></a></li>
    </ul>
</script>
<section id="recentPrint-page"  class="my-container pages"></section>


