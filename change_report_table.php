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
        while ($row=mysqli_fetch_assoc($result)) {
//            echo "<tr><td>" . $row['report_id'] . "</td>";
//            echo "<td>" . $row['project_id'] . "</td>"; 
//            echo "<td>" . $row['local_goverment_id'] . "</td></tr>"; 
            
            $sql_id = "SELECT local_goverment_id FROM project WHERE project_id = " . $row['project_id'];
            
            $result2=mysqli_query($conn, $sql_id);
            while($row2=mysqli_fetch_assoc($result2)) {
//                echo "<br>" . $row2['local_goverment_id'];
                $update = "UPDATE report SET local_goverment_id = " . $row2['local_goverment_id'] . " WHERE report_id = " . $row['report_id'];
                $result3=mysqli_query($conn, $update);
            }
        }
    } else {
        echo "0 result";
    }
    mysqli_close($conn);
?>
