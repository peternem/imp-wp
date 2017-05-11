/*! my-underscore-wp-theme - v0.2.0 - 2016-04-09
 * http://wordpress.org/themes
 * Copyright (c) 2016; * Licensed GPLv2+ */
/*! my-underscore-wp-theme - v0.2.0 - 2016-04-09
 * http://wordpress.org/themes
 * Copyright (c) 2016; * Licensed GPLv2+ */

jQuery(function() {
		jQuery(' .navbar-right a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
		      var target = jQuery(this.hash);
		      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        jQuery('html,body').animate({
		         // scrollTop: target.offset().top - 200
		          scrollTop: (target.offset().top)
		        }, 1000);
		        return false;
		      }
		    }
		});
	});
