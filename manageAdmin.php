<?php
session_start();

require 'header.php';


if(isset($_SESSION['login']) && ($_SESSION['admin']==true))
{

    $status = '"logout.php"> Logout';
    require 'nav.php';
    
    
    ?>
    <article>
	<h2>These are the admins</h2>
	<p><a href="addAdmin.php">ADD AN ADMIN ACCOUNT HERE</a></p>

	<?php

		$results = $pdo->prepare('SELECT * FROM users WHERE admin="YES"');
		$results->execute();

		foreach($results as $row=> $user)
		{
			echo 'Name: '.$user["name"]."Email: ".$user["email"]."\n".'<ul>'."<li>". '<a href = deleteAdmin.php?email='.$user['email'].'>Delete Admin</a>'.' '.'<a href = editAdmin.php?email='.$user['email'].'> Edit Admin</a>'."</li>".'</ul>';
			
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


