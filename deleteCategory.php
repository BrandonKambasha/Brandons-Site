<?php
session_start();
if(!isset($_SESSION['login']) && ($_SESSION['admin']==false))
{
    sendlink('login.php');

}
require 'header.php';
require 'nav.php';


$results = $pdo->prepare('DELETE FROM category WHERE name=:name');
				$values = ['name'=>$_GET['name']];
				$results->execute($values);



?>        

<article>

<h2>Category <?php echo " ".$_GET['name']; ?> has been deleted</h2>
<a href="adminCategories.php">Click Here to return to the categories</a>

</article>
<?php
require 'footer.php';
?>