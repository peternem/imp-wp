/*!  - v1.0.0 - 2017-09-22
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
        var WebPosts = Backbone.View.extend({
            initialize: function () {
                this.render();
            },
            render: function () {
                //var data = new Data();
                var that = this;
                var data = new wp.api.collections.Web_portfolio();

                data.fetch({
                    data: {
                        'filter': {
                            'orderby': '',
                            'order': 'DESC'
                        },
                        '_embed': true,
                        'per_page': 25
                    },
                    success: function (data) {
                        var template_cpt = _.template(jQuery('#webCptTemplate').html())({data: data.toJSON()});
                        jQuery('#webCptContent').html(template_cpt);
                        jQuery('#webCarousel').bxSlider({
                            adaptiveHeight: true,
                            mode: 'fade',
                            pager: false
                        });
                    }
                });
            }
        });
        var webPost = new WebPosts();
    });
})(jQuery, Backbone, _, settings, wpApiSettings);