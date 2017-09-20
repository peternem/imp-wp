<section id="recentWork-page"  class="my-container">

    <script type = "text/html" id="recentWebPort">
        <div class="post my-inner-container">
            <header class="row section-header">
                <h2 class="section-title">Recent Web Projects</h2>
            </header>
            <div class="slidetile-area flexy">
                <% _.each(data_portfolio_recent, function(item, key, list){ %>
                <div id="post-<%= item.id %>" class="home-tiles-2 post">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="tile-col-1">
                                <a href="<%= item.link %>" title="<%= item.title.rendered %>" class="slide-img" ><img src="<%= item.featured_image_web_thumb %>" class="wp-image"/></a>
                            </div>
                            <div class="tile-col-2">
                                <div class="panel-heading">
                                    <h1 class="panel-title"><a href="<%= item.link %>" title="<%= item.title.rendered %>"><%= item.title.rendered %></a></h1>
                                </div>
                                <p class="lead"><%= item.kia_subtitle %></p>                       
                                <% if ( item.cpt_tag ) { %>
                                <ul class="tag-list">
                                    <% _.each( item.cpt_tag, function( tag ) { %>
                                    <li><a href="/tag/<%= tag.slug %>"><%= tag.name %></a></li>
                                    <% } ); %>
                                </ul>
                                <% } %>
                                <a class="c-call-to-action c-glyph" href="<%= item.link %>" id="post-<?php the_ID(); ?>">
                                    <span>Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <% }); %>
            </div>
            <!--    <ul class="see-more-link align-center">
                    <li><a class="btn btn-light" role="button" title="Web Portfolio" id="scEvent" href="#web-portfolio">More Work <i class="fa fa-angle-double-right"></i></a></li>
                </ul>-->
        </div>
    </script>
    <section id="recentWork-rec"  class="my-container"></section>
</section>


