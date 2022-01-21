<?php
session_start();

require 'header.php';


if(!isset($_SESSION['login']) && ($_SESSION['admin']==true))
{
    sendlink('login.php');

}
    require 'nav.php';
    ?>

    <article>
        <h2>Edit Articles here</h2>
        <p>Select an Article to Edit from the list below</p>


    

    <?php


    if(isset($_POST['submit']))
    {

        $result = $pdo->prepare('UPDATE category SET
        name=:name
        where (name=:oldname)
        ');
    
        unset ($_POST['submit']);
        $result->execute($_POST);
    
        echo '<p>You updated the record</p>';
    }
    else
    {
    
        $stmt = $pdo->prepare('SELECT * FROM category WHERE name=:name');

        $value = ['name' => $_GET['name']];

        $stmt->execute($value);
        $user = $stmt->fetch();

        ?>
        <form action = '' method = "POST">
        
        <label>Category Name</label> <input type="text" name='name' value="<?php echo $user['name'];?>"/>
        <input type="hidden" name='oldname' value="<?php echo $user['name'];?>"/>


        <input type="submit" name="submit" value="Edit & Submit" />
        </form>
        </article>
        <?php
   }

    require 'footer.php';
    ?>
                
        
    