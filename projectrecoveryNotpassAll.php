<?php
    //$id = $_GET['id'];
    //echo $id;
    include "include/ConnectionDb.php";
    $sql_insert = "UPDATE project SET status_pass = \"Y\" WHERE project_id > 1";
    mysqli_set_charset($conn,"utf8");
    if (mysqli_query($conn, $sql_insert)) {
        echo "กู้โครงการทั้งหมดสำเร็จ";
        mysqli_close($conn);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //header('Refresh: 0; URL=projectdisplay.php');
    die();
?>
