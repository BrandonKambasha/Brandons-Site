
<?php

require 'connect.php';


$results = $pdo->prepare('SELECT * FROM category');
				$results->execute();

			
?>




<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>

				<li><a href="#">Select Category</a>
					<ul>
						<?php 	
						foreach($results as $row=> $user)
						{
							
							echo '<li><a class="articleLink" href=category.php?category='.$user['name'].'>'.$user['name'].'</a></li>' ;
						}
						?>
						
					</ul>
				</li>

				<li><a href="#">Member</a>
					<ul>
						<?php
						
						$status = '"login.php"> Login';
						$login = '<li><a href = '.$status.'</a></li>';
						$logout = '<li><a href ="logout.php"> Logout</a></li>';
						
						if(isset($_SESSION['login']))
						{
							echo $logout;
						}
						else{
						echo $login;
						}
						?>

						<li><a href = 'register.php'> Register</a></li>
					</ul>	
				</li>

				<li><a href="#">Admin Only</a>
					<ul>
					<li><a href = 'adminArticles.php'> Admin Articles</a></li>
					<li><a href = 'adminCategories.php'> Admin Categories</a></li>
					<li><a href = 'addArticle.php'> Add Article</a></li>
					<li><a href = 'addCategory.php'> Add Category</a></li>
					<li><a href = 'manageAdmin.php'> Manage Admins</a></li>

					</ul>
				</li>		


			</ul>
		</nav>
		<img src="images/banners/randombanner.php" />
		<main>