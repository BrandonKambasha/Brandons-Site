<?php
session_start();

require 'header.php';
require 'nav.php';


if(!isset($_SESSION['login']) && ($_SESSION['admin']==true))
{
    sendlink('login.php');

}

    ?>

    <article>
			<h2>Edit Articles here</h2>
			<p>Select an Article to Edit from the list below</p>


    

    <?php


    if(isset($_POST['submit']))
    {

        $result = $pdo->prepare('UPDATE article SET
        title=:title,content=:content,category=:category
        where (title=:oldtitle)
        ');
    
        unset ($_POST['submit']);
        unset ($_POST['oldCategory']);
        $result->execute($_POST);
    
        echo '<p>You updated the record</p>';

                       
    }
    else
    {
    
        $stmt = $pdo->prepare('SELECT * FROM article WHERE title=:title');

        $value = ['title' => $_GET['title']];

        $stmt->execute($value);
        $user = $stmt->fetch();

       
        $results = $pdo->prepare('SELECT * FROM category');
        $results->execute();
        

        ?>
        <form action = '' method = "POST">
        
        <label>Article Title</label> <input type="text" name='title' value="<?php echo $user['title'];?>"/>
        <input type="hidden" name='oldtitle' value="<?php echo $user['title'];?>"/>
        <label>Article Content</label><textarea name='content' value="<?php echo $user['content'];?>"></textarea>
        <label>Current Category</label><input type="text" name='oldCategory' value="<?php echo $user['category']?>"/>

        <label>New Category</label>
        <select name = 'category'>
       
        <?php
                foreach($results as $row=> $user)
						{
							echo '<option>'.'<li><a class="articleLink" href=category.php?category='.$user['name'].'>'.$user['name'].'</a></li>'.'</option>' ;
						}
        ?>
            </select>     
            <input type="submit" name="submit" value="Edit & Submit" />
            </form>
            </article>
        <?php
	

    }

    require 'footer.php';
    ?>
                
        
   