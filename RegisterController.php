<?php

require_once('models/RegisterModel.php');
require_once('models/View.php');


$model = new RegisterModel();
$view = new View();
$view->show('header');

/*$result = array();
$users = $model->test_connection($result);
print_r($users);*/

$model->registerCheck();
$errors = $model->registerCheck('errors');



$success = isset($_GET['success']) ? $_GET['success'] : null;
	
	if (isset($success) === true && empty($error) === true){
		$view->show('action_list');
		$view->show('new_user');
	} else {
		$view->show('register_form', $errors);
	}	
	
	$view->show('footer');
