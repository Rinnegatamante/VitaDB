<?php
	
	// Fetching data, performing some security checks
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$name = $request->name;
	$name2 = addslashes($request->name);
	if ($name != $name2) die("Invalid username");
	$email = $request->email;
	$email2 = addslashes($request->email);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");
	$pass3 = $request->password2;
	$password4 = addslashes($request->password2);
	if ($pass3 != $password4) die("Invalid password");
	if ($pass3 != $pass) die("Invalid password");
	$pass = hash("sha256",$request->password);
	$role = "5";
	
	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);

	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_prepare($con,"SELECT email,name FROM vitadb_users WHERE email=? OR name=?");
	mysqli_stmt_bind_param($sth, "ss", $email, $name);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	if (mysqli_num_rows($data) <= 0){
		mysqli_stmt_close($sth);
		$sth2 = mysqli_prepare($con,"INSERT INTO vitadb_users (email, password, roles, name) VALUES (?,?,?,?)");
		mysqli_stmt_bind_param($sth2, "ssss", $email, $pass, $role, $name);
		mysqli_stmt_execute($sth2);
		mysqli_stmt_close($sth2);
	}else mysqli_stmt_close($sth);

	mysqli_close($con);
?>