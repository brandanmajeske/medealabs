<?php


require_once('inc/db.php');
require_once('models/ItemViewModel.php');
require_once('models/View.php');


$model = new ItemViewModel(MY_DSN, MY_USER, MY_PASS);
$view = new View();

$username = ucfirst($_SESSION['username']);


$view->show('header'); // Soon to be replaced by model->function action
$view->show('details', $username);
$view->show('footer');