<?php
	require_once "spyc-master/Spyc.php";
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	include 'config.php';

	// Create connection
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 

	$sth = mysqli_query($con,"SELECT * FROM vitadb WHERE type < 8 ORDER BY id DESC");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
		if (strlen($r['data']) == 0){ unset($r['data']); }
			$rows[] = $r;
		}
		echo Spyc::YAMLDump($rows,4,0);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>