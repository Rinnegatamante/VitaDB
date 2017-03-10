<style type="text/css">
	.topcorner{
		position:absolute;
		top:0;
		right:0;
	}
	#botbar {
		position: fixed;
		bottom: 0;
		left: 96%;
	}
	#go-top{
		color: rgba(255, 255, 0, 0.3);
		float:right; 
		padding-left: 5%;
	}
	#go-top:hover {
		color:yellow;
	}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="home2Controller">
	<div class="row" id="top">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;
				Plugins Lister ({{brews.length}} plugins available)
			</li>
		</ol>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<input style="display:inline-block;vertical-align:middle;" type="text" ng-model="field" class="form-control" placeholder="Search..." required="true" />
		</div>
	</div>
	<br>
	<div class="row" id="hb-list">
		<div ng-repeat="brew in brews | filter: filterBrews(field)" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="panel panel-widget ">
				<div class="row no-padding">
					<div class="topcorner"><h6 style="text-align: right;">{{brew.date}} &nbsp;</h6></div>
					<div class="col-md-12">
						<h4 style="white-space: nowrap;overflow: hidden;"><b>{{brew.name}} {{brew.version}}</b></h3>
						<h6>{{brew.author}}</h6>
						<h5 style="white-space: nowrap;overflow: hidden;">{{brew.description}}</h5>
						<a href="{{brew.url}}"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Download</a>
						&nbsp;
						<a href="#/info/{{brew.id}}"><i class="fa fa-info" aria-hidden="true"></i> Show info</a>
						&nbsp;
						<a ng-if="user" href="#/edit/{{brew.id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row" id="botbar">
		<h1><a id="go-top" href="" ng-click="goTop()"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a></h1>
	</div>
</div>