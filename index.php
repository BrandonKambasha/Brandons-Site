<?php
	session_start();
	
	if(isset($_SESSION['login']))
	{
		$status = '"logout.php"> Logout';
	}
		
	require 'header.php';
	?>
	<article>

	<h2>These are the Latest 10 Articles added to the website.</h2>
	<?php
		//Code to select latest 10 records https://www.tutorialspoint.com/how-to-select-last-10-rows-from-mysql
			$results = $pdo->prepare('SELECT * FROM (
										SELECT * FROM article ORDER BY categoryId DESC LIMIT 10)
										Var1
										ORDER BY categoryId DESC;
										');
			$results->execute();
			
		foreach($results as $row=> $user)
		{
			echo '<li><a class="articleLink" href ="article.php?categoryId='.$user['categoryId'].'">' .$user["title"]. '</a></li>'.'<em>'.$user["publishDate"].'</em>';
			
		}
	?>
	</article>
	<?php	
		require 'footer.php';
	?>

	

