function ThemeService($http) {

	var ThemeService = {
                menus: [],
		categories: [],
		posts: [],
		pageTitle: 'Latest Posts:',
		currentPage: 1,
		totalPages: 1,
		currentUser: {}
	};

        //Set the page title in the <title> tag
	function _menus(menus) {
		ThemeService.menus = menus;
               
	}
	//Set the page title in the <title> tag
	function _setTitle(documentTitle, pageTitle) {
		document.querySelector('title').innerHTML = documentTitle + ' | AngularJS Demo Theme';
		ThemeService.pageTitle = pageTitle;
	}

	//Setup pagination
	function _setArchivePage(posts, page, headers) {
		ThemeService.posts = posts;
		ThemeService.currentPage = page;
		ThemeService.totalPages = headers('X-WP-TotalPages');
	}
        
        ThemeService.getAllMenus = function() {
            //Get the category terms from wp-json
            if (ThemeService.menus.length) {
			return;
                     
		}
                
            return $http.get('/wp-json/menus/36').success(function(res){
                    ThemeService.menus = res;
                   // console.log(ThemeService.menus.items);
                    $title = [];
                     angular.forEach(ThemeService.menus.items, function(items) {
                         $title.push(items.title);
                     });
                      //console.log($title);
            });
        };
        
	ThemeService.getAllCategories = function(page) {
    	//If they are already set, don't need to get them again
		if (ThemeService.categories.length) {
			return;
		}

		//Get the category terms from wp-json
		return $http.get('wp-json/taxonomies/category/terms').success(function(res){
			ThemeService.categories = res;
		});
	};

	ThemeService.getPosts = function(page) {
		//return $http.get('wp-json/posts/?page=' + page + '&filter[posts_per_page]=1').success(function(res, status, headers){
                return $http.get('/posts/?page=' + page + '&filter[posts_per_page]=10').success(function(res, status, headers){
			ThemeService.posts = res;
                        
			page = parseInt(page);

			// Check page variable for sanity
			if ( isNaN(page) || page > headers('X-WP-TotalPages') ) {
				_setTitle('Page Not Found', 'Page Not Found');
			} else {
				//Deal with pagination
				if (page>1) {
					_setTitle('Posts on Page ' + page, 'Posts on Page ' + page + ':');
				} else {
					_setTitle('Home', 'Latest Posts:');
				}

				_setArchivePage(res,page,headers);

			}
		});
	};

	return ThemeService;
}

//Finally register the service
app.factory('ThemeService', ['$http', ThemeService]);
