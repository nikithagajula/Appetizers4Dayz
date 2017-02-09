<?php
$servername = "engr-cpanel-mysql.engr.illinois.edu";
$username = "appetize_Prath";
$password = "Prathyu44";
$dbname = "appetize_Appetizers";  

//Start connection
$con = mysqli_connect($servername, $username, $password);
if(mysqli_connect_errno()) {
	die("Could not connect: " . mysqli_connect_error());
}

//Connect to the database
mysqli_select_db($con, $dbname);
?>