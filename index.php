<!DOCTYPE html>
<html ng-app="easyrashApp">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>VitaDB BETA</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="templates/lumino/css/bootstrap.min.css" rel="stylesheet">
		<link href="templates/lumino/css/datepicker3.css" rel="stylesheet">
		<link href="templates/lumino/css/styles.css" rel="stylesheet">
		<link href="js/dependencies/alertify.js-master/dist/css/alertify.css" rel="stylesheet" id="alertifyCSS">
		<link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="js/dependencies/tooltipster-master/dist/css/tooltipster.bundle.min.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<style type="text/css">
			#bot-part{
				color: #30a5ff;
				position: fixed;
				bottom: 0;
				left: 10px;
				overflow: hidden;
			}
			#bot-part2{
				color: #30a5ff;
				position: fixed;
				bottom: 20px;
				left: 10px;
			}
		</style>
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<!--<script type="text/javascript">
			window.onerror = function (errorMsg, url, lineNumber) {
				alert('Error: ' + errorMsg + ' Script: ' + url + ' Line: ' + lineNumber);
		}-->
		</script>
		<script src="node_modules/angular/angular.min.js"></script>
		<script src="node_modules/angular-route/angular-route.min.js"></script>
		<script src="node_modules/angular-animate/angular-animate.min.js"></script>
		<script src="node_modules/angular-file-upload/dist/angular-file-upload.min.js"></script>
		<script src="https://code.angularjs.org/1.5.8/angular-animate.min.js"></script>
		<script src="node_modules/js-md5/build/md5.min.js"></script>
		<script src="templates/lumino/js/lumino.glyphs.js"></script>
		<script src="templates/lumino/js/jquery-1.11.1.min.js"></script>
		<script src="js/dependencies/alertify.js-master/dist/js/alertify.js"></script>
		<script src="app.js"></script>
		<script src="home/home.controller.js"></script>
		<script src="home/home2.controller.js"></script>
		<script src="home/api.controller.js"></script>
		<script src="home/info.controller.js"></script>
		<script src="login/login.controller.js"></script>
		<script src="login/logout.controller.js"></script>
		<script src="submit/submit.controller.js"></script>
		<script src="submit/submit2.controller.js"></script>
		<script src="submit/edit.controller.js"></script>
		<script type="text/javascript">
			var listTicker = function(options) {
				var defaults = {
					list: [],
					startIndex:0,
					interval: 3 * 1000,
				}   
				var options = $.extend(defaults, options);
       
				var listTickerInner = function(index) {

					if (options.list.length == 0) return;

					if (!index || index < 0 || index > options.list.length) index = 0;

					var value= options.list[index];

					options.trickerPanel.fadeOut(function() {
						$(this).html(value).fadeIn();
					});
        
					var nextIndex = (index + 1) % options.list.length;

					setTimeout(function() {
						listTickerInner(nextIndex);
					}, options.interval);

				};
    
				listTickerInner(options.startIndex);
			}
    
			var textlist = new Array("<b>Rinnegatamante</b>: Creator & Maintainer", "<b>gnmmarechal</b>: Database Moderator");

			$(function() {
					listTicker({
					list: textlist ,
					startIndex:0,
					trickerPanel: $('#credits'),
					interval: 3 * 1000,
				});
			});
		</script>
	</head>
	<body>
		<input type='hidden' name='_csrf' value='<%= _csrf %>'>
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-login" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#/"><span>Vita</span>DB <span>BETA</span></a>
					<ul class="user-menu">
						<li class="dropdown pull-right">
							<a class="dropdown-toggle" data-toggle="dropdown">
								<svg class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg>
								{{user.email}}<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li ng-if="user">
									<a href="#logout">
										<svg class="glyph stroked lock">
											<use xlink:href="#stroked-lock"/>
										</svg>
										Logout
									</a>
								</li>
								<li ng-if="!user">
									<a href="#login">
										<svg class="glyph stroked lock">
											<use xlink:href="#stroked-lock"/>
										</svg>
										Login
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- /.container-fluid -->
		</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar collapse">
			<ul class="nav menu">
				<li>
					<a href="#/">
						<i class="fa fa-gamepad" aria-hidden="true"></i> &nbsp;
						Homebrews
					</a>
				</li>
				<li>
					<a href="#/plugins">
						<i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;
						Plugins
					</a>
				</li>
				<li>
					<a href="#/api">
						<i class="fa fa-laptop" aria-hidden="true"></i> &nbsp;
						Developer Api
					</a>
				</li>
				<li ng-if="user">
					<a href="#/submit">
						<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
						Submit a new homebrew
					</a>
				</li>
				<li ng-if="user">
					<a href="#/submit2">
						<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
						Submit a new plugin
					</a>
				</li>
				<li role="presentation" class="divider"></li>
				<li ng-if="user">
					<a href="#logout">
						<svg class="glyph stroked cancel">
							<use xlink:href="#stroked-cancel"/>
						</svg>
						Logout
					</a>
				</li>
				<li ng-if="!user">
					<a href="#login">
						<svg class="glyph stroked lock">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-lock"></use>
						</svg>
						Login
					</a>
				</li>
			</ul>
			<div id="bot-part2">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="THAZNKQUQT9D8">
					<center>
						<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
					</center>
				</form>
			</div>
			<div id="bot-part">
				<h6 style="color: #30a5ff; overflow: hidden;" id='credits'></h6>
			</div>
		</div>
		<div ng-view class="slide page"></div>
		<script src="templates/lumino/js/bootstrap.min.js"></script>
		<script src="templates/lumino/js/chart.min.js"></script>
		<script src="templates/lumino/js/chart-data.js"></script>
		<script src="templates/lumino/js/easypiechart.js"></script>
		<script src="templates/lumino/js/bootstrap-datepicker.js"></script>
		<script src="templates/lumino/js/easypiechart-data.js"></script>
		<script src="js/dependencies/tooltipster-master/dist/js/tooltipster.bundle.min.js"></script>
	</body>
</html>
