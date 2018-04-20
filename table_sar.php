<?php
	session_start();

include 'include/ConnectionDb.php';

include "include/checklogin.php";
  $provinces_code = $_POST[provinces];
  $amphures_code = $_POST[amphures];
  $sltYear = $_POST[sltYear];

  $checktype = $_POST[checktype];
	$local_office = $_POST[local_office];

if($checktype =='enable' && !empty($local_office))
	{
		$sql_ita = "SELECT * FROM local_office WHERE PROVINCE_ID = '".$_SESSION["ss_PROVINCE_ID"]."' and local_office_id = '$local_office' GROUP BY local_office_id";

	}
elseif ($checktype =='enable1' && !empty($amphures_code))
	{
		$sql_ita = "SELECT * FROM local_office WHERE PROVINCE_ID = '".$_SESSION["ss_local_office_id"]."' and AMPHUR_ID = '$amphures_code' GROUP BY local_office_id";
	}
else
	{
		$sql_ita = "SELECT * FROM local_office WHERE PROVINCE_ID = '$provinces_code' and AMPHUR_ID = '$amphures_code' GROUP BY local_office_id";
	}

//echo $sql_ita ;
    mysqli_set_charset($conn,"utf8");
    $result_ita=mysqli_query($conn, $sql_ita);
    $num=mysqli_num_rows($result_ita);
    if (mysqli_num_rows($result_ita) > 0){
        ///echo "<h2>จำนวนข้อมูลทั้งหมด  $num รายการ ดังนี้ </h2>
        echo "<br>
    <table id = 'system' width='100%' cellspacing='1' cellpadding='1' border='1' class='table  table-bordered table-hover'>
      <thead>
        <tr>
            <th class='center' width='8%' rowspan='2'>ลำดับ</th>
            <th class='center' rowspan='2'>อปท.</th>
						<th class='center' rowspan='2'  width='15%'>หน่วยงาน</th>
            <th class='center' colspan='4'>คะแนน SAR</th>
						<th class='center' rowspan='2'>รวม</th>
        </tr>

        <tr>

            <th class='center'>มิติที่ 1</th>
            <th class='center'>มิติที่ 2</th>
            <th class='center'>มิติที่ 3</th>
            <th class='center'>มิติที่ 4</th>

        </tr>
      </thead>
        <tr>";

    $i='1';
    while ($row=mysqli_fetch_assoc($result_ita)) {
        // ตัด row ที่เป็น dummy ออก
        //$dimen = $row['COUNT(`dimention`)'] - 1;

        $sql_sar = "SELECT * FROM scoresar WHERE local_office_code = '$row[local_office_code]' and scoresar_year = '$sltYear' order by scoresar_id desc ";
        mysqli_set_charset($conn,"utf8");
        $result_sar=mysqli_query($conn, $sql_sar);
        $row_sar=mysqli_fetch_assoc($result_sar);


		if($_SESSION["ss_user_role_level"] == '3')
			{
				$r =6;
			}
		else if($_SESSION["ss_user_role_level"] == '2' || $_SESSION["ss_user_role_level"] == '1')
			{
				$r =5;
			}
		else
			{
				$r =2;
			}
				echo "<td class='center' rowspan='".$r."'><input type='hidden' name='local_office_code[]' value='".$row['local_office_code']."'>". $i;

				echo "</td><td rowspan='".$r."'>" .$row['local_office_name']."</td>";

?>
				<td class='center'>คะแนน SAR</td>
				<td class='center'><label><input type='text' id='txtsarm11<?php echo $i ?>' name='txtsarm11[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','suml')"     oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_l1]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm12<?php echo $i ?>' name='txtsarm12[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','suml')"     oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_l2]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm13<?php echo $i ?>' name='txtsarm13[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','suml')"     oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_l3]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm14<?php echo $i ?>' name='txtsarm14[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','suml')"     oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_l4]; ?>'> </label></td>
				<td class='center'><label><input type='text' id='sumall1<?php echo $i ?>' name='sumall1[]' cols='30'  oninput='setCustomValidity('')'   maxlength='3' size='3' value='<?php echo $row_sar[suml]; ?>' readonly> </label></td>
				</tr>
