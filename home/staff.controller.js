app.controller('staffController',function($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.staff = {}
	$http.post('get_staff.php').then(function(res){
		$scope.staff = res.data
		i = 0
		while (i < res.data.length){
			if (res.data[i].hidden_mail == 1){
				$scope.staff[i].email = ""
			}
			if (res.data[i].avatar.length < 4){
				$scope.staff[i].avatar = "unknown.jpg"
			}
			if (res.data[i].roles[0] == "1"){
				$scope.staff[i].role = "Founder"
				$scope.staff[i].color = "darkviolet"
			}else if (res.data[i].roles[0] == "2"){
				$scope.staff[i].role = "Administrator"
				$scope.staff[i].color = "red"
			}else{
				$scope.staff[i].role = "Moderator"
				$scope.staff[i].color = "green"
			}
			i++;
		}
	})
	
})