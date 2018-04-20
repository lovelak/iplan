
<label for="amphures">

           <select name="amphures" id="amphures" onchange="selectlocaloffice();selectlocaloffice();changeYear();" required>
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php


$provinces = $_POST[provinces];

if($provinces != "")
  {


    include '../include/ConnectionDb.php';

		$sql_amphures = "select * from amphures where PROVINCE_ID = '$provinces' order by  CONVERT(AMPHUR_NAME USING tis620) asc ";
		$result_amphures = mysqli_query($conn,$sql_amphures);
		while($amphures = mysqli_fetch_array($result_amphures))
	{
?>
              <option value="<?php echo $amphures[AMPHUR_ID]; ?>"><?php echo $amphures[AMPHUR_NAME]; ?></option>
<?php
	}
}
?>
            </select>
</label>
