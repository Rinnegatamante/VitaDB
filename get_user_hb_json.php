<?php

	// Getting POST data, performing some security checks
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$id = $request->uname;
	$id2 = addslashes($request->uname);
	if ($id != $id2) die("Invalid id");
	$id_like1 = "%& " . $id . "%";
	$id_like2 = "%" . $id . " &%";
	
	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	$sth = mysqli_prepare($con,"SELECT DISTINCT name,icon,version,type,description,id,data,date,titleid,screenshots,long_description,downloads FROM vitadb WHERE author=? OR author LIKE ? OR author LIKE ? ORDER BY date DESC");
	mysqli_stmt_bind_param($sth, "sss", $id, $id_like1, $id_like2);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	while($r = mysqli_fetch_assoc($data)) {
				
		// Downloads counter support
		$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
		$r['url'] = $masked_link;
		$rows[] = $r;
	
	}
	echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

	mysqli_stmt_close($sth);
	mysqli_close($con);
?>