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

$name = mysqli_real_escape_string($con, $_POST['user_name']);
$age = mysqli_real_escape_string($con, $_POST['user_age']);
$city = mysqli_real_escape_string($con, $_POST['user_city']);
$cuisine = mysqli_real_escape_string($con, $_POST['user_cuisine']);
$skill = mysqli_real_escape_string($con, $_POST['user_skill']);

//print $entered;
//echo $user;
//echo $pass;

$sql= "INSERT INTO Profile(name, age, city, cuisine, skill) VALUES('$name', '$age', '$city', '$cuisine', '$skill')";

$result = mysqli_query($con, $sql);
//echo $result;

if($result)
{
	header("location:profile.html");
}
else
{
	echo "Try Again";
}

//$result = mysqli_query($con, $sql);

//Print out the data returned from the database

mysqli_close($con);
?>