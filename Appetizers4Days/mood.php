<?php

session_start();
$search_result = '';

	if(isset($_POST['search'])) {
		require 'connect.php';
		$weather = $_POST['user_weather']; 
		$smiley = $_POST['user_smiley'];
		$activity = $_POST['user_activity'];
		$color = $_POST['user_color'];
		$omg = $_POST['user_omg'];
		
		$user = $_SESSION['user'];
		
		
		//Q1
		if(strcmp($weather, "Sunny") == 0){
			$moodval = $moodval + 1;
		}
		else if(strcmp($weather, "Rainy") == 0){
			$moodval = $moodval + 2;
		}
		
		//Q2
		if(strcmp($smiley, ":)") == 0 || strcmp($smiley, ":D") == 0){
			$moodval = $moodval + 1;
		}
		else if(strcmp($smiley, ":(") == 0 || strcmp($smiley, ":’(") == 0){
			$moodval = $moodval + 2;
		}
		
		//Q3
		if(strcmp($activity, "Hanging out with friends") == 0 || strcmp($activity, "Sleeping") == 0){
			$moodval = $moodval + 1;
		}
		else if(strcmp($activity, "Taking a personal day") == 0 || strcmp($activity, "Watching Titanic") == 0){
			$moodval = $moodval + 2;
		}
		
		//Q4
		if(strcmp($color, "Pink") == 0 || strcmp($color, "Yellow") == 0){
			$moodval = $moodval + 1;
		}
		else if(strcmp($color, "Blue") == 0 || strcmp($color, "Grey") == 0){
			$moodval = $moodval + 2;
		}
		
		//Q5
		if(strcmp($omg, "Calmly recover everything with a backup of your files") == 0 || strcmp($omg, "Pull an all-nighter to rebuild everything from scratch and get it done") == 0){
			$moodval = $moodval + 1;
		}
		else if(strcmp($omg, "Throw your computer against a wall and cry") == 0 || strcmp($omg, "Tell your teammates right away and drop the class") == 0){
			$moodval = $moodval + 2;
		}
		
		
		
		if($moodval == 5 || $moodval == 6)
			$mood = "happy";
		else if($moodval == 9 || $moodval == 10)	
			$mood = "sad";
		else if($moodval == 6 || $moodval == 7)
			$mood = "neutral";

	//	printf("%s\n", $mood);
		
		$sql= "SELECT * FROM Appetizer WHERE mood = '$mood' ORDER BY RAND()";
		
		$count = 0;
			
	        $result = mysqli_query($con, $sql);
	        //$array = array();
	        if(mysqli_num_rows($result) > 0) {
	        	while($row = mysqli_fetch_array($result)) {
	        		$count++;
	        		$search_result .= '<h1>Name: '.$row['name'] . "\n";
	        		$search_result .= '<h2> ⇒ Recipe: '.$row['recipe'] . "\n";
	        		
	        		if($count == 1)
	        			break;
	        	}
	        		
	        }
	        
	        else{
        		$search_result .= '<h1>No appetizers found<h1>';
        	}
	        	
		
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
         
<form method="POST">

    <nav class="navbar navbar-default">
        <h4 class="text-center">
        <strong>Find food for you mood!</strong>
        </h4> 
    </nav>
    
    <h2 class="intro-text text-center">
        <strong>What is your favorite type of weather?</strong>           
    </h2>  
	
   <div class="inputbox">
			<div class="container-1">
				<select name="user_weather" size="1">
				<option selected>Sunny
				<option>Rainy
				</select>
				<!--<input name="mood_name" type="text" />-->
			</div>
	</div>
	
	<h2 class="intro-text text-center">
        	<strong>Which smiley best represents your mood right now?</strong>           
    </h2>  
	
      <div class="inputbox">
			<div class="container-1">
				<select name="user_smiley" size="1">
				<option selected>:)
				<option>:(
				<option>:'(
				<option>:D
				</select>
				<!--<input name="mood_name" type="text" />-->
			</div>
	</div>
	
	
    <h2 class="intro-text text-center">
        <strong>Which of these do you want to be doing right now?</strong>           
    </h2>  
	
     <div class="inputbox">
			<div class="container-1">
				<select name="user_activity" size="1">
				<option selected>Hanging out with friends
				<option>Sleeping
				<option>Taking a personal day
				<option>Watching Titanic
				</select>
				<!--<input name="mood_name" type="text" />-->
			</div>
	</div>
	
	<h2 class="intro-text text-center">
        <strong>Which of these colors most appeals to you?</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="user_color" size="1">
				<option selected>Blue
				<option>Yellow
				<option>Pink
				<option>Grey
				</select>
				<!--<input name="mood_name" type="text" />-->
			</div>
	</div>
	
	
		<h2 class="intro-text text-center">
        <strong>Oh no! Your entire 411 project has been wiped from your computer. What do you do???</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="user_omg" size="1">
				<option selected>Throw your computer against a wall and cry
				<option>Calmly recover everything with a backup of your files
				<option>Tell your teammates right away and drop the class
				<option>Pull an all-nighter to rebuild everything from scratch and get it done
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>

            <br> </br>
            
            <input type="submit" value="Search!" name="search" />
 <br> </br>

</form>
        <div class="container"><?php echo $search_result ?></div>

        <!--<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Beautiful boxes
                        <strong>to showcase your content</strong>
                    </h2>
                    <hr>
                    <p>Use as many boxes as you like, and put anything you want in them! They are great for just about anything, the sky's the limit!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
            </div>
        </div>-->

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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>