<?php
session_start();
require 'header.php';

$stmt=$pdo->prepare('SELECT * FROM article WHERE category=:category');

$values= ['category'=>$_GET['category']];

$stmt->execute($values);

foreach($stmt as $row=> $user)
						{
							echo '<article>';
                            echo '<h3>'.'<ul>'.'<li>'.'Article Title: '.'<a class="articleLink" href=article.php?categoryId='.$user['categoryId'].'>'.$user['title'].'</a>'.'</li>'.$user['publishDate'].'</ul>'.'</h3>';
                            echo '</article>';
						}

require 'footer.php';
?>