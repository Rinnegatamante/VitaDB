app.controller('infouserController',function ($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.conf = {}
	var data = {
		uname: $routeParams.uname
	}
	
	$http.post('get_user_info.php', data).then(function(res){
		$scope.conf = res.data[0]
		$scope.conf.name = $routeParams.uname
		if (res.data[0].hidden_mail == 1){
			$scope.conf.email = ""
		}
		if (res.data[0].avatar == null){
			$scope.conf = {
				avatar: "unknown.jpg",
				role: "Guest",
				name: $routeParams.uname,
				color: "black"
			}
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
		$scope.conf.hbs = []
		$scope.conf.plugins = []
		$scope.conf.tools = []
		var hbs_idx = 0
		var plugins_idx = 0
		var tools_idx = 0
		$http.post('get_user_hb_json.php', data).then(function(res2){
			for (i=0;i<res2.data.length;i++){
				switch (Number(res2.data[i].type)){
					case 1:
						$scope.conf.hbs.push(res2.data[i])
						$scope.conf.hbs[hbs_idx].genre = "Original Game"
						hbs_idx++
						break;
					case 2:
						$scope.conf.hbs.push(res2.data[i])
						$scope.conf.hbs[hbs_idx].genre = "Game Port"
						hbs_idx++
						break;
					case 4:
						$scope.conf.hbs.push(res2.data[i])
						$scope.conf.hbs[hbs_idx].genre = "Utility"
						hbs_idx++
						break;
					case 5:
						$scope.conf.hbs.push(res2.data[i])
						$scope.conf.hbs[hbs_idx].genre = "Emulator"
						hbs_idx++
						break;
					case 7:
						$scope.conf.hbs.push(res2.data[i])
						$scope.conf.hbs[hbs_idx].genre = "Engine"
						hbs_idx++
						break;
					case 3:
						$scope.conf.hbs.push(res2.data[i])
						$scope.conf.hbs[hbs_idx].genre = "Interpreter"
						hbs_idx++
						break;
					case 9:
						$scope.conf.tools.push(res2.data[i])
						tools_idx++
						break;
					default:
						$scope.conf.plugins.push(res2.data[i])
						plugins_idx++
						break;
				}			
			}
		})
	})
	
	
	
})