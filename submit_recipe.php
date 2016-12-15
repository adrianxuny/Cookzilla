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
		
<?php if(isset($_SESSION['loggedin'])): ?>
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">

			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Add a new recipe</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_recipe container">
						<form action="submit_recipe_done.php" method="post">
							<section>
								<h2>Basics</h2>
								<p>All fields are required.</p>
								<div class="f-row">
									<div class="third"><input type="text" name="title" placeholder="Recipe title" /></div>
								</div>
								<div class="f-row">
									<div class="third"><input type="text" name="serving" placeholder="Serves how many people?" /></div>
								</div>
							</section>
							
							<section>
								<h2>Tags</h2>
									<div class="f-row">
										<div class="third">
											<select name = "tag1">
												<option disabled selected value></option>>		
												<option>general</option>>
												<option>apetizers</option>
												<option>cocktails</option>
												<option>deserts</option>
												<option>eggs</option>
												<option>equipment</option>
												<option>events</option>
												<option>fish</option>	
												<option>fitness</option>
												<option>healthy</option>
												<option>asian</option>
												<option>mexican</option>
												<option>pizza</option>
												<option>kids</option>
												<option>meat</option>	
												<option>snacks</option>
												<option>salads</option>
												<option>soups</option>
												<option>vegearian</option>
											</select>
										</div>
									</div>
									<div class="f-row">
										<div class="third">									
											<select name = "tag2">
												<option disabled selected value></option>>		
												<option>general</option>>
												<option>apetizers</option>
												<option>cocktails</option>
												<option>deserts</option>
												<option>eggs</option>
												<option>equipment</option>
												<option>events</option>
												<option>fish</option>	
												<option>fitness</option>
												<option>healthy</option>
												<option>asian</option>
												<option>mexican</option>
												<option>pizza</option>
												<option>kids</option>
												<option>meat</option>	
												<option>snacks</option>
												<option>salads</option>
												<option>soups</option>
												<option>vegearian</option>
											</select>
										</div>										
									</div>
									<div class="f-row">
										<div class="third">												
											<select name = "tag3">
												<option disabled selected value></option>>
												<option>general</option>>
												<option>apetizers</option>
												<option>cocktails</option>
												<option>deserts</option>
												<option>eggs</option>
												<option>equipment</option>
												<option>events</option>
												<option>fish</option>	
												<option>fitness</option>
												<option>healthy</option>
												<option>asian</option>
												<option>mexican</option>
												<option>pizza</option>
												<option>kids</option>
												<option>meat</option>	
												<option>snacks</option>
												<option>salads</option>
												<option>soups</option>
												<option>vegearian</option>
											</select>
										</div>
									</div>
							</section>	
							
							<section>
								<h2>Ingredients</h2>
								<div class="f-row ingredient">
									<div class="large"><input type="text" name = "ig1" placeholder="Ingredient" /></div>
									<div class="small"><input type="text" name = "qu1" placeholder="Quantity" /></div>
									<div class="third">
										<select name = "un1">
											<option>pound</option>
											<option>ounce</option>
											<option>pint</option>
											<option>fluid ounce</option>
											<option>cup</option>
											<option>tablespoon</option>
											<option>teaspoon</option>	
										</select>
									</div>
								</div>


								<div class="f-row ingredient">
									<div class="large"><input type="text" name = "ig2" placeholder="Ingredient" /></div>
									<div class="small"><input type="text" name = "qu2" placeholder="Quantity" /></div>
									<div class="third">
										<select name = "un2">
											<option>pound</option>
											<option>ounce</option>
											<option>pint</option>
											<option>fluid ounce</option>
											<option>cup</option>
											<option>tablespoon</option>
											<option>teaspoon</option>	
										</select>
									</div>
								</div>

								<div class="f-row ingredient">
									<div class="large"><input type="text" name = "ig3" placeholder="Ingredient" /></div>
									<div class="small"><input type="text" name = "qu3" placeholder="Quantity" /></div>
									<div class="third">
										<select name = "un3">
											<option>pound</option>
											<option>ounce</option>
											<option>pint</option>
											<option>fluid ounce</option>
											<option>cup</option>
											<option>tablespoon</option>
											<option>teaspoon</option>	
										</select>
									</div>
								</div>

								<div class="f-row ingredient">
									<div class="large"><input type="text" name = "ig4" placeholder="Ingredient" /></div>
									<div class="small"><input type="text" name = "qu4" placeholder="Quantity" /></div>
									<div class="third">
										<select name = "un4">
											<option>pound</option>
											<option>ounce</option>
											<option>pint</option>
											<option>fluid ounce</option>
											<option>cup</option>
											<option>tablespoon</option>
											<option>teaspoon</option>	
										</select>
									</div>
								</div>

								<div class="f-row ingredient">
									<div class="large"><input type="text" name = "ig5" placeholder="Ingredient" /></div>
									<div class="small"><input type="text" name = "qu5" placeholder="Quantity" /></div>
									<div class="third">
										<select name = "un5">
											<option>pound</option>
											<option>ounce</option>
											<option>pint</option>
											<option>fluid ounce</option>
											<option>cup</option>
											<option>tablespoon</option>
											<option>teaspoon</option>	
										</select>
									</div>
								</div>
							</section>


							<section>
								<h2>Instructions <span>(please write your instructions in steps)</span></h2>
									<div class="f-row">
										<textarea type="text" name="steps"></textarea>
									</div>																				
							</section>
							

							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" name="recipepic" />
								</div>
							</section>
							

							<div class="f-row full">
								<input type="submit" class="button" id="submitRecipe" value="Publish this recipe" />
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
									<p>Only members can sumbit recipes.</p>
									<p>Click <a href=loginpage.php>here</a> to log in. </p>
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


