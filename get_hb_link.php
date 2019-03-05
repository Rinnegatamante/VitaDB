<?php
	$max_downloads_per_day = 100;
	$abort = false;
	
	/**
	 * Ensures an ip address is both a valid IP and does not fall within
	 * a private network range.
	 */
	function validate_ip($ip) {
		if (strtolower($ip) === 'unknown')
			return false;

		// generate ipv4 network address
		$ip = ip2long($ip);

		// if the ip is set and not equivalent to 255.255.255.255
		if ($ip !== false && $ip !== -1) {
			// make sure to get unsigned long representation of ip
			// due to discrepancies between 32 and 64 bit OSes and
			// signed numbers (ints default to signed in PHP)
			$ip = sprintf('%u', $ip);
			// do private network range checking
			if ($ip >= 0 && $ip <= 50331647) return false;
			if ($ip >= 167772160 && $ip <= 184549375) return false;
			if ($ip >= 2130706432 && $ip <= 2147483647) return false;
			if ($ip >= 2851995648 && $ip <= 2852061183) return false;
			if ($ip >= 2886729728 && $ip <= 2887778303) return false;
			if ($ip >= 3221225984 && $ip <= 3221226239) return false;
			if ($ip >= 3232235520 && $ip <= 3232301055) return false;
			if ($ip >= 4294967040) return false;
		}
		return true;
	}
	
	function get_ip_address() {
		// check for shared internet/ISP IP
		if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}

		// check for IPs passing through proxies
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			// check if multiple ips exist in var
			if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
				$iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
				foreach ($iplist as $ip) {
					if (validate_ip($ip))
						return $ip;
				}
			} else {
				if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
					return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		}
		if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
			return $_SERVER['HTTP_X_FORWARDED'];
		if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
			return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
		if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
			return $_SERVER['HTTP_FORWARDED_FOR'];
		if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
			return $_SERVER['HTTP_FORWARDED'];

		// return unreliable ip since all else failed
		return $_SERVER['REMOTE_ADDR'];
	}
	
	$client_ip = ip2long(get_ip_address());
	$cur_time = time();
	$counter = 1;
	$global_counter = 1;
	
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
	
	$sth = mysqli_prepare($con,"SELECT counter, timestamp, total FROM vitadb_ips WHERE ip=?");
	mysqli_stmt_bind_param($sth, "i", $client_ip);
	mysqli_stmt_execute($sth);
	$data = mysqli_stmt_get_result($sth);
	
	if (mysqli_num_rows($data)>0){
		while($r = mysqli_fetch_assoc($data)) {
			$timestamp = $r['timestamp'];
			$counter = $r['counter'];
			$global_counter = $r['total'] + 1;
		}
		if (($timestamp + 60 * 60 * 24) < $cur_time) { // Needs a timestamp update
			$counter = 1;
		} else { // Timestamp still valid
			$counter = $counter + 1;
			$cur_time = $timestamp;
			if ($counter > $max_downloads_per_day) {
				echo "You exceeded your daily downloads quota.";
				$abort = true;
			}
		}
		$sth2 = mysqli_prepare($con,"UPDATE vitadb_ips SET timestamp=?,counter=?,total=? WHERE ip=?");
		mysqli_stmt_bind_param($sth2, "iiii", $cur_time, $counter, $global_counter, $client_ip);
		mysqli_stmt_execute($sth2);
		mysqli_stmt_close($sth2);
	} else { // No IP entry, pushing a new one
		$sth2 = mysqli_prepare($con,"INSERT INTO vitadb_ips (ip, timestamp, counter, total) VALUES (?,?,?,?)");
		mysqli_stmt_bind_param($sth2, "iiii",  $client_ip, $cur_time, $counter, $global_counter);
		mysqli_stmt_execute($sth2);
		mysqli_stmt_close($sth2);
	}
	
	if ($abort == false) {
		$sth = mysqli_prepare($con,"SELECT id,url,downloads FROM vitadb WHERE id=?");
		mysqli_stmt_bind_param($sth, "i", $id);
		mysqli_stmt_execute($sth);
		mysqli_stmt_bind_result($sth, $id, $url, $downloads);
		mysqli_stmt_fetch($sth);
		mysqli_stmt_close($sth);
		$downloads=$downloads+1;
		
		$sth3 = mysqli_prepare($con,"UPDATE vitadb SET downloads=? WHERE id=?");
		mysqli_stmt_bind_param($sth3, "ii", $downloads, $id);
		mysqli_stmt_execute($sth3);
		mysqli_stmt_close($sth3);
		
		// Redirect patch for when bintray is off
		$url = str_replace("https://bintray.com/vitadb/VitaDB/download_file?file_path=",
			"https://dl.coolatoms.org/vitadb/",
			$url);
		$url = str_replace("+", " ", $url);
		$url = str_replace("%2F", "/", $url);
		
		header("location: " . $url);
	}
?>