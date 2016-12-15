<?php
	session_start();
	$username = $_SESSION['email'];
?>

<head>
	<title>Cookzilla</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/icons.css" />
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800" rel="stylesheet">
	<script src="https://use.fontawesome.com/e808bf9397.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body class>

	<!--preloader-->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!--//preloader-->

	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		<div class="wrap clearfix">
			<a href="index.php" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo" /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li ><a href="index.php" title="Home"><span>Home</span></a></li>
					<li class="current-menu-item"><a href="recipes.php" title="Recipes"><span>Recipes</span></a></li>
					<li><a href="groups.php" title="Groups"><span>Groups</span></a>
						<ul>
							<li><a href="create_group.php" title="Create group">Create Group</a></li>
							<li><a href="groups.php" title="See group">View Groups</a></li>							
						</ul>
					</li>
					<li><a href="events.php" title="Events"><span>Events</span></a>
						<ul>
							<li><a href="create_event.php" title="Create event">Create Event</a></li>
							<li><a href="events.php" title="See group">View Events</a></li>					
						</ul>
					</li>
				</ul>
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="logout.php" title="Search for recipes"><i class="icon icon-themeenergy_door-hanger"></i> <span>Log out</span></a></li>
					<li class="medium"><a href="my_profile.php" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
					<li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->
	

<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "cookzilla";

$link = mysqli_connect($host, $user, $password);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

$database = mysqli_select_db($link, $db);

if (!$database) {
	echo "Error: Unable to locate the database.";
	exit();
}

$title = $_POST['title'];
$serving = $_POST['serving'];
$pic = $_POST['recipepic'];
$steps = $_POST['steps'];

$ig1 = $_POST['ig1'];
$qu1 = $_POST['qu1'];
$un1 = $_POST['un1'];

$ig2 = $_POST['ig2'];
$qu2 = $_POST['qu2'];
$un2 = $_POST['un2'];

$ig3 = $_POST['ig3'];
$qu3 = $_POST['qu3'];
$un3 = $_POST['un3'];

$ig4 = $_POST['ig4'];
$qu4 = $_POST['qu4'];
$un4 = $_POST['un4'];

$ig5 = $_POST['ig5'];
$qu5 = $_POST['qu5'];
$un5 = $_POST['un5'];

$tag1 = $_POST['tag1'];
$tag2 = $_POST['tag2'];
$tag3 = $_POST['tag3'];


$query = "INSERT INTO recipes(title, username, servings, pic, steps) 
		VALUES('$title', '$username', '$serving', '$pic', '$steps')";
$query1 = "INSERT INTO ingredients(rid, ingredient, quantity, unit)
		VALUES(LAST_INSERT_ID(), '$ig1', '$qu1', '$un1')";
$query2 = "INSERT INTO ingredients(rid, ingredient, quantity, unit)
		VALUES(LAST_INSERT_ID(), '$ig2', '$qu2', '$un2')";
$query3 = "INSERT INTO ingredients(rid, ingredient, quantity, unit)
		VALUES(LAST_INSERT_ID(), '$ig3', '$qu3', '$un3')";
$query4 = "INSERT INTO ingredients(rid, ingredient, quantity, unit)
		VALUES(LAST_INSERT_ID(), '$ig4', '$qu4', '$un4')";
$query5 = "INSERT INTO ingredients(rid, ingredient, quantity, unit)
		VALUES(LAST_INSERT_ID(), '$ig5', '$qu5', '$un5')";
$tag_query1 = "INSERT INTO recipe_tags(rid, tagname) 
			VALUES(LAST_INSERT_ID(), '$tag1')";
$tag_query2 = "INSERT INTO recipe_tags(rid, tagname) 
			VALUES(LAST_INSERT_ID(), '$tag2')";
$tag_query3 = "INSERT INTO recipe_tags(rid, tagname) 
			VALUES(LAST_INSERT_ID(), '$tag3')";		

if($title and $serving and $pic and $steps) {
mysqli_query($link, $query);
}
if($ig1 and $qu1 and $un1) {
mysqli_query($link, $query1);
}
if($ig2 and $qu2 and $un2) {
mysqli_query($link, $query2);
}
if($ig3 and $qu3 and $un3) {
mysqli_query($link, $query3);
}
if($ig4 and $qu4 and $un4) {
mysqli_query($link, $query4);
}
if($ig5 and $qu5 and $un5) {
mysqli_query($link, $query5);
}
if($tag1) {
mysqli_query($link, $tag_query1);
}
if($tag2) {
mysqli_query($link, $tag_query2);
}
if($tag3) {
mysqli_query($link, $tag_query3);
}


mysqli_close($link);
?>

	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				<!--content-->
				<section class="content three-fourth">
					<!--row-->
					<div class="row">
						<div class="two-third">
							<div class="container">
								<p>Your recipe has been posted.</p>
								<p>Click <a href=index.html>here</a> to go back to homepage. </p>
							</div>
						</div>
					</div>
					<!--//row-->
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->


	<!--footer-->
	<footer class="foot" role="contentinfo">
		<div class="wrap clearfix">
			<div class="row">
				<article class="one-half">
					<h5>About Cookzilla</h5>
					<p>Cookzilla is a site that allows people to post cooking recipes, to review and grade posted cooking recipes, to attach additional suggestions to a posted recipe, to organize cooking meetings with other users.</p>
				</article>
				<article class="one-fourth">
					<h5>Need help?</h5>
					<p>Contact us via phone or email</p>
					<p><em>T:</em>  +1 917 868 2306<br /><em>E:</em>  <a href="#">adrianxu.ny@gmail.com</a></p>
				</article>
				<article class="one-fourth">
					<h5>Follow us</h5>
					<ul class="social">
						<li><a href="#" title="facebook"><i class="fa fa-fw fa-facebook"></i></a></li>
						<li><a href="#" title="youtube"><i class="fa  fa-fw fa-youtube"></i></a></li>
						<li><a href="#" title="twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
					</ul>
				</article>
				
				<div class="bottom">
					<p class="copy">Copyright 2016 Cookzilla. All rights reserved</p>
				</div>
			</div>
		</div>
	</footer>
	<!--//footer-->
	


	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>


