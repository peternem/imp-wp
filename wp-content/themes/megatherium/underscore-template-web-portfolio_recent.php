<section id="recentWork-page"  class="my-container">

    <script type = "text/html" id="recentWebPort">
        <div class="post my-inner-container">
            <header class="row section-header">
                <h1 class="section-title">Recent Web Projects</h1>
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
                            </div>
                        </div>
                    </div>
                </div>
                <% }); %>
            </div>
            <ul class="see-more-link align-center">
                <li><a class="btn btn-light" role="button" title="Web Portfolio" id="scEvent" href="#recentWork">More Work <i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </script>
    <section id="recentWork-rec"  class="my-container"></section>
</section>


