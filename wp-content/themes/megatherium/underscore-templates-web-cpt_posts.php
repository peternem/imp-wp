
<script type = "text/html" id="webCptTemplate">
    <% var my_cpt_post_id = settings.queriedObject.ID; 
    console.log(my_cpt_post_id); %>
    <% _.each(data, function(item,key,list){ %>
    <% if (item.id === my_cpt_post_id) { %>
    <article id="post-<%= item.id %>" class="post my-inner-container">
        <div class="mp-row row">
            <div class="column-8">
                <header class="entry-header">
                    <h1 class="entry-title"><a href="<%= item.link %>" title="<%= item.title.rendered %>"> <%= item.title.rendered %></a>   </h1>
                    <% if ( item.kia_subtitle ) { %>
                    <h2><%= item.kia_subtitle %></h2>
                    <% } %>
                </header>
                <% if ( item.content.rendered ) { %>
                <h3>Project Description:</h3>
                <%= item.content.rendered %>
                <% } %>
                <h3 class="entry-content-header">Project Details:</h3>
                <% if ( item.fields.portfolio_description ) { %>
                <div class="port_web_url"><strong>Web URL:</strong> <a href="<%= item.acf.website_url %>" target="_blank"><%= item.acf.website_url %></a></div>
                <% } %>
                <% if ( item.fields.port_web_developement ) { %>
                <div class="port_web_dev"><strong>Web Developement:</strong> <%= item.fields.port_web_developement %></a></div>
                <% } %>
                <% if ( item.fields.port_site_design ) { %>
                <div class="port_web_des"><strong>Web Design:</strong> <a href="<%= item.acf.port_site_design %>" target="_blank"><%= item.acf.port_site_design %></a></div>
                <% } %>
                <footer class="entry-meta ">
                    <p><strong>Posted in:</strong></p>
                    <ul class="tag-list single-posts">
                        <% _.each(item.cpt_category, function(item,key,list){ %>
                        <li><a href="tag/<%= item.slug %>"><%= item.cat_name %></a></li>
                        <% }); %>
                    </ul>
                    <p><strong>Web Technologies Utilized:</strong></p>
                    <ul class="tag-list single-posts">
                        <% _.each(item.cpt_tag, function(item,key,list){ %>
                        <li><a href="tag/<%= item.slug %>"><%= item.name %></a></li>
                        <% }); %>
                    </ul>
                </footer>

                <!-- <footer class="entry-footer"></footer> -->
            </div><!-- .entry-content -->
            <div class="column-4 entry-imaget">
                <ul id="webCarousel" class="bxslider">
                    <% if (item.acf.port_image_one) { %>
                    <li class="slide">
                        <img src="<%= item.acf.port_image_one.url %>" alt="<%= item.acf.port_image_one.alt %>"  class="img-responsive right-col-img"/>
                         <% if (item.acf.port_image_one.caption) { %><div class="wp-caption-text"><%= item.acf.port_image_one.caption %></div><% } %>
                    </li>
                    <% } %>
                    <% if (item.acf.port_image_two) { %>
                    <li class="slide">
                        <img src="<%= item.acf.port_image_two.url %>" alt="<%= item.acf.port_image_two.alt %>"  class="img-responsive right-col-img"/>
                         <% if (item.acf.port_image_two.caption) { %><div class="wp-caption-text"><%= item.acf.port_image_two.caption %></div><% } %>
                    </li>
                    <% } %>
                    <% if (item.acf.port_image_three) { %>
                    <li class="slide">
                        <img src="<%= item.acf.port_image_three.url %>" alt="<%= item.acf.port_image_three.alt %>"  class="img-responsive right-col-img"/>
                         <% if (item.acf.port_image_three.caption) { %><div class="wp-caption-text"><%= item.acf.port_image_three.caption %></div><% } %>
                    </li>
                    <% } %>
                    <% if (item.acf.port_image_four) { %>
                    <li class="slide">
                        <img src="<%= item.acf.port_image_four.url %>" alt="<%= item.acf.port_image_four.alt %>"  class="img-responsive right-col-img"/>
                         <% if (item.acf.port_image_four.caption) { %><div class="wp-caption-text"><%= item.acf.port_image_four.caption %></div><% } %>
                    </li>
                    <% } %>
                </ul>
                
            </div>
        </div>
    </article>
    <% } %>
    <% }); %>
</script>
<div id="webCptContent" class="my-container black"></div>
<ul id="slidebx">
    <li>Slide 1 Content</li>
    <li>Slide 2 Content</li>
    <li>Slide 3 Content</li>
</ul>

