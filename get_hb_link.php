<?php
	
	// Getting ID and performing some security checks
	$id = $_GET['id'];
	$id2 = addslashes($id);
	if ($id != $id2) die("Invalid id");	

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " .  mysqli_connect_error());
	} 
	
	$sth = mysqli_prepare($con,"SELECT id,url,downloads FROM vitadb WHERE id=?");
	mysqli_stmt_bind_param($sth, "i", $id);
	mysqli_stmt_execute($sth);
	mysqli_stmt_bind_result($sth, $id, $url, $downloads);
	mysqli_stmt_fetch($sth);
	mysqli_stmt_close($sth);
	$downloads=$downloads+1;
	mysqli_query($con,"UPDATE vitadb SET downloads='$downloads' WHERE id='$id'");
	mysqli_close($con);
	header("location: " . $url);
?>