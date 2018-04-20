<?php
//	session_start();
////include "include/checklogin.php";
//
// 	if($_SESSION["ss_group"] != '4' && $_SESSION["ss_group"] != '6'  &&  $_SESSION["ss_group"] != '7' )
//		{
//      $locals =" and local_goverment_id ='".$_SESSION["ss_local_office_id"]."' ";
//    }
    $p = $_GET['p']; // ตัวแปรจังหวัด *********

    $a = $_GET['a'];
    $y = $_GET['y'];
    $r = $_GET['r'];
    if ($r == 1) {
        $table_amphur = "v_6month_implement_amphur";
        $table_full = "v_6month_implement_full";
    } else {
        $table_amphur = "v_implement_amphur";
        $table_full = "v_implement_full";
    }
//    $y = $_GET['y'];
    if ($y == "0" && $a == "0"){
        $sql="SELECT * FROM $table_amphur WHERE PROVINCE_ID=$p ORDER BY AMPHUR_ID DESC";
    } else if ($y == "0" && $a != "0") {
        $sql="SELECT * FROM $table_full WHERE AMPHUR_ID=$a AND PROVINCE_ID=$p ORDER BY local_office_id DESC";
    } else if ($y != "0" && $a == "0") {
        if ($y == "2561") {
            $sql="SELECT * FROM $table_amphur WHERE PROVINCE_ID=$p ORDER BY implementY1 DESC";
        } else if ($y == "2562") {
            $sql="SELECT * FROM $table_amphur WHERE PROVINCE_ID=$p ORDER BY implementY2 DESC";
        } else if ($y == "2563") {
            $sql="SELECT * FROM $table_amphur WHERE PROVINCE_ID=$p ORDER BY implementY3 DESC";
        } else if ($y == "2564") {
            $sql="SELECT * FROM $table_amphur WHERE PROVINCE_ID=$p ORDER BY implementY4 DESC";
        }
    } else if ($y != "0" && $p != "0") {
        if ($y == "2561") {
            $sql="SELECT * FROM $table_full WHERE AMPHUR_ID=$a AND PROVINCE_ID=$p ORDER BY implementY1 DESC";
        } else if ($y == "2562") {
            $sql="SELECT * FROM $table_full WHERE AMPHUR_ID=$a AND PROVINCE_ID=$p ORDER BY implementY2 DESC";
        } else if ($y == "2563") {
            $sql="SELECT * FROM $table_full WHERE AMPHUR_ID=$a AND PROVINCE_ID=$p ORDER BY implementY3 DESC";
        } else if ($y == "2564") {
            $sql="SELECT * FROM $table_full WHERE AMPHUR_ID=$a AND PROVINCE_ID=$p ORDER BY implementY4 DESC";
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
    if (($y == "0" && $a == "0") || ($y == "0" && $a != "0")) {
        echo "<h2>มี อปท. บันทึกโครงการแล้วจำนวน $num ";
        if ($a == 0) {
            echo "อำเภอ ";
        } else {
            echo "อปท. ";
        }
        echo "ดังนี้ </h2>
        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
<thead>
        <tr>
            <th class='center'>ลำดับที่</th>
            <th class='center'>";
        if ($a == 0 ) {
            echo "อำเภอ";
        } else {
            echo "อปท.";
        }
        echo "</th>
            <th class='center'>จำนวนโครงการทั้งหมด</th>
            <th class='center'>ดำเนินการปี 2561</th>
            <th class='center'>ดำเนินการปี 2562</th>
            <th class='center'>ดำเนินการปี 2563</th>
            <th class='center'>ดำเนินการปี 2564</th>
        </tr>
</thead>        ";
    } else {
        echo "<h2>ผลการนำแผนไปสู่การปฏิบัติของปีงบประมาณ $y ดังนี้ </h2>
        <h4>เกณฑ์คะแนน รอบ 6 เดือน <i class='fa fa-flag green bigger-130'></i> = 50% ขึ้นไป <i class='fa fa-flag orange bigger-130'></i> = 20 - 49%   <i class='fa fa-flag red bigger-130'></i> = ต่ำกว่า 20% </h4>
        <h4>เกณฑ์คะแนน รอบ 12 เดือน <i class='fa fa-flag green bigger-130'></i> = 80% ขึ้นไป <i class='fa fa-flag orange bigger-130'></i> = 50 - 79%   <i class='fa fa-flag red bigger-130'></i> = ต่ำกว่า 50% </h4>
        <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
        <tr>
        <thead>
            <th class='center'>ลำดับที่</th>
            <th class='center'>";
        if ($a == 0 ) {
            echo "อำเภอ";
        } else {
            echo "อปท.";
        }
        echo "</th>
            <th class='center'>จำนวนโครงการ</th>
            <th class='center'>ระหว่างดำเนินการ</th>
            <th class='center'>ดำเนินการแล้วเสร็จ</th>
            <th class='center'>ไม่สามารถดำเนินการได้</th>
            <th class='center'>ผลการนำแผนไปสู่การปฏิบัติ</th>";

            if (!empty($a) && (($y != "0" && $p != "0") || ($y != "0" && $p == "0"))) {

            echo "<th class='center' width='10%'>เยี่ยมชม</th>";
            echo "<th class='center' width='10%'>เอกสารแนบ</th>";

          }

        echo "</thead>
        </tr>";
    }
    $i=0;
    $checkadd = 0;
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>";
        echo $i++;
        echo "</td>";
        if ($y == 2561)
          {
            $sumall = number_format($row["implementY1"],2);
          }
        if ($y == 2562)
          {
            $sumall = number_format($row["implementY2"],2);
          }
        if ($y == 2563)
          {
            $sumall = number_format($row["implementY3"],2);
          }
        if ($y == 2564)
          {
            $sumall = number_format($row["implementY4"],2);
          }
if ($r == 1)
  {
        if($sumall >= 50)
          {
            $colorf = "green";
          }
        else if ($sumall <= 49 && $sumall >= 20)
          {
            $colorf = "orange";
          }
        else
          {
            $colorf = "red";
          }
  }
  else
  {
          if($sumall >= 80)
            {
              $colorf = "green";
            }
          else if ($sumall <= 79 && $sumall >= 50)
            {
              $colorf = "orange";
            }
          else
            {
              $colorf = "red";
            }
    }
        if ($a == 0) {
            echo "<td><i class='fa fa-flag ".$colorf." bigger-130'></i>  " . $row['AMPHUR_NAME'] . "</td>";
        } else {
            echo "<td><i class='fa fa-flag ".$colorf." bigger-130'></i>  " . $row['local_office_name'] . "</td>";
        }

        if (($y == "0" && $a == "0") || ($y == "0" && $a != "0")) {
            echo "<td>" . ($row['quantity']) . "</td>";
            echo "
                <td>" . $row["year1"] . "</td>
                <td>" . $row["year2"] . "</td>
                <td>" . $row["year3"] . "</td>
                <td>" . $row["year4"] . "</td>";
        } else {

          $sql_vs = "SELECT * FROM scorevs WHERE local_office_id = '".$row['local_office_id']."' and scorevs_status ='1' and scorevs_year ='$y' order by scorevs_id desc";
          mysqli_set_charset($conn,"utf8");
          $result_vs=mysqli_query($conn, $sql_vs);
          $row_vs=mysqli_fetch_assoc($result_vs);


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
            } else {
                echo "<td>" . ($row['year2']) . "</td>";
                echo "<td>" . $row["year4case2"] . "</td>";
                echo "<td>" . $row["year4case3"] . "</td>";
                echo "<td>" . $row["year4case4"] . "</td>";
                echo "<td>" . number_format($row["implementY4"],2) . "</td>";
            }

            if (!empty($a) && (($y != "0" && $p != "0") || ($y != "0" && $p == "0")))
              {
            if($row_vs[scorevs_status]==0)
              {
                ?>

                <td class='center' ><div id='<?php echo "svshow".$i; ?>'><label><button type='button' class='btn btn-default' title='เยี่ยม' onClick="if(confirm('คุณต้องการที่จะบันทึกการเยี่ยมใช่หรือไม่')){window.location = 'sitevisitadd.php?local_office_id=<?php echo $row['local_office_id']; ?>&sltYear=<?php echo $y; ?>&typeshow=1';}"><i class='fa fa-car' fa-2x ></i></button></label></div></td>

                <?PHP
              }
            else
              {
                ?>

                <td class='center' ><div id='<?php echo "svshow".$i; ?>'><label><button type='button' class='btn btn-success' title='เยี่ยมแล้ว' onClick="if(confirm('คุณต้องการที่จะบันทึกการเยี่ยมใช่หรือไม่')){window.location = 'sitevisitadd.php?local_office_id=<?php echo $row['local_office_id']; ?>&sltYear=<?php echo $y; ?>&typeshow=0';}"><i class='fa fa-check' fa-2x ></i></button></label></div></td>

                <?PHP
              }

              if(empty($row_vs[scorevs_file]))
                {
                  ?>

                      <td class='center' ><div class="file btn btn-lg btn-default"><i class="fa fa-upload"></i><input type="file" name="fileupload[]" id="fileupload[]" onchange="Check1(this,this.value);"/>
                          <input type="hidden" name="fileuploadid[]" value="<?php echo $row['local_office_id']; ?>">
                          <input type="hidden" name="sltYear[]" value="<?php echo $y; ?>">
                      </div></td>


                  <?PHP
                }
              else
                {
                  ?>

                      <td class='center' ><a href="uploads/<?php echo $row_vs[scorevs_file]; ?>" target="_blank"><button class='btn btn-info' type='button' name='button' value='save'><i class='ace-icon fa fa-save bigger-120'></i></button></a>
                        <button class='btn btn-danger' type='button' name='button' value='Delect' onClick="if(confirm('คุณต้องการที่จะลบเอกสารแนบของ <?php echo $row['local_office_name']; ?> ใช่หรือไม่')){window.location = 'deletefile.php?local_office_id=<?php echo $row['local_office_id']; ?>&sltYear=<?php echo $y; ?>' ;}"><i class='ace-icon fa fa-trash-o bigger-120'></i></button>
                          <input type="hidden" name="fileuploadid[]" value="<?php echo $row['local_office_id']; ?>">
                          <input type="hidden" name="sltYear[]" value="<?php echo $y; ?>">
                      </td>

                  <?PHP
                }
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

    echo "</table>";

    if ($i > 0 && !empty($a) && !empty($y)) {
      echo "<div class='space-10'></div>



            <!-- <input type='submit' name='btnSubmit'> -->

            <button class='btn btn-info' type='submit' name='btnSubmit' value='บันทึกไฟล์'>
              <i class='ace-icon fa fa-floppy-o bigger-120'></i>
              บันทึกไฟล์
            </button>

            <button class='btn' type='reset' name='btnReset'>
              <i class='ace-icon fa fa-undo bigger-120'></i>
              ล้างข้อมูล
            </button></form>";
    }
//    echo $y;
//    echo $p;

mysqli_close($conn);
?>
<style>
div {
  position: relative;
  overflow: hidden;
}
input {
  position: absolute;
  /* font-size: 50px; */
  opacity: 0;
  right: 0;
  top: 0;
}
</style
