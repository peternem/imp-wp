<script type="text/html" id="content-template">
	<article id="post-<%= post.ID %>" class="post">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<%= post.link %>" rel="bookmark"><%= post.title.rendered %></a></h1>
<h3>IS Post Type</h3>
			<% if ( 'post' === post.type ) { %>
                        
			<div class="entry-meta">
				<% postDate = new Date( post.date ); %>
				<span class="posted-on">
					<?php esc_html_e( 'Posted on', '_s_backbone' ); ?>

					<time class="entry-date published">
						<% print( ( postDate.getMonth() + 1 ) + '/' + postDate.getDate() + '/' + postDate.getFullYear() ); %>
					</time>
				</span>
				<span class="byline">
					<?php esc_html_e( 'by', '_s_backbone' ); ?>

					
				</span>
			</div><!-- .entry-meta -->
			<% } %>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<%= post.content.rendered %>
		</div><!-- .entry-content -->

		
	</article><!-- #post-<%= post.ID %> -->
</script>

<script type="text/html" id="more-button-template">
	<div class="more-posts">

		<a class="more-button button" href="#"><?php esc_html_e( 'More', '_s_backbone' ); ?></a>

	</div>
</script>
