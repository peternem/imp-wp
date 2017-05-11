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

        var WebPosts = Backbone.View.extend({
            initialize: function () {
                this.render();
            },
            render: function () {
                //var data = new Data();
                var that = this;
                var data = new wp.api.collections.WebPortfolio();
               
                data.fetch({
                    success: function (data) {
                        console.log(data.toJSON());
                        var template_cpt = _.template($('#webCptTemplate').html())({data: data.toJSON()});
                        $('#webCptContent').html(template_cpt);
                    }
                });
            }
        });
        var webPost = new WebPosts();
        $(document).ready(function () {});
})(jQuery, Backbone, _, wpApiSettings);