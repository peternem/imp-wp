<script type = "text/html" id="hero2Template">
    <% var hero_w %>
    <% var hero_h %>
    <% _.each(options, function(item,key,list){ %>
    <% _.each( item.acf.home_page_hero_image.sizes, function( width,key,list ) { %>
    <% if ( 'careers-featured-height' === key ) { %>
    <% hero_h = width %>
    <% } %>
    <% if ( 'careers-featured-width' === key ) { %>
    <% hero_w = width %>
    <% } %>
    <% }); %>
    <style>
        .parallax-background {
            background-image: url('<%= item.acf.home_page_hero_image.url %>');
        }
    </style>
    <div id="parallaxHome" class="parallax-window" >
        <div class="parallax-static-content">
            <h1 id="entryTitle" class="entry-title"><%= item.acf.hero_title %></h1>
            <h2><%= item.acf.hero_subtitle %></h2>
            <ul id="heroLinks" class="hero-links">
                <li><a id="learny" class="btn btn-primary" data-word="clacky" role="button" title="Learn More" href="#welcome">Learn More</a></li>
<!--                <li><a id="skilly" class="btn btn-primary" data-word="clacky" role="button" title="Learn More" href="#skillset-page">Skillset</a></li>-->
                <li><a id="worky" class="btn btn-default" role="button" title="Recent Work" href="#recentWork">Web Work</a></li>
                <!-- <li><a id="printy" class="btn btn-primary" role="button" title="Recent Print" href="#recentPrint">Print Work</a></li> -->
            </ul>
        </div>
        <div id="js-parallax-background" class="parallax-background"></div>
    </div>
    <% }); %>
</script>
<!-- <div id="hero" class="container"></div> -->
