<?php
	session_start();
	$creator = $_SESSION['email'];
?>
<head>
	<title>Cookzilla</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/icons.css" />
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800" rel="stylesheet">
	<script src="https://use.fontawesome.com/e808bf9397.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico" />
</head>


<body>
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
					<li><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span>Recipes</span></a></li>
					<li><a href="groups.php" title="Groups"><span>Groups</span></a>
						<ul>
							<li><a href="create_group.php" title="Create group">Create Group</a></li>
							<li><a href="groups.php" title="See group">View Groups</a></li>							
						</ul>
					</li>
					<li class="current-menu-item"><a href="events.php" title="Events"><span>Events</span></a>
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

$query = "SELECT * FROM groups WHERE creator = '$creator'";

$result = mysqli_query($link, $query);
mysqli_close($link);
?>



<?php if ($_SESSION['loggedin']): ?>

	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">

			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Create a new event</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_recipe container">
						<form action="create_event_done.php" method="post">
							<section>
								<h2>Event Details</h2>
								<p>All fields are required.</p>
								<div class="f-row">
									<div class="third"><input type="text" name="eventname" placeholder="Event name" /></div>
								</div>
								<div class="f-row">
									<div class="third">									
										<select name = "groupname">
											<option disabled selected value>Group name</option>>
												<?php 
													while($row = mysqli_fetch_assoc($result)) { 
												?>
												<option><?php echo $row['groupname']?></option>
												<?php 
													}
												?>
											</select>
										</div>										
								</div>

								<div class="f-row">
									<div class="third"><input type="text" name="location" placeholder="Location" /></div>
								</div>
								<div class="f-row">
									<div class="third"><input type="text" name="time" placeholder="Time" /></div>
								</div>
						
							<section>
								<h2>Description <span></span></h2>
									<div class="f-row">
										<textarea type="text" name="description"></textarea>
									</div>																				
							</section>

							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" name="eventpic" />
								</div>
							</section>
							

							<div class="f-row full">
								<input type="submit" class="button" id="submitRecipe" value="Publish this event" />
							</div>

						</form>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	


<?php else : ?>
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
									<p>Only members can create events.</p>
									<p>Click <a href=login.php>here</a> to log in. </p>
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
<?php endif; ?>



	
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


