<?
	function createXSRF($con){
		$ip = $_SERVER['REMOTE_ADDR'];
		$xsrf = hash("sha256",rand() . $ip);
		$sth = mysqli_prepare($con,"SELECT token FROM vitadb_csrf WHERE ip=?");
		mysqli_stmt_bind_param($sth, "s", $ip);
		mysqli_stmt_execute($sth);
		$data = mysqli_stmt_get_result($sth);
		mysqli_stmt_close($sth);
		if (mysqli_num_rows($data) <= 0){
			$sth2 = mysqli_prepare($con,"INSERT INTO vitadb_csrf (token,ip) VALUES (?,?)");
			mysqli_stmt_bind_param($sth2, "ss", $xsrf, $ip);
			mysqli_stmt_execute($sth2);
			mysqli_stmt_close($sth2);
		}else{
			$sth2 = mysqli_prepare($con,"UPDATE vitadb_csrf SET token=? WHERE ip=?");
			mysqli_stmt_bind_param($sth2, "ss", $xsrf, $ip);
			mysqli_stmt_execute($sth2);
			mysqli_stmt_close($sth2);
		}
		return $xsrf;
	}
	
	function checkXSRF($con, $client_xsrf){
		$ip = $_SERVER['REMOTE_ADDR'];
		$sth = mysqli_prepare($con,"SELECT token FROM vitadb_csrf WHERE ip=? AND token=?");
		mysqli_stmt_bind_param($sth, "ss", $ip,$client_xsrf);
		mysqli_stmt_execute($sth);
		$data = mysqli_stmt_get_result($sth);
		mysqli_stmt_close($sth);
		return (mysqli_num_rows($data) > 0);
	}
	
	function updateXSRF($con){
		$ip = $_SERVER['REMOTE_ADDR'];
		$xsrf = hash("sha256",rand() . $ip);
		$sth = mysqli_prepare($con,"UPDATE vitadb_csrf SET token=? WHERE ip=?");
		mysqli_stmt_bind_param($sth, "ss", $xsrf, $ip);
		mysqli_stmt_execute($sth);
		$data = mysqli_stmt_get_result($sth);
		mysqli_stmt_close($sth);
		return $xsrf;
	}
	
?>