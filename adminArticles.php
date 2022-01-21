<?php
session_start();
require 'header.php';


if(isset($_SESSION['login']) && ($_SESSION['admin']==true))
{
$status = '"logout.php"> Logout';
require 'nav.php';
?>

			<article>
            <h2>Articles Are here</h2>
				
			<?php

				

				$results = $pdo->prepare('SELECT * FROM article');
				$results->execute();
		
				

				foreach($results as $row=> $user)
		{
			
			echo '<p>'.$user["title"].'</p>'.'<em>'.$user["publishDate"].'</em>'."\n".'<li><a href="editArticle.php?title=' . $user['title'] . '"> Edit </a>'.'<a href="deleteArticle.php?title=' . $user['title']. '"> Delete </a></li>' ;
			
		}

			?>
			</article>
			<?php
}
else
{
	sendlink('login.php');
	$status = '"login.php"> Login';
}

require 'footer.php';
?>

