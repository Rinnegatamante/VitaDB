<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="supporterController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-widget ">
			<br>
			<center><h4>This is the full list of Patreon supporters. Thank you all for your contributions!</h4></center>
			<center><h6>If you want to support this project, <a href="https://www.patreon.com/Rinnegatamante">become a Patron!</a></h6></center>
			<br>
			<div class="fixed-table-container col" style="overflow:auto;">
				<table data-toggle="table" class="table table-hover">
					<thead>
						<tr>
							<th>Avatar</th>
							<th>Nickname</th>
							<th>Supporter since</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="sup in users">
							<td><a href="#/user/{{sup.name}}"><img class="icon" src="https://rinnegatamante.it/vitadb/avatars/{{sup.avatar}}" style="max-width: 64px;" /></a></td>
							<td><a href="#/user/{{sup.name}}">{{sup.name}}</a></td>
							<td>{{sup.supporter_date}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>