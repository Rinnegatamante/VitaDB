app.controller('submit2Controller',function($scope, $rootScope, $http, $location){
	$scope.conf = {}
	$scope.conf.sshot = ""
	$scope.conf.user = $rootScope.user.email
	$scope.conf.password = $rootScope.user.password
	$scope.conf.log_author = $rootScope.user.name
	if (typeof($rootScope) == 'undefined' || $rootScope.user == undefined || $rootScope.user.role > 2) $location.path("/");
	
	// submit function
	$scope.submit = function () {
		$http.post('submit2.php', $scope.conf).then(res => {
			alertify.success($scope.conf.name + " added successfully!");
			$location.path('/plugins')
		})
	}
	
	// Watch for changes caused by the iframe
	setInterval(function(){
		if ($scope.conf.sshot != document.getElementById('sshot').value) $scope.conf.sshot = document.getElementById('sshot').value
	}, 500)

})