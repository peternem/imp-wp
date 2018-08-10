(function () {
   'use strict';
var ApplicationView = Backbone.View.extend({

        //bind view to body element (all views should be bound to DOM elements)
        el: jQuery('body'),
        //observe navigation click events and map to contained methods
        events: {
            'click ul.navigation-menu li.home-link a': 'displayHome',
            'click ul.navigation-menu li.recentWork-link a': 'displayRecentWork',
            'click ul.navigation-menu li.about-link a': 'displayAbout',
            'click ul.navigation-menu li.contact-link a': 'displayContact'
        },
        //called on instantiation
        initialize: function () {
            //set dependency on ApplicationRouter
            this.router = new ApplicationRouter();
            //call to begin monitoring uri and route changes
            Backbone.history.start();
        },
        displayHome: function () {
            //update url and pass true to execute route method
            this.router.navigate("home", true);
        },
        displayRecentWork: function () {
            //update url and pass true to execute route method
            this.router.navigate("recentWork", true);
        },
        displayAbout: function () {
            //update url and pass true to execute route method
            this.router.navigate("about", true);
        },
        displayContact: function () {
            //update url and pass true to execute route method
            this.router.navigate("contact", true);
        }
    });
    //load application
    new ApplicationView();

}());