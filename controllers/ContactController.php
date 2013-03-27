<?php 
require_once('inc/db.php');
require_once('models/View.php');
require_once('models/ContactModel.php');

$model = new ContactModel();
$view = new View();

//call the postCheck function to check for form validation
$model->postCheck();
//pass errors to the view in the errors array
$errors = $model->postCheck('errors');
$view->show('header');
$view->show('contact_form', $errors);
$view->show('footer');