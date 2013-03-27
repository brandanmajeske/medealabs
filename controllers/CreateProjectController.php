<?php 

require_once('inc/db.php');
require_once('inc/Database.php');
require_once('models/View.php');
require_once('models/CreateProjectModel.php');

//if user is not logged in show the login prompt
if(!isset($_SESSION['username'])) {
	header('Location: auth.php');
}

//instantiate the model and view
$model = new CreateProjectModel();
$view = new View();


//check for errors and assign error variable
$errors = $model->new_project('errors');

//call views and pass error variable
$view->show('header');
$view->show('create_project_form', $errors);
$view->show('footer');