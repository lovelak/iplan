<label for="local_type">

           <select name="local_type" id="local_type" >
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php



		$sql_local_type = "select * from local_type order by local_type_id asc ";
		$result_local_type = mysqli_query($conn,$sql_local_type);
		while($local_type = mysqli_fetch_array($result_local_type))
	{
?>
              <option value="<?php echo $local_type[local_type_id]; ?>"><?php echo $local_type[local_type_name]; ?></option>
<?php
	}
?>
            </select>
</label>
