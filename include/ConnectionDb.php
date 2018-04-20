<?php
$servername = "localhost";
$user = "root";
$pass = "";

// $user = "eplannaccuser";
// $pass = "itl6fpvfg]p";
$dbname = "eplannacc";

// Create connection
$conn = mysqli_connect($servername, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
mysqli_set_charset($conn,"utf8");
?>
