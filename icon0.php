<input style="height:0;width:0;padding:0;border:none;" type="text" id="email" name="email" />
<input style="height:0;width:0;padding:0;border:none;" type="text" id="pass" name="pass" />
<?php

	// Grabbing POST data, performing some security checks
	$id = $_POST['email'];
	$pass = $_POST['pass'];
	$id2 = addslashes($id);
	if ($id != $id2) die("Invalid email");
	$pass2 = addslashes($pass);
	if ($pass != $pass2) die("Invalid password");

	// Creating connection
	include 'config.php';
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sth = mysqli_prepare($con,"SELECT * FROM vitadb_users WHERE email=? AND password=?");
	mysqli_stmt_bind_param($sth, "ss", $id, $pass);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	if (mysqli_num_rows($data)>0){

		while($r = mysqli_fetch_assoc($data)) {
			$roles = explode(";",$r['roles']);	
		}
		mysqli_stmt_close($sth);
		if ((strcmp($roles[0],"1") == 0) or (strcmp($roles[0],"2") == 0) or (strcmp($roles[0],"3") == 0)){
			$uploaddir = '/customers/8/5/0/rinnegatamante.it/httpd.www/vitadb/icons/';
			$fname = hash("sha256",rand() . basename($_FILES['icon']['name']) . rand() . rand());
			$uploadfile = $uploaddir . $fname . ".png";

			$info = getimagesize($_FILES['icon']['tmp_name']);
			if (strcmp($info[0],"128")!=0) die("Wrong size");
			if (strcmp($info[1],"128")!=0) die("Wrong size");

			echo '<pre>';
			if (move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile)) {
				echo "<div id='icon_url'>" . $fname . ".png" . "</div>";
			}else{
				echo "An error occurred during the upload.";
			}

			echo "</pre>";
		}else{
			echo "You don't have the correct privileges to perform this action.";
		}
	}
	
	mysqli_close($con);

?>
