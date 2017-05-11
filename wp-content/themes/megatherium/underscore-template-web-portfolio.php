<section id="recentWork-page"  class="my-container pages">
    <script type = "text/html" id="temp-wp1">
        <% _.each(data_posts, function(item,key,list){ %>
        <% if (item.slug == "my-web-portfolio") { %>
        <article id="post-<%= item.id %>" class="post my-inner-container">
            <div class="mp-row row">
                <div class="column-8 margin-bottom-50">
                    <header class="entry-header">
                        <h1 class="entry-title"> <%= item.title.rendered %></h1>
                        <% if ( item.kia_subtitle ) { %>
                        <h2 class="subtitle"><%= item.kia_subtitle %></h2>
                        <% } %>
                    </header>
                    <%= item.content.rendered %>
                </div>
                <div class="column-4 entry-image">
                    <img src="<%= item.featured_image_web_thumb %>" class="wp-image"/>
                </div>
            </div>
            <!-- <footer class="entry-footer"></footer> -->
        </article><!-- .entry-content -->
        <% } %>
        <% }); %>
    </script>

    <script type = "text/html" id="temp-wp">
        <header class="row section-header">
            <h2 class="section-title">Past and Present Web Projects</h2>
        </header>
        <div class="slidetile-area flexy">
            <% _.each(events, function(item,key,list){ %>
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
        <!--    <ul class="see-more-link align-center">
                <li><a class="btn btn-light" role="button" title="Web Portfolio" id="scEvent" href="#web-portfolio">More Work <i class="fa fa-angle-double-right"></i></a></li>
            </ul>-->
    </script>
    <section id="recentWorkInto" class="my-container black "></section>
    <section id="recentWork-page1"  class="my-container"></section>
</section>


