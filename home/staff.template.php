<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="staffController">
	<div class="row" id="top">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-users" aria-hidden="true"></i> &nbsp;
				Staff
			</li>
		</ol>
	</div>
	<br>	
	<div class="row" id="hb-list">
		<div ng-repeat="user in staff" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="panel panel-widget ">
				<div class="row no-padding">
					<div class="col-md-4">
						<center><a href="#/user/{{user.name}}"><img class="icon" src="https://rinnegatamante.it/vitadb/avatars/{{user.avatar}}" /></a></center>
					</div>
					<div class="col-md-8">
						<h4 style="white-space: nowrap;overflow: hidden;"><a href="#/user/{{user.name}}"><b>{{user.name}}</b></a></h3>
						<h6>
							<a ng-if="user.email.length > 0" href="mailto:{{user.email}}">{{user.email}}</a>
							<span ng-if="user.email.length == 0">&nbsp;</span></h6>
						<div class="roleplate" style="background-color: {{user.color}}">{{user.role}}</div>
						<h3>
							<span ng-if="user.website.length > 0"><a href="{{user.website}}"><i class="fa fa-globe" aria-hidden="true"></i></a></span>
							<span ng-if="user.twitter.length > 0"><a href="https://twitter.com/{{user.twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></span>
							<span ng-if="user.github.length > 0"><a href="https://github.com/{{user.github}}"><i class="fab fa-github" aria-hidden="true"></i></a></span>
							<span ng-if="user.github.length == 0 && user.twitter.length == 0 && user.website.length == 0">&nbsp;</span>
						</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>