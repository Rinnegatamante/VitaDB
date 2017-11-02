<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="loginController">
	<iframe ng-if="(!user) || (user.role == 5)" scrolling="no" frameBorder="0" id="uploader" width="100%" height="100px" src="ads.html"></iframe>
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Log in</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="email" name="email" ng-model="user.email" class="form-control" placeholder="E-mail" required="true" autocomplete="true">
						</div>
						<div class="form-group">
							<input type="password" ng-model="user.password" class="form-control" placeholder="Password" required="true">
						</div>
						<div class="checkbox">
							<label>
							<input ng-model="remember" type="checkbox" value="Remember Me">Remember Me
							</label>
						</div>
						<input type="submit" value="Login" class="btn btn-primary" />
					</fieldset>
					<div class="pull-right">
						<a href="#/register">Don't have an account? Register now!</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>