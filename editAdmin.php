<?php
session_start();
require 'header.php';
require 'nav.php';

if($_SESSION['admin']==false&&!isset($_SESSION['login']))
{
    sendlink('index.php');
}
else
{

    ?>

    <article>
                    <h2>Edit Admin Accounts here</h2>
                   
    
        <?php
    
    
        if(isset($_POST['submit']))
        {
    
            $result = $pdo->prepare('UPDATE users SET name=:name,email=:email,admin=:admin,password=:password
            WHERE (email=:oldemail)');
            
        
        $value1 = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
            'admin' => $_POST['admin'],
            'oldemail' => $_POST['oldemail'],
			'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
		];
            $result->execute($value1);
        
        echo '<p>You updated the record</p>';
        }
        else
        {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email=:email');

            $value = ['email' => $_GET['email']];

            $stmt->execute($value);
            $user = $stmt->fetch();

        
            ?>
            <form action = '' method = "POST">
            
            <label>Admin Account Email</label> <input type="text" name='email' value="<?php echo $user['email'];?>"/>
            <input type="hidden" name='oldemail' value="<?php echo $user['email'];?>"/>
            <label>Admin Account Name</label> <input type="text" name='name' value="<?php echo $user['name'];?>"/>
            <label>New Password</label> <input type="password" name='password'/>
            <label>Admin</label>
            <select name = 'admin'>
                <option >YES</option>
                <option>NO</option>
            </select>    





            <input type="submit" name="submit" value="Edit & Submit" />
            </form>
            <?php
        }
    
                           

}
require 'footer.php';
?>