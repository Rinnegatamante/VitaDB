app.controller('editController',function($scope, $rootScope, $http, $location, $routeParams, $css){
	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	if (typeof($rootScope) == 'undefined' || $rootScope.user == undefined || $rootScope.user.role > 3) $location.path("/");
	$scope.conf = {}
	$scope.conf.user = $rootScope.user.email
	$scope.conf.password = $rootScope.user.password
	$scope.conf.log_author = $rootScope.user.name
	$scope.conf.uploader = "icon0.html"
	var data = {
		hid: $routeParams.hid,
		user: $rootScope.user.email,
		password: $rootScope.user.password
	}
	
	$http.post('get_hb_unmasked_json.php', data).then(function(res){
		$scope.conf = res.data[0]
		$scope.conf.type = "" + res.data[0].type
		$scope.conf.sshot = res.data[0].screenshots
		$scope.conf.new_release = "1"
	})
	
	// submit function
	$scope.submit = function () {
		$scope.conf.user = $rootScope.user.email
		$scope.conf.password = $rootScope.user.password
		$scope.conf.log_author = $rootScope.user.name
		if ($scope.conf.type < 8){
			$http.post('update.php', $scope.conf).then(function(res){
				alertify.success($scope.conf.name + " edited successfully!");
				$location.path('/')
			})
		}else if ($scope.conf.type == 8){
			$http.post('update2.php', $scope.conf).then(function(res){
				alertify.success($scope.conf.name + " edited successfully!");
				$location.path('/plugins')
			})
		}else{
			$http.post('update3.php', $scope.conf).then(function(res){
				alertify.success($scope.conf.name + " edited successfully!");
				$location.path('/tools')
			})
		}
	}
	
	// Watch for changes caused by the iframe
	setInterval(function(){
		if ($scope.conf.sshot != document.getElementById('sshot').value) $scope.conf.sshot = document.getElementById('sshot').value
		if ($scope.conf.titleid != document.getElementById('hb_titleid').value) $scope.conf.titleid = document.getElementById('hb_titleid').value
		if ($scope.conf.name != document.getElementById('hb_title').value) $scope.conf.name = document.getElementById('hb_title').value
		if ($scope.conf.icon != document.getElementById('url').value) $scope.conf.icon = document.getElementById('url').value
	}, 500)

})