<?php
//	session_start();
////include "include/checklogin.php";
//
// 	if($_SESSION["ss_group"] != '4' && $_SESSION["ss_group"] != '6'  &&  $_SESSION["ss_group"] != '7' )
//		{
//      $locals =" and local_goverment_id ='".$_SESSION["ss_local_office_id"]."' ";
//    }

    $a = $_GET['a'];
    $y = $_GET['y'];
    if ($y == "0" && $a == "0"){
        $sql="SELECT * FROM v_implement_area ORDER BY area";
    } else if ($y == "0" && $a != "0") {
        $sql="SELECT * FROM v_implement_province WHERE area=$a ORDER BY PROVINCE_ID";
    } else if ($y != "0" && $a == "0") {
        if ($y == "2561") {
            $sql="SELECT * FROM v_implement_area ORDER BY implementY1 DESC";
        } else if ($y == "2562") {
            $sql="SELECT * FROM v_implement_area ORDER BY implementY2 DESC";
        } else if ($y == "2563") {
            $sql="SELECT * FROM v_implement_area ORDER BY implementY3 DESC";
        } else if ($y == "2564") {
            $sql="SELECT * FROM v_implement_area ORDER BY implementY4 DESC";
        }
    } else if ($y != "0" && $a != "0") {
        if ($y == "2561") {
            $sql="SELECT * FROM v_implement_province WHERE area=$a ORDER BY implementY1 DESC";
        } else if ($y == "2562") {
            $sql="SELECT * FROM v_implement_province WHERE area=$a ORDER BY implementY2 DESC";
        } else if ($y == "2563") {
            $sql="SELECT * FROM v_implement_province WHERE area=$a ORDER BY implementY3 DESC";
        } else if ($y == "2564") {
            $sql="SELECT * FROM v_implement_province WHERE area=$a ORDER BY implementY4 DESC";
        }
    }
     
//    if {
//     if ($p == "0"){
//            $sql="SELECT * FROM v_implement_full ORDER BY quantity DESC";
//        } else {
//            $sql="SELECT * FROM v_implement_amphur WHERE PROVINCE_ID = $p ORDER BY AMPHUR_ID";
//        }   
//       
//        
//    } else if ($y == "2561") {
//        $sql="SELECT * FROM v_implement_amphur WHERE PROVINCE_ID = $p  ORDER BY implementY1 DESC";
//    } else if ($y == "2562") {
//        $sql="SELECT * FROM v_implement_amphur WHERE PROVINCE_ID = $p  ORDER BY implementY2 DESC";
//    } else if ($y == "2563") {
//        $sql="SELECT * FROM v_implement_amphur WHERE PROVINCE_ID = $p  ORDER BY implementY3 DESC";
//    } else if ($y == "2564") {
//        $sql="SELECT * FROM v_implement_amphur WHERE PROVINCE_ID = $p  ORDER BY implementY4 DESC";
//    }
    include '../include/ConnectionDb.php';
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
//    if ($num=mysqli_num_rows($result) == ""){
//        $num = 0;
//    }
    //if (mysqli_num_rows($result) > 0){
        //echo "<h1>" . $namesystem . "</h1>";
        //echo "<h2>มี อปท. บันทึกโครงการแล้วจำนวน $num อปท. ดังนี้ </h2>";
