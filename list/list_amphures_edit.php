<label for="amphures">

           <select name="amphures" id="amphures" onchange="selectlocaloffice();selectlocaloffice();" required>
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php

$provinces = $_POST[provinces];
include '../include/ConnectionDb.php';
if($provinces != "")
  {
    $sql_amphures = "select * from amphures where PROVINCE_ID = '$provinces' order by  CONVERT(AMPHUR_NAME USING tis620) asc ";
  }
else
  {
    $sql_amphures = "select * from amphures where PROVINCE_ID = '$row_local[PROVINCE_ID]' order by  CONVERT(AMPHUR_NAME USING tis620) asc ";
  }

if($_SESSION["ss_group"] =='3')
  {
      $sql_amphures = "select * from amphures where PROVINCE_ID = '$row_local[PROVINCE_ID]' order by  CONVERT(AMPHUR_NAME USING tis620) asc ";
  }

		$result_amphures = mysqli_query($conn,$sql_amphures);
		while($amphures = mysqli_fetch_array($result_amphures))
	{
    if($row_local[AMPHUR_ID] == $amphures[AMPHUR_ID])
      {

?>
              <option value="<?php echo $amphures[AMPHUR_ID]; ?>" selected><?php echo $amphures[AMPHUR_NAME]; ?> </option>
<?php
      }
    else
      {
?>
              <option value="<?php echo $amphures[AMPHUR_ID]; ?>"><?php echo $amphures[AMPHUR_NAME]; ?></option>
<?php
	}
}
?>
            </select>
</label>
