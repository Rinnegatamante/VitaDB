app.controller('supporterController',function ($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.users = {}
	$http.post('get_supporters.php').then(function(res){
		$scope.users = res.data
	})
})