<script type = "text/html" id="heroTemplate">
    <% _.each(data_hero, function(item,key,list){ %>
    <% if (item.slug == "hero-post") { %>
    <article id="post-<%= item.id %>" class="inner-container post">
        <div class="column-8 entry-content">
            <header class="entry-header">
                <h1 class="entry-title"><a href="<%= item.link %>" title="<%= item.title.rendered %>"> <%= item.title.rendered %></a>   </h1>
            </header>

            <% if ( 'post' === item.type ) { %>
            <div class="entry-meta">
                <% postDate = new Date( item.date ); %>
                <span class="posted-on">
                    <?php esc_html_e('Posted on:', 'megatherium'); ?>
                    <time class="entry-date published">
                        <% print( ( postDate.getMonth() + 1 ) + '/' + postDate.getDate() + '/' + postDate.getFullYear() ); %>
                    </time>
                </span>

                <span class="byline">
                    <?php esc_html_e('by', 'megatherium'); ?>
                    <span class="author vcard">
                        <a class="url fn n" href="#">
                            <%= item.author_meta.nickname %>
                        </a>
                    </span>
                </span>
            </div>
            <% } %>
            <%= item.excerpt.rendered %>
            <footer class="entry-footer">
                <% if ( 'post' === item.type ) { %>
                <% if ( item.category_names ) { %>
                <span class="cat-links">
                    <?php esc_html_e('Posted in', 'megatherium'); ?>
                    <% _.each( item.category_names, function( category ) { %>
                    <a href="<%= category.link %>"><%= category %></a>
                    <% } ); %>
                </span>
                <% } %>
                <span> | </span>
                <% if ( item.tag_names ) { %>
                <span class="tags-links">Tags: 
                    <% _.each(  item.tag_names, function( tag ) { %>
                    <a href="<%= tag.link %>"><%= tag %></a>
                    <% } ); %>
                </span>
                <% } %>
                <% } %>
            </footer><!-- .entry-footer -->
        </div><!-- .entry-content -->
        <div class="column-4 entry-imaget">
            <img src="<%= item.featured_image_src %>" class="wp-image"/>
        </div>

    </article>
    <% } %>
    <% }); %>
</script>
<section id="hero" class="container"></section>


