<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="registerController">
	<iframe ng-if="(!user) || (user.role == 5)" scrolling="no" frameBorder="0" id="uploader" width="100%" height="100px" src="ads.html"></iframe>
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="register-panel panel panel-default">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="name" name="name" ng-model="user.name" class="form-control" placeholder="Username" required="true" autocomplete="true">
						</div>
						<div class="form-group">
							<input type="email" name="email" ng-model="user.email" class="form-control" placeholder="E-mail" required="true" autocomplete="true">
						</div>
						<div class="form-group">
							<input type="password" ng-model="user.password" class="form-control" placeholder="Password" required="true">
						</div>
						<div class="form-group">
							<input type="password" ng-model="user.password2" class="form-control" placeholder="Confirm Password" required="true">
						</div>
						<input type="submit" value="Register" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>