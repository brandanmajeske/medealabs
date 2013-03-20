<?php

require_once('models/ProjectPostsModel.php');
require_once('models/View.php');

$view = new View();
$model = new ProjectPostsModel();

//get the current project and assign to project variable
$project = $model->show_project_posts('project');


//call views and pass the project data to the project_posts view
$view->show('header');
$view->show('project_posts', $project);
$view->show('footer');