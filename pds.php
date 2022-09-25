<!DOCTYPE html>
<html>
	<head>
		<!-- link the css with the page  -->
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<!-- main heading of the portal  -->
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<!-- some attricbutes at the nav bar  -->
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
					<ul>
						<?php 
						 // this list category fucntion helps to list the category 
							listCategory();
						?>
					</ul>
				</li>
				<?php 
				// if the user is admin then show the edit & deelte options 
				if(isset($_SESSION['using']) == true && $_SESSION['isAdmin'] == 1) {
					echo '<li><a href="adminCategories.php">Categories</a></li>';
					echo '<li><a href="adminArticles.php">Articles</a></li>';
				}
				?>
			</ul>
		</nav>
		<!-- fetchign the images for the page  -->
		<img src="images/banners/randombanner.php" />