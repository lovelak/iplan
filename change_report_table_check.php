<?php
    include "include/ConnectionDb.php";
//    $year = $_GET['y'];
//    $local_office = $_GET['p'];
//    $year =0;
//    $local_office = 1;
    $sql = "select report_id, project_id, local_goverment_id from report WHERE local_goverment_id = 0"; 
    //echo $sql;

    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0){
        //echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>
        echo "<br>
        <table id = 'system' width='80%' cellspacing='1' cellpadding='1' border='1'>
        <tr>
            <th> รหัสรายงาน </th>
            <th> รหัสโครงการ </th>
            <th> รหัส อปท. </th>
        </tr>
        ";
        $sum4dimentionproject = 0;
        $sum4dimentionbudget = 0;
        //$i=$num;
        while ($row=mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['report_id'] . "</td>";
            echo "<td>" . $row['project_id'] . "</td>"; 
            echo "<td>" . $row['local_goverment_id'] . "</td></tr>"; 
        }
        echo "
        </table><br>";
    } else {
        echo "0 result";
    }
    mysqli_close($conn);
?>
