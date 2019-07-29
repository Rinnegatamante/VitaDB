app.controller('bountiesController',function ($scope, $rootScope, $http, $routeParams, $location, $anchorScroll, $css){
	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	$scope.brews = {}
	var data = {
		hid: $routeParams.hid,
	}
	
	$http.post('list_bounties.php', data).then(function(res){
		$scope.bounties = res.data
	})
	
}).filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	};
});
