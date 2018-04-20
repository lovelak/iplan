<?php
session_start();
 ?>

<meta charset="utf-8" />
<?php



    include "include/ConnectionDb.php";
$txtscore = $_POST[txtscore];
$txtscore2 = $_POST[txtscore2];
$local_office_code = $_POST[local_office_code];
$sltYear = $_POST[sltYear];

//echo "-->".sizeof($txtscore2);


    for($i=0;$i <=sizeof($txtscore2)-1;$i++)
      {
    $sql_insert = "INSERT INTO scoreita VALUES ('','$local_office_code[$i]', '$txtscore[$i]', '$txtscore2[$i]', '$sltYear')";
echo $sql_insert;
    mysqli_set_charset($conn,"utf8");
    mysqli_query($conn, $sql_insert);
    }

    mysqli_close($conn);
        echo "<script>window.location = 'scoreita.php';</script>";

    die();

?>
