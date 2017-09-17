/*!  - v1.0.0 - 2017-05-16
 * https://github.com/peternem/imp-wp#readme
 * Copyright (c) 2017; * Licensed GPLv2+ */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function (jQuery, Backbone, _, settings, wpApiSettings) {
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
                var data_single_post = new wp.api.collections.Posts();
                data_single_post.fetch({
                     data_single_post: {
                        'filter': {
                            'orderby': '',
                            'order': 'DESC'
                        },
                        '_embed': true,
                        'per_page': 25
                    },
                    success: function (data_single_post ) {
                         console.log(data_single_post);
                        var templatexxx = _.template(jQuery('#postContentTemplate').html())({data_single_post : data_single_post .toJSON()});
                       
                        jQuery('#postContent').html(templatexxx);
                    }
                });
            }
        });
        var myPost = new MyPosts();
    });
})(jQuery, Backbone, _, settings, wpApiSettings);