<?php
session_start();

date_default_timezone_set ("Asia/Bangkok");
$today = date("Y-m-d");
$now_time = date("H:i:s");

$date = explode("-",$today);
$year  = $date[0];
$month = $date[1];
$day = $date[2];

$today = $year."-".$month."-".$day;

//if(!isset($_SESSION["ss_local_office_id"]))
//  {
    $local_office = $_POST[local_office];
    //echo "--->".$local_office."<---<br>";
//  }
//else
//  {
//    $local_office = $_SESSION["ss_local_office_id"];
//  }
 ?>

<meta charset="utf-8" />
<?php
$year1 = $_POST[year1];
$year2 = $_POST[year2];
$year3 = $_POST[year3];
$year4 = $_POST[year4];
if ($_POST['txtName'] == "") {
    echo "กรุณาป้อนข้อมูลให้ครบถ้วน";
    //header('Refresh: 0; URL=projectcreate.php');
    echo "<script>window.location = 'projectcreate.php';</script>";
} else if ($year1 == "" && $year2 == "" && $year3 == "" && $year4 == "") {
    echo "กรุณาเลือกปีที่จะดำเนินการ";
    //header('Refresh: 5; URL=projectcreate.php');
    echo "<script>window.location = 'projectcreate.php';</script>";
} else {
    include "include/ConnectionDb.php";
    $sql_select = "SELECT * FROM local_office WHERE local_office_id=$local_office";
    mysqli_set_charset($conn, "utf8");
    $result=mysqli_query($conn, $sql_select);
    if (mysqli_num_rows($result) > 0) {
        //echo "หาแถวเจอ $local_office $sql_select";
    } else {
        //echo "หาไม่เจอ $local_office $sql_select";
    }
    while ($row=mysqli_fetch_assoc($result)){
        $office_name=$row['local_office_name'];
        $province=$row['PROVINCE_ID'];
        $amphur=$row['AMPHUR_ID'];
        //$area = $row[area];

//        $office_name="dd";
//        $province=55;
//        $amphur=999;
//        $area = $row[area];
    }

    $sql_insert = "INSERT INTO project VALUES ('', '$local_office', '$_POST[txtName]', '$_POST[year1]', '$_POST[year2]', '$_POST[year3]', '$_POST[year4]','$_POST[quarter]', '$_POST[type]', '$_POST[dimention]', '$_POST[sltYear]', '$_POST[budget]', '$_POST[txtBudget]', '$_POST[txtTarget]', '$_POST[txtObject]', '$_POST[target_group1]', '$_POST[target_group2]', '$_POST[target_group3]', '$_POST[target_group4]', '$_POST[target_group5]', '$_POST[target_group6]', '$_POST[target_group7]', '$_POST[target_group8]', '$_POST[target_group9]', '$_POST[txtRemark]','Y' ,'Y','".$_SESSION["ss_username"]."','$today','$now_time')";
//echo $sql_insert;
    mysqli_set_charset($conn,"utf8");
    if (mysqli_query($conn, $sql_insert)) {
      echo"<script>
      alert('บันทึกข้อมูลเรียบร้อยแล้ว'); 
      </script>";
        mysqli_close($conn);
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
    if ($_POST['btnSubmit'] != "") {
        //header('Refresh: 0; URL=projectdisplay.php');
        echo "<script>window.location = 'projectdisplay.php';</script>";
    } else {
        //header('Refresh: 0; URL=projectcreate.php');
        echo "<script>window.location = 'projectcreate.php';</script>";
    }
    die();
}
?>
