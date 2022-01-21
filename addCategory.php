<?php

session_start();

require 'header.php';
require 'nav.php';

if(isset($_SESSION['login'])&& ($_SESSION['admin']==true))
{
    if(isset($_POST["submit"]))
    {

        $stmt = $pdo->prepare('INSERT INTO category(name)
                                 VALUES (:name)');
    
    unset($_POST['submit']);
    $stmt->execute($_POST);
    
    echo '<h2>'.$_POST['name']." ".'has been added'.'<h2>';

        
    }
    else
    {
        ?>
        <article>
            <h2> Add a Category </h2>
            <form action='' method='post'>
                <label>Category Name</label> <input type='text' name= 'name'/>
                <input type='submit' name="submit"/>
            </form>
    
    </article>
        <?php
    
    }
    
}
else
{
    sendlink('login.php');
}


require 'footer.php';

?>
