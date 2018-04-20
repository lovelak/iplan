<label for="local_office">

           <select name="local_office" id="local_office" required onchange="changeOffice(this.value)">
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php

include '../include/ConnectionDb.php';
$amphures = $_POST[amphures];

if($amphures != "")
  {
		$sql_local_office = "select * from local_office where AMPHUR_ID = '$amphures' order by  CONVERT(local_office_name USING tis620) asc ";
  }
else
  {
    $sql_local_office = "select * from local_office WHERE PROVINCE_ID = '$row_local[PROVINCE_ID]' ";
  }
echo "-->".$sql_local_office;
		$result_local_office = mysqli_query($conn,$sql_local_office);
		while($local_office = mysqli_fetch_array($result_local_office))
	{
    if($row_local[local_office_id] == $local_office[local_office_id])
      {
?>
              <option value="<?php echo $local_office[local_office_id]; ?>" selected><?php echo $local_office[local_office_name]; ?></option>
<?php
	     }
    else
      {
?>
              <option value="<?php echo $local_office[local_office_id]; ?>"><?php echo $local_office[local_office_name]; ?></option>
<?php
	     }
  }

?>
            </select>
</label>
