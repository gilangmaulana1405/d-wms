<?php
include "config.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['TID'])){
		
	$TID = $_POST['TID'];

	$sql = "SELECT * FROM trdwms_rfidtag WHERE strRfidtag_code='$TID'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  echo "TID sudah ada";
	} else {
		$time = Date("Y-m-d H:i:s",time());

		$sql = "INSERT INTO trdwms_rfidtag (intRfidtagID, strRfidtag_code, bitActive, bitClose, dtmRfidtag)
		VALUES (null, '$TID', 1, 1, '$time')";

		if (mysqli_query($conn, $sql)) {
		  echo "Berhasil simpan data";
		} else {
		  echo "Error: " . mysqli_error($conn);
		}
	}
}else{
	echo "salah parameter";
}


mysqli_close($conn);
?>