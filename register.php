<?php

// Se alla fel under development.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if( isset($_SESSION['user_id'])){
	header("Location: login.php");
}

require 'database.php';
 $message = '';//an empty variable connecting down there to print message to user 
 
if(!empty($_POST['email']) && !empty($_POST['password'])):

	

	
	//we received your email now we can verify if it is correct
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

	
	

	
		if( $stmt->execute() )://checking if the data was entered correctly
			$message = 'Successfully created new user';
		else:
			$message = 'Sorry there must have been an issue creating your account';
		
	
		endif;
endif;
	
	?>





<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>

</head>
<body>

<!--connecting with message variable above if not empty we print our message on the top page(successfully created new user)-->
        <div class="header">
		    <a href="/">Tk Web App </a>
	    </div>
		
		<?php if(!empty($message)): ?> 

			<p><?= $message ?></p>
		<?php endif; ?>

     <h1>Register</h1>
     <span>or <a href="login.php">login here</a></span>
     <form action="register.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="and password" name="password">
        <input type="password" placeholder="confirm password" name="confirm_password">
		
		<input type="submit">

	</form>

	<form action="logout.php" method="POST">
		
		<button>Logout</button>

	</form>



</body>
</html>