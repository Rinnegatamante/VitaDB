<?php
	
	// Fetching data, performing some security checks
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$email = $request->email;
	$email2 = addslashes($request->email);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");
	$pass = hash("sha256",$request->password);

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_prepare($con,"SELECT email,password,name,roles FROM vitadb_users WHERE email=? AND password=?");
	mysqli_stmt_bind_param($sth, "ss", $email, $pass);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	while($r = mysqli_fetch_assoc($data)) {
		$roles = explode(";",$r['roles']);
		unset($r['roles']);
		$r['role'] = $roles[0];
		$rows[] = $r;
	}
	echo json_encode($rows);
	mysqli_stmt_close($sth);
	mysqli_close($con);
?>