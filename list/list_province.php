<label for="provinces">

           <select name="provinces" id="provinces" onchange="selectprovince1();changeYear();" required>
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php



		//$sql_provinces = "select * from provinces order by PROVINCE_NAME asc ";
    $sql_provinces = "select * from provinces order by CONVERT(PROVINCE_NAME USING tis620)  asc ";
		$result_provinces = mysqli_query($conn,$sql_provinces);
		while($provinces = mysqli_fetch_array($result_provinces))
	{
?>
              <option value="<?php echo $provinces[PROVINCE_ID]; ?>"><?php echo $provinces[PROVINCE_NAME]; ?></option>
<?php
	}
?>
            </select>
</label>
