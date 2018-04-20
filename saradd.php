<?php
session_start();
 ?>

<meta charset="utf-8" />
<?php



    include "include/ConnectionDb.php";
$txtsarm11 = $_POST[txtsarm11];
$txtsarm12 = $_POST[txtsarm12];
$txtsarm13 = $_POST[txtsarm13];
$txtsarm14 = $_POST[txtsarm14];
$sumall1 = $_POST[sumall1];

$txtsarm21 = $_POST[txtsarm21];
$txtsarm22 = $_POST[txtsarm22];
$txtsarm23 = $_POST[txtsarm23];
$txtsarm24 = $_POST[txtsarm24];
$sumall2= $_POST[sumall2];

$txtsarm221 = $_POST[txtsarm221];
$txtsarm222 = $_POST[txtsarm222];
$txtsarm223 = $_POST[txtsarm223];
$txtsarm224 = $_POST[txtsarm224];
$sumall22= $_POST[sumall22];

$txtsarm231 = $_POST[txtsarm231];
$txtsarm232 = $_POST[txtsarm232];
$txtsarm233 = $_POST[txtsarm233];
$txtsarm234 = $_POST[txtsarm234];
$sumall23= $_POST[sumall23];

$txtsarm31 = $_POST[txtsarm31];
$txtsarm32 = $_POST[txtsarm32];
$txtsarm33 = $_POST[txtsarm33];
$txtsarm34 = $_POST[txtsarm34];
$sumall3 = $_POST[sumall3];


$local_office_code = $_POST[local_office_code];
$sltYear = $_POST[sltYear];

//echo "-->".sizeof($txtscore2);


    for($i=0;$i <=sizeof($txtsarm11)-1;$i++)
      {
        //echo $sumall1[$i]."--".$sumall2[$i]."--".$sumall3[$i];
        if(!empty($sumall1[$i]) || !empty($sumall2[$i]) || !empty($sumall3[$i]))
          {
            $sql_insert = "INSERT INTO scoresar VALUES ('','$local_office_code[$i]', '$txtsarm11[$i]', '$txtsarm12[$i]', '$txtsarm13[$i]', '$txtsarm14[$i]', '$sumall1[$i]', '$txtsarm21[$i]', '$txtsarm22[$i]', '$txtsarm23[$i]', '$txtsarm24[$i]', '$sumall2[$i]','$txtsarm221[$i]', '$txtsarm222[$i]', '$txtsarm223[$i]', '$txtsarm224[$i]', '$sumall22[$i]', '$txtsarm231[$i]', '$txtsarm232[$i]', '$txtsarm233[$i]', '$txtsarm234[$i]', '$sumall23[$i]', '$txtsarm31[$i]', '$txtsarm32[$i]', '$txtsarm33[$i]', '$txtsarm34[$i]','$sumall3[$i]',  '$sltYear')";
        //echo $sql_insert."<br>";
            mysqli_set_charset($conn,"utf8");
            mysqli_query($conn, $sql_insert);
          }

    }

    mysqli_close($conn);
        echo "<script>window.location = 'sar.php';</script>";

    die();

?>
