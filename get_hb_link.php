<?php
	/*$email = $request->user;
	$email2 = addslashes($request->user);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");*/
	$id = $_GET['id'];
	$id2 = addslashes($id);
	if ($id != $id2) die("Invalid id");	

	// Create connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	//$sth = mysqli_query($con,"SELECT * FROM vitadb_users WHERE email='$email' AND password='$pass'");
	//if ($sth){
		$sth = mysqli_query($con,"SELECT * FROM vitadb WHERE id = '$id'");
		if ($sth){
			$rows = array();
			while($r = mysqli_fetch_assoc($sth)) {
				$rows[] = $r;
			}
			$dls = $rows[0]['downloads'] + 1;
			$sth2 = mysqli_query($con,"UPDATE vitadb SET downloads='$dls' WHERE id=$id");
		} else {
			echo("An error occurred: " . mysqli_error($con));
		}
	//} else {
	//	echo("An error occurred: " . mysqli_error($con));
	//}
	mysqli_close($con);
	header("location: " . $rows[0]['url']);
?>