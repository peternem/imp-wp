<script type = "text/html" id="socialTemplate">

    <% _.each(options, function(item,key,list){ %>
    <% _.each( item.acf.social_links, function(social) { %>
    <li class="social-link-item">
        <a href="http://www.<%= social.social_url %>" title="<%= social.social_title %>" target="_blank">
            <i class="fa <%= social.social_icon %>" aria-hidden="true"></i>
        </a>
    </li>
    <% }); %>
    <% }); %>
</script>
