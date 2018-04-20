<?php
session_start();

    include "include/ConnectionDb.php";


$yearscore = $_POST[yearscore];
$score = $_POST[score];

    $sql_insert = "INSERT INTO criterionscore VALUES ('','$yearscore','$score')";
// echo $sql_insert;
    mysqli_set_charset($conn,"utf8");
    mysqli_query($conn, $sql_insert);




    mysqli_close($conn);
        echo "<script>window.location = 'criterionscore.php';</script>";

    die();

?>
