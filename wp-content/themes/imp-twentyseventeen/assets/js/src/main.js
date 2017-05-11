// JavaScript Document setting globals for grunt.jsdd


/* global Modernizr */
jQuery(document).ready(function () {
    //Portfolio Slider
    jQuery('.bxslider').bxSlider({
        adaptiveHeight: true,
        mode: 'fade',
        pager: false
    });

    //Resize Window
    function sliderResize() {
        //My Window Height detections
        var myWindow_w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var myWindow_h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
       // var myPortfolios = jQuery('#recentWork, #recentPrint');
        var myHero = jQuery('#Home');
        var welcome = jQuery('#welcome');
        var myAbout = jQuery('#about');
        var mySkillset = jQuery('#skillset');
        var myContact = jQuery('#contact');
        var mySingleHero = jQuery('#singlePostHero');

        if (myWindow_w <= 480) {
            myHero.css({height: "100vh", width: 'inherit'});
            //welcome.css({height: "auto", width: 'inherit'});
            //myPortfolios.css({height: myWindow_h * 1.75, width: 'inherit'});
            //myAbout.css({height: "150vh", width: 'inherit'});
            //mySkillset.css({height: "150vh", width: 'inherit'});
            myContact.css({height: "100vh", width: 'inherit'});
            mySingleHero.css({height: myWindow_h / 2, width: 'inherit'});
            console.log("480 = H: " + myWindow_h + " W: " + myWindow_w);
        } else if (myWindow_w <= 680) {
            myHero.css({height: "100vh", width: 'inherit'});
            //welcome.css({height: "160vh", width: 'inherit'});
            //myPortfolios.css({height: "200vh", width: 'inherit'});
            //myAbout.css({height: "150vh", width: 'inherit'});
            //mySkillset.css({height: "150vh", width: 'inherit'});
            myContact.css({height: "100vh", width: 'inherit'});
            mySingleHero.css({height: myWindow_h / 2, width: 'inherit'});
            console.log("680 = H: " + myWindow_h + " W: " + myWindow_w);
        } else if (myWindow_w <= 800) {
            myHero.css({height: "100vh", width: 'inherit'});
            //welcome.css({height: "115vh", width: 'inherit'});
            //myPortfolios.css({height: myWindow_h, width: 'inherit'});
            //myAbout.css({height: "115vh", width: 'inherit'});
            //mySkillset.css({height: "115vh", width: 'inherit'});
            myContact.css({height: "100vh", width: 'inherit'});
            mySingleHero.css({height: myWindow_h / 2, width: 'inherit'});
            console.log("800 = H: " + myWindow_h + " W: " + myWindow_w);
        } else if (myWindow_w <= 1024) {
            //myPortfolios.css({height: myWindow_h * 2, width: 'inherit'});
            myHero.css({height: myWindow_h, width: "auto"});
            //welcome.css({height: "100vh", width: 'inherit'});
            myContact.css({height: "100vh", width: 'inherit'});
            mySingleHero.css({height: myWindow_h / 2, width: 'inherit'});
            console.log("1024 = H: " + myWindow_h + " W: " + myWindow_w);
        } else {
            myHero.css({height: "100vh", width: "auto"});
            //welcome.css({height: "100vh", width: 'inherit'});
            //myPortfolios.css({height: "150vh", width: 'inherit'});
            //myAbout.css({height: "115vh", width: 'inherit'});
            //mySkillset.css({height: "115vh", width: 'inherit'});
            myContact.css({height: "100vh", width: 'inherit'});
            mySingleHero.css({height: myWindow_h / 2, width: 'inherit'});
            console.log("else H: " + myWindow_h + " W: " + myWindow_w);
        }
    }


    jQuery(window).resize(function () {
        sliderResize();
    });

    jQuery(window).load(function () {
        sliderResize();
    });

    // Listen for orientation changes
    window.addEventListener("orientationchange", function () {
        sliderResize();
    }, false);

    var Modernizr = "";
    /* ==============================================
     Older browser support - Removes Modernd CSS3 Styling - SVG, CSS Animation, CSS Transform
     =============================================== */

    if (!Modernizr.svg) {
        jQuery('img[src*="svg"]').attr('src', function () {
            return jQuery(this).attr('src').replace('.svg', '.png');
        });
    }

    // Add Bootstrap form classes to FS Contact Form Plugin
    jQuery('.fscf-div-clear .fscf-div-field-left').addClass('form-group');
    jQuery('.fscf-div-field .fscf-input-text').addClass('form-control');
    jQuery('.fscf-div-field .fscf-input-textarea').addClass('form-control');
    jQuery('.fscf-div-submit .fscf-button-submit').addClass('btn btn-primary');

    function wpex_staticheader() {
        var header_height = jQuery('.navbar').outerHeight();
        jQuery('#page, #main').css({
            paddingTop: header_height

        });

        if (jQuery('#wpadminbar').length) {
            var admin_height = jQuery('#wpadminbar').outerHeight();
            jQuery('.navbar').css({
                position: 'fixed',
                top: admin_height
            });

        }
    }

    wpex_staticheader();

    jQuery(window).resize(function () {
        wpex_staticheader();
    });

    jQuery(window).bind('orientationchange', function (event) {
        var header_height = jQuery('.navbar').outerHeight();
        jQuery('#page, #main').css({
            paddingTop: header_height
        });

        if (jQuery('#wpadminbar').length) {
            var admin_height = jQuery('#wpadminbar').outerHeight();
            jQuery('.navbar').css({
                position: 'fixed',
                top: admin_height
            });
        }
    });

    /* ===========  VIDEO PLAYER  ================== */
    //jQuery('.parallax-container').parallax();	
//    var myWindow = jQuery(window).innerHeight();
//
//    jQuery(function () {
//        jQuery('.parallax-container').css({height: myWindow});
//        jQuery(window).resize(function () {
//            //myWindow = jQuery(window).innerHeight();
//            jQuery('.parallax-container.white').css({height: myWindow});
//        });
//    });
//
//    var myDiv = jQuery('.jumbotron').innerHeight();
//    jQuery(function () {
//        jQuery('.caption').css({height: myDiv});
//        jQuery(myDiv).resize(function () {
//            myDiv = jQuery('.jumbotron').innerHeight();
//            jQuery('.caption').css({height: myDiv});
//        });
//    });

    //Check to see if the window is top if not then display button Scroll to top of page
    jQuery(window).scroll(function () {
        var my_docHeight = jQuery(document).height();
        var my_winHeight = jQuery(window).height();
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scroll-to-top').fadeIn();
        } else {
            jQuery('.scroll-to-top').fadeOut();
        }
        if (jQuery(this).scrollTop() + my_winHeight === my_docHeight) {
            jQuery('.scroll-to-top').fadeOut();
        }
    });

    //Click event to scroll to top
    jQuery('.scroll-to-top').click(function () {
        jQuery('html, body').animate({scrollTop: 0}, 800);
        return false;
    });


    //Click event to scroll to top
    jQuery('#contactLink').click(function () {
        jQuery('ul.spotlight.contact').toggleClass('open-spot');
        setTimeout(function () {
            jQuery('ul.spotlight.contact').removeClass('open-spot');
        }, 3000); // <-- time in milliseconds
        return false;
    });

    jQuery('#mapLink').click(function () {
        jQuery('ul.spotlight.map').toggleClass('open-spot');
        setTimeout(function () {
            jQuery('ul.spotlight.map').removeClass('open-spot');
        }, 3000); // <-- time in milliseconds
        return false;
    });

    //Click event to scroll to top
    jQuery('.navbar-collapse.collapse a').click(function () {
        jQuery('.navbar-collapse.collapse').toggleClass('in');
    });


    // Smooth Scroll to DIV ID
    jQuery(function () {
        jQuery('#heroLinks li a[href*=\\#]:not([href=\\#]), #js-navigation-menu a[href*=\\#]:not([href=\\#]), #footerNav a[href*=\\#]:not([href=\\#])').click(function () {
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
    var location = window.location;
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

    jQuery(window).resize(function () {
        var more = document.getElementById("js-navigation-more");
        if (jQuery(more).length > 0) {
            var windowWidth = jQuery(window).width();
            var moreLeftSideToPageLeftSide = jQuery(more).offset().left;
            var moreLeftSideToPageRightSide = windowWidth - moreLeftSideToPageLeftSide;

            if (moreLeftSideToPageRightSide < 330) {
                jQuery("#js-navigation-more .submenu .submenu").removeClass("fly-out-right");
                jQuery("#js-navigation-more .submenu .submenu").addClass("fly-out-left");
            }

            if (moreLeftSideToPageRightSide > 330) {
                jQuery("#js-navigation-more .submenu .submenu").removeClass("fly-out-left");
                jQuery("#js-navigation-more .submenu .submenu").addClass("fly-out-right");
            }
        }
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
});

function parallax(){
  if( jQuery("#contact").length > 0 ) {
    var plxBackground = jQuery("#js-parallax-background");
    var plxWindow = jQuery("#contact");

    var plxWindowTopToPageTop = jQuery(plxWindow).offset().top;
    var windowTopToPageTop = jQuery(window).scrollTop();
    var plxWindowTopToWindowTop = plxWindowTopToPageTop - windowTopToPageTop;

    var plxBackgroundTopToPageTop = jQuery(plxBackground).offset().top;
    var windowInnerHeight = window.innerHeight;
    var plxBackgroundTopToWindowTop = plxBackgroundTopToPageTop - windowTopToPageTop;
    var plxBackgroundTopToWindowBottom = windowInnerHeight - plxBackgroundTopToWindowTop;
    var plxSpeed = 0.35;

    plxBackground.css('top', - (plxWindowTopToWindowTop * plxSpeed) + 'px');
  }
}

jQuery(document).ready(function() {
  if (jQuery("#contact").length) {
    parallax();
  }
});


jQuery(window).scroll(function(e) {
  if (jQuery("#contact").length) {
    parallax();
  }
});

