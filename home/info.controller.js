app.controller('infoController',function ($scope, $rootScope, $http, $routeParams, $location, $anchorScroll, $css, $sce){
	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	$scope.conf = {}
	var data = {
		hid: $routeParams.hid,
	}
	
	var sizes = ["Bytes", "KBs", "MBs", "GBs"]
	
	$http.post('get_hb_json.php', data).then(function(res){
		$scope.conf = res.data[0]
		$scope.conf.long_description = res.data[0].long_description
		$scope.conf.sshots = res.data[0].screenshots.split(";")
		$scope.conf.authors = $scope.conf.author.split(" & ")
		$scope.conf.authors_info = []
		var sizes_idx = 0
		var data_sizes_idx = 0
		while ($scope.conf.size > 1024) {
			$scope.conf.size = $scope.conf.size / 1024;
			sizes_idx++;
		}
		$scope.conf.size = $scope.conf.size.toFixed(2) + " " + sizes[sizes_idx]
		if ($scope.conf.data.length > 2) {
			while ($scope.conf.data_size > 1024) {
				$scope.conf.data_size = $scope.conf.data_size / 1024;
				data_sizes_idx++;
			}
			$scope.conf.data_size = $scope.conf.data_size.toFixed(2) + " " + sizes[data_sizes_idx]
		}
		if ($scope.conf.trailer) {
			$scope.conf.youtube = $sce.trustAsResourceUrl("https://www.youtube.com/embed/" + $scope.conf.trailer)
		}
		if ($scope.conf.screenshots) {
			$scope.conf.multimedia_tab = 0
		} else {
			$scope.conf.multimedia_tab = 1
		}
		names = []
		var i = 0
		while (i < $scope.conf.authors.length){
			var t = {
				uname: $scope.conf.authors[i]
			}
			names.push(t)
			i++
		}
		i = 0
		while (i < $scope.conf.authors.length){
			var t = {
				uname : $scope.conf.authors[i]
			}
			$scope.conf.authors_info.push({
				name : $scope.conf.authors[i],
				paypal : "",
				bitcoin : "",
				patreon : ""
			})
			$http.post('get_user_info.php', t).then(function(res2){
				if (res2.data[0].avatar != null){
					var x = 0
					while (x < $scope.conf.authors.length){
						if ($scope.conf.authors_info[x].name == res2.data[0].name){
							$scope.conf.authors_info[x] = res2.data[0];
							break;
						}
						x++
					}
				}
			})
			i++
		}
	})
	
})

.directive('gallery', function($interval, $window){

	return {
		restrict: 'A',
		templateUrl: 'gallery.html',
		scope: {
			images: '='
		},
		link: function(scope, element, attributes){
			scope.nowShowing = 0;
			$interval(function showNext(){
				if(scope.nowShowing != scope.images.length - 1){
					scope.nowShowing ++;
				}else{
					scope.nowShowing = 0;
				}
			}, 3000);
			scope.openInNewWindow = function(index){
				$window.open(scope.images[index].url);
			}
		}
	};
  
})