//    echo $y;
//    echo $p;
    if (($y == "0" && $a == "0")) {
        echo "<h2>มี อปท. บันทึกโครงการแล้วจำนวน $num อปท. ดังนี้ </h2>
            <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
    <thead>
            <tr>
                <th class='center'>ลำดับที่</th>
                <th class='center'>ภาค</th>
                <th class='center'>จำนวนโครงการทั้งหมด</th>
                <th class='center'>ดำเนินการปี 2561</th>
                <th class='center'>ดำเนินการปี 2562</th>
                <th class='center'>ดำเนินการปี 2563</th>
                <th class='center'>ดำเนินการปี 2564</th>
            </tr>
    </thead>        ";
    } else if ($y == "0" && $a != "0") {
        echo "<h2>มี อปท. บันทึกโครงการแล้วจำนวน $num อปท. ดังนี้ </h2>
            <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
    <thead>
            <tr>
                <th class='center'>ลำดับที่</th>
                <th class='center'>ภาค</th>
                <th class='center'>จำนวนโครงการทั้งหมด</th>
                <th class='center'>ดำเนินการปี 2561</th>
                <th class='center'>ดำเนินการปี 2562</th>
                <th class='center'>ดำเนินการปี 2563</th>
                <th class='center'>ดำเนินการปี 2564</th>
            </tr>
    </thead>        ";
    } else if ($y != "0" && $a == "0") {
        echo "<h2>ผลการนำแผนไปสู่การปฏิบัติของปีงบประมาณ $y ดังนี้ </h2>
        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
        <tr>
        <thead>
            <th class='center'>ลำดับที่</th>
            <th class='center'>จังหวัด</th>
            <th class='center'>จำนวนโครงการ</th>
            <th class='center'>ระหว่างดำเนินการ</th>
            <th class='center'>ดำเนินการแล้วเสร็จ</th>
            <th class='center'>ไม่สามารถดำเนินการได้</th>
            <th class='center'>ผลการนำแผนไปสู่การปฏิบัติ</th>
        </thead>
        </tr>";
    } else if ($y != "0" && $a != "0") {
        echo "<h2>ผลการนำแผนไปสู่การปฏิบัติของปีงบประมาณ $y ดังนี้ </h2>
        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
        <tr>
        <thead>
            <th class='center'>ลำดับที่</th>
            <th class='center'>จังหวัด</th>
            <th class='center'>จำนวนโครงการ</th>
            <th class='center'>ระหว่างดำเนินการ</th>
            <th class='center'>ดำเนินการแล้วเสร็จ</th>
            <th class='center'>ไม่สามารถดำเนินการได้</th>
            <th class='center'>ผลการนำแผนไปสู่การปฏิบัติ</th>
        </thead>
        </tr>";
    }
    $i=1;
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>";
        echo $i++;
        echo "</td>";
        if (($y == "0" && $a == "0")){
            echo "<td>สำนักงาน ป.ป.ช. ภาค " . $row['area'] . "</td>";
            echo "<td>" . ($row['quantity']) . "</td>";
            echo "
                <td>" . $row["year1"] . "</td>
                <td>" . $row["year2"] . "</td>
                <td>" . $row["year3"] . "</td>
                <td>" . $row["year4"] . "</td>"; 
//        }
        } else if (($y == "0" && $a != "0")) {
            echo "<td>จังหวัด" . $row['PROVINCE_NAME'] . "</td>";
            echo "<td>" . ($row['quantity']) . "</td>";
            echo "
                <td>" . $row["year1"] . "</td>
                <td>" . $row["year2"] . "</td>
                <td>" . $row["year3"] . "</td>
                <td>" . $row["year4"] . "</td>"; 
        
        
        
        
//        if (($y == "0" && $a == "0") || ($y != "0" && $a == "0")) {
//            if (($y == "0" && $a == "0")){
//                echo "<td>สำนักงาน ป.ป.ช. ภาค " . $row['area'] . "</td>";
//            } else if ($y != "0" && $a == "0") {
//                echo "<td>สำนักงาน ป.ป.ช. ภาค " . $row['area'] . "</td>";
//            } else if ($y == "0" && $a != "0") {
//                echo "<td>" . $row['PROVINCE_NAME'] . "</td>";
//            }
 
//            echo "<td>สำนักงาน ป.ป.ช. ภาค " . $row['area'] . "</td>";
//            echo "<td>" . ($row['quantity']) . "</td>";
//            echo "
//                <td>" . $row["year1"] . "</td>
//                <td>" . $row["year2"] . "</td>
//                <td>" . $row["year3"] . "</td>
//                <td>" . $row["year4"] . "</td>"; 
        } else if (($y != "0" && $a == "0")){
            echo "<td>สำนักงาน ป.ป.ช. ภาค " . $row['area'] . "</td>";
            if ($y == 2561) {
                echo "<td>" . ($row['year1']) . "</td>";
                echo "<td>" . $row["year1case2"] . "</td>";
                echo "<td>" . $row["year1case3"] . "</td>";
                echo "<td>" . $row["year1case4"] . "</td>";
                echo "<td>" . number_format($row["implementY1"],2) . "</td>";
            } else if ($y == 2562) {
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year2case2"] . "</td>";
                echo "<td>" . $row["year2case3"] . "</td>";
                echo "<td>" . $row["year2case4"] . "</td>";
                echo "<td>" . number_format($row["implementY2"],2) . "</td>";
            } else if ($y == 2563) {
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year3case2"] . "</td>";
                echo "<td>" . $row["year3case3"] . "</td>";
                echo "<td>" . $row["year3case4"] . "</td>";
                echo "<td>" . number_format($row["implementY3"],2) . "</td>";
            } else if ($y == 2564){
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year4case2"] . "</td>";
                echo "<td>" . $row["year4case3"] . "</td>";
                echo "<td>" . $row["year4case4"] . "</td>";
                echo "<td>" . number_format($row["implementY4"],2) . "</td>";
            } else {
                echo "<td>" . ($row['quantity']) . "</td>";
                echo "
                <td>" . $row["year1"] . "</td>
                <td>" . $row["year2"] . "</td>
                <td>" . $row["year3"] . "</td>
                <td>" . $row["year4"] . "</td>";
            }
        } else {
            echo "<td>จังหวัด" . $row['PROVINCE_NAME'] . "</td>";
            if ($y == 2561) {
                echo "<td>" . ($row['year1']) . "</td>";
                echo "<td>" . $row["year1case2"] . "</td>";
                echo "<td>" . $row["year1case3"] . "</td>";
                echo "<td>" . $row["year1case4"] . "</td>";
                echo "<td>" . number_format($row["implementY1"],2) . "</td>";
            } else if ($y == 2562) {
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year2case2"] . "</td>";
                echo "<td>" . $row["year2case3"] . "</td>";
                echo "<td>" . $row["year2case4"] . "</td>";
                echo "<td>" . number_format($row["implementY2"],2) . "</td>";
            } else if ($y == 2563) {
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year3case2"] . "</td>";
                echo "<td>" . $row["year3case3"] . "</td>";
                echo "<td>" . $row["year3case4"] . "</td>";
                echo "<td>" . number_format($row["implementY3"],2) . "</td>";
            } else if ($y == 2564){
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year4case2"] . "</td>";
                echo "<td>" . $row["year4case3"] . "</td>";
                echo "<td>" . $row["year4case4"] . "</td>";
                echo "<td>" . number_format($row["implementY4"],2) . "</td>";
            } else {
                echo "<td>" . ($row['quantity']) . "</td>";
                echo "
                <td>" . $row["year1"] . "</td>
                <td>" . $row["year2"] . "</td>
                <td>" . $row["year3"] . "</td>
                <td>" . $row["year4"] . "</td>";
            }
        }      
        echo "</tr>";
    }
