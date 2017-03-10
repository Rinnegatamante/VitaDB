<?php

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$email = $request->email;
	$email2 = addslashes($request->email);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");
	$pass = hash("sha256",$request->password);
	
	include 'config.php';

	// Create connection
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	
	$sth = mysqli_query($con,"SELECT * FROM vitadb_users WHERE email='$email' AND password='$pass'");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
			$rows[] = $r;
		}
		echo json_encode($rows);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>