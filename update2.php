<?php
	
	include 'config.php';
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$email = $request->user;
	$email2 = addslashes($request->user);
	if ($email != $email2) die("Invalid email");
	$pass = $request->password;
	$password2 = addslashes($request->password);
	if ($pass != $password2) die("Invalid password");

	$name = $request->name;
	$name2 = addslashes($request->name);
	if ($name != $name2) die("Invalid name");
	$version = $request->version;
	$version2 = addslashes($request->version);
	if ($version != $version2) die("Invalid version value");
	$author = $request->author;
	$author2 = addslashes($request->author);
	if ($author != $author2) die("Invalid author value");
	$url = $request->url;
	$url2 = addslashes($request->url);
	if ($url != $url2) die("Invalid url");
	$day = $request->date;
	$day2 = addslashes($request->date);
	if ($day != $day2) die("Invalid date");
	$id = $request->id;
	$id2 = addslashes($request->id);
	if ($id != $id2) die("Invalid ID");
	$description = addslashes($request->description);
	$long_description = addslashes($request->long_description);
	
	// Create connection
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sth = mysqli_query($con,"SELECT * FROM vitadb_users WHERE email='$email' AND password='$pass'");
	if ($sth){
		if (mysqli_num_rows($sth)>0){
			$sth2 = mysqli_query($con,"UPDATE vitadb SET name='$name', version='$version', author='$author', url='$url', description='$description', date='$day', long_description='$long_description' WHERE id='$id'");
			if ($sth2){
				echo "ok - type: " . $type;
			} else {
				echo("An error occurred: " . mysqli_error($con));
			}
		}
	} else {
		echo("An error occurred: " . mysqli_error($con));
	}

	mysqli_close($con);
?>