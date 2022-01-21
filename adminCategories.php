<?php
session_start();
require 'header.php';


if(isset($_SESSION['login'])&& ($_SESSION['admin']==true))
{
$status = '"logout.php"> Logout';
require 'nav.php';
            
?>

                <article>
                <h2>Categories Are here</h2>
                    
                <?php

                $results = $pdo->prepare('SELECT * FROM category');
				$results->execute();

                foreach($results as $row=> $user)
		{
			
			echo $user["name"]. "\n".'<li><a href="editCategory.php?name=' . $user['name'] . '"> Edit </a>'.' '.'<a href="deleteCategory.php?name=' . $user['name']. '"> Delete </a></li>' ;
			
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