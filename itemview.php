<?php session_start();

//check for user logged in  - redirect to auth page if not otherwise call ItemViewController

if(!$_SESSION['username']){
		header('Location: auth.php');
	} else {
		if($_GET['itemview']){

			include('controllers/ItemViewController.php');
		}
	}



?>