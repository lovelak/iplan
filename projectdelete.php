<?php
    $id = $_GET['id'];
    echo $id;
    include "include/ConnectionDb.php";
    $sql_insert = "UPDATE project SET status_use = \"N\" WHERE project_id = '" . $id . "'";
    $sql2 = "UPDATE report SET status_use = \"N\" WHERE project_id = '" . $id . "'";
    mysqli_set_charset($conn,"utf8");
    if (mysqli_query($conn, $sql_insert)) {
        //echo "ลบโครงการสำเร็จ";
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
    if (mysqli_query($conn, $sql2)) {
        //echo "ลบโครงการสำเร็จ";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    //header('Refresh: 0; URL=projectdisplay.php');
    mysqli_close($conn);
    echo "<script>window.location = 'projectdisplay.php';</script>";

    die();

?>
