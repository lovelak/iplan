<?php

    $q = $_GET['q'];
    if ($q == "0"){
        $sql="SELECT * FROM project WHERE status_use = 'Y'";
    } else if ($q == "2561") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year1='2561'";
    } else if ($q == "2562") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year2='2562'";
    } else if ($q == "2563") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year3='2563'";
    } else if ($q == "2564") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year4='2564'";
    }
    include '../include/ConnectionDb.php';
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0){
        //echo "<h1>" . $namesystem . "</h1>";
        echo "<h2>จำนวนข้อมูลทั้งหมด $num รายการ ดังนี้ </h2>";
    if ($q == "0"){
        echo "<table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1'>
        <tr>
            <th>ลำดับที่</th>
            <th>ประเภทงาน</th>
            <th>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติ</th>
            <th>งบประมาณตามแผนพัฒนาท้องถิ่น</th>
            <th>สอดคล้อง</th>
            <th colspan='4'>ดำเนินการ ปีงบประมาณ พ.ศ.</th>
            <th>ประสงค์ดำเนินการ</th>
        </tr>";
    } else {
        echo "<table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1'>
        <tr>
            <th rowspan='2'>ลำดับที่</th>
            <th rowspan='2'>ประเภทงาน</th>
            <th rowspan='2'>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติ</th>
            <th rowspan='2'>งบประมาณตามแผนพัฒนาท้องถิ่น</th>
            <th rowspan='2'>สอดคล้อง</th>
            <th colspan='2'>รอบการรายงาน</th>
        </tr>
        <tr>
            <th>6 เดือน</th>
            <th>12 เดือน</th>
        </tr>";
    }
    //$i=$num;
    $i=1;
    while ($row=mysqli_fetch_assoc($result)) {

    echo "<tr>
        <td>";
    echo $i++;
    echo "</td>
        <td>";
        if ($row["type"] == 1) {
            echo "โครงการ";
        } if ($row["type"] == 2){
            echo "กิจกรรม";
        } if ($row["type"] == 3) {
            echo "มาตรการ";
        } if ($row["type"] == 4) {
            echo "แนวปฏิบัติ";
        }
    echo "</td>";

        if ($row['status_pass'] == "N") {
            echo "<td><a href='projectreview.php?id=$row[project_id]&sp=$row[status_pass]'><img src='..\images/icon/reject.jpg'>" . $row['project_id'] . $row['name'] . "</a></td>";
        } else {
            echo "<td><a href='projectreview.php?id=$row[project_id]&sp=$row[status_pass]'>" . $row['project_id']  . $row['name'] . "</a></td>";
        }

    echo "<td>" . number_format($row['budget']) . "</td>
        <td>";
        if ($row["dimention"] == 1) {
            echo "มิติที่ 1";
        } if ($row["dimention"] == 2){
            echo "มิติที่ 2";
        } if ($row["dimention"] == 3) {
            echo "มิติที่ 3";
        } if ($row["dimention"] == 4) {
            echo "มิติที่ 4";
        }
    if ($q == "0") {
        echo "</td>
        <td>" . $row["year1"] . "</td>
        <td>" . $row["year2"] . "</td>
        <td>" . $row["year3"] . "</td>
        <td>" . $row["year4"] . "</td>";
    }
    echo "<td>";
    if ($q != "0"){
        echo "<a href='projectreport.php?id=$row[project_id]&r=1&y=$q'> <img src='images/icon/report.png'></a></td>
        <td><a href='projectreport.php?id=$row[project_id]&r=2&y=$q'> <img src='images/icon/report.png'></a>";
    } else {
        echo "<a href='projectedit.php?id=$row[project_id]'><img src='images/icon/edit.png'></a>
        <a href='projectdelete.php?id=$row[project_id]' onclick=\"" . "return confirm('คุณต้องการลบโครงการ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/delete.png'></a>";
        if ($row['status_pass'] == 'Y') {
            echo "<a href='projectnotpass.php?id=$row[project_id]' onclick=\"" . "return confirm('โครงการนี้ไม่สอดคล้องกับมิติ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/reject.jpg'></a>";
        } else {
            echo "<a href='projectpass.php?id=$row[project_id]' onclick=\"" . "return confirm('โครงการนี้สอดคล้องกับมิติ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/approve.jpg'></a>";
        }
    }
        echo "</td>
      </tr>";
    }
        } else {
            echo "0 result";
        }
    mysqli_close($conn);
    echo "</table>";
?>
