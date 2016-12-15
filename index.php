<?php
session_start();
$username = $_SESSION[name];
?>

<head>
	<title>Cookzilla</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/icons.css" />
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800" rel="stylesheet">
	<script src="https://use.fontawesome.com/e808bf9397.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico" />
</head>


<body class="home">
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
					<li class="current-menu-item"><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span>Recipes</span></a></li>
					<li><a href="groups.php" title="Groups"><span>Groups</span></a>
						<ul>
							<li><a href="create_group.php" title="Create group">Create Group</a></li>
							<li><a href="groups.php" title="See group">View Groups</a></li>							
						</ul>
					</li>
					<li><a href="events.html" title="Events"><span>Events</span></a>
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

$query = "SELECT * FROM recipes ORDER BY RAND() LIMIT 1;";

$result = mysqli_query($link, $query);

$row = mysqli_fetch_assoc($result);
$rid = $row['rid'];

$href = "recipe.php?rid=";
$link = $href . $rid;

mysqli_close($link);
?>


		
	<!--main-->
	<main class="main" role="main">
		<!--intro-->
		<div class="intro">
			<figure class="bg"><img src="images/intro.jpg" alt="" /></figure>
			
			<!--wrap-->
			<div class="wrap clearfix">
				<!--row-->
				<div class="row">
					<article class="three-fourth text">
						<h1>Welcome to Cookzilla!</h1>
						<h2><?php echo $username?><h2>
						<p>Cookzilla is the ultimate <strong>cooking social community</strong>, where recipes come to life. Wanna know what you will gain by joining us? Register now!</p>
						<p>You will make new friends and share delicious recipes. </p>
						<a href="register.html" class="button white more medium">Join our community <i class="fa fa-chevron-right"></i></a>
						<p>Already a member? Click <a href="login.php">here</a> to login.</p>
					</article>
					
					<!--search recipes widget-->
					<div class="one-fourth">
						<div class="widget container">
							<div class="textwrap">
								<h3>Search for recipes</h3>
								<p>All you need to do is enter an igredient, a dish or a keyword. </p>
								<p>There's sure to be something tempting for you to try.</p> 
								<p>Enjoy!</p>
							</div>
							<form action="recipes.php" method="post">
								<div class="f-row">
									<input type="text" name="keyword" placeholder="Enter your search term" />
								</div>
								<div class="f-row bwrap">
									<input type="submit" value="Start cooking!" />
								</div>
							</form>
						</div>
					</div>
					<!--//search recipes widget-->
				</div>
				<!--//row-->
			</div>
			<!--//wrap-->
		</div>
		<!--//intro-->	

		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				
				<!--content-->
				<section class="content three-fourth">
					<!--cwrap-->
					<div class="cwrap">
						<!--entries-->
						<div class="entries row">
							<!--featured recipe-->
							<div class="featured two-third">
								<header class="s-title">
									<h2 class="ribbon">Recipe of the Day</h2>
								</header>
								<article class="entry">
									<figure>
										<img src="images/cuisine-francaise.jpg" alt="" />
										<figcaption><a href=<?php echo $link ?>><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href=<?php echo $link ?>><?php echo $row['title'] ?></a></h2>
										<p><?php echo $row['description'] ?> </p>
										<div class="actions">
											<div>
												<a href=<?php echo $link ?> class="button">See the full recipe</a>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!--//featured recipe-->
							
						</div>
						<!--//entries-->

						<div class="quicklinks">
							<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
						</div>
						
					</div>
					<!--//cwrap-->
				</section>
				<!--//content-->
		
			
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
					<div class="widget">
						<h3>Recipe Tags</h3>
						<ul class="boxed">
							<li class="light"><a href="recipes.php?tag=apetizers" title="Appetizers"><i class="icon icon-themeenergy_pasta"></i> <span>Apetizers</span></a></li>
							<li class="medium"><a href="recipes.php?tag=cocktails" title="Cocktails"><i class="icon icon-themeenergy_margarita2"></i> <span>Cocktails</span></a></li>
							<li class="dark"><a href="recipes.php?tag=deserts" title="Deserts"><i class="icon icon-themeenergy_cupcake"></i> <span>Deserts</span></a></li>
							
							<li class="medium"><a href="recipes.php?tag=eggs" title="Cocktails"><i class="icon icon-themeenergy_eggs"></i> <span>Eggs</span></a></li>
							<li class="dark"><a href="recipes.php?tag=equipment" title="Equipment"><i class="icon icon-themeenergy_blender"></i> <span>Equipment</span></a></li>
							<li class="light"><a href="recipes.php?tag=events" title="Events"><i class="icon icon-themeenergy_turkey"></i> <span>Events</span></a></li>
						
							<li class="dark"><a href="recipes.php?tag=fish" title="Fish"><i class="icon icon-themeenergy_fish2"></i> <span>Fish</span></a></li>
							<li class="light"><a href="recipes.php?tag=fitness" title="Ftness"><i class="icon icon-themeenergy_biceps"></i> <span>Fitness</span></a></li>
							<li class="medium"><a href="recipes.php?tag=healthy" title="Healthy"><i class="icon icon-themeenergy_apple2"></i> <span>Healthy</span></a></li>
							
							<li class="light"><a href="recipes.php?tag=asian" title="Asian"><i class="icon icon-themeenergy_sushi"></i> <span>Asian</span></a></li>
							<li class="medium"><a href="recipes.php?tag=mexican" title="Mexican"><i class="icon icon-themeenergy_peper"></i> <span>Mexican</span></a></li>
							<li class="dark"><a href="recipes.php?tag=pizza" title="Pizza"><i class="icon  icon-themeenergy_pizza-slice"></i> <span>Pizza</span></a></li>
							
							<li class="medium"><a href="recipes.php?tag=kids" title="Kids"><i class="icon icon-themeenergy_happy"></i> <span>Kids</span></a></li>
							<li class="dark"><a href="recipes.php?tag=meat" title="Meat"><i class="icon icon-themeenergy_meat"></i> <span>Meat</span></a></li>
							<li class="light"><a href="recipes.php?tag=snacks" title="Snacks"><i class="icon icon-themeenergy_fried-potatoes"></i> <span>Snacks</span></a></li>
					
							<li class="dark"><a href="recipes.php?tag=salads" title="Salads"><i class="icon icon-themeenergy_eggplant"></i> <span>Salads</span></a></li>
							<li class="light"><a href="recipes.php?tag=soups" title="Storage"><i class="icon icon-themeenergy_soup2"></i> <span>Soups</span></a></li>
							<li class="medium"><a href="recipes.php?tag=vegetarian" title="Vegetarian"><i class="icon icon-themeenergy_plant-symbol"></i> <span>Vegetarian</span></a></li>
						</ul>
					</div>
						
					<div class="widget">
						<h3>Advertisment</h3>
						<a href="http://www.westerlynaturalmarket.com/retailer/store_templates/shell_id_1.asp?storeID=QWCSN3N89ASR2JS000AKHMCCQAB04FN2"><img src="images/advertisment.jpg" alt="" /></a>
					</div>
				</aside>
			</div>
			<!--//right sidebar-->
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
	<script src="js/home.js"></script>	
</body>


