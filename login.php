<?php
	session_start();
				
	require 'header.php';


$login = isset($_POST['submit'])&&isset($_POST['email'])&&isset($_POST['password']);

if($login)
{
	
	$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email'); 

		$values=[
			'email' => $_POST['email']];
		
		$stmt->execute($values);
		$user = $stmt->fetch();

		if(password_verify($_POST['password'],$user['password']))
		{
			
 			$_SESSION['loggedin'] = $user['id'];
			$_SESSION['member'] = $user['email'];
			$_SESSION['login']  = true;

			if($user['admin']=='YES')
			{
			$_SESSION['admin']=true;	
			sendlink('adminArticles.php');						 
			}
			else
			{
				$_SESSION['admin']=false;
				sendlink('index.php');
			}

		}

		else
		{
			echo 'Sorry, your username and password could not be found';
			?>

			<article>
			<form action = "" method = "post">
			<p>Please Enter Admin Details To Login :</p>

			<label>E-mail</label> <input type="text" name ="email"/>
			<label>Password</label> <input type="password" name ="password"/>
			<input type="submit" name="submit" value="Submit" />

			</form>
			</article>
			<?php
		}

} 

else
{
	?>

		<article>
		<form action = "" method = "post">
		<p>Please Enter Admin Details To Login :</p>

		<label>E-mail</label> <input type="text" name ="email"/>
		<label>Password</label> <input type="password" name ="password"/>
		<input type="submit" name="submit" value="Submit" />

		</form>
		</article>
	<?php
}

	require 'footer.php';
	?>

	




