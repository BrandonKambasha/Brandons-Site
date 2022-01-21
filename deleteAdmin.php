<?php
session_start();
if(!isset($_SESSION['login']) && ($_SESSION['admin']==false))
{
    sendlink('login.php');

}
require 'header.php';
require 'nav.php';


$results = $pdo->prepare('DELETE FROM users WHERE email=:email');
				$values = ['email'=>$_GET['email']];
				$results->execute($values);



?>        

<article>

<h2>Admin account <?php echo " ".$_GET['email']; ?> has been deleted</h2>
<a href="manageAdmin.php">Click Here to return to the articles</a>

</article>
<?php
require 'footer.php';
?>