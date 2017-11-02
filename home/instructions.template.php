<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="instructionsController">
	<div class="row" id="top">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-question" aria-hidden="true"></i> &nbsp;
				How VitaDB works?
			</li>
		</ol>
	</div>
	<br>
	<iframe ng-if="(!user) || (user.role == 5)" scrolling="no" frameBorder="0" id="uploader" width="100%" height="100px" src="ads.html"></iframe>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">Introduction</div>
			<div class="panel-body">
				VitaDB is an opensource project started on March 2017 which aims to build a fully responsive website to handle a generic database with an "appstore-like" look.<br>
				To achieve these goals, VitaDB currently uses AngularJS framework, a MySQL database and some PHP scripts which handle the backend connection between the frontend website and the real database.<br>
				If you want to help the development or report a bug, please refer to our <a href="https://github.com/Rinnegatamante/VitaDB">GitHub page</a>.<br><br>
				VitaDB currently provides users support with different privileges depending on how much trusted the user is. There are three different trustzones for the submitted contents and, depending on which level the applications are, they can be downloaded from normal users.<br>
				You can find what privileges are given to the different usergroups and what are the differences between the three trustzones in the charts below.
			</div>
			
			<div class="panel-heading">Trustzones</div>
			<div class="panel-body">
				<b>Founders</b> and <b>Administrators</b> are the only two usergroups able to submit trusted contents due to their access to bintray account. They can also approve semi-trusted contents and make them trusted one.<br>
				<b>Moderators</b> can approve untrusted contents and make them semi-trusted in order to be shown on our listers. However a second check is required to make them trusted. In addition, trusted <b>Developers</b> can submit their own semi-trusted contents directly.<br>
				Standard <b>Users</b> can submit only untrusted contents. These contents will be approved or discarded by a moderator before being shown to VitaDB userbase.<br>&nbsp;
				<div class="fixed-table-container">
					<table data-toggle="table" class="table table-hover">
						<thead>
							<tr>
								<th>Zone Name</th>
								<th>Shown to users</th>
								<th>Confirmation alert on download</th>
								<th>Download link on official bintray</th>
								<th>Can have screenshots</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th><b>Trusted Zone</b></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
							</tr>
							<tr>
								<th><b>Semi-Trusted Zone</b></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
							</tr>
							<tr>
								<th><b>Untrusted Zone</b></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="panel-heading">Usergroups</div>
			<div class="panel-body">
				If you want to get your profile promoted to a <b>Developer</b> one, please contact <a href="#/user/Rinnegatamante">Rinnegatamante</a> to verify your account.<br>&nbsp;
				<div class="fixed-table-container">
					<table data-toggle="table" class="table table-hover">
						<thead>
							<tr>
								<th>Usergroup</th>
								<th>Can submit trusted contents</th>
								<th>Can submit semi-trusted contents</th>
								<th>Can edit submitted contents</th>
								<th>Can submit untrusted contents</th>
								<th>Can approve contents</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th><div class="roleplate" style="background-color: darkviolet;">Founder</div></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
							</tr>
							<tr>
								<th><div class="roleplate" style="background-color: red;">Administrator</div></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
							</tr>
							<tr>
								<th><div class="roleplate" style="background-color: green;">Moderator</div></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
							</tr>
							<tr>
								<th><div class="roleplate" style="background-color: orange;">Developer</div></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
							</tr>
							<tr>
								<th><div class="roleplate" style="background-color: blue;">User</div></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/b72d8036d09ed02343e760472a11112d2591b6b4/687474703a2f2f72696e6e65676174616d616e74652e69742f7965732e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
							</tr>
							<tr>
								<th><div class="roleplate" style="background-color: black;">Guest</div></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
								<th><img src="https://camo.githubusercontent.com/2fe9081a34600997af00e465cd913d76ca7f0ff8/687474703a2f2f72696e6e65676174616d616e74652e69742f6e6f2e706e67" /></th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</div>