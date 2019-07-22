<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="apiController">
	<div class="row" id="top">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-desktop" aria-hidden="true"></i> &nbsp;
				Developer Api
			</li>
		</ol>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
			<select style="display:inline-block;vertical-align:middle;" ng-change="changeView()" ng-model="cat_filter" required="true" class="form-control">
				<option value=0>JSON</option>
				<option value=1>YAML</option>
			</select>
		</div>
	</div>
	<br>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">Developer Api</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							We provide a minimalistic PHP API to interact with our database. To use these API you just have to execute a POST request without any parameter to the following links:
						</div>
						<div class="form-group">
							<b>Get Homebrews List</b>: <br>
							<ul>
								<li><b>HTTP</b>: http://rinnegatamante.it/vitadb/list_hbs_<span ng-if="cat_filter == 0">json</span><span ng-if="cat_filter == 1">yaml</span>.php</li>
								<li><b>HTTPS</b>: https://rinnegatamante.it/vitadb/list_hbs_<span ng-if="cat_filter == 0">json</span><span ng-if="cat_filter == 1">yaml</span>.php</li>
							</ul>
							<b>Get Plugins List</b>: <br>
							<ul>
								<li><b>HTTP</b>: http://rinnegatamante.it/vitadb/list_plugins_<span ng-if="cat_filter == 0">json</span><span ng-if="cat_filter == 1">yaml</span>.php</li>
								<li><b>HTTPS</b>: https://rinnegatamante.it/vitadb/list_plugins_<span ng-if="cat_filter == 0">json</span><span ng-if="cat_filter == 1">yaml</span>.php</li>
							</ul>
							<b>Get PC Tools List</b>: <br>
							<ul>
								<li><b>HTTP</b>: http://rinnegatamante.it/vitadb/list_tools_<span ng-if="cat_filter == 0">json</span><span ng-if="cat_filter == 1">yaml</span>.php</li>
								<li><b>HTTPS</b>: https://rinnegatamante.it/vitadb/list_tools_<span ng-if="cat_filter == 0">json</span><span ng-if="cat_filter == 1">yaml</span>.php</li>
							</ul>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
</div>