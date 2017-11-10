<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="editController">
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10">
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;
				Edit a content
			</div>
			<div class="panel-body">
				<form role="form" ng-submit="submit()">
					<fieldset>
						<div class="form-group">
							<input type="text" ng-model="conf.name" class="form-control" placeholder="Homebrew Name" required="true" />
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
							<textarea style="resize: vertical;" ng-model="conf.long_description" class="form-control" placeholder="Homebrew Long Description (Optional)"></textarea>
						</div>
						<div class="form-group" ng-if="conf.type < 8">
							<input type="text" ng-model="conf.icon" class="form-control" placeholder="Homebrew Icon Name" required="true" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.url" class="form-control" placeholder="Download Url" required="true" />
						</div>
						<div class="form-group" ng-if="conf.type < 8">
							<input type="text" ng-model="conf.data" class="form-control" placeholder="Data Files Url (Optional)" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.date" class="form-control" placeholder="Release Date" required="true" />
						</div>
						<div class="form-group" ng-if="conf.type < 8">
							<input type="text" ng-model="conf.titleid" class="form-control" placeholder="Title ID" required="true" />
						</div>
						<div class="form-group">
							<input type="text" id="sshot" ng-model="conf.sshot" class="form-control" placeholder="Screenshots Data" />
						</div>
						<div class="form-group" ng-if="conf.type < 8">
							<select  ng-model="conf.type" required="true" class="form-control">
								<option value=1>Original Game</option>
								<option value=2>Game Port</option>
								<option value=4>Utility</option>
								<option value=5>Emulator</option>
								<option value=7>Engine</option>
								<option value=3>Interpreter</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.source" class="form-control" placeholder="Sourcecode Link" />
						</div>
						<div class="form-group">
							<input type="text" ng-model="conf.release_page" class="form-control" placeholder="Release Page Link" />
						</div>
						<br>
						<input type="submit" value="Submit edited content" class="btn btn-primary" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

