<?php
session_start();
if(!isset($_SESSION['login']) && ($_SESSION['admin']==false))
{
    sendlink('login.php');

}
require 'header.php';
require 'nav.php';


$results = $pdo->prepare('DELETE FROM article WHERE title=:title');
				$values = ['title'=>$_GET['title']];
				$results->execute($values);



?>        

<article>

<h2>Article <?php echo " ".$_GET['title']; ?> deleted</h2>
<a href="adminArticles.php">Click Here to return to the articles</a>

</article>
<?php
require 'footer.php';
?>