<?php
session_start();

unset($_SESSION['login']);
require 'header.php';

?>
<article>
<?php    
echo "You are logged out!!!";
echo '</article>';

require 'footer.php';
?>





