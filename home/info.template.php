<style type="text/css">
	.fade-animation.ng-hide-add,
	.fade-animation.ng-hide-remove {
		display:block !important;
		opacity:1;
	}
	.fade-animation.ng-hide {
		opacity:0;
	}

	.container{
		width: 100%;
		height: 100%;
	}
	.gallery-image{
		width: 100%;
		height: 100%;
	}
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="infoController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="register-panel panel panel-default">
			<div class="panel-heading">
				<a href="" onclick="history.go(-1);"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
				<img ng-if="conf.type < 8" src="http://rinnegatamante.it/vitadb/icons/{{conf.icon}}" style="height: 100%;" /> {{conf.name}} {{conf.version}}
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
						<h4>Screenshots: </h4>
						<div ng-if="conf.screenshots" gallery="" images="conf.sshots"></div>
						<span ng-if="!conf.screenshots">No screenshots available.</span>
					</div>
					<br>
					<a href="{{conf.url}}"><input type="submit" value="Download VPK" class="btn btn-primary" /></a>
					<a href="{{conf.data}}" ng-if="conf.data.length > 0"><input type="submit" value="Download Data Files" class="btn btn-primary" /></a>
				</fieldset>
			</div>
		</div>
	</div>
</div>