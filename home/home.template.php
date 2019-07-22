<div class="col-xs-12 col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="homeController">
	<div class="row" id="top">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-gamepad" aria-hidden="true"></i> &nbsp;
				Homebrews Lister ({{brews.length}} homebrews available)
			</li>
		</ol>
		<ol class="breadcrumb">
			<div angular-marquee style="overflow: hidden;white-space:nowrap;">
				<span ng-repeat="entry in updates"><span ng-if="$index != 0"> - </span><b>{{entry.author}}</b> {{entry.object}} <b>{{entry.hb}}</b> on <b>{{entry.date}} GMT -1:00</b>.</span>
			</div>
		</ol>
		<ol class="breadcrumb-alert">
			<b>Note:</b> You can now download homebrews from VitaDB directly from your PSVITA by using <a href="http://vitadb.rinnegatamante.it/#/info/205">Vita Homebrew Browser</a> by <a href="#/user/devnoname120">devnoname120</a>.
		</ol>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<input style="display:inline-block;vertical-align:middle;" type="text" ng-model="field" class="form-control" placeholder="Search..." required="true" />
		</div>
		<div class="col-md-4">
			<select style="display:inline-block;vertical-align:middle;" ng-change="changeView()" ng-model="cat_filter" required="true" class="form-control">
				<option value=0>All Categories</option>
				<option value=1>Original Games</option>
				<option value=2>Game Ports</option>
				<option value=4>Utilities</option>
				<option value=5>Emulators</option>
			</select>
		</div>
	</div>
	<br>
	<div class="row" id="hb-list">
		<div ng-repeat="brew in brews | filter: filterBrews(field)" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="panel panel-widget ">
				<div class="row no-padding">
					<div class="col-md-4">
						<center><a href="#/info/{{brew.id}}"><img class="icon" src="https://rinnegatamante.it/vitadb/icons/{{brew.icon}}" /></a></center>
					</div>
					<div class="col-md-8">
						<h4 style="white-space: nowrap;overflow: hidden;"><a href="#/info/{{brew.id}}"><b>{{brew.name}} {{brew.version}}</b></a></h3>
						<h6><span ng-repeat="author in brew.authors">{{ ($first) ? '' : ' & ' }}<a href="#/user/{{author}}">{{author}}</a></span></h6>
						<h5 style="white-space: nowrap;overflow: hidden;">{{brew.description}}</h5>
						<a href="{{brew.url}}"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Download</a>
						&nbsp;
						<a ng-if="brew.data.length > 0" href="{{brew.data}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Data Files</a>
						&nbsp;
						<a ng-if="user && user.role < 5" href="#/edit/{{brew.id}}"><i class="fas fa-edit" aria-hidden="true"></i> Edit</a>
					</div>
					<div class="topcorner"><h6 style="text-align: right;">{{brew.genre}} &nbsp;<br>{{brew.date}} &nbsp;<br>{{brew.downloads}} DLs&nbsp;</h6></div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row" id="botbar">
		<h1><a id="go-top" href="" ng-click="goTop()"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a></h1>
	</div>
</div>