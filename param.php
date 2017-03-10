<?php
	// Some security checks
	if ($_FILES['param']['size'] > 1024*10) die("File is too big.");
	
	// Opening file, extracting header and checking for magic
	$handle = fopen($_FILES['param']['tmp_name'],"rb");
	$hdr = unpack("Vmagic/Vversion/VkeyTableOffset/VdataTableOffset/VindexTableEntries", fread($handle, 20));
	if ($hdr["magic"] != 0x46535000){
		fclose($handle);
		die("Invalid SFO file.");
	}
	
	// Extracting entry table
	$entry_table = array();
	for ($i=0;$i<$hdr["indexTableEntries"];$i=$i+1){
		$entry_table[$i] = unpack("vkeyOffset/vparam_fmt/VparamLen/VparamMaxLen/VdataOffset", fread($handle, 16));
	}
	
	// Extracting key table
	$keyTable = fread($handle,$hdr["dataTableOffset"] - $hdr["keyTableOffset"]);
	
	// Parsing the file
	for ($i=0;$i < $hdr["indexTableEntries"]; $i++){
		$param_name = sprintf("%s", strstr(substr($keyTable, $entry_table[$i]["keyOffset"]), "\0", TRUE));
		if (strcmp($param_name, "TITLE_ID") == 0){
			fseek($handle, $hdr["dataTableOffset"] + $entry_table[$i]["dataOffset"], SEEK_SET);
			echo "<div id='hb_titleid'>" . fread($handle, 9) . "</div>";
		}elseif (strcmp($param_name, "TITLE") == 0){
			fseek($handle, $hdr["dataTableOffset"] + $entry_table[$i]["dataOffset"], SEEK_SET);
			echo "<div id='hb_title'>" . fread($handle, $entry_table[$i]["paramLen"] - 1) . "</div>";
		}
	}
	
	// Closing file
	fclose($handle);
?>