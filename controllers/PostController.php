<?php 

require_once('models/View.php');
require_once('models/ProjectPostsModel.php');

$view = new View();
$model = new ProjectPostsModel();

//assign to variable the proj id from the url
$proj_id = $_GET['proj_id'];



$view->show('header');
$view->show('post');
$view->show('footer');



?>