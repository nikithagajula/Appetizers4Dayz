<?php
    session_start();
    if(isset($_POST['loginbtn'])){
        require 'connect.php';
        $user = $_POST['username'];
        $pass = $_POST['pwd'];
        $sql= "SELECT * FROM User WHERE username = '$user' AND password = '$pass'";

        $result = mysqli_query($con, $sql);

        $count = mysqli_num_rows($result);
        if($count == 1)
        {
        	$_SESSION['user'] = $user;
        	header("location:home.php");
        }
        else
        {
        	echo "Try Again";
        }
        
    }
    if(isset($_GET['logout'])){
            session_unregister('username');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appetizers4Days</title>

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
    

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                        <h2 class="intro-text text-center">Login to
                            <strong>Appetizers4Dayz</strong>
                        </h2>
                    <hr>
            <section class="loginform cf">
			<form name="login" method="POST" accept-charset="utf-8">
                
      				<label for="username">Username</label>
       		 		<input type="text" name="username" required>
                    <br> </br>
 	       			<label for="password">Password</label>
        			<input type="password" name="pwd" required>
       	 			<input type="submit" name="loginbtn" value="Login">

			</form>
                
<button id="myButton" align="center" class="float-left submit-button" >Register</button>

				<script type="text/javascript">
				    document.getElementById("myButton").onclick = function () {
				        location.href = "http://appetizers4day.web.engr.illinois.edu/createlogin.php";
				    };
				</script>
		</section>
                
                <div class="clearfix"></div>
            </div>
        </div>


    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Appetizers4Dayz 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
