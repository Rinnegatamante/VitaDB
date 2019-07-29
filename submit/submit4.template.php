<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="submit4Controller">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
				Submit a new Vita bounty
			</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="text" ng-model="conf.bid" class="form-control" placeholder="Bountysource ID" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.project" class="form-control" placeholder="Bounty Project" required="true" />
						</div>
						<br>
						<input type="submit" value="Submit the bounty" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

