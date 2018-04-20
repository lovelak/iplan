<?php
    include "../include/ConnectionDb.php";
    $year = $_GET['y'];
      $year = str_replace("\\" ,"", $year);
    if ($year == "0") {
        $sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` WHERE status_pass != 'N' GROUP BY `dimention`";
    } else if ($year == "2561") {
        $sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` WHERE year1='2561' AND  status_pass != 'N' GROUP BY `dimention`";
    } else if ($year == "2562") {
        $sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` WHERE year2='2562' AND  status_pass != 'N'  GROUP BY `dimention`";
    } else if ($year == "2563") {
        $sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` WHERE year3='2563' AND  status_pass != 'N'  GROUP BY `dimention`";
    } else {
        $sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` WHERE year4='2564' AND  status_pass != 'N'  GROUP BY `dimention`";
    }
    //echo $sql;
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0){
        //echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>
        echo "<br>
        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
        <thead>
        <tr>
            <th colspan='2'>มิติที่ 1</th>
            <th colspan='2'>มิติที่ 2</th>
            <th colspan='2'>มิติที่ 3</th>
            <th colspan='2'>มิติที่ 4</th>
            <th colspan='2'>รวม 4 มิติ</th>

        </tr>
        </thead>
        <tr>
            <th>โครงการ</th>
            <th>งบประมาณ</th>
            <th>โครงการ</th>
            <th>งบประมาณ</th>
            <th>โครงการ</th>
            <th>งบประมาณ</th>
            <th>โครงการ</th>
            <th>งบประมาณ</th>
            <th>โครงการ</th>
            <th>งบประมาณ</th>
        </tr>
        <tr>";
        $sum4dimentionproject = 0;
        $sum4dimentionbudget = 0;
        $i=$num;
        while ($row=mysqli_fetch_assoc($result)) {
            echo "<td>". $row['dimention'];
            $sum4dimentionproject += $row['dimention'];
            echo "</td><td>" . number_format($row['budget']);
            $sum4dimentionbudget += $row['budget'];
            echo "</td>";
        }
        echo "<td>" . $sum4dimentionproject . "</td>
        <td>" . number_format($sum4dimentionbudget) . "</td>
        </tr>";
        echo "</table><br>";
    } else {
        echo "0 result";
    }
    mysqli_close($conn);
?>
