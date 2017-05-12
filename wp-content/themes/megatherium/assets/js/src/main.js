/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// A $( document ).ready() block.

jQuery(window).load(function () {
    console.log("window load");
});
jQuery(document).ready(function () {
    console.log("Document ready");


    jQuery("#learny").click("click", function () {
        console.log("claick");
    });


    var menuToggle = jQuery("#js-mobile-menu").unbind();
    jQuery("#js-navigation-menu").removeClass("show");

    menuToggle.on("click", function (e) {
        e.preventDefault();
        jQuery("#js-navigation-menu").slideToggle(function () {
            if (jQuery("#js-navigation-menu").is(":hidden")) {
                jQuery("#js-navigation-menu").removeAttr("style");
            }
        });
    });

    // When click menu link. Menu closes
    var myMenu_w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    jQuery("#js-navigation-menu li a").on("click", function (e) {
        if (myMenu_w < 1024) {
            jQuery("#js-navigation-menu").slideToggle(function () {
                if (jQuery("#js-navigation-menu").is(":visible")) {
                    jQuery("#js-navigation-menu").removeAttr("style");
                }
            });
        }
    });

    // Smooth Scroll to DIV ID

    jQuery(function () {
//        jQuery('#js-navigation-menu a[href*=\\#]:not([href=\\#]), #footerNav a[href*=\\#]:not([href=\\#])').click(function () {
//            var location = window.location;
//            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
//                var target = jQuery(this.hash);
//                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
//                if (target.length) {
//                    jQuery('html,body').animate({
//                        // scrollTop: target.offset().top - 200
//                        scrollTop: (target.offset().top)
//                    }, 1000);
//                    return false;
//                }
//            }
//        });
        jQuery('body').on('click', '#heroLinks li a[href*=\\#]:not([href=\\#])', function (e) {
            var location = window.location;
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
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

    var hash = window.location.hash.substring(1);

    if (hash) {
        window.onload = function (event) {
            //window.location.hash = "#" +hash;
            var yOffset = jQuery("#" + hash).offset().top;
            //jQuery('html,body').scrollTop(yOffset);
            jQuery('html,body').animate({
                // scrollTop: target.offset().top - 200
                scrollTop: (yOffset)
            }, 1000);
        };
    }

});

function parallax() {
    var my_paralax = jQuery("#parallaxHome");
    if (my_paralax.length > 0) {
        var plxBackground = jQuery("#js-parallax-background");
        var plxWindow = my_paralax;

        var plxWindowTopToPageTop = jQuery(plxWindow).offset().top;
        var windowTopToPageTop = jQuery(window).scrollTop();
        var plxWindowTopToWindowTop = plxWindowTopToPageTop - windowTopToPageTop;

        var plxBackgroundTopToPageTop = jQuery(plxBackground).offset().top;
        var windowInnerHeight = window.innerHeight;
        var plxBackgroundTopToWindowTop = plxBackgroundTopToPageTop - windowTopToPageTop;
        var plxBackgroundTopToWindowBottom = windowInnerHeight - plxBackgroundTopToWindowTop;
        var plxSpeed = 0.35;

        plxBackground.css('top', -(plxWindowTopToWindowTop * plxSpeed) + 'px');
    }
}

jQuery(document).ready(function () {
    if (jQuery("#parallaxHome").length) {
        parallax();
    }

});


jQuery(window).scroll(function (e) {
    if (jQuery("#parallaxHome").length) {
        parallax();
    }
});



