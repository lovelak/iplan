<?php
	session_start();
			include 'include/ConnectionDb.php';

			$years = $_POST[years];

		$sql_y = "select * from criterionscore where criterionscore_year = '$years' order by criterionscore_id desc ";
		$result_y = mysqli_query($conn,$sql_y);
		$y= mysqli_fetch_array($result_y);

		if(!empty($y[criterionscore_score]))
			{
				echo $y[criterionscore_score];
			}
		else
			{
					$text1 = "";
					echo $text1 ;
			}




?>
