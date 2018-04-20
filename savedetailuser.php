<?php
session_start();

    include "include/ConnectionDb.php";

    date_default_timezone_set ("Asia/Bangkok");
    $today = date("Y-m-d");
    $now_time = date("H:i:s");

    $date = explode("-",$today);
    $year  = $date[0];
    $month = $date[1];
    $day = $date[2];

    $today = $year."-".$month."-".$day;

$provinces = $_POST[provinces];
$amphures = $_POST[amphures];
$local_size = $_POST[local_size];
//$local_type = $_POST[local_type];
$local_type = '-';
$local_office = $_POST[local_office];
$local_address = $_POST[local_address];
$local_large = $_POST[local_large];
$local_population = $_POST[local_population];
$local_income = $_POST[local_income];
$local_income_plus = $_POST[local_income_plus];
$localadmin_name = $_POST[localadmin_name];
$per_localadmin_name = $_POST[per_localadmin_name];
$officer_name = $_POST[officer_name];
$officer_position = $_POST[officer_position];
$officer_under = $_POST[officer_under];
$officer_tel = $_POST[officer_tel];
$officer_mobile = $_POST[officer_mobile];
$officer_fax = $_POST[officer_fax];
$officer_email = $_POST[officer_email];
$local_website = $_POST[local_website];
$password1 = $_POST[password1];




    $sql_insert = "INSERT INTO localdetail VALUES ('','$provinces','$amphures','$local_type','$local_size','$local_office','$local_address','$local_large','$local_population','$local_income','$local_income_plus','$localadmin_name','$per_localadmin_name','$officer_name','$officer_position','$officer_under','$officer_tel','$officer_mobile','$officer_fax','$officer_email','$local_website','".$_SESSION["ss_username"]."','$today','$now_time')";
    //echo $sql_insert;
    mysqli_set_charset($conn,"utf8");
    mysqli_query($conn, $sql_insert);

    $sql_p = "update local_office set password = '$password1' WHERE local_office_id = '".$_SESSION["ss_local_office_id"]."' ";
		//$location = "user_management.php";

		//$result_delete = mysql_query($sql_delete);
		mysqli_set_charset($conn,"utf8");
		mysqli_query($conn, $sql_p);


    mysqli_close($conn);
    echo "<script>window.location = 'detailuser.php';</script>";

    die();

?>
