<?php
	session_start();
	if(isset($_POST['save'])) {
		require 'connect.php';
		$name = $_POST['user_name'];
		$age = $_POST['user_age'];
		$city = $_POST['user_city'];
		$cuisine = $_POST['user_cuisine'];
		$skill = $_POST['user_skill'];
		$username = $_SESSION['user'];
		$q1 = $_POST['q1'];
		$q2 = $_POST['q2'];
		$q3 = $_POST['q3'];
		$q4 = $_POST['q4'];
		$q5 = $_POST['q5'];
		$q6 = $_POST['q6'];
		$q7 = $_POST['q7'];
		$q8 = $_POST['q8'];
		$q9 = $_POST['q9'];
		$q10 = $_POST['q10'];
		$q11 = $_POST['q11'];
		$q12 = $_POST['q12'];
		$q13 = $_POST['q13'];
		$q14 = $_POST['q14'];
		$q15 = $_POST['q15'];
		$q16 = $_POST['q16'];
		$personalityr = 0;
		
		if(strcmp($q1, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q2, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q3, "True") == 0){
			
		}
		if(strcmp($q4, "True") == 0){
			
		}
		if(strcmp($q5, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q6, "True") == 0){
			
		}
		if(strcmp($q7, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q8, "True") == 0){
			
		}
		if(strcmp($q9, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q10, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q11, "True") == 0){
			
		}
		if(strcmp($q12, "True") == 0){
			
		}
		if(strcmp($q13, "True") == 0){
			$personalityr++;
		}
		if(strcmp($q14, "True") == 0){
			
		}
		if(strcmp($q15, "True") == 0){
			
		}
		if(strcmp($q16, "True") == 0){
			$personalityr++;
		}
		
		$user = $_SESSION['user'];
		$userAge = $age;
		$userCity = $city;
		$userSkill = $skill;

		if($userAge >= 18 && $userAge <= 22){ 
			$val = (1*4);
		}
		else if($userAge >= 23 && $userAge <= 30){
			$val = (2*4);
		}
		else if($userAge >= 31 && $userAge <= 40){
			$val = (3*4);
		}
		else if($userAge >= 41){
			$val = (4*4);
		}

		if((strcmp($userCity, "Champaign") == 0) || (strcmp($userCity, "champaign") == 0)){
			$cval = 1*2;
		}
		else if((strcmp($userCity, "Urbana") == 0 || (strcmp($userCity, "urbana") == 0))){
			$cval = 2*2;
		}	

		if(strcmp($userSkill, "Beginner") == 0){
			$sval = 1*4;
		}else if(strcmp($userSkill, "Intermediate") == 0){
			$sval = 2*4;
		}else if(strcmp($userSkill, "Advanced") == 0){
			$sval = 3*4;
		}

		//printf("%d", $val);
		//printf("%d", $cval);
		//printf("%d", $sval);


		$finalval = $val + $cval + $sval;
		//$finalval = ($finalval * 10.0)/34.0;
		//$finalval = floor($finalval);
		//printf("%d", $finalval);
		$check = mysqli_query($con, "SELECT * FROM Profile WHERE username = '$username'");
		$sql = "";
		if(mysqli_num_rows($check) != 0)
		{
			$sql = "UPDATE Profile SET name='$name', age='$age', city='$city', cuisine='$cuisine', skill='$skill', compatibility='$finalval', compatibility2='$personalityr' WHERE username='$username'";
		}
		else
		{
		$sql= "INSERT INTO Profile(username, name, age, city, cuisine, skill, compatibility, compatibility2) VALUES('$username', '$name', '$age', '$city', '$cuisine', '$skill', '$finalval', '$personalityr')";
		}
		$result = mysqli_query($con, $sql);	
		//if($result)
		//{
			//header("location:profile.php");
		//}
		/*else
		{
			echo "Try Again";
		}*/
	}
	if(isset($_POST['cookBuddy'])){
		require 'connect.php';	
		$user = $_SESSION['user'];
		$getComp = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM Profile WHERE username='$user'"));
		$comp = $getComp['compatibility'];	
		$comp2 = $getComp['compatibility2'];
		$minval=2000;
		$buddy = '';
		$result = mysqli_query($con, "SELECT* FROM Profile WHERE username<>'$user'");
		while($row = mysqli_fetch_array($result)){
			$temp = abs($comp2 - $row['compatibility2']);
			$diff = abs($comp - $row['compatibility']);
			if($temp == 8){
				$diff -= 0;
			}
			else if($temp == 7){
				$diff -= 1;
			}
			else if($temp == 6){
				$diff -= 2;
			}
			else if($temp == 5){
				$diff -= 3;
			}
			else if($temp == 4){
				$diff -= 4;
			}
			else if($temp == 3){
				$diff -= 5;
			}
			else if($temp == 2){
				$diff -= 6;
			}
			else if($temp == 1){
				$diff -= 7;
			}
			else if($temp == 0){
				$diff -= 8;
			}
			
			if($diff < $minval){
				$minval = $diff;
				$buddy = $row['username'];
			}
			
		}
		$result2 = mysqli_query($con, "SELECT * FROM User WHERE username='$buddy'");
		$result3 = mysqli_query($con, "SELECT * FROM Profile WHERE username='$buddy'");
		$row2 = mysqli_fetch_array($result2);
		$row3 = mysqli_fetch_array($result3);
		$search_result = '';
		$search_result .= '<h1>Name: '.$row3['name'] . "\n";
		$search_result .= '<h1>Email: '.$row2['email'] . "\n";
		$search_result .= '<h1>Age: '.$row3['age'] . "\n";
		$search_result .= '<h1>City: '.$row3['city'] . "\n";
		$search_result .= '<h1>Favorite Cuisine: '.$row3['cuisine'] . "\n";
		$search_result .= '<h1>Skill Level: '.$row3['skill'] . "\n";
        	$_SESSION['buddy'] = $search_result;
       		header("location:cookingbuddies.php");

	}
		/*$compdown = $comp;
		//printf("%d", $comp);
		$sql = "SELECT * FROM User INNER JOIN Profile ON User.username=Profile.username WHERE compatibility='$comp'";
		$result = mysqli_query($con, $sql);
		//echo $result;
		$search_result = '';
	        if(mysqli_num_rows($result) > 1) {
	        	//printf("%d", 1);
	        	$row = mysqli_fetch_array($result);
	        	if($row['username'] = $user){
	        		$row = mysqli_fetch_array($result);
	        	}
	        	$search_result .= '<h1>Name: '.$row['name'] . "\n";
        		$search_result .= '<h1>Email: '.$row['email'] . "\n";
        		$search_result .= '<h1>Age: '.$row['age'] . "\n";
        		$search_result .= '<h1>City: '.$row['city'] . "\n";
        		$search_result .= '<h1>Favorite Cuisine: '.$row['cuisine'] . "\n";
        		$search_result .= '<h1>Skill Level: '.$row['skill'] . "\n";
	        	$_SESSION['buddy'] = $search_result;
	        	$_SESSION['compnum'] = $comp;
	        	$_SESSION['compdown'] = $compdown;
	        	
	        }
	        else{
	        $sql = "SELECT * FROM User INNER JOIN Profile ON User.username=Profile.username WHERE compatibility='500'";
		$result = mysqli_query($con, $sql);
	        while(mysqli_num_rows($result) < 1){
	        	$comp++;
	        	$compdown--;
	        	$sql = "SELECT * FROM Profile INNER JOIN User ON Profile.username=User.username WHERE compatibility='$comp' OR compatibility='$compdown'";
	        	$result = mysqli_query($con, $sql);
	        	
		        if(mysqli_num_rows($result) > 0) {
		        	$row = mysqli_fetch_array($result);
	        		$search_result .= '<h1>Name: '.$row['name'] . "\n";
	        		$search_result .= '<h1>Email: '.$row['email'] . "\n";
	        		$search_result .= '<h1>Age: '.$row['age'] . "\n";
	        		$search_result .= '<h1>City: '.$row['city'] . "\n";
	        		$search_result .= '<h1>Favorite Cuisine: '.$row['cuisine'] . "\n";
	        		$search_result .= '<h1>Skill Level: '.$row['skill'] . "\n";
		        	$_SESSION['buddy'] = $search_result;
		        	$_SESSION['compnum'] = $comp;
	        		$_SESSION['compdown'] = $compdown;
		        }	        	
		        else if($comp == 32){
		        	$search_result .= '<h1>No Matches Found';
		        }
	     }
	     }*/

	/*if(isset($_GET['newbuddy'])){
		$buddyuser;
	}*/
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
        <strong>Fill in Your Information!</strong>
        </h4> 
    </nav>
    
    <h2 class="intro-text text-center">
        <strong>Name:</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<input type="text" name="user_name" id="name" placeholder="Name..." />
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
	
	<h2 class="intro-text text-center">
        	<strong>Age:</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<input type="text" name="user_age" id="age" placeholder="Age..." />
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
	
    <h2 class="intro-text text-center">
        <strong>City:</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<input type="text" name = "user_city" id="city" placeholder="City..." />
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>	
	
	<h2 class="intro-text text-center">
        <strong>Favorite Cuisine:</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="user_cuisine" size="1">
				<option selected>Chinese
				<option>Italian
				<option>Thai
				<option>Indian
				<option>Mexican
				<option>French
				<option>Japanese
				<option>Spanish
				<option>American
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
	
	
	<h2 class="intro-text text-center">
        <strong>Skill Level:</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="user_skill" size="1">
				<option selected>Beginner
				<option>Intermediate
				<option>Advanced
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
	
		<h2 class="intro-text text-center">
        <strong>I am usually late for my appointments.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q1" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
			<h2 class="intro-text text-center">
        <strong>I make gestures with my hands when I talk.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q2" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
			<h2 class="intro-text text-center">
        <strong>I usually guess the time correctly.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q3" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
			<h2 class="intro-text text-center">
        <strong>I like to read the instructions when I buy something new.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q4" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
			<h2 class="intro-text text-center">
        <strong>I often catch myself day dreaming.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q5" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
			<h2 class="intro-text text-center">
        <strong>I find it easier to remember names instead of faces.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q6" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
			<h2 class="intro-text text-center">
        <strong>When someone asks me a question I turn my head to the left.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q7" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
				<h2 class="intro-text text-center">
        <strong>I like to set goals for myself and organize my time.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q8" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
				<h2 class="intro-text text-center">
        <strong>I work better when I listen to my favorite music or radio station.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q9" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
				<h2 class="intro-text text-center">
        <strong>Hey, are you listening?, is a question I am frequently asked.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q10" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
				<h2 class="intro-text text-center">
        <strong>I pay attention to what is being said rather than how it is said.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q11" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
				<h2 class="intro-text text-center">
        <strong>I analyze the pros and cons when making an important decision.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q12" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
				<h2 class="intro-text text-center">
        <strong>A messy desk is a sign of genius.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q13" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
					<h2 class="intro-text text-center">
        <strong>When I have many things to do I begin with the easy ones.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q14" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
					<h2 class="intro-text text-center">
        <strong>I write my holiday greeting cards early.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q15" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
					<h2 class="intro-text text-center">
        <strong>I approach new tasks by relating them to accomplished ones.</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-1">
				<select name="q16" size="1">
				<option selected>True
				<option>False
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>
	

            <br> </br>
            
            <input type="submit" value="Save!" name="save" />
            <input type="submit" value="Find a CookBuddy!" name="cookBuddy" />


</form>

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