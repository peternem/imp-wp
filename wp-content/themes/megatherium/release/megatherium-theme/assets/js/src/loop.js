$(function () {
    
});
(function ($, Backbone, _, settings, undefined, wpApiSettings) {
    'use strict';

var ApplicationRouter = Backbone.Router.extend({

        //map url routes to contained methods
        routes: {
            "": "home",
            "home": "home",
            "recentWork": "recentWork",
            "recentPrint": "recentPrint",
            "about": "about",
            "contact": "contact"
        },

        deselectPills: function () {
            //deselect all navigation pills
            //$('.js-navigation-menu li').removeClass('active');
            $('ul.navigation-menus li').removeClass('active');
        },

        selectPill: function (pill) {
            //deselect all navigation pills
            this.deselectPills();
            //select passed navigation pill by selector
            $(pill).addClass('active');
        },

        hidePages: function () {
            //hide all pages with 'pages' class
            $('section.pages').hide();
        },

        showPage: function (page) {
            //hide all pages
            this.hidePages();
 
            //show passed page by selector
            $(page).fadeIn("slow");
        },
        '' : function () {
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
        recentPrint: function () {
            this.showPage('section#recentPrint-page');
            this.selectPill('li.recentPrint-link');
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

    var ApplicationView = Backbone.View.extend({

        //bind view to body element (all views should be bound to DOM elements)
        el: $('body'),

        //observe navigation click events and map to contained methods
        events: {
            'click ul.navigation-menu li.home-link a': 'displayHome',
            'click ul.navigation-menu li.recentWork-link a': 'displayRecentWork',
            'click ul.navigation-menu li.recentPrint-link a': 'displayRecentPrint',
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
        displayRecentPrint: function () {
            //update url and pass true to execute route method
            this.router.navigate("recentPrint", true);
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

    wp.api.loadPromise.done(function () {

        // All Tags

        var MyTags = Backbone.View.extend({
            el: '#tagList',
            initialize: function () {
                this.render();
            },
            render: function () {
                //var data = new Data();
                var that = this;
                var data_tags = new wp.api.collections.Tags();
                data_tags.fetch({
                    data: {
                        'filter': {
                            'orderby': '',
                            'order': 'DESC'
                        },
                        '_embed': true,
                        'per_page': 100
                    },
                    success: function (data_tags) {
                        //var template = _.template($('#temp').html(), {data: data.models});
                        var template = _.template($('#tagsTemplate').html())({data_tags: data_tags.toJSON()});
                        that.$el.html(template);
                    }
                });
            }
        });
        var myTags = new MyTags();

       
        // All Posts
        
        var MyPosts = Backbone.View.extend({
            //el:  '.selector',
            initialize: function () {
                this.render();
            },
            render: function () {
                //var data = new Data();
                var that = this;
                var data_posts = new wp.api.collections.Posts();
                data_posts.fetch({
                    data: {
                        per_page: 25 
                    },
                    success: function (data_posts) {
                        console.log(data_posts);
     
                        var template = _.template($('#welcomeTemplate').html())({data_posts: data_posts.toJSON()});
                        $('#welcome').html(template);
                         //console.log(template);
                         
                        var template_aa = _.template($('#aboutTemplate').html())({data_posts: data_posts.toJSON()});
                        //console.log(template_aa);
                        $('#about-page').html(template_aa);
                        
                        var template_contact = _.template($('#contactTemplate').html())({data_posts: data_posts.toJSON()});
                        //console.log(template_aa);
                        $('#contact-page').html(template_contact);
                        
                        var template_skills = _.template($('#skillTemplate').html())({data_posts: data_posts.toJSON()});
                        $('#skillset-page').html(template_skills);
                    }
                });
            }
        });
        var myPost = new MyPosts();



//        var MyPages = Backbone.View.extend({
//            el: '#mypages',
//            initialize: function () {
//                this.render();
//            },
//            render: function () {
//                //var data = new Data();
//                var thatis = this;
//                var data_pages = new wp.api.collections.Pages();
//                data_pages.fetch({
//                    success: function (data_pages) {
//                        console.log(data_pages);
//                        //var template_pages = _.template($('#temp').html())({data: data_pages.toJSON()});
//                        //thatis.$el.html(template);
//                    }
//
//                });
//            }
//        });
//        var myPages = new MyPages();


        var MyPrintPortfolio = Backbone.View.extend({
            el: '#recentPrint-page',
            events: {
                "click #btn-signin": "submit"
            },
            submit: function () {
                //console.log('signin');
                this.model.destroy();
                return false;

            },
            initialize: function () {
                this.render();
            },
            render: function () {
                //var data = new Data();
                var that = this;
                var data_print = new wp.api.collections.Print_portfolio();
                data_print.fetch({
                    success: function (data_print) {
                        //console.log(data_print);
                        var template = _.template($('#print-wp').html())({data_print: data_print.toJSON()});
                        that.$el.html(template);
                    }

                });
            }
        });
        var myPrintPortfolio = new MyPrintPortfolio();

        var MyWebPortfolio = wp.api.models.Post.extend({
            urlRoot: 'http://mattpeternell.dev/wp-json/wp/v2/web-portfolio',
            defaults: {
                type: 'web-portfolio'
            }
        });

        MyWebPortfolio = wp.api.collections.Posts.extend({
            url: 'http://mattpeternell.dev/wp-json/wp/v2/web-portfolio',
            model: MyWebPortfolio
        });

        self.events = new MyWebPortfolio();
        self.events.fetch({
            filter: {
                nopaging: true
            }
        }).done(function () {
            var template_wp = _.template($('#temp-wp').html())({events: self.events.toJSON()});
            //console.log(self.events);
            $('#recentWork-page').html(template_wp);
        });

        var MyAcfOptions = wp.api.models.Post.extend({
            urlRoot: 'http://mattpeternell.dev/wp-json/acf/v2/options',
            defaults: {
                type: 'options'
            }
        });

        //Hero Section
        MyAcfOptions = wp.api.collections.Posts.extend({
            //url: wpApiSettings.root + '/acf/v2/options',
            url: 'http://mattpeternell.dev/wp-json/acf/v2/options',
            model: MyAcfOptions
        });

        self.options = new MyAcfOptions();
        self.options.fetch({
            filter: {
                nopaging: true
            }
        }).done(function () {
            //console.log(self.options);
            var template = _.template($('#hero2Template').html())({options: self.options.toJSON()});
            $('#hero').html(template);
            var template_x = _.template($('#keyPointsTemplate').html())({options: self.options.toJSON()});
            $('#keyPoints').html(template_x);
        });
    }
    );
})(jQuery, Backbone, _, settings, wpApiSettings);