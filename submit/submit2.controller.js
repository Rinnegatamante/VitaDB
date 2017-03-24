app.controller('submit2Controller',function($scope, $rootScope, $http, $location){
	$scope.conf = {}
	if (typeof($rootScope) == 'undefined' || $rootScope.user == undefined || $rootScope.user.role > 2) $location.path("/");
	
	// submit function
	$scope.submit = function () {
		$scope.conf.user = $rootScope.user.email
		$scope.conf.password = $rootScope.user.password
		$http.post('submit2.php', $scope.conf).then(res => {
			alertify.success($scope.conf.name + " added successfully!");
			$location.path('/plugins')
		})
	}

})