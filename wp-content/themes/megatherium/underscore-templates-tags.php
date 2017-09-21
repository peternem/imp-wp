<script type = "text/html" id="tagsTemplate">
    <% 
    var sortTagsObject = _.object( _.pluck(data_tags, 'name'), data_tags);
    var sortTags = _.sortBy(sortTagsObject, function( item ) { return -item.count; });
    var tag_style = "";
    //console.log(sortTags);
    %> 
    <div class='tag-cloud'>
        <h1 class="align-center">Popular Tags</h1>
        <ul class="mp-tags">
             <li>
            <% _.each(sortTagsObject    , function(item,key,list){ %>
               <% if ( item.count >0 ) { %>
                    <% 
                    if ( item.count <= 3 ) { 
                        tag_style = "tagsize-xs";
                    } 
                    if ( item.count >= 4 && item.count <= 9 ) {
                        tag_style = "tagsize-sm";
                    }
                    if ( item.count >= 10 && item.count <= 14 ) {
                        tag_style = "tagsize-md";
                    }
                    if ( item.count >= 15 && item.count <= 19 ) {
                        tag_style = "tagsize-lg";
                    }
                    if ( item.count >= 20 && item.count <= 24 ) {
                        tag_style = "tagsize-xl";
                    } 
                     if ( item.count >= 25 ) {
                        tag_style = "tagsize-xl";
                    } 
                    %>
                <a href="<%= item.link %>" title="<%= item.count %> items tagged <%= item.name %>" class="<%= tag_style %>"><%= item.name %></a>
                <% } %>
               
            <% } ); %>
             </li>
        </ul> 
    </div>
</script>
<div id="tagList" class=" black"></div>