<?php

		//if($_SESSION["ss_user_role_level"] == '3' || $_SESSION["ss_user_role_level"] == '2' )
		if($_SESSION["ss_user_role_level"] > '0' )
			{
?>
				<tr>
				<td class='center'>ผลประเมิน</td>
				<td class='center'><label><input type='text' id='txtsarm21<?php echo $i ?>' name='txtsarm21[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','sum2')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p1]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm22<?php echo $i ?>' name='txtsarm22[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum2')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p2]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm23<?php echo $i ?>' name='txtsarm23[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum2')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p3]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm24<?php echo $i ?>' name='txtsarm24[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum2')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p4]; ?>'> </label></td>
				<td class='center'><label><input type='text' id='sumall2<?php echo $i ?>' name='sumall2[]' cols='30'  oninput='setCustomValidity('')'   maxlength='3' size='3' value='<?php echo $row_sar[sump]; ?>' readonly> </label></td>
				</tr>

				<tr>
				<td class='center'>งบประมาณ (บาท)</td>
				<td class='center'><label><input type='text' id='txtsarm221<?php echo $i ?>' name='txtsarm221[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','sum22')"      oninput='setCustomValidity('')'   maxlength='15' size='15' value='<?php echo $row_sar[sar_score_p_money1]; ?>' class='text-right'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm222<?php echo $i ?>' name='txtsarm222[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum22')"      oninput='setCustomValidity('')'   maxlength='15' size='15' value='<?php echo $row_sar[sar_score_p_money2]; ?>' class='text-right'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm223<?php echo $i ?>' name='txtsarm223[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum22')"      oninput='setCustomValidity('')'   maxlength='15' size='15' value='<?php echo $row_sar[sar_score_p_money3]; ?>' class='text-right'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm224<?php echo $i ?>' name='txtsarm224[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum22')"      oninput='setCustomValidity('')'   maxlength='15' size='15' value='<?php echo $row_sar[sar_score_p_money4]; ?>' class='text-right'> </label></td>
				<td class='center'><label><input type='text' id='sumall22<?php echo $i ?>' name='sumall22[]' cols='30'  oninput='setCustomValidity('')' maxlength='15' size='15' value='<?php echo $row_sar[sump_money]; ?>' readonly> </label></td>
				</tr>

				<tr>
				<td class='center'>จำนวนรวมโครงการ/กิจกรรม/มาตรการ</td>
				<td class='center'><label><input type='text' id='txtsarm231<?php echo $i ?>' name='txtsarm231[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','sum23')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p_project1]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm232<?php echo $i ?>' name='txtsarm232[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum23')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p_project2]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm233<?php echo $i ?>' name='txtsarm233[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum23')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p_project3]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm234<?php echo $i ?>' name='txtsarm234[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum23')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_p_project4]; ?>'> </label></td>
				<td class='center'><label><input type='text' id='sumall23<?php echo $i ?>' name='sumall23[]' cols='30'  oninput='setCustomValidity('')'   maxlength='3' size='3' value='<?php echo $row_sar[sump_project]; ?>' readonly> </label></td>
				</tr>

<?php
			}
		if($_SESSION["ss_user_role_level"] == '3' )
			{
?>
				<tr>
				<td class='center'>สปม.</td>
				<td class='center'><label><input type='text' id='txtsarm31<?php echo $i ?>' name='txtsarm31[]' cols='30' onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="autosum('<?php echo $i ?>','sum3')"     oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_m1]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm32<?php echo $i ?>' name='txtsarm32[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum3')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_m2]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm33<?php echo $i ?>' name='txtsarm33[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum3')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_m3]; ?>'> </label></td>
        <td class='center'><label><input type='text' id='txtsarm34<?php echo $i ?>' name='txtsarm34[]' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="autosum('<?php echo $i ?>','sum3')"      oninput='setCustomValidity('')'   maxlength='2' size='2' value='<?php echo $row_sar[sar_score_m4]; ?>'> </label></td>
				<td class='center'><label><input type='text' id='sumall3<?php echo $i ?>' name='sumall3[]' cols='30'  oninput='setCustomValidity('')'   maxlength='3' size='3' value='<?php echo $row_sar[summ]; ?>' readonly> </label></td>
				</tr>

<?php
				}

				echo "<tr>";
    echo "</tr>";
    $i++;
  }
    echo "</table><br>";
}
?>

