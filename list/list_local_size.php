<label for="local_size">

           <select name="local_size" id="local_size" >
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php



		$sql_local_size = "select * from local_size order by local_size_id asc ";
		$result_local_size = mysqli_query($conn,$sql_local_size);
		while($local_size = mysqli_fetch_array($result_local_size))
	{
?>
              <option value="<?php echo $local_size[local_size_id]; ?>"><?php echo $local_size[local_size_name]; ?></option>
<?php
	}
?>
            </select>
</label>
