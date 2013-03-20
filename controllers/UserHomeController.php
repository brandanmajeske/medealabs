<?php session_start();


require_once('inc/db.php');
require_once('models/DisplayProjectsModel.php'); // Model for generating dynamic content
require_once('models/View.php');

$view = new View();
$model = new DisplayProjectsModel();

/* check if user is either a new user or existing user and signed in
 *  change welcome message accordingly
*/
if(!isset($_SESSION['username'])){
	header('Location: auth.php');
}

$new_user = (isset($_GET['welcome']) && isset($_SESSION['username']));
if($new_user){
	$welcomemsg = "<p>Welcome to your Home Page! What would you like to do?</p>";
} else if(isset($_SESSION['username'])){
	$welcomemsg = "<p>Now that you're logged in, what would you like to do?</p>";
}

$projects = $model->display_projects();

$view->show('header');
$view->show('userhome', $projects, $welcomemsg);
$view->show('footer');	