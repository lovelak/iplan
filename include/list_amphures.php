<label for="amphures">

           อำเภอ : <select name="amphures" id="amphures" onchange="selectprovince2();"> 
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php
include"connect.php";

$provinces = $_POST[provinces];


		$sql_amphures = "select * from amphures where PROVINCE_ID = '$provinces' order by AMPHUR_NAME asc ";
		$result_amphures = mysql_query($sql_amphures);
		while($amphures = mysql_fetch_array($result_amphures))
	{
?>            
              <option value="<?php echo $amphures[AMPHUR_ID]; ?>"><?php echo $amphures[AMPHUR_NAME]; ?></option>
<?php
	}
?>
            </select>
</label>