<?php
    $id = $_GET['id'];
    //echo $id;
    include "include/ConnectionDb.php";
    $sql = "UPDATE project SET status_pass = \"N\" WHERE project_id = '" . $id . "'";
    $sql2 = "UPDATE report SET status_pass = \"N\" WHERE project_id = '" . $id . "'";
    mysqli_set_charset($conn,"utf8");
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        //echo "โครงการไม่สอดคล้อง";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    //header('Refresh: 0; URL=projectdisplay.php');
    echo "<script>window.location = 'projectdisplay.php';</script>";

    die();

?>
