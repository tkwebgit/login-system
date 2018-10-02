<?php
// Se alla fel under development.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require 'database.php';

if( isset($_SESSION['user_id']) ) {

	session_start(); //start session
	$_SESSION['user_id']= $row['user_id'];
	

}

$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);//binding the email parameter with the posted email that the user submitted
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC); //fetches the email address or the record where the users email address matches what the user has posted.
	


	
	   
	
    if(password_verify($_POST["password"],$results['password'])){

	
		echo "Welcome"; 
		
		}
		else {
			echo "Wrong Password";	
		}




?>

<!DOCTYPE html>
<html>
<head>
     <title>TK wEB App</title>
	 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
        <div class="header">
		    <a href="/">Tk Web App </a>
	    </div>

		<?php if( !empty($user) ): ?>

		  <br />Welcome. <?= $user['email']; ?>
		  <br /><br> />You are successfully logged in! 
		  <br /><br />      
		 <a href="logout.php">Logout?</a>
        <?php else: ?>

<h1>Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php">Register</a>
		<?php endif; ?>
</body>

</html>