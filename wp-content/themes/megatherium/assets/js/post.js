/*!  - v1.0.0 - 2017-05-11
 * https://github.com/peternem/imp-wp#readme
 * Copyright (c) 2017; * Licensed GPLv2+ */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function (jQuery, Backbone, _, undefined, wpApiSettings) {
    'use strict';
    wp.api.loadPromise.done(function () {
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
                    success: function (data_posts) {
                        var templatexxx = _.template(jQuery('#postContentTemplate').html())({data_posts: data_posts.toJSON()});
                        jQuery('#postContent').html(templatexxx);
                        

                    }
                });
            }
        });
        var myPost = new MyPosts();
    });
})(jQuery, Backbone, _, wpApiSettings);