/*!  - v1.0.0 - 2017-05-10
 * https://github.com/peternem/imp-wp#readme
 * Copyright (c) 2017; * Licensed GPLv2+ */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function ($, Backbone, _, undefined, wpApiSettings) {
    'use strict';
    $(document).ready(function () {
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
//                        console.log(data_posts.models);
//                        console.log(data_posts._byId);
                        var templatexxx = _.template($('#postContentTemplate').html())({data_posts: data_posts.toJSON()});
                        $('#postContent').html(templatexxx);

                    }
                });
            }
        });
        var myPost = new MyPosts();
    });
})(jQuery, Backbone, _, wpApiSettings);