(function () {
    'use strict';
    var ApplicationRouter = Backbone.Router.extend({

        //map url routes to contained methods
        routes: {
            "": "home",
            "home": "home",
            "recentWork": "recentWork",
            "about": "about",
            "contact": "contact"
        },
        deselectPills: function () {
            //deselect all navigation pills
            //jQuery('.js-navigation-menu li').removeClass('active');
            jQuery('ul.navigation-menus li').removeClass('active');
        },
        selectPill: function (pill) {
            //deselect all navigation pills
            this.deselectPills();
            //select passed navigation pill by selector
            jQuery(pill).addClass('active');
        },
        hidePages: function () {
            //hide all pages with 'pages' class
            jQuery('section.pages').hide();
        },
        showPage: function (page) {
            //hide all pages
            this.hidePages();
            //show passed page by selector
            jQuery(page).fadeIn("slow");
        },
        '': function () {
            this.showPage('section#home-page');
            this.selectPill('li.home-link');
        },
        home: function () {
            this.showPage('section#home-page');
            this.selectPill('li.home-link');
        },
        recentWork: function () {
            this.showPage('section#recentWork-page');
            this.selectPill('li.recentWork-link');
        },
        about: function () {
            this.showPage('section#about-page');
            this.selectPill('li.about-link');
        },
        contact: function () {
            this.showPage('section#contact-page');
            this.selectPill('li.contact-link');
        }
    });

}());