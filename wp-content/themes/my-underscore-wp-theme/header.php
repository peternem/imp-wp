<?php
/**
 * The template for displaying the header.
 *
 * @package my-underscore-wp-theme
 * @since 0.1.0
 */
?>
<!DOCTYPE html>
<html ng-app="wp">
    <head>
        <base href="/">
        <title>AngularJS Demo Theme</title>
<!--        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->
        <?php wp_head(); ?>
    </head>
    <body  <?php body_class(); ?>>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bootstrap theme</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#full-service-web-developer">Welcome</a></li>
                        <li><a href="#my-web-portfolio">Web Portfolio</a></li>
                        <li><a href="#my-skillset">Skill Set</a></li>
                        <li><a href="#my-print-portfolio">Print</a></li>
                        <li><a href="#about-this-dev">About</a></li>
                        <li><a href="#contact">Contact</a></li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div id="page" class="site">