app.controller('supporterController',function ($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.users = {}
	$http.post('get_supporters.php').then(function(res){
		for (i=0;i<res.data.length;i++){
			if (res.data[i].avatar == null || res.data[i].avatar.length < 4){
				res.data[i].avatar = "unknown.jpg"
			}
		}
		$scope.users = res.data
	})
})