<?php
	session_start();
    include '../include/ConnectionDb.php';
//echo $_SESSION["ss_group"]."<br>";


    $q = $_GET['q'];
    if ($q == "0"){

      if($_SESSION["ss_group"] <= '2')
        {
         $locals ="  and project.local_goverment_id = '".$_SESSION["ss_local_office_id"]."' ";
        }

        $sql="SELECT `project`.`project_id`,`project`.`type`,`project`.`name`,`project`.`budget`,`project`.`status_pass`,`report`.`budget_true`,`report`.`paid`,`project`.`type`,`report`.`status_process`,`report`.`round_report`,`report`.`status_process_year`,`report`.`dimention` FROM `project`RIGHT JOIN `report` ON `project`.`project_id` = `report`.`project_id` where project.status_use ='Y' and project.status_pass ='Y' ".$locals." ORDER BY `report`.`status_process_year`";
    } else {

      if($_SESSION["ss_group"] <= '2')
        {
         $locals =" and project.local_goverment_id = '".$_SESSION["ss_local_office_id"]."' ";
        }
        $sql="SELECT `project`.`project_id`,`project`.`type`,`project`.`name`,`project`.`budget`,`project`.`status_pass`,`report`.`budget_true`,`report`.`paid`,`project`.`type`,`report`.`status_process`,`report`.`round_report`,`report`.`status_process_year`,`report`.`dimention` FROM `project`RIGHT JOIN `report` ON `project`.`project_id` = `report`.`project_id`  WHERE `report`.`status_process_year` = '$q' and project.status_use ='Y' and project.status_pass ='Y' ".$locals." ORDER BY `report`.`status_process_year`";
    }

//else if ($q == "2562") {
//        $sql="SELECT `project`.`project_id`,`project`.`type`,`project`.`name`,`project`.`budget`,`project`.`status_pass`,`report`.`budget_true`,`report`.`paid`,`project`.`type`,`report`.`status_process`,`report`.`round_report`,`report`.`status_process_year`,`report`.`dimention` FROM `project`RIGHT JOIN `report` ON `project`.`project_id` = `report`.`project_id` WHERE `report`.`status_process_year` = '2562' ORDER BY `report`.`status_process_year`";
//    } else if ($q == "2563") {
//        $sql="SELECT `project`.`project_id`,`project`.`type`,`project`.`name`,`project`.`budget`,`project`.`status_pass`,`report`.`budget_true`,`report`.`paid`,`project`.`type`,`report`.`status_process`,`report`.`round_report`,`report`.`status_process_year`,`report`.`dimention` FROM `project`RIGHT JOIN `report` ON `project`.`project_id` = `report`.`project_id` WHERE `report`.`status_process_year` = '2563' ORDER BY `report`.`status_process_year`";
//    } else if ($q == "2564") {
//        $sql="SELECT `project`.`project_id`,`project`.`type`,`project`.`name`,`project`.`budget`,`project`.`status_pass`,`report`.`budget_true`,`report`.`paid`,`project`.`type`,`report`.`status_process`,`report`.`round_report`,`report`.`status_process_year`,`report`.`dimention` FROM `project`RIGHT JOIN `report` ON `project`.`project_id` = `report`.`project_id` WHERE `report`.`status_process_year` = '2564' ORDER BY `report`.`status_process_year`";
//    }

//echo "-->".$sql;

    //$sql = "SELECT `project`.`project_id`,`project`.`type`,`project`.`name`,`project`.`budget`,`report`.`budget_true`,`report`.`paid`,`project`.`type`,`report`.`status_process`,`report`.`round_report`,`report`.`status_process_year`,`report`.`dimention` FROM `project`RIGHT JOIN `report` ON `project`.`project_id` = `report`.`project_id` ORDER BY `report`.`status_process_year`";
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if ($q == 0){
        //$num=$num-16; //มีรีพอร์ทหลอก 4 record เพื่อให้ครบมิติ
    } else {
        //$num=$num-4;
    }

    if (mysqli_num_rows($result) > 0){
        //echo "<h1>" . $namesystem . "</h1>";
        echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>

<table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
<thead>
    <tr>
        <th rowspan='2'>ลำดับที่</th>
        <th rowspan='2'>ประเภทงาน</th>
        <th rowspan='2'>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติ</th>
        <th colspan='3'>จำนวนงบประมาณ</th>
        <th rowspan='2'>สถานะโครงการ</th>
        <th rowspan='2'>รอบการรายงาน</th>
        <th rowspan='2'>ดำเนินการในปีงบประมาณ</th>
        <th rowspan='2'>สอดคล้อง</th>
    </tr>
    <tr>
        <th>แผนพัฒนาท้องถิ่น</th>
        <th>ตามข้อบัญญัติ/เทศบัญญัติ</th>
        <th>ตามที่เบิกจ่ายจริง</th>
    </tr>
</thead>
    ";
    $i=1;
    while ($row=mysqli_fetch_assoc($result)) {
        if ($row['type'] == ""){

        } else {
            echo "<tr>
            <td>" . $i++ . "</td>
            <td>";
                if ($row["type"] == 1) {
                    echo "โครงการ";
                } if ($row["type"] == 2){
                    echo "กิจกรรม";
                } if ($row["type"] == 3) {
                    echo "มาตรการ";
                } if ($row["type"] == 4) {
                    echo "แนวปฏิบัติ";
                } echo "</td>";
            if ($row['status_pass'] == 'N'){
                echo "<td><a href='projectreview.php?id=" . $row['project_id'] . "&sp=" . $row['status_pass'] . "'><img src='..\images/icon/reject.jpg'>" . $row['name'] . "</a></td>";
            } else {
                echo "<td><a href='projectreview.php?id=" . $row['project_id'] . "&sp=" . $row['status_pass'] . "'>" . $row['name'] . "</a></td>";
            }
            echo "<td>" . number_format($row["budget"]) . "</td>
            <td>" . number_format($row["budget_true"]) . "</td>
            <td>" . number_format($row["paid"]) . "</td>
            <td>";
                if ($row["status_process"] == 2){
                    echo "อยู่ระหว่างดำเนินการ";
                } if ($row["status_process"] == 3) {
                    echo "ดำเนินการแล้วเสร็จ";
                } if ($row["status_process"] == 4) {
                    echo "ไม่สามารถดำเนินการได้";
                } echo "</td>
            <td>";
                if ($row["round_report"] == 1){
                    echo "6 เดือน";
                } else {
                    echo "12 เดือน";
                } echo "</td>
            <td>" . $row["status_process_year"] . "</td>
            <td>";
                if ($row['dimention'] == 1) {
                    echo "มิติที่ 1";
                } if ($row['dimention'] == 2){
                    echo "มิติที่ 2";
                } if ($row['dimention'] == 3) {
                    echo "มิติที่ 3";
                } if ($row['dimention'] == 4) {
                    echo "มิติที่ 4";
                } echo "</td>
          </tr>";
        }
    }
        } else {
            echo "<br>0 result";
        }
    mysqli_close($conn);

echo "</table>";
?>
