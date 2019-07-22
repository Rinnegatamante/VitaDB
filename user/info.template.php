<div ng-controller="infouserController">
	<br><br>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
			<br>
			<div class="panel panel-widget ">
				<div class="row no-padding">
					<div class="col-md-4">
						<center><img class="icon" src="https://rinnegatamante.it/vitadb/avatars/{{conf.avatar}}" style="max-width: 50%;" /></center> 
					</div>
					<div class="col-md-8">
						<h4 style="white-space: nowrap;overflow: hidden;"><b>{{conf.name}}</b></h3>
						<h6><a href="mailto:{{conf.email}}">{{conf.email}}</a></h6>
						<div class="roleplate" style="background-color: {{conf.color}}">{{conf.role}}</div>
						<h3>
							<span ng-if="conf.website.length > 0"><a href="{{conf.website}}"><i class="fa fa-globe" aria-hidden="true"></i></a></span>
							<span ng-if="conf.twitter.length > 0"><a href="https://twitter.com/{{conf.twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></span>
							<span ng-if="conf.github.length > 0"><a href="https://github.com/{{conf.github}}"><i class="fab fa-github" aria-hidden="true"></i></a></span>
							<span ng-if="conf.github.length == 0 && conf.twitter.length == 0 && conf.website.length == 0">&nbsp;</span>
							<span ng-if="conf.patreon.length > 0"><a href="https://www.patreon.com/{{conf.patreon}}"><i class="fab fa-patreon" aria-hidden="true"></i></a></span>
							<span ng-if="conf.paypal.length > 0"><a href="https://www.paypal.me/{{conf.paypal}}"><i class="fab fa-paypal" aria-hidden="true"></i></a></span>
							<span ng-if="conf.bitcoin.length > 0"><a href="" data-toggle="modal" data-target="#bitcoinPopup"><i class="fab fa-bitcoin" aria-hidden="true"></i></a></span>
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
									<td><a href="#/info/{{brew.id}}"><img class="icon" src="https://rinnegatamante.it/vitadb/icons/{{brew.icon}}" style="max-width: 64px;" /></a></td>
									<td><a href="#/info/{{brew.id}}">{{brew.name}} {{brew.version}}</a></td>
									<td>{{brew.date}}</td>
									<td>
										<a href="{{brew.url}}"><input type="submit" value="Download VPK" class="btn btn-primary" /></a>
										<a href="{{brew.data}}" ng-if="brew.data.length > 0"><br><input type="submit" value="Download Data Files" class="btn btn-primary" /></a>
									</td>
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
									<td><a href="#/info/{{brew.id}}">{{brew.name}} {{brew.version}}</a></td>
									<td>{{brew.date}}</td>
									<td>
										<a href="{{brew.url}}"><input type="submit" value="Download Plugin" class="btn btn-primary" /></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<center><h4>PC Tools made by this user:</h4></center>
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
								<tr ng-repeat="brew in conf.tools">
									<td><a href="#/info/{{brew.id}}">{{brew.name}} {{brew.version}}</a></td>
									<td>{{brew.date}}</td>
									<td>
										<a href="{{brew.url}}"><input type="submit" value="Download Tool" class="btn btn-primary" /></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body modal fade" id="bitcoinPopup" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Donate BTC to {{conf.name}}</h4>
				</div>
				<div class="modal-body">
					<h4>{{conf.bitcoin}}</h4>
				</div>
			</div>
		</div>
	</div>
</div>