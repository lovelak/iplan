<?php

	session_start();

	session_destroy();
/*	include("connect.php");

	$ipaddress = $_SERVER['REMOTE_ADDR'];
	date_default_timezone_set ("Asia/Bangkok");
	$today = date("Y-m-d");
	$now_time = date("H:i:s");

//------------------------ add log --------------------------------------

					$sql = "INSERT INTO Final  Examination Residentssurvey_log (id,event,detail,user,date_event,time_event,ip_user)VALUES ('','logout','Username : ".$_SESSION["ss_username"]."','".$_SESSION["ss_id"]."','$today','$now_time','$ipaddress')";
					$result = mysql_query($sql);

//------------------------------------------------------------------------*/

	echo "<script>
	window.location = 'login.php'
	</script>";

?>
