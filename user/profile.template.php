<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="profileController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-user" aria-hidden="true"></i> &nbsp;
				My Profile
			</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<h4>Personal Data:</h4>
						</div>
						<div class="form-group">
							<input type="text" id="username" ng-model="conf.name" class="form-control" disabled="true" required="true" />
						</div>
						<div class="form-group">
							<input type="email" ng-model="conf.email" class="form-control" disabled="true" required="true" placeholder="E-Mail" />
						</div>
						<div class="form-group">
							<div class="roleplate" style="background-color: {{conf.color}}">{{conf.role}}</div>
						</div>
						<div class="form-group">
							<h4>Social:</h4>
						</div>
						<div class="form-group">
							<i class="fa fa-twitter" aria-hidden="true"></i> Twitter Account
							<input id="twitter" type="text" ng-model="conf.twitter" class="form-control" placeholder="Twitter Account" />
						</div>
						<div class="form-group">
							<i class="fa fa-github" aria-hidden="true"></i> Github Account
							<input type="text" ng-model="conf.github" class="form-control" placeholder="Github Account" />
						</div>
						<div class="form-group">
							<i class="fa fa-globe" aria-hidden="true"></i> Personal Website
							<input type="text" ng-model="conf.website" class="form-control" placeholder="Personal Website" />
						</div>
						<div class="form-group">
							<h4>Avatar:</h4>
						</div>
						<div class="form-group">
							<center><img class="icon" src="http://rinnegatamante.it/vitadb/avatars/{{conf.avatar}}" style="max-width: 50%;" /></center>
						</div>
						<div class="form-group">
							<h5>&nbsp;Avatar must be a 240x240 JPG/PNG image.</h5>
						</div>
						<input type="text" id="email" style="height:0;width:0;padding:0;border:none;" ng-model="conf.name" />
						<input type="text" id="pass" style="height:0;width:0;padding:0;border:none;" ng-model="conf.password" />
						<input type="text" style="height:0;width:0;padding:0;border:none;" id="url" />
						<iframe scrolling="no" frameBorder="0" id="uploader" width="100%" height="80px" src="avatar.html" onload="document.getElementById('uploader').contentWindow.document.getElementById('email').value = document.getElementById('email').value;document.getElementById('uploader').contentWindow.document.getElementById('pass').value = document.getElementById('pass').value;document.getElementById('url').value = document.getElementById('uploader').contentWindow.document.getElementById('icon_url').innerHTML;"></iframe>
						<input type="submit" value="Submit changes" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>