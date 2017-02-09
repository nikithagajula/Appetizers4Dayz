<div class="output">
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
mysqli_select_db($con, $dbname);*/
//session_start();

require 'connect.php';
$entered = mysqli_real_escape_string($con, $_POST['search_name']);
echo $_SESSION['username'];
//print $entered;

$sql= "SELECT * FROM Appetizer WHERE name = '$entered'";

$result = mysqli_query($con, $sql);
//$row = mysqli_fetch_array($result, MYSQLI_NUM);
//printf ("%s (%s)\n",$row[0],$row[1]);

//Print out the data returned from the database
if(mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	
		echo "<h1>Name: ",htmlspecialchars($row["name"]),"</h1>\n";
		echo "<h2> ⇒ Recipe: ",htmlspecialchars($row["recipe"]),"</h1>\n";
		//echo "Name: " . $row["name"] . ", Recipe: " . $row["recipe"] . "<br>";
		//printf ("Name: %s Recipe: %s\n",$row["name"],$row["recipe"]);

	}
		
}
else{
	echo "<h1>No appetizers found<h1>";
}

//mysqli_close($con);
?>
</div>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="brand">Appetizers4Dayz</div>
    <div class="address-bar">508 Healey| Champaign, IL 61820 | 123.456.7890</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="home.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="modify.html">Create</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>

