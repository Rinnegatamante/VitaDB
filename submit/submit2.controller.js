// Controller for newconf template
app.controller('submit2Controller',function($scope, $rootScope, $http, $location){
	$scope.conf = {}
	if (typeof($rootScope) == 'undefined' || $rootScope.user == undefined) $location.path("/login");
	
	// submit function, starts a new conference
	$scope.submit = function () {
		$scope.conf.user = $rootScope.user.email
		$scope.conf.password = $rootScope.user.password
		$http.post('submit2.php', $scope.conf).then(res => {
			alertify.success($scope.conf.name + " added successfully!");
			$location.path('/plugins')
		})
	}

})