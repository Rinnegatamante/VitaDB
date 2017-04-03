/*!
 * Angular Marquee - https://github.com/vepasto/angular-marquee
 */
(function () {
	'use strict';

	angular
		.module('angular-marquee', [])
		.directive('angularMarquee', [
			'$window', '$document',
			function ($window, $document) {
				return {
					restrict: 'EA',
					transclude: true,
					scope: {
						speed: '=?speed',
						speedHover: '=?speedHover'
					},
					template: '<div style="display:inline-block;"><ng-transclude></ng-transclude></div>',
					link: function ($scope, $element) {
						if (!('transform' in document.body.style && 'transition' in document.body.style)) {
							return;
						}

						var speed = $scope.speed / 10 || 12;
						var speedHover = $scope.speedHover / 10 || speed / 3;
						var translateVal;
						var interval;

						var scrollingElement = $element[0].children[0];

						var mouseOver = false;
						$element[0].addEventListener("mouseenter", function () {
							mouseOver = true;
						});

						$element[0].addEventListener("mouseleave", function () {
							mouseOver = false;
						});

						var firstLoad = true;
						(function start() {
							translateVal = $element[0].getBoundingClientRect().width * (firstLoad ? 0.382 : 1);
							firstLoad = false;

							scrollingElement.style.transition = 'none';
							scrollingElement.style.transform = 'translateX(' + translateVal + 'px)';

							$window.setTimeout(function () {
								scrollingElement.style.transition = 'all 0.2s linear';

								interval = $window.setInterval(function () {
									if ($document.hidden) return;
									scrollingElement.style.transform = 'translateX(' + (translateVal -= (mouseOver ? speedHover : speed)) + 'px)';

									if (translateVal < 0 && translateVal < (-1 * scrollingElement.offsetWidth)) {
										$window.clearInterval(interval);
										$window.setTimeout(start, 200);
									}
								}, 100);
							}, 100);
						})();
					}
				}
			}]);
})();
