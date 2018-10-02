<?php

// Se alla fel under development.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$username ='root';
$password = '';
$database = 'auth';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
if(!empty($_POST['email']) && !empty($_POST['password']))://we received your email now we can verify if it is correct
    //enter the new user to the database
endif;

?>