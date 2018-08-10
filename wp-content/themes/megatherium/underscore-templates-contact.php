<script type = "text/html" id="contactTemplate">
    <div class="breadcrumb-container">
        <ol class="breadcrumb">
            <li><a href="/" title=="home">Home</a><i class="fa fa-angle-double-right"></i></li>
            <li>Contact</li>
        </ol>
    </div>

    <% _.each(data_posts, function(item,key,list){ %>
    <% if (item.slug == "contact") { %>
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
<section id="contact-page" class="my-container black pages"></section>
