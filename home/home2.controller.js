// Controller for home template
app.controller('home2Controller',function($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.field = ''

	$http.post('list_plugins_json.php').then(function(res){
		$scope.brews = res.data
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