<?php

	// Requiring Spyc YAML Parser
	require_once "spyc-master/Spyc.php";

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 

	$sth = mysqli_query($con,"SELECT * FROM vitadb WHERE type < 8 ORDER BY id DESC");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
			if (strlen($r['data']) == 0){ unset($r['data']); }
			if (strlen($r['screenshots']) == 0){ unset($r['screenshots']); }else{
				$screenshots = explode(";",$r['screenshots']);
				unset($r['screenshots']);
				$r['screenshots'] = $screenshots;
			}
			if (strlen($r['long_description']) == 0){ unset($r['long_description']); }
			
			// Downloads counter support
			$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
			unset($r['url']);
			$r['url'] = $masked_link;
			
			// Redirect patch for when bintray is off
			$data = $r['data'];
			$data = str_replace("https://bintray.com/vitadb/VitaDB/download_file?file_path=",
				"https://dl.coolatoms.org/vitadb/",
				$data);
			$data = str_replace("%2F", "/", $data);
			$data = str_replace("+", " ", $data);
			unset($r['data']);
			$r['data'] = $data;
			
			$rows[] = $r;
		}
		echo Spyc::YAMLDump($rows,4,0);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>