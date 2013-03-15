<?php session_start();


require_once('inc/db.php');
//require_once('models/*****.php');
require_once('models/View.php');

$view = new View();

//check if user is signed in
if(isset($_SESSION['username'])){
	$welcomemsg = "<p>Now that you're logged in, what would you like to do?</p>";
}else {
	header('Location: auth.php'); // if user is not signed in redirect to the sign-in page.
}

$view->show('header');
echo $welcomemsg;
echo '<p>Note: Dynamically generated user content will display here</p>';
$view->show('footer');	