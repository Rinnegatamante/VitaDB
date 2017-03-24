<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="infouserController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-widget ">
			<div class="row no-padding">
				<div class="col-md-4">
					<center><img class="icon" src="http://rinnegatamante.it/vitadb/avatars/{{conf.avatar}}" style="max-width: 50%;" /></center> 
				</div>
				<div class="col-md-8">
					<h4 style="white-space: nowrap;overflow: hidden;"><b>{{conf.name}}</b></h3>
					<h6><a href="mailto:{{conf.email}}">{{conf.email}}</a></h6>
					<div class="roleplate" style="background-color: {{conf.color}}">{{conf.role}}</div>
					<h3>
						<span ng-if="conf.website.length > 0"><a href="{{conf.website}}"><i class="fa fa-globe" aria-hidden="true"></i></a></span>
						<span ng-if="conf.twitter.length > 0"><a href="https://twitter.com/{{conf.twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
						<span ng-if="conf.github.length > 0"><a href="https://github.com/{{conf.github}}"><i class="fa fa-github" aria-hidden="true"></i></a></span>
						<span ng-if="conf.github.length == 0 && conf.twitter.length == 0 && conf.website.length == 0">&nbsp;</span>
					</h3>
				</div>
			</div>
			<br>
			<center><h4>Homebrews made by this user:</h4></center>
			<br>
			<div class="row no-padding">
				<div class="fixed-table-container">
					<table data-toggle="table" class="table table-hover">
						<thead>
							<tr>
								<th>Icon</th>
								<th>Title</th>
								<th>Last Update</th>
								<th>Download</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="brew in conf.hbs">
								<th><a href="#/info/{{brew.id}}"><img class="icon" src="https://rinnegatamante.it/vitadb/icons/{{brew.icon}}" style="max-width: 64px;" /></a></th>
								<th><a href="#/info/{{brew.id}}">{{brew.name}} {{brew.version}}</a></th>
								<th>{{brew.date}}</th>
								<th>
									<a href="{{brew.url}}"><input type="submit" value="Download VPK" class="btn btn-primary" /></a>
									<a href="{{brew.data}}" ng-if="brew.data.length > 0"><br><input type="submit" value="Download Data Files" class="btn btn-primary" /></a>
								</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<br>
			<center><h4>Plugins made by this user:</h4></center>
			<br>
			<div class="row no-padding">
				<div class="fixed-table-container">
					<table data-toggle="table" class="table table-hover">
						<thead>
							<tr>
								<th>Title</th>
								<th>Last Update</th>
								<th>Download</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="brew in conf.plugins">
								<th><a href="#/info/{{brew.id}}">{{brew.name}} {{brew.version}}</a></th>
								<th>{{brew.date}}</th>
								<th>
									<a href="{{brew.url}}"><input type="submit" value="Download Plugin" class="btn btn-primary" /></a>
								</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>