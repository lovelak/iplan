<label for="provinces">

           <select name="provinces" id="provinces" onchange="selectprovince1();" required>
           <option value="" >-------------- กรุณาเลือก --------------</option>
<?php

if(!empty($_SESSION["ss_area"]))
  {
    $sql_provinces = "select * from provinces where area = '".$_SESSION["ss_area"]."' order by PROVINCE_NAME asc ";
  }
else
  {
    $sql_provinces = "select * from provinces order by  CONVERT(PROVINCE_NAME USING tis620) asc ";
  }

		$result_provinces = mysqli_query($conn,$sql_provinces);
		while($provinces = mysqli_fetch_array($result_provinces))
	{
    if($row_local[PROVINCE_ID] == $provinces[PROVINCE_ID])
      {
?>
              <option value="<?php echo $provinces[PROVINCE_ID]; ?>" selected><?php echo $provinces[PROVINCE_NAME]; ?></option>
<?php
	     }
    else
      {
?>
              <option value="<?php echo $provinces[PROVINCE_ID]; ?>"><?php echo $provinces[PROVINCE_NAME]; ?></option>
<?php
      }
  }
?>
            </select>
</label>
