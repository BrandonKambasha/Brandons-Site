<?php
session_start();
require 'header.php';

$stmt = $pdo->prepare('SELECT * FROM article WHERE categoryId=:categoryId');

$person = $pdo->prepare('SELECT * FROM users WHERE id=:id');

        $value = ['categoryId' => $_GET['categoryId']];

        $stmt->execute($value);
        $user = $stmt->fetch();
        
			
		?>

                <article>

                <h1><?php echo $user['title'] ?></h1>
                <em><?php echo $user['publishDate'] ?> </em>
                <p><?php echo $user['content'] ?></p>

         <?php       
         if(isset($_SESSION['login']))
         {

                if(isset($_POST['submit']))
                {
                        $results = $pdo->prepare('INSERT INTO comment(commentText,userId,articleTitle) 
                                                       VALUES(:commentText,:userId,:articleTitle)');
                       
                       $values = ['commentText'=> $_POST['commentText'],
                                  'userId'=>$_SESSION['loggedin'],
                                  'articleTitle'=>$user['title']];
                       $results->execute($values);
       
                      
                }   
         ?>        
                <form action="" method ="post">
                        
                <label>Add a comment here</label> <textarea name='commentText' ></textarea>
                <input type = 'submit' name = 'submit' value= 'Submit'>


                
         <?php  
         $comment = $pdo->prepare('SELECT * FROM comment WHERE articleTitle=:articleTitle');
         
                $outcome = [
                        'articleTitle' => $user['title']
                ];
         
         $comment->execute($outcome);

         foreach($comment as $message)
         {
                $values = [
                        'id' => $message['userId']
                        ]; 
                
                $person->execute($values);
                $rowResult = $person->fetch();

                echo '<li>'.$rowResult['name'] .' '.' posted the message <strong>' . $message['commentText'] . '</strong>'.'</li>';
                
        }
        
}
        require 'footer.php';
         ?>
        
