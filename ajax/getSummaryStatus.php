<?php
    include "../include/ConnectionDb.php";
    $year = $_GET['y'];
    $year = str_replace("\\" ,"", $year);
    if ($year == "'0'") {
        $sql1 = "SELECT COUNT(input_plan) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE input_plan = 'Y'";
        $sql2 = "SELECT COUNT(status_process) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE status_process = 2";
        $sql3 = "SELECT COUNT(status_process) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE status_process = 3";
        $sql4 = "SELECT COUNT(status_process) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE status_process = 4";
        $sql5 = "SELECT COUNT(project_id) AS project_id FROM project WHERE status_pass != 'N'";
        //$sql = "SELECT COUNT(`dimention`) AS dimention,SUM(`budget`) AS budget FROM `project` GROUP BY `dimention`";
    } else {
        $sql1 = "SELECT COUNT(input_plan) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE input_plan = 'Y' AND status_process_year = $year";
        $sql2 = "SELECT COUNT(status_process) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE status_process = 2 AND status_process_year = $year";
        $sql3 = "SELECT COUNT(status_process) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE status_process = 3 AND status_process_year = $year";
        $sql4 = "SELECT COUNT(status_process) FROM (SELECT tbA.project_id, tbA.round_report, tbA.input_plan, tbA.status_process_year, tbA.status_process FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N' AND tbA.project_id != 0) T WHERE status_process = 4 AND status_process_year = $year";
        $sql5 = "SELECT COUNT(project_id) AS project_id FROM project WHERE status_pass != 'N' AND (year1 = $year OR year2 = $year OR year3 = $year OR year4 = $year)";
    }

//    } else if ($year == "'2561'") {
//        $sql1 = "SELECT COUNT(`input_plan`) FROM report WHERE `input_plan` = 'Y' AND `input_plan` != '' AND `status_process_year` = '2561' AND `status_pass` != 'N'";
//        $sql2 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '2' AND `status_process_year` = '2561' AND `status_pass` != 'N'";
//        $sql3 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '3' AND `status_process_year` = '2561' AND `status_pass` != 'N'";
//        $sql4 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '4' AND `status_process_year` = '2561' AND `status_pass` != 'N'";
//    } else if ($year == "'2562'") {
//        $sql1 = "SELECT COUNT(`input_plan`) FROM report WHERE `input_plan` = 'Y' AND `input_plan` != '' AND `status_process_year` = '2562' AND `status_pass` != 'N'";
//        $sql2 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '2' AND `status_process_year` = '2562' AND `status_pass` != 'N'";
//        $sql3 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '3' AND `status_process_year` = '2562' AND `status_pass` != 'N'";
//        $sql4 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '4' AND `status_process_year` = '2562' AND `status_pass` != 'N'";
//    } else if ($year == "'2563'") {
//        $sql1 = "SELECT COUNT(`input_plan`) FROM report WHERE `input_plan` = 'Y' AND `input_plan` != '' AND `status_process_year` = '2563' AND `status_pass` != 'N'";
//        $sql2 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '2' AND `status_process_year` = '2563' AND `status_pass` != 'N'";
//        $sql3 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '3' AND `status_process_year` = '2563' AND `status_pass` != 'N'";
//        $sql4 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '4' AND `status_process_year` = '2563' AND `status_pass` != 'N'";
//    } else {
//        $sql1 = "SELECT COUNT(`input_plan`) FROM report WHERE `input_plan` = 'Y' AND `input_plan` != '' AND `status_process_year` = '2564' AND `status_pass` != 'N'";
//        $sql2 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '2' AND `status_process_year` = '2564' AND `status_pass` != 'N'";
//        $sql3 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '3' AND `status_process_year` = '2564' AND `status_pass` != 'N'";
//        $sql4 = "SELECT COUNT(`status_process`) FROM report WHERE `status_process` = '4' AND `status_process_year` = '2564' AND `status_pass` != 'N'";
//    }
//    echo $year ."<br>";
//    echo $sql1 ."<br>";
//    echo $sql2 ."<br>";
//    echo $sql3 ."<br>";
//    echo $sql4 ."<br>";
    mysqli_set_charset($conn,"utf8");

    $result1=mysqli_query($conn, $sql1);
    $num1=mysqli_num_rows($result1);

    $result2=mysqli_query($conn, $sql2);
    $num2=mysqli_num_rows($result2);

    $result3=mysqli_query($conn, $sql3);
    $num3=mysqli_num_rows($result3);

    $result4=mysqli_query($conn, $sql4);
    $num4=mysqli_num_rows($result4);

    $result5=mysqli_query($conn, $sql5);
    $num5=mysqli_num_rows($result5);

    echo "<br>
    <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
<thead>
        <tr>
            <th>บรรจุในข้อบัญญัติ/เทศบัญญัติ/แผนดำเนินงาน</th>
            <th>อยู่ระหว่างดำเนินการ</th>
            <th>ดำเนินการแล้วเสร็จ</th>
            <th>ไม่สามารถดำเนินการได้</th>
            <th>รวมทั้งสิ้น</th>
            <th>รอรายงานผล</th>
        </tr>
</thead>
        <tr>";
    $sum4dimentionproject = 0;
    if ($num1 == 0) {
        echo "<td>0</td>";
    } else {
        $row1=mysqli_fetch_array($result1);
        echo "<td>" . $row1['COUNT(input_plan)'] . "</td>";
        //$sum4dimentionproject += $row1['COUNT(`input_plan`)'];
    }

    if ($num2 == 0) {
        echo "<td>0</td>";
    } else {
        $row2=mysqli_fetch_array($result2);
        echo "<td>" . $row2['COUNT(status_process)'] . "</td>";
        $sum4dimentionproject += $row2['COUNT(status_process)'];
    }

    if ($num3 == 0) {
        echo "<td>0</td>";
    } else {
        $row3=mysqli_fetch_array($result3);
        echo "<td>" . $row3['COUNT(status_process)'] . "</td>";
        $sum4dimentionproject += $row3['COUNT(status_process)'];
    }

    if ($num4 == 0) {
        echo "<td>0</td>";
    } else {
        $row4=mysqli_fetch_array($result4);
        echo "<td>". $row4['COUNT(status_process)'] . "</td>";
        $sum4dimentionproject += $row4['COUNT(status_process)'];
    }

    echo "<td>$sum4dimentionproject</td>";

    if ($num5 == 0) {
        echo "<td>0</td>";
    } else {
        $row5=mysqli_fetch_array($result5);
        echo "<td>". ($row5['project_id']-$sum4dimentionproject) . "</td>";
    }
?>
