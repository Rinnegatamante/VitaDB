// Controller for login template
app.controller('registerController',function($rootScope, $scope, $http, $location){
	
	// Check if the user is logged, if so redirect to dashboard
	if ($rootScope.user != null){
		$location.path('/')
	}
	
	// submit function, execute an user registration
	$scope.submit = function () {
		var data = {
			name: $scope.user.name,
			email: $scope.user.email,
			password: $scope.user.password,
			password2: $scope.user.password2
		}
		
		// Registration request to the server
		$http.post('register.php', data).then(res => {
			
			// Login request to the server
			$http.post('login.php', data).then(res => {
				if (res.data[0].name != null){
					$rootScope.user = res.data[0]
					alertify.success('Welcome, ' + $rootScope.user.name + '!')
				
					$location.path('/')
					localStorage.removeItem('id')
					localStorage.removeItem('token')
					localStorage.removeItem('name')
					localStorage.removeItem('role')
				}else alertify.error('Email or username already taken.')
			})
			
		})
		
	}
	
})