<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="infoController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="#/" ng-if="conf.type < 8"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
				<a href="#/plugins" ng-if="conf.type == 8"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
				<img class="icon" ng-if="conf.type < 8" src="https://rinnegatamante.it/vitadb/icons/{{conf.icon}}" style="height: 100%;" /> {{conf.name}} {{conf.version}}
			</div>
			<div class="panel-body">
				<fieldset>
					<div class="form-group">
						<h4>Author: </h4> {{conf.author}}
					</div>
					<div class="form-group">
						<h4>Description: </h4> 
						<span ng-if="conf.long_description" style="white-space: pre-line;">{{conf.long_description}}</span>
						<span ng-if="!conf.long_description" style="white-space: pre-line;">{{conf.description}}</span>
					</div>
					<div class="form-group">
						<h4>Analytics: </h4>
						Global downloads count: {{conf.downloads}}
					</div>
					<div class="form-group">
						<h4>Screenshots: </h4>
						<div ng-if="conf.screenshots" gallery="" images="conf.sshots"></div>
						<span ng-if="!conf.screenshots">No screenshots available.</span>
					</div>
					<br>
					<a href="{{conf.url}}" ng-if="conf.type < 8"><input type="submit" value="Download VPK" class="btn btn-primary" /></a>
					<a href="{{conf.url}}" ng-if="conf.type == 8"><input type="submit" value="Download Plugin" class="btn btn-primary" /></a>
					<a href="{{conf.data}}" ng-if="conf.data.length > 0"><input type="submit" value="Download Data Files" class="btn btn-primary" /></a>
				</fieldset>
			</div>
		</div>
	</div>
</div>