//    if (($y == "0") && ($p == "0")) {
//        echo "<h2>มี อปท. บันทึกโครงการแล้วจำนวน $num อปท. ดังนี้ </h2>
//        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
//<thead>
//        <tr>
//            <th class='center'>ลำดับที่</th>
//            <th class='center'>อำเภอ</th>
//            <th class='center'>จำนวนโครงการทั้งหมด</th>
//            <th class='center'>ดำเนินการปี 2561</th>
//            <th class='center'>ดำเนินการปี 2562</th>
//            <th class='center'>ดำเนินการปี 2563</th>
//            <th class='center'>ดำเนินการปี 2564</th>
//        </tr>
//</thead>        ";
//    } else {
//        echo "<h2>ผลการนำแผนไปสู่การปฏิบัติของปีงบประมาณ $y ดังนี้ </h2>
//        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
//        <tr>
//        <thead>
//            <th class='center'>ลำดับที่</th>
//            <th class='center'>อำเภอ</th>
//            <th class='center'>จำนวนโครงการ</th>
//            <th class='center'>ระหว่างดำเนินการ</th>
//            <th class='center'>ดำเนินการแล้วเสร็จ</th>
//            <th class='center'>ไม่สามารถดำเนินการได้</th>
//            <th class='center'>ผลการนำแผนไปสู่การปฏิบัติ</th>
//        </thead>
//        </tr>";
//    }
    //$i=$num;
