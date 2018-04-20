<?php

	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "e_plannacc";


/*	$username = "root";
	$password = "myprogram";
	$dbname = "webpolitician";*/


	$objConnect = mysql_connect($host,$username,$password) or die ("Cannot connect mysql");

	$objDB = mysql_select_db($dbname,$objConnect) or die ("Cannot select $dbname");

	mysql_query("set NAMES utf8");

?>
