<?php
	
	// Getting POST data, performing some security checks
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$email = $request->user;
	$email2 = addslashes($request->user);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");
	$bid = $request->bid;
	$bid2 = addslashes($request->bid);
	if ($bid != $bid2) die("Invalid bounty ID");
	$project = $request->project;
	$project2 = addslashes($request->project);
	if ($project != $project2) die("Invalid project name");
	
	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Checking CSRF token
	include 'xsrf.php';
	$xsrf = $_COOKIE['XSRF-TOKEN'];
	$hdr_xsrf = $_SERVER['HTTP_X_XSRF_TOKEN'];
	if ((strcmp($xsrf,$hdr_xsrf) != 0) or (!checkXSRF($con, $xsrf))){
		mysqli_close($con);
		die("Unauthorized access.");
	}
	
	$sth = mysqli_prepare($con,"SELECT roles FROM vitadb_users WHERE email=? AND password=?");
	mysqli_stmt_bind_param($sth, "ss", $email, $pass);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	if (mysqli_num_rows($data)>0){
		while($r = mysqli_fetch_assoc($data)) {
			$roles = explode(";",$r['roles']);	
		}
		mysqli_stmt_close($sth);
		if ((strcmp($roles[0],"1") == 0) or (strcmp($roles[0],"2") == 0)){
			$sth2 = mysqli_prepare($con,"INSERT INTO vitadb_bounties (bid, project) VALUES (?,?)");
			mysqli_stmt_bind_param($sth2, "ss", $bid, $project);
			mysqli_stmt_execute($sth2);
			mysqli_stmt_close($sth2);
			require_once ('codebird.php');
			\Codebird\Codebird::setConsumerKey('', '');
			$cb = \Codebird\Codebird::getInstance();
			$cb->setToken('', '');
			$tweet_text = "A new bounty has been added to Vita Nuova tracker! More info is available here: https://www.bountysource.com/issues/$bid";
			$reply = $cb->statuses_update([
				'status' => $tweet_text
			]);
			print_r($reply);
		}
	} else {		
		mysqli_stmt_close($sth);
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);

?>