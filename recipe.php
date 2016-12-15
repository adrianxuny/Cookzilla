<?php
	session_start();
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

$rid = $_GET['rid'];

$query = "SELECT * FROM recipes NATURAL JOIN users NATURAL LEFT OUTER JOIN recipe_tags NATURAL LEFT JOIN ingredients 
		WHERE username = email AND rid = '$rid'";
$query2 = "SELECT * FROM recipes NATURAL LEFT OUTER JOIN recipe_tags WHERE rid = '$rid'";
$query3 = "SELECT * FROM recipes NATURAL LEFT OUTER JOIN ingredients WHERE rid = '$rid'";		
$reviewquery = "SELECT * FROM reviews JOIN users WHERE rid = '$rid' AND username = email";

$result = mysqli_query($link, $query);
$result2 = mysqli_query($link, $query2);
$result3 = mysqli_query($link, $query3);
$result4= mysqli_query($link, $reviewquery);
$count = mysqli_num_rows($result4);

$row = mysqli_fetch_assoc($result);

$href = "review_done.php?rid=";
$href2 = "add_fav_done.php?rid=";

$link = $href . $rid;
$link2 = $href2 . $rid;

mysqli_close($link);
?>



	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1><?php echo $row['title'] ?></h1>
				</header>
				
				<!--content-->
				<section class="content three-fourth">
					<!--recipe-->
						<div class="recipe">
							<div class="row">
								
								<!--two-third-->
								<article class="two-third">
									<div class="image"><a><img src="images/cooking.jpg" alt="" /></a></div>
									<div class="intro">
										<p><strong>Instructions</strong></p> 
										<p><?php echo $row['steps']?> </p>
									</div>
								</article>
								<!--//two-third-->
								
								<!--one-third-->
								<article class="one-third">
									<dl class="user">
										<dt>Posted by</dt>
										<dd><?php echo $row['name']?></dd>
									</dl>

									<dl class="basic">
										<dt>Serves</dt>
										<dd><?php echo $row['servings']?> people</dd>
									</dl>

									<?php while ($row = mysqli_fetch_assoc($result2)) { ?>
										<dl class="user">
											<dt>Tags</dt>
											<dd><?php echo $row['tagname']?></dd>
										</dl>
									<?php }?>

									<?php while ($row = mysqli_fetch_assoc($result3)) { ?>
										<dl class="ingredients">
											<dt> <?php echo $row['quantity'] . " " .$row['unit']?> </dt>
											<dd> <?php echo $row['ingredient']?> </dd>
										</dl>
									<?php }?>
								</article>
								<!--//one-third-->
							</div>
						</div>
						<!--//recipe-->
							
						<!--comments-->
						<div class="comments" id="comments">
							<h2><?php echo $count ?> comments </h2>
							<?php
								while ($row = mysqli_fetch_assoc($result4)) {
							?>							
							<ol class="comment-list">
								<!--comment-->
								<li class="comment depth-1">
									<div class="avatar"><a><img src="images/avatar.jpg" alt="" /></a></div>
									<div class="comment-box">
										<div class="comment-author meta"> 
											<p><strong><?php echo $row['reviewtitle']?></strong>
											<?php echo $row['name']?></p>
											<p><strong>Rating: <?php echo $row['rating']?></strong></p>
											<p>Suggestion: <?php echo $row['suggestion']?></p>					
											<p>Review: <?php echo $row['reviewtext']?></p>
										</div>
									</div> 
								</li>
								<!--//comment-->
							</ol>
							<?php }?>
						</div>
						<!--//comments-->
						
						<!--respond-->
						<div class="comment-respond" id="respond">
							<h2>Leave a review</h2>
							<div class="container">
								<p><strong>Note:</strong> Comments on the web site reflect the views of their authors, and not necessarily the views of the socialchef internet portal. Requested to refrain from insults, swearing and vulgar expression. We reserve the right to delete any comment without notice explanations.</p>
								<form method = "post" action = <?php echo $link?>>
									<div class="f-row">
										
										<div class="f-row">
											<div class="third">
												<strong>Title:</strong>
												<input type="text" name="reviewtitle" placeholder="Review title" />
											</div>
										</div>				

										<div class="f-row">
											<div class="third">
												<strong>Rating:</strong>
												<select name = "rating">
													<option>5</option>
													<option>4</option>
													<option>3</option>
													<option>2</option>
													<option>1</option>
												</select>
											</div>
										</div>

										<div class="f-row">
											<strong>Suggestion:</strong>
											<div class="f-row">
												<textarea type="text" name="suggestion"></textarea>
											</div>
										</div>	

										<div class="f-row">
											<strong>Review:</strong>
											<div class="f-row">
												<textarea type="text" name="review"></textarea>
											</div>
										</div>	

										<div class="third bwrap">
											<input type="submit" value="Submit review" />
										</div>										
									
									</div>
								</form>
							</div>
						</div>
						<!--//respond-->
				</section>
				<!--//content-->
				
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
					<nav class="user-nav" role="navigation">
						<ul>
							<li class="light"><a href=<?php echo $link2?> ><i class="icon icon-themeenergy_heart"></i> <span>Add to Favourites</span></a></li>
						</ul>
					</nav>
				</aside>
				<!--//right sidebar-->
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


