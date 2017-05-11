<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-57-precomposed.png">

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/ico/favicon.png">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php include_once("analyticstracking.php") ?>
<?php do_action( 'before' ); ?>


	<nav id="masthead" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
				</button>
	        			<?php if( get_header_image() != '' ) : ?>

					<div id="logo" class="navbar-brand">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
							
							<?php get_template_part('inc/logo-svg')//header_image(); ?>
						</a>
						<!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> -->
					</div><!-- end of #logo -->

				<?php endif; // header image was removed ?>

				<?php if( !get_header_image() ) : ?>

					<div id="logo">
						<span class="site-name"><a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
					</div><!-- end of #logo -->

				<?php endif; // header image was removed (again) ?>

			</div>

			
			<?php 
			$args = array('theme_location' => 'primary', 
						  'container_class' => 'navbar-collapse collapse', 
						  'menu_class' => 'nav navbar-nav navbar-right',
						  'fallback_cb' => '',
                          'menu_id' => 'main-menu',
                          'walker' => new Upbootwp_Walker_Nav_Menu()); 
			wp_nav_menu($args);
			?>
		</div><!-- container -->
	</nav>
<?php if( is_home() ) { ?>		
	<?php //get_template_part('index-feature-image'); ?>
<?php } ?>
<main id="main" class="site-main" role="main">