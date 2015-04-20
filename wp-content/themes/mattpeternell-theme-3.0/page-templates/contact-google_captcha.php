
<?php
/**
 * Template Name: Contact Google Captcha - ACF 1.0
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
		<div class="container sub_page">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
					<header class="entry-header page-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
					</header><!-- .entry-header -->
				</div>
			</div>
			<div class="row">
			
				<?php
				// Advanced Custom Fieldset - Featurette
				if(get_field('text_left'))
				{
					echo '<div class="col-md-8 col-lg-8">' . get_field('text_left') . '</div>';
				}
				 
				?>
				<?php
				// Advanced Custom Fieldset - Featurette
				if(get_field('image_right'))
				{
					echo '<div class="col-md-4 col-lg-4"><img class="img-thumbnail" src="'.get_field('image_right').'"/></div>';
				}
				 
				?>
			</div>
			<script type="text/javascript">
					function validate(thisForm) {
						if (thisForm.senderName.value == "") {
							window.alert("Please enter your first name!");
							thisForm.senderName.focus();
							return false;
						}
						if (thisForm.senderEmail.value == "") {
							window.alert("Please enter your email address!");
							thisForm.senderEmail.focus();
							return false;
						} else {
							var emailexp = /.*\@.*\..*/;
							if (!emailexp.test(thisForm.senderEmail.value)) {
								window.alert("Invalid email address!\n\nPlease enter your correct email address!\n\nExample yourname@example.com");
								thisForm.senderEmail.focus();
								return false;
							}
						}
						if (thisForm.senderComments.value == "") {
							window.alert("Please enter a comment!");
							thisForm.senderComments.focus();
							return false;
						}
						return true;
					}

				</script>
				<?php 
					$slug_value =  pll_current_language('slug');	
						if ( pll_current_language('slug')=="en") {
							 $my_slug = "en";
						} else if ( pll_current_language('slug')=="de") {
							$my_slug = "de";
						}
					 ?> 	
				<form action="http://revenbikes.com/en/contact-submitted" method="POST" onsubmit="return validate(this);">
					<ul class="contact_form">
					<li><b>Name</b></li>
					<li><input type="text" name="senderName"></li>
					<li><b>Email</b></li>
					<li><input type="text" name="senderEmail"></li>
					<li><b>Message</b></li>
					<li><textarea rows='10' name="senderComments"></textarea></li>
					<li>
				<?php
					require_once( trailingslashit( get_template_directory() ). 'recaptchalib.php' );
					$publickey = "6LenFd0SAAAAANrxCvNfKOOuFzQNRC2A5WvSevF-"; // you got this from the signup page
					echo recaptcha_get_html($publickey);
				?></li>
					<li><input type="submit" value="Send" name="submit"></li>
					</ul>
				</form>
			<div class="row">
				<div class="col-md-12 col-lg-12 entry-content">
					<?php the_content(); ?>
				</div><!-- .col-md-12 -->		
			<?php endwhile; // end of the loop. ?>
			<?php
				wp_link_pages(array(
					'before' => '<div class="page-links">'.__('Pages:', 'upbootwp'),
					'after'  => '</div>',
				)); ?>		
			</div>
			<footer class="entry-meta">
				<div class="">
			<?php edit_post_link( __( 'Edit', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</footer>
			<div class="row">
				<?php
				/* Global footer sidebar */
				if ( ! is_404() ) : ?>
					<div id="footer-widgets" class="widget-area four">
						<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-7' ); ?>
							
						<?php endif; ?>
		
						<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-8' ); ?>
							
						<?php endif; ?>
		
						<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-9' ); ?>
							
						<?php endif; ?>
					</div><!-- #footer-widgets -->
			<?php endif; ?>
			</div>
			<?php get_footer(); ?>
		</div>

				