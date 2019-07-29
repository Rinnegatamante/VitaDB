<div ng-controller="bountiesController">
	<br><br>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					Bounties Tracker
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="form-group">
							Are you a developer? Do you want to earn money while making PSVITA scene greater? Here you can find all the actually opened bounties on Bountysource related to PSVita development. You can pick one of those bounties and earn the bounty prize once completed!<br><br>
							Are you a PSVITA user willing to donate some money for a project to become reality? Here you can contribute to active bounties or start a new one for a brand new project!<br><br>
							<center><a href="" data-toggle="modal" data-target="#newBounty"><input type="submit" value="Start a new bounty" class="btn btn-primary" /></a></center>
						</div>
						<div class="form-group">
							<h4>Active Bounties: </h4>
							<div class="row no-padding">
								<div class="fixed-table-container col" style="overflow:auto;">
									<table data-toggle="table" class="table table-hover">
										<thead>
											<tr>
												<th>Bounty Info</th>
												<th>Amount</th>
												<th>Project</th>
												<th>Link</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="bounty in bounties">
												<td>
													<b ng-if="bounty.status == 1"><font color="red">{{bounty.title}}</font></b>
													<b ng-if="bounty.status == 0"><font color="green">{{bounty.title}}</font></b>
													<br>
													<span ng-bind-html="bounty.description | unsafe"></span>
												</td>
												<td>
													<b>{{bounty.amount}}$</b>
												</td>
												<td>
													<b>{{bounty.project}}</b>
												</td>
												<td><a href="{{bounty.url}}" ng-if="bounty.status == 0"><input type="submit" value="Bountysource" class="btn btn-primary" /></a>
												<span ng-if="bounty.status == 1"><b>Completed!</b></span>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body modal fade" id="newBounty" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Submit a new bounty</h4>
				</div>
				<div class="modal-body">
					<h4>Instructions:</h4>
					<ul>
						<li>Create a new Issue on <b><a href="https://github.com/vita-nuova/bounties/issues">Vita Nuova bounties repository.</a></b></li>
						<li>Go on <b><a href="https://www.bountysource.com/">BountySource</a></b> and click on <b>Post Bounty</b> button (<a href="../images/bounty1.png">Image</a>).</li>
						<li>Insert the GitHub issue url in the textbox that will show and proceed.</li>
						<li>You'll be now able to donate on the newly create bounty as for other existing bounties.</li>
						<br><b>NOTE: The bounty will show on Vita Nuova website later since it needs to be manually added to the Bounties Lister!</b>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body modal fade" id="pluginQR" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Download {{conf.name}}</h4>
				</div>
				<div class="modal-body">
					<center><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{conf.url}}"></img></center>
					<h4>Instructions:</h4>
					<ul>
						<li>Start <b>VitaShell</b> on your PSVITA device.</li>
						<li>Press L + R to start the QR code scanner.</li>
						<li>Point your PSVITA device to the QR code to download <b>{{conf.name}}</b>.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>