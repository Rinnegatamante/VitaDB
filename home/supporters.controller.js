app.controller('supporterController',($scope, $rootScope, $http, $location, $routeParams) => {
	$scope.users = {}
	$http.post('get_supporters.php').then(function(res){
		$scope.users = res.data
	})
})