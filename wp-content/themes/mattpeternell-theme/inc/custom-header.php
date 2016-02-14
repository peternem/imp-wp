<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	<?php } // if ( ! empty( $header_image ) ) ?>
	
 * <!-- WP jumbotron with site-header bground image, site name and tag line -->
	<!-- <header id="masthead" class="site-header" role="banner">
		<div class="container ">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>
		</div>
	</header> --><!-- #masthead -->
 * 
 * <!-- Bootstrap jumbotron with site-header bground image, site name and tag line -->
	<!-- <div class="jumbotron ">
		<div class="container site-header">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>
		</div>
	</div> -->
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses upbootwp_header_style()
 * @uses upbootwp_admin_header_style()
 * @uses upbootwp_admin_header_image()
 *
 * @package upBootWP
 */
function upbootwp_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'upbootwp_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000',
		'width'                  => 1170,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'upbootwp_header_style',
		'admin-head-callback'    => 'upbootwp_admin_header_style',
		'admin-preview-callback' => 'upbootwp_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'upbootwp_custom_header_setup' );

if ( ! function_exists( 'upbootwp_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see upbootwp_custom_header_setup().
 */
function upbootwp_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="upbootwp-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: <?php echo get_custom_header()->width; ?>px auto;
			height:<?php echo get_custom_header()->height; ?>px;
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
			if ( empty( $header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php
			endif;

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // upbootwp_header_style

if ( ! function_exists( 'upbootwp_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see upbootwp_custom_header_setup().
 */
function upbootwp_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="upbootwp-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top; background-size: 1600px auto;';
		} ?>
		padding: 0 20px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 230px;';
		} ?>
		width: 100%;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>
	#headimg h1 {
		font: bold 60px/1 Bitter, Georgia, serif;
		margin: 0;
		padding: 58px 0 10px;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h1 a:hover {
		text-decoration: underline;
	}
	#headimg h2 {
		font: 200 italic 24px "Source Sans Pro", Helvetica, sans-serif;
		margin: 0;
		text-shadow: none;
	}
	.default-header img {
		max-width: 230px;
		width: auto;
	}
	</style>
<?php
}
endif; // upbootwp_admin_header_style

if ( ! function_exists( 'upbootwp_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see upbootwp_custom_header_setup().
 */
function upbootwp_admin_header_image() {
	$style        = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	$header_image = get_header_image();
?>
	<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto;">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
	</div>
<?php
}
endif; // upbootwp_admin_header_image
