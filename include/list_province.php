<label for="provinces">

           จังหวัด : <select name="provinces" id="provinces" onchange="selectprovince1();"> 
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php
include"connect.php";



		$sql_provinces = "select * from provinces order by PROVINCE_NAME asc ";
		$result_provinces = mysql_query($sql_provinces);
		while($provinces = mysql_fetch_array($result_provinces))
	{
?>            
              <option value="<?php echo $provinces[PROVINCE_ID]; ?>"><?php echo $provinces[PROVINCE_NAME]; ?></option>
<?php
	}
?>
            </select>
</label>