<?php
/**
 * Template Name: Contact - Google Captcha Submitted - Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div id="heroImage">
		<img src="<?php bloginfo('template_directory');?>/images/slideshow-home/reven_main_image_04.jpg" style="width: 100%;" alt="Reven on Guardsman Pass near Park City, Utah" class="mainImage"/>
	</div>
		<div id="primary" class="site-content">
			<div id="content" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>

				<?php
				require_once( trailingslashit( get_template_directory() ). 'recaptchalib.php' );
				$privatekey = "6LenFd0SAAAAAFvkxbSGJ4VsIDBOSBgmMqNCwPBt";
				$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

				if (!$resp -> is_valid) {
					// What happens when the CAPTCHA was entered incorrectly
					die("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp -> error . ")");
				} else {
					// Your code here to handle a successful verification

					/*** EMAIL Setup***/
					$submit = stripslashes($_POST['submit']);
					$senderName = stripslashes($_POST['senderName']);
					$senderEmail = $_POST['senderEmail'];
					$senderComments = stripslashes($_POST['senderComments']);

					$subject = "Reven Bicycle Contact/Request Form";

					//$to ="rideharder@revenbikes.com";
					$to = "mjpeternell@gmail.com, ";
					$to .="info@revenbikes.com";

					$headers = "From: revenbikes.com contact form\r\n";
					$headers .= "Reply-To: $senderEmail\r\n";
					$headers .= "X-Mailer: PHP/" . phpversion();

					$message = "$senderName just completed the Revenbikes.com contact form.\n";
					$message .= "Email: $senderEmail\n";
					$message .= "Comments:\n" . wordwrap($senderComments, 70);
					;

					if (mail($to, $subject, $message, $headers)) {
						//echo "<h2>Your Email was sent to Reven!</h2>";
						//echo "<p>Shortly, Reven should be in contact with you to answer any questions you may have regarding our products.";
						echo "<h3>The following informations was emailed to Reven.</h3><br>";
						echo "<p>$senderName</p><br>";
						echo "<p>$senderEmail</p><br>";
						echo "<p>$senderComments</p><br>";
					} else {
						echo "<h3>Error!</h3> <p>You have reached this page without clicking the submit button.  The Contact Reven Request Form!";
					}

				}
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
		<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>