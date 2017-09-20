<script type = "text/html" id="socialTemplate">

    <% _.each(options, function(item,key,list){ %>
    <% _.each( item.acf.social_links, function(social) { %>
    <li class="social-link-item">  
        <a href="http://<%= social.social_icon_url %>" title="<%= social.social_title %>" target="_blank">
            <i class="fa <%= social.social_icon %>" aria-hidden="true"></i>    
        </a>
    </li>
    <% }); %>
    <% }); %>
</script>
<ul id="socialLinks" class="social-list"></ul>

