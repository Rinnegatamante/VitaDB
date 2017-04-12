app.controller('homeController',function ($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.field = ''
	$scope.cat_filter = "0"
	$scope.updates = []
	$scope.views = []
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$http.post('list_hbs_json.php').then(function(res){
		$scope.brews = res.data
		for (i=0;i<res.data.length;i++){
			$scope.brews[i].authors = $scope.brews[i].author.split(" & ")
			switch (Number(res.data[i].type)){
				case 1:
					$scope.brews[i].genre = "Original Game"
					break;
				case 2:
					$scope.brews[i].genre = "Game Port"
					break;
				case 4:
					$scope.brews[i].genre = "Utility"
					break;
				case 5:
					$scope.brews[i].genre = "Emulator"
					break;
				case 7:
					$scope.brews[i].genre = "Engine"
					break;
				case 3:
					$scope.brews[i].genre = "Interpreter"
					break;
				default:
					$scope.brews[i].genre = "Unknown"
					break;
			}
			$scope.views[Number(res.data[i].type)].push($scope.brews[i])
		}
		$scope.views[0] = $scope.brews
	})
	
	$http.post('get_last_updates.php').then(function(res){
		$scope.updates = res.data
	})
	
	$scope.goTop = function(){
		$location.hash('top');
		$anchorScroll();
	}
	
	$scope.changeView = function () {
		$scope.brews = $scope.views[Number($scope.cat_filter)]
    }
	
	// Angular filter
	$scope.filterBrews = function(val){
		return function(brew){
			if (val == undefined) return true;
			return brew.author.toLowerCase().indexOf(val.toLowerCase() || '') !== -1 || brew.name.toLowerCase().indexOf(val.toLowerCase() || '') !== -1 || brew.description.toLowerCase().indexOf(val.toLowerCase() || '') !== -1;
		}
	}
	
})