
<?php

require 'header.php';

$isregistry = isset($_POST['submit'])&& isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password']);
if($isregistry)
{
	$stmt = $pdo->prepare('INSERT INTO users (email,password,name)
							 VALUES (:email,:password,:name)');

		$values = 
		[
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
		];

	$stmt->execute($values);

	if($stmt->rowCount()>0&&$_POST['name']!=""&&$_POST['email']!=""&&$_POST['password']!="")
	{
		echo "<p>"."You have successfully been registered! ". $_POST['name']."</p>"."<p>"." Click here to login: "."</p>". "<a href ='login.php'>Login</a>";
	}
	else
	{
		echo "Please enter details to be registered";
	}

}

?>

<article>
				<h2>Register</h2>
				<p>Enter your details to register an account with the Northampton newspaper.</p>
				<p><li>Once you have entered your details successfully a link will appear prompting you to click it to allow you to login.</li></p>


				<form action = "" method= "post">
					<p>Enter registration details here:</p>

                    
                    <label>Name</label> <input type="text"  name="name"/>
					<label>Email</label> <input type="text" name="email"/>
					<label>Password</label> <input type="password" name = "password"/>
					

					<input type="submit" name="submit" value="Submit" />
				</form>
			</article>
	<?php
	require 'footer.php';
	?>