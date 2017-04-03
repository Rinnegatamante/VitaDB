<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="submit2Controller">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
				Submit a new plugin
			</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="text" ng-model="conf.name" class="form-control" placeholder="Plugin Name" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.version" class="form-control" placeholder="Plugin Version" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.author" class="form-control" placeholder="Plugin Author" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.description" class="form-control" placeholder="Plugin Short Description" required="true" />
						</div>
						<div class="form-group">
							<textarea style="resize: vertical;" ng-model="conf.long_description" class="form-control" placeholder="Plugin Long Description (Optional)"></textarea>
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.url" class="form-control" placeholder="Download Url" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.date" class="form-control" placeholder="Release Date" required="true" />
						</div>
						<br>
						<input type="submit" value="Submit the plugin" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

