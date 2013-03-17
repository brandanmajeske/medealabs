<?php

require_once('models/RegisterModel.php');
require_once('models/View.php');

//instantiate the RegisterModel and View class objects
$model = new RegisterModel();
$view = new View();

//call the registerCheck method to complete form validation and register user
$model->registerCheck();
//if errors occur pass the error array to the form view to display to the user
$errors = $model->registerCheck('errors');


//call views for register page
$view->show('header');
$view->show('register_form', $errors); 
$view->show('footer');
