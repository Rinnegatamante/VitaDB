<?php
	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	$sth = mysqli_query($con,"SELECT * FROM vitadb_log ORDER BY id DESC LIMIT 5");
	while($r = mysqli_fetch_assoc($sth)) {
		$rows[] = $r;	
	}
	echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	mysqli_close($con);
?>