
<script type = "text/html" id="postContentTemplate">
    <% var my_post_id = settings.queriedObject.ID; %>
    
    <%
    var bread_path_base = "";
    var bread_path_base_page = "";
    %>

    <div class="breadcrumb-container">
        <ol class="breadcrumb">
            <li><a href="/" title=="home">Home</a><i class="fa fa-angle-double-right"></i></li>
            <% 
            bread_path_base = settings.pathInfo.path_base;
            var str_base = bread_path_base.replace(/-/g, ' ');
            %>
            <% if (settings.pathInfo.path_base && settings.pathInfo.path_base_page) { %>
            <li><a href="/<%= settings.pathInfo.path_base %>"><%= str_base %></a><i class="fa fa-angle-double-right"></i></li>
            <% } else { %>
            <li><%= str_base %></li>
            <% } %>
            <% if (settings.pathInfo.path_base_page) { %>
            <% 
            bread_path_base_page = settings.pathInfo.path_base_page; 
            var str_base_page = bread_path_base_page.replace(/-/g, ' ');
            %>
            <li><%= str_base_page %></li>
            <% } %>
            </ul>
    </div>

    <% _.each(data_single_post, function(item,key,list){ %>
    <% if (item.id === my_post_id) { %>

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
<div id="postContent" class="my-container black"></div>
