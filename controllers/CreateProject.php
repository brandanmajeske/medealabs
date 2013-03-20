<?php 

require_once('inc/db.php');
require_once('inc/Database.php');
require_once('models/View.php');
require_once('models/CreateProjectModel.php');

if(!isset($_SESSION['username'])) {
	header('Location: auth.php');
}

$model = new CreateProjectModel();
$view = new View();



$errors = $model->new_project('errors');

$view->show('header');

$view->show('create_project_form', $errors);

$view->show('footer');