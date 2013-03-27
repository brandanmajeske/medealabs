<?php 

require_once('inc/db.php');
require_once('models/AuthModel.php');
require_once('models/View.php');

//variables
$model = new AuthModel(MY_DSN, MY_USER, MY_PASS);
$view = new View();
$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);


//if user is logged in show the home page else show the signin page
if(isset($_SESSION['username'])){
	$user = '';
	$contentPage = 'home';
}else{
	$user = '';
	$contentPage = 'signin';
} 

 /* if username and password entered call the getUserByNamePass function
 *  then show user as logged and change header to the user home page.
 */
if (!empty($username) && !empty($password)) {
	$user = $model->getUserByNamePass($username, $password);
	if (is_array($user)) {

			$contentPage = 'loggedin';
			$_SESSION['username'] = $username;
			header('Location: home.php');
		}
	}
//call views for pages
$view->show('header');
$view->show($contentPage);
$view->show('footer');	
