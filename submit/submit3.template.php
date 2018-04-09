<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="submit3Controller">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
				Submit a new PC tool
			</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="text" ng-model="conf.name" class="form-control" placeholder="Tool Name" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.version" class="form-control" placeholder="Tool Version" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.author" class="form-control" placeholder="Tool Author" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.description" class="form-control" placeholder="Tool Short Description" required="true" />
						</div>
						<div class="form-group">
							<textarea style="resize: vertical;" ng-model="conf.long_description" class="form-control" placeholder="Tool Long Description (Optional)"></textarea>
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.url" class="form-control" placeholder="Download Url" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.date" class="form-control" placeholder="Release Date" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.source" class="form-control" placeholder="Sourcecode Link" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.release_page" class="form-control" placeholder="Release Page Link" />
						</div>
						<div class="form-group">
							<input type="text" id="sshot" ng-model="conf.sshot" class="form-control" placeholder="Screenshots Data" />
						</div>
						<input type="text" id="email" style="height:0;width:0;padding:0;border:none;" ng-model="conf.user" />
						<input type="text" id="pass" style="height:0;width:0;padding:0;border:none;" ng-model="conf.password" />
						<iframe scrolling="no" frameBorder="0" id="uploader3" width="100%" height="250px" src="screenshots.html" onload="document.getElementById('uploader3').contentWindow.document.getElementById('email').value = document.getElementById('email').value;document.getElementById('uploader3').contentWindow.document.getElementById('pass').value = document.getElementById('pass').value;document.getElementById('sshot').value = document.getElementById('uploader3').contentWindow.document.getElementById('sshots_url').innerHTML;document.getElementById('sshot').value = document.getElementById('uploader3').contentWindow.document.getElementById('sshots_url').innerHTML;"></iframe>
						<br>
						<input type="submit" value="Submit the tool" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

