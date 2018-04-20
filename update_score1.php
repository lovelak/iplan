<meta charset="utf-8" />
<?php
    include 'include/ConnectionDb.php';

    $c = 1;


    $sql_provinces = "select * from update_score ";
    $result_provinces = mysqli_query($conn,$sql_provinces);
    while($provinces = mysqli_fetch_array($result_provinces))
  {

    $sql_id = "UPDATE scoresar SET summ = '$provinces[score]'  WHERE local_office_code = '$provinces[id]' and scoresar_year='$provinces[year]'";
    $result_id = mysqli_query($conn,$sql_id);

    echo $c."-->".$provinces[id]."--->".$provinces[score]."<br>";

    $c++;

  }

?>
