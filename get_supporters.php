<?php

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_query($con,"SELECT DISTINCT name,avatar,supporter_date FROM vitadb_users WHERE roles LIKE '%6%'");
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