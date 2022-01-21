<?php

$server = 'mysql';
$username = 'student';
$password = 'student';
$schema  = 'assignment1';

$pdo = new PDO('mysql:dbname='.$schema. ';host=' . $server,$username,$password);

			// code to redirect to adminArticles once logged in https://stackoverflow.com/questions/27123470/redirect-in-php-without-use-of-header-method

 function sendlink($location)
 {
    echo '<script type="text/javascript">window.location.href = "'.$location.'";</script>';
 }


?>
