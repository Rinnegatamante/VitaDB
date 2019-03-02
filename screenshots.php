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
			$uploaddir = '/customers/8/5/0/rinnegatamante.it/httpd.www/vitadb/screenshots/';
			$file_count = count($_FILES['sshots']['name']);
			$i = 0;
			$res = "";
			while ($i < $file_count){
				if ($i != 0) $res = $res . ";";
				$fname = hash("sha256",rand() . basename($_FILES['sshots']['name'][$i]) . rand() . rand() . $i);
				$uploadfile = $uploaddir . $fname . ".png";
				if (move_uploaded_file($_FILES['sshots']['tmp_name'][$i], $uploadfile)) $res = $res . "screenshots/" . $fname . ".png";
				$i++;
			}	
			echo "<div id='sshots_url'>" . $res . "</div>";
		}else{
			echo "You don't have the correct privileges to perform this action.";
		}
	}
	
	mysqli_close($con);

?>
