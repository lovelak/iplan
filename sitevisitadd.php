<?php
session_start();
 ?>

<meta charset="utf-8" />
<?php



    include "include/ConnectionDb.php";

$local_office_id = $_GET[local_office_id];
$sltYear = $_GET[sltYear];

//echo "-->".sizeof($txtscore2);

//echo "-->".$local_office_id;

$typeshow = $_GET[typeshow];

if($typeshow ==1)
  {
    $sql_insert = "INSERT INTO scorevs VALUES ('','$local_office_id', '1','$sltYear','')";
//echo $sql_insert;
    mysqli_set_charset($conn,"utf8");
    mysqli_query($conn, $sql_insert);
  }
else {
  $sql_update = "DELETE FROM scorevs  where local_office_id ='$local_office_id' and scorevs_year ='$sltYear' ";
  //echo $sql_insert;
  mysqli_set_charset($conn,"utf8");
  mysqli_query($conn, $sql_update);
}

//echo $local_office_code;

    mysqli_close($conn);

    echo "<script>window.location = 'projectimplementamphur.php';</script>";
//echo "<script>window.history.back();</script>";
    die();

?>
