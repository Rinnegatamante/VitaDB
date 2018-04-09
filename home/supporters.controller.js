app.controller('supporterController',function ($scope, $rootScope, $http, $routeParams, $location, $anchorScroll, $css){
	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	$scope.users = {}
	$http.post('get_supporters.php').then(function(res){
		for (i=0;i<res.data.length;i++){
			if (res.data[i].avatar == null || res.data[i].avatar.length < 4){
				res.data[i].avatar = "unknown.jpg"
			}
		}
		$scope.users = res.data
	})
})