<script type = "text/html" id="keyPointsTemplate" data-git="MyGitTest">
    <div class="my-inner-container">
        <div class="mp-row row">
            <% _.each(options, function(item,key,list){ %>
            <% _.each( item.acf.cta_repeater, function( xyz ) { %>
            <div class="column-4">
                <% if ( xyz.cta_icon ) { %>
                <div class="icon">
                    <i class="fa <%= xyz.cta_icon %>"aria-hidden="true"></i>
                </div>
                <% } %>
                <% if ( xyz.cta_title ) { %>
                <h3 class="content-box-heading"><%= xyz.cta_title %></h3>
                <% } %>
                <% if ( xyz.cta_excerpt ) { %>
                <div class="content-container">
                    <%= xyz.cta_excerpt %>
                </div>
                <% } %>
                <% if ( xyz.cta_link ) { %>
                <a href="<%= xyz.cta_link %>"><%= xyz.cta_link_label %> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                <% } %>
            </div>    
            <% }); %>

            <% }); %>
        </div>
    </div>
</script>
<section id="keyPoints" class="three-col-cta black"></section>


