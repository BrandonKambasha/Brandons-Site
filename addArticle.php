<?php
session_start();

require 'header.php';
require 'nav.php';

$results = $pdo->prepare('SELECT * FROM category');
$results->execute();

if(isset($_SESSION['login']) && ($_SESSION['admin']==true))
{
    ?>
    <article>
    <h2>Add an Article</h2>
    <p>Fill in the fields below to create an article, then click submit once done to add the article to the website</p>
    
    
    <html>
    
    <form action='' method='post'>
    
    <label>Title</label> <input type="text" name = 'title'/>
    <input type="hidden" name = 'publishDate' value = '<?php echo date('Y-m-d'); ?>'/>
    <label>Content</label> <textarea name = 'content'></textarea>
    <label>Category</label>
    <select name = 'category'>
       
        <?php
                foreach($results as $row=> $user)
						{
							
							echo  '<option>'.'<li><a class="articleLink" href=category.php?category='.$user['name'].'>'.$user['name'].'</a></li>'.'</option>' ;
						}
        ?>
        
    </select>        
    
    
    <input type="submit" name="submit" value="Submit" />
    
    
    <?php
    
    
    $true = (isset($_POST['title'])&&isset($_POST['publishDate'])&&isset($_POST['content'])&&isset($_POST['category']));
    
    if($true)
    {
    
    $stmt = $pdo->prepare('INSERT INTO article (title,publishDate,content,category)
                                 VALUES (:title,:publishDate,:content,:category)');
    
    unset($_POST['submit']);
    $stmt->execute($_POST);
    
       // echo '<article>';
        echo '<li>'.$_POST['title'].' has been added to the category '.$_POST['category'];
        echo '</article>';
    
    }
    
    
}
else
{
    sendlink('login.php');
}

require 'footer.php';
?>


