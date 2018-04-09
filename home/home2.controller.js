app.controller('home2Controller',function($scope, $rootScope, $http, $routeParams, $location, $anchorScroll, $css){
	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	$scope.field = ''

	$http.post('list_plugins_json.php').then(function(res){
		$scope.brews = res.data
		for (i=0;i<res.data.length;i++){
			$scope.brews[i].authors = $scope.brews[i].author.split(" & ")
		}
	})
	
	$http.post('get_last_updates.php').then(function(res){
		$scope.updates = res.data
	})
	
	$scope.goTop = function(){
		$location.hash('top');
		$anchorScroll();
	}
	
	// Angular filter
	$scope.filterBrews = function(val){
		return function(brew){
			if (val == undefined) return true;
			return brew.author.toLowerCase().indexOf(val.toLowerCase() || '') !== -1 || brew.name.toLowerCase().indexOf(val.toLowerCase() || '') !== -1 || brew.description.toLowerCase().indexOf(val.toLowerCase() || '') !== -1;
		}
	}
	
})
