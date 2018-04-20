<meta charset="utf-8" />
<?php
    include 'include/ConnectionDb.php';

    $c = 1;
    $c2 = 1;

    $sql_provinces = "select * from provinces ";
    $result_provinces = mysqli_query($conn,$sql_provinces);
    while($provinces = mysqli_fetch_array($result_provinces))
  {

    $sql_id = "UPDATE local_office SET PROVINCE_ID = '$provinces[PROVINCE_ID]'  WHERE local_office_province = '$provinces[PROVINCE_NAME]'";
    $result_id = mysqli_query($conn,$sql_id);

    echo $c."-->".$provinces[PROVINCE_NAME]."--->".$provinces[PROVINCE_ID]."<br>";

    $c++;

  }

//------------------------------------------------------------

  echo "-----------------------------------------------------------<br><br><br>";

  $sql_amphures = "select * from amphures ";
  $result_amphures = mysqli_query($conn,$sql_amphures);
  while($amphures = mysqli_fetch_array($result_amphures))
{

  $sql_id = "UPDATE local_office SET AMPHUR_ID = '$amphures[AMPHUR_ID]'  WHERE local_office_amphures = '$amphures[AMPHUR_NAME]'";
  $result_id = mysqli_query($conn,$sql_id);

  echo $c2."-->".$amphures[AMPHUR_NAME]."--->".$amphures[AMPHUR_ID]."<br>";

  $c2++;
}


 ?>
