<?php

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_query($con,"SELECT DISTINCT name,email,twitter,roles,website,github,avatar,hidden_mail FROM vitadb_users WHERE roles LIKE '%1%' OR roles LIKE '%2%' OR roles LIKE '%3%'");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
			$roles = explode(";",$r['roles']);
			unset($r['roles']);
			$r['roles'] = $roles;
			if ($r['hidden_mail'] == 1){
				unset($r['email']);
			}
			$rows[] = $r;
			
		}
		echo json_encode($rows);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>