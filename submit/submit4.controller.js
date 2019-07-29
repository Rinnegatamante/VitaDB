app.controller('submit4Controller',function($scope, $rootScope, $http, $location, $css){
	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	$scope.conf = {}
	$scope.conf.user = $rootScope.user.email
	$scope.conf.password = $rootScope.user.password
	if (typeof($rootScope) == 'undefined' || $rootScope.user == undefined || $rootScope.user.role > 2) $location.path("/");
	
	// submit function
	$scope.submit = function () {
		$http.post('submit4.php', $scope.conf).then(res => {
			alertify.success($scope.conf.name + " added successfully!");
			$location.path('/bounties')
		})
	}

})