<script type = "text/html" id="welcomeTemplate">
    <% _.each(data_posts, function(item,key,list){ %>
    <% if (item.slug == "full-service-web-developer") { %>
    <article id="post-<%= item.id %>" class="post">
        <header class="entry-header">
            <h1 class="entry-title"> <%= item.title.rendered %></h1>
            <% if ( item.kia_subtitle ) { %>
            <h2 class="subtitle"><%= item.kia_subtitle %></h2>
            <% } %>
        </header>
        <%= item.content.rendered %>
        <!-- <footer class="entry-footer"></footer> -->
    </article><!-- .entry-content -->
    <% } %>
    <% }); %>
</script>
<!-- <div id="welcome" class=""></div> -->
