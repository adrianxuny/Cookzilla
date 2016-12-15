<?php
	session_start();
	$email = $_SESSION['email'];
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
					<li class="current-menu-item"><a href="groups.php" title="Groups"><span>Groups</span></a>
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

$query = "SELECT * FROM groups NATURAL JOIN users WHERE creator = email";

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
					<h1>Groups</h1>
				</header>
				
				<!--content-->
				<section class="content three-fourth">
					<!--entries-->
					<div class="entries row">
						
					<?php
						while ($row = mysqli_fetch_assoc($result)) {
					?>
						<?php 
							$groupname = $row['groupname'];
							$href = "join_group.php?groupname=";
							$combined = $href . $groupname;
						?>
							<!--blog entry-->
							<article class="post">
								<div class="entry-meta">
									<div class="avatar">
										<a><img src="images/avatar.jpg" alt="" /><span><?php echo $row['name']?></span></a>
									</div>
								</div>
								
								<div class="container">
									<div class="entry-featured"><a><img src="images/cookinggroup.jpg" alt="" /></a></div>
									<div class="entry-content">
										<h2><a><?php echo $row['groupname']?></a></h2>
										<p><?php echo $row['description']?></p>
									</div>
									<div class="actions">
										<div>
											<div class="leave_comment"><a href=<?php echo $combined?>>Join Group</a></div>
										</div>
									</div>
								</div>
							</article>
							<!--//blog entry-->
					<?php	
						}
					?>
				</section>
						
				<aside class="sidebar one-fourth">
					<div class="widget">
						<h3>Advertisment</h3>
						<a href="#"><img src="images/advertisment.jpg" alt="" /></a>
					</div>
				</aside>
				<!--//right sidebar-->
						
						<div class="quicklinks">
							<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
						</div>
					</div>
					<!--//entries-->
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
									<p>Only members can view groups.</p>
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


