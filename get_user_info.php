<?php

	// Getting POST data, performing some security checks
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$id = $request->uname;
	$id2 = addslashes($request->uname);
	if ($id != $id2) die("Invalid name");
	
	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_prepare($con,"SELECT name,email,roles,avatar,twitter,website,github,hidden_mail,paypal,bitcoin,patreon FROM vitadb_users WHERE name=?");
	mysqli_stmt_bind_param($sth, "s", $id);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	while($r = mysqli_fetch_assoc($data)) {
		$roles = explode(";",$r['roles']);
		if ($r['hidden_mail'] == 1){
			unset($r['email']);
		}		
		unset($r['roles']);
		$r['roles'] = $roles;
		$rows[] = $r;	
	}
	echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

	mysqli_stmt_close($sth);
	mysqli_close($con);
?>