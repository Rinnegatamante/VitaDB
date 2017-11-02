// Controller for newconf template
app.controller('infoController',function ($scope, $http, $routeParams, $location, $anchorScroll){
	$scope.conf = {}
	var data = {
		hid: $routeParams.hid
	}
	
	$http.post('get_hb_json.php', data).then(function(res){
		$scope.conf = res.data[0]
		$scope.conf.long_description = res.data[0].long_description
		$scope.conf.sshots = res.data[0].screenshots.split(";")
		$scope.conf.authors = $scope.conf.author.split(" & ")
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