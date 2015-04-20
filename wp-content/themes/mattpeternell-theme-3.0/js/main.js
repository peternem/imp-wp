$(document).ready(function() {
	$('.home-slideshow').cycle({
	    speed: 600,
	    manualSpeed: 100,
	    slides: '.slide_tile',
	    timeout:6000
	});
	
	var slideTime = 4000;
	function initCycle() {
        var width = $(document).width(); // Getting the width and checking my layout
       
        if ( width < 768 ) {
            $('.row.cycle-slideshow').cycle({
                fx: 'carousel',
                speed: 600,
                timeout: slideTime,
                slides: '.slidetiles',
                carouselVisible: 1,
                carouselDimension: '366px'
            });

        } else if ( width > 768 && width < 980 ) {  
            $('.row.cycle-slideshow').cycle({
                fx: 'carousel',
                speed: 600,
                timeout: slideTime,
                slides: '.slidetiles',
                carouselVisible: 2,
                carouselDimension: '366px'
            });
        } else {
            $('.row.cycle-slideshow').cycle({
                fx: 'carousel',
                speed: 600,
                timeout: slideTime,
                slides: '.slidetiles',
                carouselVisible: 3,
                carouselDimension: '366px'
            });
        }
    }
    initCycle();

    function reinit_cycle() {
        var width = $(window).width(); // Checking size again after window resize
        if ( width < 768 ) {
            $('.row.cycle-slideshow').cycle('destroy');
            reinitCycle(1);
        } else if ( width > 768 && width < 980 ) {
            $('.row.cycle-slideshow').cycle('destroy');
            reinitCycle(2);
        } else {
            $('.row.cycle-slideshow').cycle('destroy');
            reinitCycle(3);
        }
    }
    function reinitCycle(visibleSlides) {
        $('.row.cycle-slideshow').cycle({
            fx: 'carousel',
            speed: 600,
            timeout: slideTime,
            slides: '.slidetiles',
            carouselVisible: visibleSlides,
            carouselDimension: '366px'
        });
    }
    var reinitTimer;
    $(window).resize(function() {
        clearTimeout(reinitTimer);
        reinitTimer = setTimeout(reinit_cycle, 100); // Timeout limits the number of calculations   
    });


		
	
});
/**************************************************
 * Begin - Home Page SCOC-RadTiles
 *************************************************/

//window.onload = function(){
	//var car_w= $('.slideshow_cycle').width();
	//$('.slideshow_header').css ("width", car_w);
//}

