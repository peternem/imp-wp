// JavaScript Document
jQuery(document).ready(function() {
	initCycle();
	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});
	$(function() {
		$('.carousel-caption a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top
		        }, 1000);
		        return false;
		      }
		    }
		});
	});
});
/**************************************************
 * Begin - Home Page SCOC-RadTiles
 *************************************************/

//window.onload = function(){
	//var car_w= $('.slideshow_cycle').width();
	//$('.slideshow_header').css ("width", car_w);
//}

var slideTime = 8000;
function initCycle() {
    var width = $(document).width(); // Getting the width and checking my layout
   
    if ( width < 768 ) {
        $('.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: 'div.slidetiles',
            carouselVisible: 1,
            carouselDimension: '366px'
        });

    } else if ( width > 768 && width < 980 ) {  
        $('.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: 'div.slidetiles',
            carouselVisible: 2,
            carouselDimension: '366px'
        });
    } else {
        $('.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: 'div.slidetiles',
            carouselVisible: 3,
            carouselDimension: '366px'
        });
    }
}


function reinit_cycle() {
    var width = $(window).width(); // Checking size again after window resize
    if ( width < 768 ) {
        $('.cycle-slideshow').cycle('destroy');
        reinitCycle(1);
    } else if ( width > 768 && width < 980 ) {
        $('.cycle-slideshow').cycle('destroy');
        reinitCycle(2);
    } else {
        $('.cycle-slideshow').cycle('destroy');
        reinitCycle(3);
    }
}
function reinitCycle(visibleSlides) {
    $('.cycle-slideshow').cycle({
        fx: 'carousel',
        speed: 600,
        timeout: slideTime,
        slides: 'div.slidetiles',
        carouselVisible: visibleSlides,
        carouselDimension: '366px'
    });
}
var reinitTimer;
$(window).resize(function() {
    clearTimeout(reinitTimer);
    reinitTimer = setTimeout(reinit_cycle, 100); // Timeout limits the number of calculations   
});

