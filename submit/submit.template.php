<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="submitController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
				Submit a new homebrew
			</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="text" id="hb_title" ng-model="conf.name" class="form-control" placeholder="Homebrew Name" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.version" class="form-control" placeholder="Homebrew Version" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.author" class="form-control" placeholder="Homebrew Author" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.description" class="form-control" placeholder="Homebrew Short Description" required="true" />
						</div>
						<div class="form-group">
							<textarea style="resize: vertical;" ng-model="conf.long_description" class="form-control" placeholder="Homebrew Long Description (Optional)" />
						</div>
						<div class="form-group">
							<input type="text" id="url" ng-model="conf.icon" class="form-control" placeholder="Homebrew Icon Name" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.url" class="form-control" placeholder="Download Url" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.data" class="form-control" placeholder="Data Files Url (Optional)" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.date" class="form-control" placeholder="Release Date" required="true" />
						</div>
						<div class="form-group">
							<input type="text" id="hb_titleid" ng-model="conf.titleid" class="form-control" placeholder="Title ID" required="true" />
						</div>
						<div class="form-group">
							<select  ng-model="conf.type" required="true" class="form-control">
								<option value=1>Original Game</option>
								<option value=2>Game Port</option>
								<option value=4>Utility</option>
								<option value=5>Emulator</option>
								<option value=7>Engine</option>
								<option value=3>Interpreter</option>
							</select>
						</div>
						<input type="text" id="email" style="width: 0px;height: 0px;" ng-model="conf.user" />
						<input type="text" id="pass" style="width: 0px;height: 0px;" ng-model="conf.password" />
						<iframe scrolling="no" frameBorder="0" id="uploader" width="100%" height="80px" ng-src="{{conf.uploader}}" onload="document.getElementById('uploader').contentWindow.document.getElementById('email').value = document.getElementById('email').value;document.getElementById('uploader').contentWindow.document.getElementById('pass').value = document.getElementById('pass').value;document.getElementById('url').value = document.getElementById('uploader').contentWindow.document.getElementById('icon_url').innerHTML;"></iframe>
						<iframe scrolling="no" frameBorder="0" id="uploader2" width="100%" height="80px" src="param.html" onload="document.getElementById('hb_title').value = document.getElementById('uploader2').contentWindow.document.getElementById('hb_title').innerHTML;document.getElementById('hb_titleid').value = document.getElementById('uploader2').contentWindow.document.getElementById('hb_titleid').innerHTML;"></iframe>
						<br>
						<input type="submit" value="Submit the homebrew" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

