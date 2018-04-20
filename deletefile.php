<?php
    include 'include/ConnectionDb.php';
/*
		$id = $_GET[id];
		$name = $_GET[name];
		$round = $_GET[round1];
		$year = $_GET[year];*/

		$local_office_id = $_GET[local_office_id];
		$sltYear= $_GET[sltYear];



		$sql_delete = "update scorevs set scorevs_file ='' WHERE local_office_id = '$local_office_id' and scorevs_year ='$sltYear' ";
		//$location = "user_management.php";

		//$result_delete = mysql_query($sql_delete);
		mysqli_set_charset($conn,"utf8");
		mysqli_query($conn, $sql_delete);


//echo $sql_delete;
		//$sql_chang_status = "update time_person SET time_person_status = '0' where time_person_id = '$id'";
		//$result_chang_status = mysql_query($sql_chang_status);

 echo "<script>window.location = 'projectimplementamphur.php';</script>";


?>
