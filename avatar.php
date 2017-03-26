<input style="height:0;width:0;padding:0;border:none;" type="text" id="email" name="email" />
<input style="height:0;width:0;padding:0;border:none;" type="text" id="pass" name="pass" />
<?php

	// Grabbing POST data, performing some security checks
	$id = $_POST['email'];
	$pass = $_POST['pass'];
	$id2 = addslashes($id);
	if ($id != $id2) die("Invalid username");
	$pass2 = addslashes($pass);
	if ($pass != $pass2) die("Invalid password");

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sth = mysqli_prepare($con,"SELECT * FROM vitadb_users WHERE name=? AND password=?");
	mysqli_stmt_bind_param($sth, "ss", $id, $pass);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	if (mysqli_num_rows($data)>0){

		$uploaddir = '/customers/8/5/0/rinnegatamante.it/httpd.www/vitadb/avatars/';
		$uploadfile = $uploaddir . hash("sha256",$id) . ".tmp.png";

		$info = getimagesize($_FILES['avatar']['tmp_name']);
		if (strcmp($info[0],"240")!=0) die("Wrong size (" . $info[0] . "x" . $info[1] . ")");
		if (strcmp($info[1],"240")!=0) die("Wrong size (" . $info[0] . "x" . $info[1] . ")");

		echo '<pre>';
		if(file_exists($uploadfile)) unlink($uploadfile);
		if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
			echo "<div id='icon_url'>" . hash("sha256",$id) . ".tmp.png?cb=" . rand() . "</div>";
		}else{
			echo "An error occurred during the upload.";
		}

		echo "</pre>";
	}
	
	mysqli_stmt_close($sth);
	mysqli_close($con);
	
?>