//    $i=1;
//    while ($row=mysqli_fetch_assoc($result)) {
//
//    echo "<tr>
//        <td>";
//    echo $i++;
//    echo "</td>";
//    if (($y == "0") && ($p == "0")){
//        echo "<td>" . $row['local_office_name'] . "</td>";
//    } else {
//        echo "<td>" . $row['AMPHUR_NAME'] . "</td>";
//    }
    
        
    
//        if ($row["dimention"] == 1) {
//            echo "มิติที่ 1";
//        } if ($row["dimention"] == 2){
//            echo "มิติที่ 2";
//        } if ($row["dimention"] == 3) {
//            echo "มิติที่ 3";
//        } if ($row["dimention"] == 4) {
//            echo "มิติที่ 4";
//        }
//    if ($y == "0") {
//        echo "<td>" . ($row['quantity']) . "</td>";
//        echo "
//        <td>" . $row["year1"] . "</td>
//        <td>" . $row["year2"] . "</td>
//        <td>" . $row["year3"] . "</td>
//        <td>" . $row["year4"] . "</td>";
//    } else if ($y == 2561) {
//        echo "<td>" . ($row['year1']) . "</td>";
//        echo "<td>" . $row["year1case2"] . "</td>";
//        echo "<td>" . $row["year1case3"] . "</td>";
//        echo "<td>" . $row["year1case4"] . "</td>";
//        echo "<td>" . number_format($row["implementY1"],2) . "</td>";
//    } else if ($y == 2562) {
//        echo "<td>" . ($row['year2']) . "</td>";
//        echo "<td>" . $row["year2case2"] . "</td>";
//        echo "<td>" . $row["year2case3"] . "</td>";
//        echo "<td>" . $row["year2case4"] . "</td>";
//        echo "<td>" . number_format($row["implementY2"],2) . "</td>";
//    } else if ($y == 2563) {
//        echo "<td>" . ($row['year2']) . "</td>";
//        echo "<td>" . $row["year3case2"] . "</td>";
//        echo "<td>" . $row["year3case3"] . "</td>";
//        echo "<td>" . $row["year3case4"] . "</td>";
//        echo "<td>" . number_format($row["implementY3"],2) . "</td>";
//    } else {
//        echo "<td>" . ($row['year2']) . "</td>";
//        echo "<td>" . $row["year4case2"] . "</td>";
//        echo "<td>" . $row["year4case3"] . "</td>";
//        echo "<td>" . $row["year4case4"] . "</td>";
//        echo "<td>" . number_format($row["implementY4"],2) . "</td>";
//    }
//    echo "<td  class='center'>";
//    if ($q != "0") {
//        if ($row['status_pass'] == 'N'){
//            echo "</td><td class='center'>";
//        } else {
//            echo "<a href='projectreport.php?id=$row[project_id]&r=1&y=$q'> <img src='images/icon/report.png'></a></td>
//            <td class='center'><a href='projectreport.php?id=$row[project_id]&r=2&y=$q'> <img src='images/icon/report.png'></a>";
//        }
//
//    } else {
//        echo "<a href='projectedit.php?id=$row[project_id]'><img src='images/icon/edit.png'></a>
//        <a href='projectdelete.php?id=$row[project_id]' onclick=\"" . "return confirm('คุณต้องการลบโครงการ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/delete.png'></a>";
//        if ($row['status_pass'] == 'Y') {
//            echo "<a href='projectnotpass.php?id=$row[project_id]' onclick=\"" . "return confirm('โครงการนี้ไม่สอดคล้องกับมิติ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/reject.jpg'></a>";
//        } else {
//            echo "<a href='projectpass.php?id=$row[project_id]' onclick=\"" . "return confirm('โครงการนี้สอดคล้องกับมิติ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/approve.jpg'></a>";
//        }
//    }
//        echo "</td>
//        echo "</tr>";
//    }
//        } else {
//            echo "0 result";
//        }
    mysqli_close($conn);
    echo "</table>";
//    echo $y;
//    echo $p;
?>
