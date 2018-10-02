
<?php
// Se alla fel under development.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();//session start

if( isset($_SESSION['user_id'])){
	header("Location: login.php");
	
}


	

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password']))://we received your email now we can verify if it is correct
	


	//where we going to store our records that we get from database
	
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




    //defining logout function where session is unser and destroyed
    function logout($user_id)
   {
        unset($_SESSION['user_session']);
        session_destroy();
        return true;
   }

endif;
?>
	

	
    



<!DOCTYPE html>
<html>
<head>
	<title>Login Below</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
        <div class="header">
		    <a href="/">Tk Web App </a>
	    </div>

		<?php if(!empty($message)): ?> 

			<p><?= $message ?></p>
		<?php endif; ?>


     <h1>Login</h1>
     <span>or <a href="register.php">register here</a></span>

     <form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">
		
		<input type="submit">

	</form>