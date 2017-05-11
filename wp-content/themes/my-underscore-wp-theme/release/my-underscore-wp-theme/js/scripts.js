var app = angular.module('wp', ['ngRoute', 'ngSanitize']);
app.config(function ($routeProvider, $locationProvider) {
    //Enable html5 mode
    $locationProvider.html5Mode(true);
    $routeProvider
            .when('/', {
                templateUrl: localized.partials + 'main.html',
                controller: 'Main'
            })
            .when('/:slug', {
                templateUrl: localized.partials + 'content.html',
                controller: 'Content'
            })
            .when('/category/:category', {
                templateUrl: localized.partials + 'content.html',
                controller: 'Category'
            })
            .otherwise({
                redirectTo: '/'
            });
});

//Main controller
app.controller('Main', ['$scope', '$http', '$routeParams', 'ThemeService', function ($scope, $routeParams, $http, ThemeService) {
        //Get Categories from ThemeService
        ThemeService.getAllCategories();
        //Get the first page of posts from ThemeService
        ThemeService.getPosts(1);
        $scope.data = ThemeService;

        //Navigation
        ThemeService.getAllMenus();
        $scope.data = ThemeService;

    }]);
//Content controller
app.controller('Content', ['$scope', '$http', '$routeParams', 'ThemeService', function ($scope, $http, $routeParams, ThemeService) {
        $http.get('wp-json/posts/?filter[name]=' + $routeParams.slug).success(function (res) {
            $scope.current_category_id = res[0].ID;
            console.log(res[0].ID);
            //$scope.pageTitle = 'Posts in ' + res[0].name + ':';
            document.querySelector('title').innerHTML = res[0].title + ' | AngularJS Demo Theme';
            $scope.post = res[0];
        });

    }]);

//Category controller
app.controller('Category', ['$scope', '$routeParams', '$http', 'ThemeService', function ($scope, $routeParams, $http, ThemeService) {
        ThemeService.getAllCategories();
        console.log($routeParams);
        $http.get('wp-json/taxonomies/category/terms/?filter[slug]=' + $routeParams.category).success(function (res) {
            $scope.current_category_id = res[0].ID;
            $scope.pageTitle = 'Posts in ' + res[0].name + ':';
            document.querySelector('title').innerHTML = 'Category: ' + res[0].name + ' | AngularJS Demo Theme';
            console.log(res[0].name);
            $http.get('wp-json/posts/?filter[category_name]=' + res[0].name).success(function (res) {
                $scope.posts = res;
                //console.log(res);
            });
        });
    }]);