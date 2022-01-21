<?php
session_start();

require 'header.php';
require 'nav.php';


if(isset($_SESSION['login']) && ($_SESSION['admin']==true))
{
    ?>
    <article>
    <h2>Add an Admin</h2>
    <p>Fill in the fields below to create an admin account</p>
    
    
    <html>
    
    <form action='' method='post'>
    
    <label>Name</label> <input type="text" name = 'name'/>
    <label>Email</label> <input type="text" name = 'email'/>
    <input type="hidden" name = 'admin' value = 'YES'/>
    <label>Password</label> <input type="password" name = 'password'/>
    <input type="submit" name="submit" value="Submit" />
    </html>
    </article>
    <?php

    if(isset($_POST['submit']))
    {
        $stmt = $pdo->prepare('INSERT INTO users (name,email,password,admin)
        VALUES (:name,:email,:password,:admin)');

$values = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'admin' =>$_POST['admin'],
    'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
];

$stmt->execute($values);
        

        echo '<ul>';
        echo 'Account of'.'<li>'.$_POST['name'].' '.' with an email of '.$_POST['email'].' has been added!';
        echo '</ul>';

    }
    }

else
{
    sendlink('login.php');
}

require 'footer.php';