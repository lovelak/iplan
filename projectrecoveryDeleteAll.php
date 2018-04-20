<?php
    $id = $_GET['id'];
    echo $id;
    include "include/ConnectionDb.php";
    $sql_insert = "UPDATE project SET status_use = \"Y\" WHERE status_use = 'N'";
    $sql_insert2 = "UPDATE report SET status_use = \"Y\" WHERE status_use = 'N'";
    mysqli_set_charset($conn,"utf8");
    if (mysqli_query($conn, $sql_insert)) {
        //echo "กู้โครงการทั้งหมดสำเร็จ"; 
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
    if (mysqli_query($conn, $sql_insert2)) {
        //echo "กู้โครงการทั้งหมดสำเร็จ";
        
    } else {
        echo "Error: " . $sql_insert2 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Refresh: 0; URL=projectdisplay.php');
    die();
?>
