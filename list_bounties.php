<?php

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_query($con,"SELECT * FROM vitadb_bounties ORDER BY id ASC");
	if ($sth){
		$rows = array();
		while($r = mysqli_fetch_assoc($sth)) {
			$url = "https://api.bountysource.com/issues/" . $r['bid'];
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/vnd.bountysource+json; version=2'));
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_HEADER, 0); 
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 10);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			$http_code = curl_getinfo($curl , CURLINFO_HTTP_CODE);
			$res = curl_exec($curl);
			curl_close($curl);
			$values = json_decode($res, true);
			unset($r['description']);
			$r['amount'] = $values['bounty_total'];
			$r['title'] = $values['title'];
			$r['description'] = $values['body_html'];
			$r['url'] = "https://www.bountysource.com/issues/" . $r['bid'];
			if ($r['paid_out']) {
				$r['status'] = 1;
			} else {
				$r['status'] = 0;
			}
			$rows[] = $r;
		}
		
		echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>