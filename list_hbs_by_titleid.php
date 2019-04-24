<?php

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_query($con,"SELECT * FROM vitadb WHERE type < 8 ORDER BY titleid ASC");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
			
			// Downloads counter support
			$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
			unset($r['url']);
			$r['url'] = $masked_link;
			
			// Redirect patch for when bintray is off
			/*$data = $r['data'];
			$data = str_replace("https://bintray.com/vitadb/VitaDB/download_file?file_path=",
				"https://dl.coolatoms.org/vitadb/",
				$data);
			$data = str_replace("%2F", "/", $data);
			$data = str_replace("+", " ", $data);
			unset($r['data']);
			$r['data'] = $data;*/
			
			$rows[] = $r;
		}
		
		echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>