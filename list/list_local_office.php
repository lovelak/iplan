<label for="local_office">

           <select name="local_office" id="local_office" required onclick="changeYear();" >
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php



  $amphures = $_POST[amphures];
if($amphures != "")
  {


    include '../include/ConnectionDb.php';

		$sql_local_office = "select * from local_office where AMPHUR_ID = '$amphures' order by  CONVERT(local_office_name USING tis620) asc ";
		$result_local_office = mysqli_query($conn,$sql_local_office);
		while($local_office = mysqli_fetch_array($result_local_office))
	{
?>
              <option value="<?php echo $local_office[local_office_id]; ?>"><?php echo $local_office[local_office_name]; ?></option>
<?php
	}
}

?>
            </select>
</label>
