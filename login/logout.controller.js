// Controller for logout template
app.controller('logoutController',function($rootScope, $scope, $http, $location){
	
	// If user used 'Remember me' option during login, we purge localStorage items
	if (localStorage.getItem('id') && localStorage.getItem('token')) {
		localStorage.removeItem('id')
		localStorage.removeItem('token')
		localStorage.removeItem('name')
		localStorage.removeItem('role')
	}
	
	alertify.success('Bye bye, ' + $rootScope.user.name + '')
	$location.path('/login') // Redirecting to login page
	$rootScope.user = undefined
	
})