<script type = "text/html" id="skillTemplate">
    <% _.each(data_posts, function(item,key,list){ %>
    <% if (item.slug === "my-skillset") { %>
    <article id="post-<%= item.id %>" class="post my-inner-container">
        <div class="mp-row row">
        <div class="column-8">
            <header class="entry-header">
                <h1 class="entry-title"><a href="<%= item.link %>" title="<%= item.title.rendered %>"> <%= item.title.rendered %></a>   </h1>
                <% if ( item.kia_subtitle ) { %>
                <h2><%= item.kia_subtitle %></h2>
                <% } %>
            </header>
            <%= item.content.rendered %>
                   <!-- <footer class="entry-footer"></footer> -->
        </div><!-- .entry-content -->
        <div class="column-4 entry-imaget">
            <img src="<%= item.featured_image_web_thumb %>" class="wp-image"/>
        </div>
        </div>
    </article>
    <% } %>
    <% }); %>
</script>
