<?php
	session_start();
//include "include/checklogin.php";
$a = $_GET['a'];
$q = $_GET['q'];


	if($_SESSION["ss_group"] <= '2')
		{
     $locals =" and local_goverment_id ='".$_SESSION["ss_local_office_id"]."' ";
   	}
	if($_SESSION["ss_group"] == '3')
		{
			if(empty($a))
				{
					$locals =" and local_goverment_id in (SELECT local_office_id FROM local_office where PROVINCE_ID = '".$_SESSION["ss_local_office_id"]."') ";
				}
			else
				{
					$locals =" and local_goverment_id in (SELECT local_office_id FROM local_office where PROVINCE_ID = '".$_SESSION["ss_local_office_id"]."' and AMPHUR_ID ='$a'	)";
				}
		}

    if ($q == "0"){
        $sql="SELECT * FROM project WHERE status_use = 'Y'".$locals."order by project_id desc";
    } else if ($q == "2561") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year1='2561'".$locals."order by project_id desc";
    } else if ($q == "2562") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year2='2562'".$locals."order by project_id desc";
    } else if ($q == "2563") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year3='2563'".$locals."order by project_id desc";
    } else if ($q == "2564") {
        $sql="SELECT * FROM project WHERE status_use = 'Y' AND year4='2564'".$locals."order by project_id desc";
    }
		
    include '../include/ConnectionDb.php';
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0){
        //echo "<h1>" . $namesystem . "</h1>";
        echo "<h2>จำนวนข้อมูลทั้งหมด $num รายการ ดังนี้ </h2>";
    if ($q == "0"){
        echo "<table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
<thead>
        <tr>
            <th class='center'>ลำดับที่</th>
            <th class='center'>ประเภทงาน</th>
            <th class='center'>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติ</th>
            <th class='center'>งบประมาณตามแผนพัฒนาท้องถิ่น</th>
            <th class='center'>สอดคล้อง</th>
            <th colspan='4' class='center'>ดำเนินการ ปีงบประมาณ พ.ศ.</th>
            <th class='center'>ประสงค์ดำเนินการ</th>
        </tr>
</thead>        ";
    } else {
        echo "<table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
        <tr>
        <thead>
            <th rowspan='2' class='center'>ลำดับที่</th>
            <th rowspan='2' class='center'>ประเภทงาน</th>
            <th rowspan='2' class='center'>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติ</th>
            <th rowspan='2' class='center'>งบประมาณตามแผนพัฒนาท้องถิ่น</th>
            <th rowspan='2' class='center'>สอดคล้อง</th>
            <th colspan='2' class='center'>รอบการรายงาน</th>
        </thead>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
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
            echo "<td><a href='projectreview.php?id=$row[project_id]&sp=$row[status_pass]'><img src='images/icon/reject.jpg'>" .  $row['name'] . "</a></td>";
        } else {
            echo "<td><a href='projectreview.php?id=$row[project_id]&sp=$row[status_pass]'>" .  $row['name'] . "</a></td>";
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
    echo "<td  class='center'>";
    if ($q != "0") {
        if ($row['status_pass'] == 'N'){
            echo "</td><td class='center'>";
        } else {
            echo "<a href='projectreport.php?id=$row[project_id]&r=1&y=$q&o=$row[local_goverment_id]'> <img src='images/icon/report.png'></a></td>
            <td class='center'><a href='projectreport.php?id=$row[project_id]&r=2&y=$q&o=$row[local_goverment_id]'> <img src='images/icon/report.png'></a>";
        }

    } else {
        echo "<a href='projectedit.php?id=$row[project_id]'><img src='images/icon/edit.png'></a>";
    if($_SESSION["ss_user_role_level"] != '2' )
          {
        echo  "<a href='projectdelete.php?id=$row[project_id]' onclick=\"" . "return confirm('คุณต้องการลบโครงการ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/delete.png'></a>";
          }

      if($_SESSION["ss_user_role_level"] > '0'  )
        	{
                if ($row['status_pass'] == 'Y') {
                    echo "<a href='projectnotpass.php?id=$row[project_id]' onclick=\"" . "return confirm('โครงการนี้ไม่สอดคล้องกับมิติ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/reject.jpg'></a>";
                } else {
                    echo "<a href='projectpass.php?id=$row[project_id]' onclick=\"" . "return confirm('โครงการนี้สอดคล้องกับมิติ ใช่ หรือ ไม่ ?')" . "\"><img src='images/icon/approve.jpg'></a>";
                }
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
