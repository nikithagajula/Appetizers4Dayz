<?php  
	$search_resultapps = '';
	$search_result = '';
    session_start();
    if(isset($_POST['Search'])){
        require 'connect.php';
        $entered = $_POST['search_name'];
        //echo $_SESSION['user'];
       // //print $entered;

        $sql= "SELECT * FROM Appetizer WHERE name = '$entered'";

        $result = mysqli_query($con, $sql);
        $array = array();
        if(mysqli_num_rows($result) > 0) {
        	while($row = mysqli_fetch_array($result)) {
        	$search_resultapps.= '<div class = "outputBox">';

        		$search_resultapps .= '<h1>Name: '.$row['name'] . "\n";
        		$search_resultapps .= '<h2> ⇒ Ingredients: '.$row['Ingredients'] . "\n";
        		$search_resultapps .= '<h2> ⇒ Recipe: '.$row['recipe'] . "\n";
                		 $search_resultapps.= '</div>';
        	 $search_resultapps.= '<br> </br>';
        	 }
        		
        }
        else{
        	$search_resultapps .= '<h1>No appetizers found<h1>';
        }
    }
    if(isset($_POST['buddysearch'])){
    	require 'connect.php';
    	$name = $_POST['user_name'];
	$age = $_POST['user_age'];
	$city = $_POST['user_city'];
	$cuisine = $_POST['user_cuisine'];
	$skill = $_POST['user_skill'];
	$sql = "SELECT * FROM User INNER JOIN Profile ON User.username=Profile.username";
	$conditions = array();
	if($name != ""){
		$conditions[] = "name = '$name'";
	}
	if($age != ""){
		$conditions[] = "age = '$age'";
	}
	if($city != ""){
		$conditions[] = "city = '$city'";
	}
	if($cuisine != "None"){
		$conditions[] = "cuisine = '$cuisine'";
	}
	if($skill != "None"){
		$conditions[] = "skill = '$skill'";
	}
	if(count(conditions) > 0){
		$sql .= " WHERE " . implode(' AND ', $conditions);
	}
	//printf("%s", $sql);
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0) {
        	while($row = mysqli_fetch_array($result)) {
        	        $search_result.= '<div class = "outputBox">';

        		$search_result .= '<h1>Name: '.$row['name'] . "\n";
        		$search_result .= '<h1>Email: '.$row['email'] . "\n";
        		$search_result .= '<h1>Age: '.$row['age'] . "\n";
        		$search_result .= '<h1>City: '.$row['city'] . "\n";
        		$search_result .= '<h1>Favorite Cuisine: '.$row['cuisine'] . "\n";
        		$search_result .= '<h1>Skill Level: '.$row['skill'] . "\n";
        		
        		 $search_result.= '</div>';
        	 $search_result.= '<br> </br>';
        	}
        		
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


</div>
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


        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Cook Food 
                        <strong>worth Eating</strong>
                    </h2>
                    <hr>
                    <!--<img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">-->
                    <hr class="visible-xs">
                    <p style="text-align:center">Never waste food again! With our website you can create new and exciting appetizers with ingredients you already have in your home! It's cooking made easier. Impress all of your friends with fancy foods or family favorites.</p>
                </div>
            </div>
        </div>

        
        <form method="POST">
            <nav class="navbar navbar-default">
                <h4 class="text-center">
                    <strong>Search for an Appetizer:</strong>
                </h4> 
            </nav>
            
             <div class="searchbox">
                <div class="container-3">
                    <span class="icon"><i class="fa fa-search"></i></span>
                    <input type="text" name="search_name" placeholder="Search..." />
                 </div>
                  <br> </br>
                 
                 <input type="submit" value="Search For a Recipe!" name="Search" />
            </div>
                              <br> </br>

            <div class="container">
            			<?php echo $search_resultapps ?>
            </div>
            
            

        
<form method="POST">

    <nav class="navbar navbar-default">
        <h4 class="text-center">
        <strong>Search for a Buddy:</strong>
        </h4> 
    </nav>
    
    <h2 class="intro-text text-center">
        <strong>Name:</strong>           
    </h2>  
	
    <div class="inputbox">
			<div class="container-3">
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
				<option selected>None
				<option>Chinese
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
				<option selected>None
				<option>Beginner
				<option>Intermediate
				<option>Advanced
				</select>
				<!--<input name="appetizer_name" type="text" />-->
			</div>
	</div>

            <br> </br>
            
            <input type="submit" value="Search!" name="buddysearch" />
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