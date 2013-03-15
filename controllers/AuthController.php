<?php 
session_start();

require_once('inc/db.php');
require_once('models/AuthModel.php');
require_once('models/View.php');

$model = new AuthModel(MY_DSN, MY_USER, MY_PASS);
$view = new View();
$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

if(isset($_SESSION['username'])){
	$user = '';
	$contentPage = 'home';
}else{
	$user = '';
	$contentPage = 'signin';
} 

if (!empty($username) && !empty($password)) {
	$user = $model->getUserByNamePass($username, $password);
	if (is_array($user)) {

			$contentPage = 'loggedin';
			$_SESSION['username'] = $username;
			header('Location: home.php');
		}
	}

$view->show('header');
$view->show($contentPage);
$view->show('footer');	
