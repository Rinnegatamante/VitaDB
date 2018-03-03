app.controller('profileController',function ($scope, $rootScope, $http, $location, $interval){
	$scope.conf = {}
	if (typeof($rootScope) == 'undefined' || $rootScope.user == undefined) $location.path("/");
	
	var data = {
		uname: $rootScope.user.name
	}
	
	$http.post('get_user_info.php', data).then(function(res){
		$scope.conf = res.data[0]
		$scope.conf.name = $rootScope.user.name
		$scope.conf.password = $rootScope.user.password
		$scope.conf.hidden_mail = "" + res.data[0].hidden_mail
		if (res.data[0].hidden_mail == 1) $scope.conf.email = $rootScope.user.email // Populating mail with rootScope cause API will hide email
		if (res.data[0].avatar == null){
			$scope.conf = {
				avatar: "unknown.jpg",
				role: "Guest",
				name: $rootScope.user.name,
				color: "black"
			}
			console.log("test")
		}else{
			if (res.data[0].avatar.length < 4){
				$scope.conf.avatar = "unknown.jpg"
			}
			if (res.data[0].roles[0] == "1"){
				$scope.conf.role = "Founder"
				$scope.conf.color = "darkviolet"
			}else if (res.data[0].roles[0] == "2"){
				$scope.conf.role = "Administrator"
				$scope.conf.color = "red"
			}else if (res.data[0].roles[0] == "3"){
				$scope.conf.role = "Moderator"
				$scope.conf.color = "green"
			}else if (res.data[0].roles[0] == "4"){
				$scope.conf.role = "Developer"
				$scope.conf.color = "orange"
			}else if (res.data[0].roles[0] == "5"){
				$scope.conf.role = "User"
				$scope.conf.color = "blue"
			}else if (res.data[0].roles[0] == "6"){
				$scope.conf.role = "Supporter"
				$scope.conf.color = "Tomato"
			}else{
				$scope.conf.role = "Guest"
				$scope.conf.color = "black"
			}
		}
	})
	
	// submit function
	$scope.submit = function () {
		$http.post('user_update.php', $scope.conf).then(function(res){
			alertify.success("Profile updated successfully!");
			$location.path('/user/' + $scope.conf.name)
		})
	}
	
	// Watch for changes caused by the iframe
	var theInterval = $interval(function(){
		if (document.getElementById('url').value.length > 1){
			$scope.conf.avatar = document.getElementById('url').value
			document.getElementById('url').value = ""
			document.getElementById('uploader').src = "avatar.html"
		}
		if (document.getElementById('uploader').contentWindow.document.getElementById('email').value.length < 2){ // Workaround for synchronization
			document.getElementById('uploader').src = "avatar.html"
		}
	}.bind(this), 500);
	
})