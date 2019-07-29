<div ng-controller="titleslistController">
	<br><br>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					Title IDs Lister
				</div>
				<div class="panel-body">
					<fieldset>
						<div class="form-group">
							Are you working on a new homebrew? Take a look at this Title IDs list and avoid to use an already taken Title ID for your homebrew.<br>
							In this way, your homebrew won't cause incompatibilities with other already existing homebrews!
						</div>
						<div class="form-group">
							<h4>Title IDs List: </h4>
							<div class="row no-padding">
								<div class="fixed-table-container col" style="overflow:auto;">
									<table data-toggle="table" class="table table-hover">
										<thead>
											<tr>
												<th>Title ID</th>
												<th>Titles List</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="(key, value) in brews | groupBy: 'titleid'">
												<td ng-if="value.length > 1">
													<b><font color="red">{{key}}</font></b>
												</td>
												<td ng-if="value.length <= 1">
													<b><font color="green">{{key}}</font></b>
												</td>
												<td><table data-toggle="table" class="table table-hover">
													<thead>
													<tr>
														<th width=50%>Title</th>
														<th>Author</th>
													</tr>
													</thead>
													<tbody>
														<tr ng-repeat="brew in value">
														<td><a href="#/info/{{brew.id}}">{{brew.name}}</a></td>
														<td><span ng-repeat="author in brew.authors">{{ ($first) ? '' : ' & ' }}<a href="#/user/{{author}}">{{author}}</a></td>
														</tr>
													</tbody>
												</table></td>
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
</div>