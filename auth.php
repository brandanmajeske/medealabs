<?php session_start();
//check for user logged in  - redirect to user's home page if logged in, otherwise call AuthController

if(isset($_SESSION['username'])){
		header('Location: home.php');
	} else {
		include('controllers/AuthController.php');
	}






?>