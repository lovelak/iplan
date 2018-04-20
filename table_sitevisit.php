<?php
	session_start();

include 'include/ConnectionDb.php';

include "include/checklogin.php";
  $provinces_code = $_POST[provinces];
  $amphures_code = $_POST[amphures];
  $sltYear = $_POST[sltYear];
    //$sql_ita = "SELECT * FROM local_office WHERE PROVINCE_ID = '$provinces_code' and AMPHUR_ID = '$amphures_code' GROUP BY local_office_id";


$sql_ita = "SELECT l.* ,s.scoresar_year as scoresar_year ,(s.sar_score_p1+s.sar_score_p2+s.sar_score_p3+s.sar_score_p4) as total_p , (s.sar_score_m1+s.sar_score_m2+s.sar_score_m3+s.sar_score_m4) as total_m FROM scoresar s, local_office l WHERE l.PROVINCE_ID = '$provinces_code' and l.AMPHUR_ID = '$amphures_code' and s.scoresar_year='$sltYear' and s.local_office_code = l.local_office_code order by total_m desc,total_p desc";
//echo $sql_ita;
    mysqli_set_charset($conn,"utf8");
    $result_ita=mysqli_query($conn, $sql_ita);
    $num=mysqli_num_rows($result_ita);
    if (mysqli_num_rows($result_ita) > 0){
        ///echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>
        echo "<br>
    <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
      <thead>
        <tr>
            <th class='center' width='10%'>ลำดับ</th>
            <th class='center'>อปท.</th>
            <th class='center' width='10%'>คะแนน SAR (สปจ.)</th>
            <th class='center' width='10%'>คะแนน SAR (สปม.)</th>
            <th class='center' width='10%'>เยี่ยมชม</th>
        </tr>
      </thead>
        <tr>";

    $i='1';
    while ($row=mysqli_fetch_assoc($result_ita)) {
        // ตัด row ที่เป็น dummy ออก
        //$dimen = $row['COUNT(`dimention`)'] - 1;

        /*$sql_sar = "SELECT (sar_score_p1+sar_score_p2+sar_score_p3+sar_score_p4) as total_p,(sar_score_m1+sar_score_m2+sar_score_m3+sar_score_m4) as total_m  FROM scoresar WHERE local_office_code = '$row[local_office_code]' ";
echo $sql_sar;
        mysqli_set_charset($conn,"utf8");
        $result_sar=mysqli_query($conn, $sql_sar);
        $row_sar=mysqli_fetch_assoc($result_sar);*/

        echo "<td class='center'><input type='hidden' name='local_office_code[]' value='".$row['local_office_code']."'>". $i;
        echo "</td><td>" .$row['local_office_name'];
        echo "</td><td class='center' >" .$row['total_p']."";
        echo "</td><td class='center' >" .$row['total_m']."";
        //echo "</td><td class='center' ><label><button type='button' class='btn btn-default' title='เยี่ยม' onClick='if(confirm('คุณต้องการที่จะลบคุณ ใช่หรือไม่')){ alert('555'); }'><i class='fa fa-car' fa-2x ></i></button></label></td></tr>";

        $sql_vs = "SELECT * FROM scorevs WHERE local_office_code = '$row[local_office_code]' ";
        mysqli_set_charset($conn,"utf8");
        $result_vs=mysqli_query($conn, $sql_vs);
        $row_vs=mysqli_fetch_assoc($result_vs);
        if($row_vs[scorevs_status]==0)
          {
?>

</td><td class='center' ><div id='<?php echo "svshow".$i; ?>'><label><button type='button' class='btn btn-default' title='เยี่ยม' onClick="if(confirm('คุณต้องการที่จะบันทึกการเยี่ยมใช่หรือไม่')){window.location = 'sitevisitadd.php?local_office_code=<?php echo $row['local_office_code']; ?>&sltYear=<?php echo $row['scoresar_year']; ?>&typeshow=1';}"><i class='fa fa-car' fa-2x ></i></button></label></div></td>
</tr>

  <?PHP
          }
        else
        {
?>

</td><td class='center' ><div id='<?php echo "svshow".$i; ?>'><label><button type='button' class='btn btn-success' title='เยี่ยมแล้ว' onClick="if(confirm('คุณต้องการที่จะบันทึกการเยี่ยมใช่หรือไม่')){window.location = 'sitevisitadd.php?local_office_code=<?php echo $row['local_office_code']; ?>&sltYear=<?php echo $row['scoresar_year']; ?>&typeshow=0';}"><i class='fa fa-check' fa-2x ></i></button></label></div></td>
</tr>


<?PHP
        }
    $i++;
  }
    echo "</table><br>";

    echo "<div class='space-10'></div>



          <!-- <input type='submit' name='btnSubmit'> -->

      		<button class='btn btn-info' type='submit' name='btnSubmit' value='บันทึก'>
      			<i class='ace-icon fa fa-floppy-o bigger-120'></i>
      			บันทึก
      		</button>

      		<button class='btn' type='reset' name='btnReset'>
      			<i class='ace-icon fa fa-undo bigger-120'></i>
      			ล้างข้อมูล
      		</button>";
}
else {
?>

  <div class="row">
  	 <div class="col-sm-12 center">
  		 <label ><h3>ไม่พบข้อมูลการบันทึกคะแนนภายในอำเภอนี้</h3></label>
  	 </div>
  </div>

<?php
}
?>
