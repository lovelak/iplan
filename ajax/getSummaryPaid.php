<?php
    include "../include/ConnectionDb.php";
    $year = $_GET['y'];
      $year = str_replace("\\" ,"", $year);
    if ($year == "'0'") {
        $sql = "SELECT COUNT(dimention) As dimention, SUM(budget) AS budget, SUM(budget_true) AS budget_true, SUM(paid) AS paid FROM (SELECT tbA.project_id, tbA.round_report, tbA.budget,  tbA.budget_true, tbA.paid, tbA.dimention,tbA.status_process_year FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N') tbCount GROUP BY dimention";
        //$sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` GROUP BY `dimention`";
    } else {
        $sql = "SELECT COUNT(dimention) As dimention, SUM(budget) AS budget, SUM(budget_true) AS budget_true, SUM(paid) AS paid FROM (SELECT tbA.project_id, tbA.round_report, tbA.budget,  tbA.budget_true, tbA.paid, tbA.dimention,tbA.status_process_year FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.status_process_year = $year) tbCount GROUP BY dimention";
    }
//    } else if ($year == "'2561'") {
//        $sql = "SELECT COUNT(`dimention`), SUM(`budget`), SUM(`budget_true`), SUM(`paid`) FROM (SELECT `project_id`, MAX(`round_report`),`budget`, `budget_true`, MAX(`paid`) AS paid, `status_process_year`, `dimention` FROM `report` WHERE `status_process_year` = '2561' AND `status_pass` != 'N'  GROUP BY `project_id`, `status_process_year`, `dimention`)AS T GROUP BY `dimention`";
//    } else if ($year == "'2562'") {
//        $sql = "SELECT COUNT(`dimention`), SUM(`budget`), SUM(`budget_true`), SUM(`paid`) FROM (SELECT `project_id`, MAX(`round_report`),`budget`, `budget_true`, MAX(`paid`) AS paid, `status_process_year`, `dimention` FROM `report` WHERE `status_process_year` = '2562' AND `status_pass` != 'N'  GROUP BY `project_id`, `status_process_year`, `dimention`)AS T GROUP BY `dimention`";
//    } else if ($year == "'2563'") {
//        $sql = "SELECT COUNT(`dimention`), SUM(`budget`), SUM(`budget_true`), SUM(`paid`) FROM (SELECT `project_id`, MAX(`round_report`),`budget`, `budget_true`, MAX(`paid`) AS paid, `status_process_year`, `dimention` FROM `report` WHERE `status_process_year` = '2563' AND `status_pass` != 'N'  GROUP BY `project_id`, `status_process_year`, `dimention`)AS T GROUP BY `dimention`";
//    } else {
//        $sql = "SELECT COUNT(`dimention`), SUM(`budget`), SUM(`budget_true`), SUM(`paid`) FROM (SELECT `project_id`, MAX(`round_report`),`budget`, `budget_true`, MAX(`paid`) AS paid, `status_process_year`, `dimention` FROM `report` WHERE `status_process_year` = '2564' AND `status_pass` != 'N'  GROUP BY `project_id`, `status_process_year`, `dimention`)AS T GROUP BY `dimention`";
//    }
    //echo $year;
    //echo $sql;
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0){
        ///echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>
        echo "<br>
    <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
    <thead>
        <tr>
            <th colspan='3'>มิติที่ 1</th>
            <th colspan='3'>มิติที่ 2</th>
            <th colspan='3'>มิติที่ 3</th>
            <th colspan='3'>มิติที่ 4</th>
            <th colspan='3'>รวม 4 มิติ</th>

        </tr>
    </thead>
        <tr>
            <th>แผนฯ</th>
            <th>ข้อบัญญัติ/เทศบัญญัติ</th>
            <th>เบิกจ่ายจริง</th>
            <th>แผนฯ</th>
            <th>ข้อบัญญัติ/เทศบัญญัติ</th>
            <th>เบิกจ่ายจริง</th>
            <th>แผนฯ</th>
            <th>ข้อบัญญัติ/เทศบัญญัติ</th>
            <th>เบิกจ่ายจริง</th>
            <th>แผนฯ</th>
            <th>ข้อบัญญัติ/เทศบัญญัติ</th>
            <th>เบิกจ่ายจริง</th>
            <th>แผนฯ</th>
            <th>ข้อบัญญัติ/เทศบัญญัติ</th>
            <th>เบิกจ่ายจริง</th>
        </tr>
        <tr>";
    $sum4dimentionproject = 0;
    $sum4dimentionbudget = 0;
    $sum4dimentiontrue = 0;
    $sum4dimentionpaid = 0;
    $i=$num;
    while ($row=mysqli_fetch_assoc($result)) {
        // ตัด row ที่เป็น dummy ออก
        //$dimen = $row['COUNT(`dimention`)'] - 1;
        echo "<td>". number_format($row['budget']);
        $sum4dimentionbudget += $row['budget'];
        echo "</td><td>" . number_format($row['budget_true']);
        $sum4dimentiontrue += $row['budget_true'];
        echo "</td><td>" . number_format($row['paid']);
        $sum4dimentionpaid += $row['paid'];
        echo "</td>";
    }
    // ตัด row ที่เป็น dummy ออก
    //$sum4dimentionproject = $sum4dimentionproject-4;
    echo "<td>" . number_format($sum4dimentionbudget) . "</td>
    <td>" . number_format($sum4dimentiontrue) . "</td>
    <td>" . number_format($sum4dimentionpaid) . "</td>
    </tr>";
    echo "</table><br>";
    } else {
        echo "0 result";
    }
?>
