<?php


require_once('inc/db.php');
require_once('models/ItemViewModel.php');
require_once('models/View.php');


$model = new ItemViewModel(MY_DSN, MY_USER, MY_PASS);
$view = new View();

$username = $_SESSION['username'];


$view->show('header');
echo '<h2>The Item View Page for '.ucfirst($username).'</h2>'; // Soon to be replaced by model->function action
$view->show('footer');