<script>
		function autosum(v,type)
			{
				if (type =='suml')
				{
					var txtsarm11 = parseInt(document.getElementById("txtsarm11"+v).value);
					var txtsarm12 = parseInt(document.getElementById("txtsarm12"+v).value);
					var txtsarm13 = parseInt(document.getElementById("txtsarm13"+v).value);
					var txtsarm14 = parseInt(document.getElementById("txtsarm14"+v).value);

					txtsarm11 = checkzero(txtsarm11);
					txtsarm12 = checkzero(txtsarm12);
					txtsarm13 = checkzero(txtsarm13);
					txtsarm14 = checkzero(txtsarm14);

					var sum1 = txtsarm11+txtsarm12+txtsarm13+txtsarm14;
					document.getElementById("sumall1"+v).value = sum1;
				}

				if (type =='sum2')
				{
					var txtsarm21 = parseInt(document.getElementById("txtsarm21"+v).value);
					var txtsarm22 = parseInt(document.getElementById("txtsarm22"+v).value);
					var txtsarm23 = parseInt(document.getElementById("txtsarm23"+v).value);
					var txtsarm24 = parseInt(document.getElementById("txtsarm24"+v).value);

					txtsarm21 = checkzero(txtsarm21);
					txtsarm22 = checkzero(txtsarm22);
					txtsarm23 = checkzero(txtsarm23);
					txtsarm24 = checkzero(txtsarm24);
					//alert(txtsarm21+'-'+txtsarm22+'-'+txtsarm23+'-'+txtsarm24)
					var sum2 = txtsarm21+txtsarm22+txtsarm23+txtsarm24;
					document.getElementById("sumall2"+v).value = sum2;
				}

				if (type =='sum22')
				{
					var txtsarm221 = parseInt(document.getElementById("txtsarm221"+v).value);
					var txtsarm222 = parseInt(document.getElementById("txtsarm222"+v).value);
					var txtsarm223 = parseInt(document.getElementById("txtsarm223"+v).value);
					var txtsarm224 = parseInt(document.getElementById("txtsarm224"+v).value);

					txtsarm221 = checkzero(txtsarm221);
					txtsarm222 = checkzero(txtsarm222);
					txtsarm223 = checkzero(txtsarm223);
					txtsarm224 = checkzero(txtsarm224);
					//alert(txtsarm21+'-'+txtsarm22+'-'+txtsarm23+'-'+txtsarm24)
					var sum22 = txtsarm221+txtsarm222+txtsarm223+txtsarm224;
					document.getElementById("sumall22"+v).value = sum22;
				}
				if (type =='sum23')
				{
					var txtsarm231 = parseInt(document.getElementById("txtsarm231"+v).value);
					var txtsarm232 = parseInt(document.getElementById("txtsarm232"+v).value);
					var txtsarm233 = parseInt(document.getElementById("txtsarm233"+v).value);
					var txtsarm234 = parseInt(document.getElementById("txtsarm234"+v).value);

					txtsarm231 = checkzero(txtsarm231);
					txtsarm232 = checkzero(txtsarm232);
					txtsarm233 = checkzero(txtsarm233);
					txtsarm234 = checkzero(txtsarm234);
					//alert(txtsarm21+'-'+txtsarm22+'-'+txtsarm23+'-'+txtsarm24)
					var sum23 = txtsarm231+txtsarm232+txtsarm233+txtsarm234;
					document.getElementById("sumall23"+v).value = sum23;
				}


				if (type =='sum3')
				{
					var txtsarm31 = parseInt(document.getElementById("txtsarm31"+v).value);
					var txtsarm32 = parseInt(document.getElementById("txtsarm32"+v).value);
					var txtsarm33 = parseInt(document.getElementById("txtsarm33"+v).value);
					var txtsarm34 = parseInt(document.getElementById("txtsarm34"+v).value);

					txtsarm31 = checkzero(txtsarm31);
					txtsarm32 = checkzero(txtsarm32);
					txtsarm33 = checkzero(txtsarm33);
					txtsarm34 = checkzero(txtsarm34);

					var sum3 = txtsarm31+txtsarm32+txtsarm33+txtsarm34;
					document.getElementById("sumall3"+v).value = sum3;
				}



				function checkzero(va)
					{//alert(va);
						if(isNaN(va))
								{
									var vadata = 0;
									return vadata;
								}
							else
								{
									var vadata = va;
									return vadata;
								}
					}
			}
</script>
