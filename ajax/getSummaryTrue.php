<?php
    //$year = $_POST[data];
    $year = $_GET['y'];
    //echo "--->".$year;
    $year = str_replace("\\" ,"", $year);
    //echo "--->".$year;
    if ($year == '0') {
        $sql_true = "SELECT COUNT(t.dimention) AS dimention, SUM(t.budget_true) AS budget_true FROM (SELECT a.project_id, a.round_report, a.budget_true, a.dimention, a.status_process_year, a.status_pass FROM report a, (SELECT b.project_id, MAX(b.round_report) as round_report FROM report b GROUP BY project_id) b WHERE a.project_id = b.project_id AND a.round_report = b.round_report AND a.status_pass != 'N') t GROUP BY t.dimention";
        //$sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` WHERE status_pass != 'N'  GROUP BY `dimention`";
    } else {
        $sql_true = "SELECT COUNT(t.dimention) AS dimention, SUM(t.budget_true) AS budget_true FROM (SELECT a.project_id, a.round_report, a.budget_true, a.dimention, a.status_process_year, a.status_pass FROM report a, (SELECT b.project_id, MAX(b.round_report) as round_report FROM report b GROUP BY project_id) b WHERE a.project_id = b.project_id AND a.round_report = b.round_report AND a.status_process_year = $year AND a.status_pass != 'N') t GROUP BY t.dimention";
    }
    include "../include/ConnectionDb.php";
    //echo $year;
    //echo $sql_true;
    mysqli_set_charset($conn,"utf8");
    $result_true=mysqli_query($conn, $sql_true);
    $num_true=mysqli_num_rows($result_true);
    if (mysqli_num_rows($result_true) > 0){
        ///echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>
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
    $i=$num_true;
    if ($year == "'0'") {
        while ($row_true=mysqli_fetch_assoc($result_true)) {
            // ตัด row ที่เป็น dummy ออก
            if ($row_true['dimention'] >= 4)
            $dimen = $row_true['dimention'] - 4;
            echo "<td>". $dimen;
            $sum4dimentionproject += $row_true['dimention'];
            echo "</td><td>" . number_format($row_true['budget_true']);
            $sum4dimentionbudget += $row_true['budget_true'];
            echo "</td>";
        }
        // ตัด row ที่เป็น dummy ออก
        //$sum4dimentionproject = $sum4dimentionproject-4;
        echo "<td>" . ($sum4dimentionproject-16) . "</td>";
    } else {
        while ($row_true=mysqli_fetch_assoc($result_true)) {
            // ตัด row ที่เป็น dummy ออก
            if ($row_true['dimention'] >= 1)
            $dimen = $row_true['dimention'] - 1;
            echo "<td>". $dimen;
            $sum4dimentionproject += $row_true['dimention'];
            echo "</td><td>" . number_format($row_true['budget_true']);
            $sum4dimentionbudget += $row_true['budget_true'];
            echo "</td>";
        }
        // ตัด row ที่เป็น dummy ออก
        //$sum4dimentionproject = $sum4dimentionproject-4;
        echo "<td>" . ($sum4dimentionproject-4) . "</td>";
    }
    echo "<td>" . number_format($sum4dimentionbudget) . "</td>
    </tr>";
    echo "</table><br>";
    } else {
        echo "0 result";
    }
?>
