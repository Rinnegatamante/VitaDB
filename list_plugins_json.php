<?php

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 	
	
	$sth = mysqli_query($con,"SELECT * FROM vitadb WHERE type = 8 ORDER BY date DESC");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
			unset($r['icon']);
			unset($r['type']);
			unset($r['data']);
			unset($r['titleid']);
			
			// Downloads counter support
			$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
			unset($r['url']);
			$r['url'] = $masked_link;
			
			$rows[] = $r;
		}
		echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>