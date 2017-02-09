<?php  
/*
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
*/
session_start();
require 'connect.php';
$user = mysqli_real_escape_string($con, $_POST['username']);
$pass = mysqli_real_escape_string($con, $_POST['password']);
//print $entered;
//echo $user;
//echo $pass;

$sql= "SELECT * FROM User WHERE username = '$user' AND password = '$pass'";

$result = mysqli_query($con, $sql);
//echo $result;

$count = mysqli_num_rows($result);
if($count == 1)
{
	$_SESSION['username'] = $user;
	header("location:home.html");
}
else
{
	echo "Try Again";
}

//$result = mysqli_query($con, $sql);

//Print out the data returned from the database

mysqli_close($con);
?>