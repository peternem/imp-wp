
(function (jQuery, Backbone, _, settings, wpApiSettings) {
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
                        var template = _.template(jQuery('#tagsTemplate').html())({data_tags: data_tags.toJSON()});
                        that.$el.html(template);
                    }
                });
            }
        });
        var myTags = new MyTags();
        // All Posts

        var MyPosts = Backbone.View.extend({
            initialize: function () {
                this.render();
            },
            render: function () {
                var that = this;
                var data_posts = new wp.api.collections.Posts();
                data_posts.fetch({
                    data: {
                        per_page: 25
                    },
                    success: function (data_posts) {
                        var template = _.template(jQuery('#welcomeTemplate').html())({data_posts: data_posts.toJSON()});
                        jQuery('#welcome').html(template);
                        var template_aa = _.template(jQuery('#aboutTemplate').html())({data_posts: data_posts.toJSON()});
                        jQuery('#about-page').html(template_aa);
                        var template_contact = _.template(jQuery('#contactTemplate').html())({data_posts: data_posts.toJSON()});
                        jQuery('#contact-page').html(template_contact);
                        var template_skills = _.template(jQuery('#skillTemplate').html())({data_posts: data_posts.toJSON()});
                        jQuery('#skillset-page').html(template_skills);
                        var template_work_intro = _.template(jQuery('#temp-wp1').html())({data_posts: data_posts.toJSON()});
                        jQuery('#recentWorkInto').html(template_work_intro);
                    }
                });
            }
        });
        var myPost = new MyPosts();

        var MyPortfolio = Backbone.View.extend({
            initialize: function () {
                this.render();
            },
            render: function () {
                //var data = new Data();
                var thatis = this;
                var data_portfolio = new wp.api.collections.Web_portfolio();
                
                data_portfolio.fetch({
                    data: {
                        'filter': {
                            'orderby': '',
                            'order': 'DESC'
                        },
                        '_embed': true,
                        'per_page': 25
                    },
                    success: function (data_portfolio) {
                        var template_wp = _.template(jQuery('#temp-wp').html())({data_portfolio: data_portfolio.toJSON()});
                        jQuery('#recentWork-page1').html(template_wp);
                        var template_rec_wp = _.template(jQuery('#recentWebPort').html())({data_portfolio: data_portfolio.toJSON()});
                        jQuery('#recentWork-rec').html(template_rec_wp);
                    }
                });
                
//                var data_portfolio_recent = new wp.api.collections.Web_portfolio();
//                data_portfolio_recent.fetch({
//                    data: {
//                        'filter': {
//                            'orderby': '',
//                            'order': 'DESC'
//                        },
//                        '_embed': true,
//                        'per_page': 25
//                    },
//                    success: function (data_portfolio_recent) {
//                        var template_rec_wp = _.template(jQuery('#recentWebPort').html())({data_portfolio_recent: data_portfolio_recent.toJSON()});
//                        jQuery('#recentWork-rec').html(template_rec_wp);
//                    }
//                });
            }
        });
        
        var myPortfolios = new MyPortfolio();
//        console.log(wpApiSettings);
//        console.log(wpApiSettings.root + 'acf/v2/options/');
        var MyAcfOptions = wp.api.models.Post.extend({
            //url: 'http://mattpeternell.dev/wp-json/acf/v2/options',
            urlRoot: wpApiSettings.root + 'acf/v2/options/',
            defaults: {
                type: 'options'
            }
        });

        //Hero Section

        MyAcfOptions = wp.api.collections.Posts.extend({
            //url: 'http://mattpeternell.dev/wp-json/acf/v2/options',
            url: wpApiSettings.root + 'acf/v2/options/',
            model: MyAcfOptions
        });

        self.options = new MyAcfOptions();
        self.options.fetch({
            data: {
                'filter': {
                    'orderby': '',
                    'order': 'DESC'
                },
                '_embed': true,
                'per_page': 100
            }
        }).done(function () {
            //console.log(self.options);
            var template = _.template(jQuery('#hero2Template').html())({options: self.options.toJSON()});
            jQuery('#hero').html(template);

            var template_x = _.template(jQuery('#keyPointsTemplate').html())({options: self.options.toJSON()});
            jQuery('#keyPoints').html(template_x);

            var template_social = _.template(jQuery('#socialTemplate').html())({options: self.options.toJSON()});
            jQuery('#socialLinks').html(template_social);
        });
    });
})(jQuery, Backbone, _, settings, wpApiSettings);