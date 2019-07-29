var app = angular.module('VitaDB', ['ngRoute', 'ngAnimate', 'angularFileUpload', 'angular-marquee', 'angularCSS', 'angular.filter'])

app.run(function ($http, $rootScope, $location){
	if (localStorage.getItem('id') && localStorage.getItem('token')) {
		$rootScope.user = {}
		$rootScope.user.email = localStorage.getItem('id');
		$rootScope.user.password = localStorage.getItem('token');
		$rootScope.user.name = localStorage.getItem('name');
		$rootScope.user.role = localStorage.getItem('role');
		$rootScope.theme = localStorage.getItem('theme');
	}else{
		$rootScope.theme = "Dark";
	}
})

app.factory('HttpInterceptorMessage', ['$q', '$location', '$rootScope', function ($q, $location, $rootScope) {
	return {
		
		// optional method
		'request': function (config) {
			
			// do something on success
			if ($rootScope.user) {
				var id = $rootScope.user.id
				var token = $rootScope.user.password
			} else {
				var id = localStorage.getItem('id')
				var token = localStorage.getItem('token')
			}
			if (token && id) {
				config.headers['www-authenticate'] = window.btoa(id + ' ' + token)
			}
			return config
		},
		'response': function (response) {
			
			// do something on success
			if (response.data.message) {
				alertify.success(response.data.message)
			};
			return response
		},

		'responseError': function (response) {
			
			// do something on error
			if (response.data && response.data.message) {
				alertify.error(response.data.message)
			}
			if (response.data && response.data.error) {
				alertify.error(response.data.error.error)
			}

			return $q.reject(response)
		}
	}
}])

// Templates mapper
app.config(['$locationProvider', '$routeProvider', '$httpProvider',
	function ($locationProvider, $routeProvider, $httpProvider) {
		$routeProvider
		.when('/', {
			templateUrl: 'home/home.template.php',
			reloadOnSearch: false
		})
		.when('/login', {
			templateUrl: 'login/login.template.php'
		})
		.when('/register', {
			templateUrl: 'login/register.template.php'
		})
		.when('/logout', {
			templateUrl: 'login/logout.template.php'
		})
		.when('/submit', {
			templateUrl: 'submit/submit.template.php'
		})
		.when('/submit2', {
			templateUrl: 'submit/submit2.template.php'
		})
		.when('/submit3', {
			templateUrl: 'submit/submit3.template.php'
		})
		.when('/submit4', {
			templateUrl: 'submit/submit4.template.php'
		})
		.when('/plugins', {
			templateUrl: 'home/home2.template.php',
			reloadOnSearch: false
		})
		.when('/tools', {
			templateUrl: 'home/home3.template.php',
			reloadOnSearch: false
		})
		.when('/api', {
			templateUrl: 'home/api.template.php'
		})
		.when('/edit/:hid', {
			templateUrl: 'submit/edit.template.php'
		})
		.when('/info/:hid', {
			templateUrl: 'home/info.template.php'
		})
		.when('/staff', {
			templateUrl: 'home/staff.template.php'
		})
		.when('/supporters', {
			templateUrl: 'home/supporters.template.php'
		})
		.when('/user/:uname', {
			templateUrl: 'user/info.template.php'
		})
		.when('/profile', {
			templateUrl: 'user/profile.template.php'
		})
		.when('/titleids', {
			templateUrl: 'home/titleslist.template.php'
		})
		.when('/bounties', {
			templateUrl: 'home/bounties.template.php'
		})
		$httpProvider.interceptors.push('HttpInterceptorMessage')
}])