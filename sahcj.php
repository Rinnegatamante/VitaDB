<input style="width: 0px;height: 0px;" type="text" id="email" name="email" />
<input style="width: 0px;height: 0px;" type="text" id="pass" name="pass" />
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_POST['email'];
$pass = $_POST['pass'];
$id2 = addslashes($id);
if ($id != $id2) die("Invalid email");
$pass2 = addslashes($pass);
if ($pass != $pass2) die("Invalid password");

include 'config.php';

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
	
// Check connection
if (mysqli_connect_errno()){
	die("Connection failed: " . mysqli_connect_error());
}
	
$sth = mysqli_query($con,"SELECT * FROM vitadb_users WHERE email='$id' AND password='$pass'");
if ($sth){
	if (mysqli_num_rows($sth)>0){

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
	}
}
mysqli_close($con);

?>
