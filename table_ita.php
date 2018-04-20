<?php
	session_start();

include 'include/ConnectionDb.php';

include "include/checklogin.php";
  $provinces_code = $_POST[provinces];
  $amphures_code = $_POST[amphures];
  $sltYear = $_POST[sltYear];

    $sql_ita = "SELECT * FROM local_office WHERE PROVINCE_ID = '$provinces_code' and AMPHUR_ID = '$amphures_code' GROUP BY local_office_id";
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

            <th class='center' width='10%'>คะแนน ITA</th>
        </tr>
      </thead>
        <tr>";

    $i='1';
    while ($row=mysqli_fetch_assoc($result_ita)) {
        // ตัด row ที่เป็น dummy ออก
        //$dimen = $row['COUNT(`dimention`)'] - 1;

        $sql_ita2 = "SELECT * FROM scoreita WHERE local_office_code = '$row[local_office_code]' and scoreita_year = '$sltYear' order by scoreita_id desc ";
        mysqli_set_charset($conn,"utf8");
        $result_ita2=mysqli_query($conn, $sql_ita2);
        $row_ita2=mysqli_fetch_assoc($result_ita2);

        echo "<td class='center'><input type='hidden' name='local_office_code[]' value='".$row['local_office_code']."'>". $i;
        echo "</td><td>" .$row['local_office_name'];
        //echo "</td><td><label><input type='text' id='txtscore[]' name='txtscore[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57'    oninput='setCustomValidity('')'   value='".$row_ita2[scoreita_p]."'> </label>";
        echo "</td><td class='center'><label><input type='text' id='txtscore2[]' name='txtscore2[]' cols='30'    oninput='setCustomValidity('')'   value='".$row_ita2[scoreita_m]."' maxlength='5' size='5'> </label>
        </td>
    </tr>";
    $i++;
  }
    echo "</table><br>";
}
?>
