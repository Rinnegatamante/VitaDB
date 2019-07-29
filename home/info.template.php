<div ng-controller="infoController">
	<br><br>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="#/" ng-if="conf.type < 8"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
					<a href="#/plugins" ng-if="conf.type == 8"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
					<a href="#/tools" ng-if="conf.type == 9"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
					<img class="icon" ng-if="conf.type < 8" src="https://rinnegatamante.it/vitadb/icons/{{conf.icon}}" style="height: 100%;" /> {{conf.name}} {{conf.version}}
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="form-group">
							<h4>Author: </h4>
							<span ng-repeat="author in conf.authors">{{ $first ? '' : ' & '}}<a href="#/user/{{author}}">{{author}}</a></span>
						</div>
						<div class="form-group">
							<h4>Size: </h4>
							<span ng-if="conf.type < 8" style="white-space: pre-line;">VPK Size: {{conf.size}}<br></span>
							<span ng-if="conf.type == 8" style="white-space: pre-line;">Plugin Size: {{conf.size}}</span>
							<span ng-if="conf.type == 9" style="white-space: pre-line;">Tool Size: {{conf.size}}</span>
							<span ng-if="conf.data.length > 0" style="white-space: pre-line;">Data Files Size: {{conf.data_size}}</span>
						</div>
						<div class="form-group">
							<h4>Description: </h4>
							<span ng-if="conf.long_description" style="white-space: pre-line;">{{conf.long_description}}</span>
							<span ng-if="!conf.long_description" style="white-space: pre-line;">{{conf.description}}</span>
						</div>
						<div class="form-group">
							<h4>Additional info: </h4>
							<span ng-if="!conf.source && !conf.release_page">No additional info available.</span>
							<span ng-if="conf.source" style="white-space: pre-line;">Sourcecode: <a href="{{conf.source}}">Click Here (External Link)</a><br></span>
							<span ng-if="conf.release_page" style="white-space: pre-line;">Release Page: <a href="{{conf.release_page}}">Click Here (External Link)</a></span>
						</div>
						<div class="form-group">
							<h4>Analytics: </h4>
							Global downloads count: {{conf.downloads}}
						</div>
						<div class="form-group">
							<h4>Support the authors: </h4>
							<div class="row no-padding">
								<div class="fixed-table-container col" style="overflow:auto;">
									<table data-toggle="table" class="table table-hover">
										<thead>
											<tr>
												<th>Author Name</th>
												<th>Donation Methods</th>
												<th>Bitcoin Wallet</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="author in conf.authors_info">
												<td><a href="#/user/{{author.name}}">{{author.name}}</a></td>
												<td>
													<span ng-if="author.patreon.length <= 0 && author.paypal.length <= 0">No available donation methods</span>
													<span ng-if="author.patreon.length > 0"><a href="https://www.patreon.com/{{author.patreon}}"><i class="fab fa-patreon" aria-hidden="true"></i></a></span>
													<span ng-if="author.paypal.length > 0"><a href="https://www.paypal.me/{{author.paypal}}"><i class="fab fa-paypal" aria-hidden="true"></i></a></span>
												</td>
												<td>
													<span ng-if="author.bitcoin.length > 0"><b>{{author.bitcoin}}</b></span>
													<span ng-if="author.bitcoin.length <= 0">No Bitcoin address available.</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group">
							<h4>Multimedia: </h4>
							<table ng-if="conf.screenshots || conf.trailer" data-toggle="table" class="table table-hover">
								<thead>
									<tr>
										<td ng-if="conf.screenshots">
											<a href="" ng-if="conf.multimedia_tab == 0" ng-click="conf.multimedia_tab = 0">
												<b>Screenshots</b>
											</a>
											<a href="" ng-if="conf.multimedia_tab == 1" ng-click="conf.multimedia_tab = 0">
												Screenshots
											</a>
										</td>
										<td ng-if="conf.trailer" width=100%>
											<a href="" ng-if="conf.multimedia_tab == 1" ng-click="conf.multimedia_tab = 1">
												<b>Video</b>
											</a>
											<a href="" ng-if="conf.multimedia_tab == 0" ng-click="conf.multimedia_tab = 1">
												Video
											</a>
										</td>
									</tr>
								</thead>
							</table>
							<div ng-if="conf.screenshots && conf.multimedia_tab <= 0" gallery="" images="conf.sshots"></div>
							<div class="iframe-container" ng-if="conf.trailer && conf.multimedia_tab >= 1">
								<div class="iframe-box">
									<center>
										<iframe width="2" height="2" ng-src="{{conf.youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
									</center>
								</div>
							</div>
							<span ng-if="!conf.screenshots && !conf.trailer">No screenshots or video available.</span>
						</div>
						<br>
						<a href="{{conf.url}}" ng-if="conf.type < 8"><input type="submit" value="Download VPK" class="btn btn-primary" /></a>
						<a href="{{conf.url}}" ng-if="conf.type == 8"><input type="submit" value="Download Plugin" class="btn btn-primary" /></a>
						<a href="{{conf.url}}" ng-if="conf.type == 9"><input type="submit" value="Download Tool" class="btn btn-primary" /></a>
						<a href="{{conf.data}}" ng-if="conf.data.length > 0"><input type="submit" value="Download Data Files" class="btn btn-primary" /></a>
						<a href="" data-toggle="modal" data-target="#vpkQR" ng-if="conf.type < 8"><input type="submit" value="Get QR Code (VPK)" class="btn btn-primary" /></a>
						<a href="" data-toggle="modal" data-target="#pluginQR" ng-if="conf.type == 8"><input type="submit" value="Get QR Code" class="btn btn-primary" /></a>
						<a href="" data-toggle="modal" data-target="#dataQR" ng-if="conf.data.length > 0"><input type="submit" value="Get QR Code (Data Files)" class="btn btn-primary" /></a>
						<a href="#/edit/{{conf.id}}" ng-if="user && user.role < 5"><input type="submit" value="Edit" class="btn btn-primary" /></a>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body modal fade" id="vpkQR" role="dialog">
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
						<li>Point your PSVITA device to the QR code to install <b>{{conf.name}}</b>.</li>
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
	<div class="panel-body modal fade" id="dataQR" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Download {{conf.name}} data files</h4>
				</div>
				<div class="modal-body">
					<center><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{conf.data}}"></img></center>
					<h4>Instructions:</h4>
					<ul>
						<li>Start <b>VitaShell</b> on your PSVITA device.</li>
						<li>Press L + R to start the QR code scanner.</li>
						<li>Point your PSVITA device to the QR code to download <b>{{conf.name}}</b> data files.</li>
						<li>Extract the zip archive in <b>ux0:data</b> using <b>Vitashell</b>.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>