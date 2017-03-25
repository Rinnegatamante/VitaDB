<?php
	
	// Getting POST data, performing some security checks
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$email = $request->email;
	$email2 = addslashes($request->email);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");
	$name = $request->name;
	$name2 = addslashes($request->name);
	if ($name != $name2) die("Invalid name");
	$avatar = $request->avatar;
	$twitter = $request->twitter;
	$github = $request->github;
	$website = $request->website;	
	
	// Checking if an avatar update is requested
	$uploaddir = '/customers/8/5/0/rinnegatamante.it/httpd.www/vitadb/avatars/';
	$decomponed_url = explode(".",$avatar);
	if (strcmp($decomponed_url[count($decomponed_url)-2],"tmp") == 0){
		if (file_exists($uploaddir . $name . ".png")) unlink($uploaddir . $name . ".png");
		rename($uploaddir . $name . ".tmp.png",$uploaddir . $name . ".png");
	}
	
	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sth = mysqli_prepare($con,"SELECT roles FROM vitadb_users WHERE email=? AND password=? AND name=?");
	mysqli_stmt_bind_param($sth, "sss", $email, $pass, $name);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	if (mysqli_num_rows($data)>0){
		mysqli_stmt_close($sth);
		$sth2 = mysqli_prepare($con,"UPDATE vitadb_users SET avatar=?,twitter=?,github=?,website=? WHERE name=?");
		if (strcmp($avatar, "unknown.jpg")==0){
			$avatar = "";
			mysqli_stmt_bind_param($sth2, "sssss", $avatar, $twitter, $github, $website, $name);
		}else{
			$avatar = $name . ".png";
			mysqli_stmt_bind_param($sth2, "sssss", $avatar, $twitter, $github, $website, $name);
		}
		mysqli_stmt_execute($sth2);
		mysqli_stmt_close($sth2);
	} else {
		mysqli_stmt_close($sth);
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
	
?>