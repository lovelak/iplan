<label for="districts">

           ตำบล : <select name="districts" id="districts" > 
           <option value="">-------------- กรุณาเลือก --------------</option>
<?php
include"connect.php";

$amphures = $_POST[amphures];


		$sql_districts = "select * from districts where AMPHUR_ID = '$amphures'  order by DISTRICT_NAME asc ";
		$result_districts = mysql_query($sql_districts);
		while($districts = mysql_fetch_array($result_districts))
	{
?>            
              <option value="<?php echo $districts[DISTRICT_ID]; ?>"><?php echo $districts[DISTRICT_NAME]; ?></option>
<?php
	}
?>
            </select>
</label>