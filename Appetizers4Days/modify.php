<?php
    session_start();

    if(isset($_POST['upload'])){
        require 'connect.php';
        $appname = $_POST['appetizer_name1'];
        $ingredients = $_POST['appetizer_ingredients1'];
        $recipe = $_POST['appetizer_recipe1'];
        $user = $_SESSION['user'];

        $sql = "INSERT INTO Appetizer(name, Ingredients, recipe, username) VALUES ('$appname', '$ingredients', '$recipe', '$user')";
	mysqli_query($con, $sql);
        /*if(mysqli_query($con, $sql)){
            echo "<h1>Records added successfully.<h1>";
        } else{
            echo "<h1>ERROR: Could not able to execute $sql. <h1>" . mysqli_error($con);
        }*/
    }
    if(isset($_POST['delete'])){
        require 'connect.php';
        $appname = $_POST['appetizer_name2'];
        $user = $_SESSION['user'];
        $sql = "DELETE FROM Appetizer WHERE name='$appname' AND username='$user'";
        mysqli_query($con, $sql);
       /* if(mysqli_query($con, $sql)){
            echo "<h1>Records deleted successfully.<h1>";
        } else{
            echo "<h1>ERROR: Could not able to execute $sql.<h1>" . mysqli_error($con);
        }*/
    }
    if(isset($_POST['update'])){
        require 'connect.php';
        $appname = $_POST['appetizer_name3'];
        $recipe = $_POST['appetizer_recipe3'];
        $ingredients = $_POST['appetizer_ingredients3'];
        $user = $_SESSION['user'];

        $sql = "UPDATE Appetizer SET recipe='$recipe', Ingredients='$ingredients' WHERE name='$appname' AND username='$user'" ;
	mysqli_query($con, $sql);
        /*if(mysqli_query($con, $sql)){
            echo "<h1>Records updated successfully.<h1>";
        } else{
            echo "<h1>ERROR: Could not able to execute $sql. <h1>" . mysqli_error($con);
        }*/
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
    <a align=right href="login.php?action=logout">Logout</a>
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
                <a class="navbar-brand" href="home.php">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="modify.php">Create</a>
                    </li>
                    <li>
                        <a href="profile.php">Profile</a>
                    </li>
                    <li>
                        <a href="mood.php">Mood</a>
                    </li>
                    <li>
                        <a href="myapps.php">My Recipes</a>
                    </li>
                    <li>
                        <a href="browse.php">Browse</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
         
<!-- Input a recipe Functionality-->

<form method="POST">

    <nav class="navbar navbar-default">
        <h4 class="text-center">
        <strong>Input a Recipe:</strong>
        </h4> 
    </nav>
    
    <h2 class="intro-text text-center">
        <strong>Appetizer Name:</strong>           
    </h2>  
	 <br> </br>
    <div class="inputbox">
	<div class="container-1">
		<input type="text" name = "appetizer_name1" id="search" placeholder="Name..." />
	</div>		
	</div>
		<h2 class="intro-text text-center">
                        <strong>Ingredients:</strong>
                </h2>  
				<br> </br>

		<div class="largeinputbox">
			<div class="container-2">
				<input type="text" name = "appetizer_ingredients1" id="search" placeholder="Ingredients..." />
			</div>

            </div>
            <br> </br>
             <br> </br>
              <br> </br>
               <br> </br>
		<h2 class="intro-text text-center">
                        <strong>Recipe:</strong>
                </h2>  
				<br> </br>

		<div class="largeinputbox">
			<div class="container-2">
				<input type="text" name = "appetizer_recipe1" id="search" placeholder="Recipe..." />
			</div>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            
            <input type="submit" value="Upload!" name="upload" />

		</div>

</form>

<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>

<!-- Delete a recipe Functionality-->
<nav class="navbar navbar-default">
    <h4 class="text-center">
           <strong>Delete Recipe:</strong>
    </h4>
</nav>

<form method="post">
	<!--<p>Enter Recipe to Delete: <input type="text" name="appetizer_name" ></p>-->
	<h2 class="intro-text text-center">
                        <strong>Appetizer Name:</strong>
                </h2>  
        <br> </br>
	<div class="inputbox">
		<div class="container-1">
			<input type="text" name = "appetizer_name2" id="search" placeholder="Delete Recipe..." />
            
		</div>
        <br> </br>
        <br> </br>
        <input type="submit" value="Delete!" name="delete" />
	</div>
</form>
 <br> </br>
<br> </br>
<br> </br>

<!-- Update a recipe Functionality-->
<nav class="navbar navbar-default">
    <h4 class="text-center">
           <strong>Update Recipe:</strong>
    </h4>
</nav>

<form method="POST">
		<h2 class="intro-text text-center">
                        <strong>Appetizer Name:</strong>
                </h2>  
                <br> </br>
             
		<div class="inputbox">
			<div class="container-1">
				<input type="text" name = "appetizer_name3" id="search" placeholder="Name..." />
			</div>
		</div>
		
		<h2 class="intro-text text-center">
                <strong>Ingredients:</strong>
        </h2>  
        
            <br> </br>
           
		<div class="largeinputbox">
			<div class="container-2">
				<input type="text" name = "appetizer_ingredients3" id="search" placeholder="Ingredients..." />
			</div>

            
            </div>
		<br></br>
		<br> </br>
             <br> </br>
               <br> </br>
		<h2 class="intro-text text-center">
                <strong>Recipe:</strong>
        </h2>  
        
        <br> </br>

		<div class="largeinputbox">
			<div class="container-2">
				<input type="text" name = "appetizer_recipe3" id="search" placeholder="Recipe..." />
			</div>
            
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
		  
            <input type="submit" value="Update!" name="update" />

		</div>
</form>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>

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