<?php

require_once('models/ProjectPostsModel.php');
require_once('models/EditProjectModel.php');
require_once('models/View.php');

//variables
$view = new View();
$model = new ProjectPostsModel();
$postmod = new ProjectPostsModel();
$editprojmod = new EditProjectModel();

//get the current project and assign to project variable
$project = $model->show_project_posts('project');
$content_page = '';
$proj_id = '';
$data2 = array();

// if getting the project and posts to display
if(isset($_GET['id'])){
	$proj_id = $_GET['id'];
	$postmod->get_posts($data2);
	$data2 = $postmod->get_posts('posts');
	$content_page = 'project_posts';
}

//if edit change the content page and call edit methods
if(isset($_GET['edit'])){
	$content_page = 'edit_project_form';
	$editprojmod->get_single_project();
	$project = $editprojmod->get_single_project('project_data');
	//echo '<pre>',print_r($project, true),'</pre>';
	$editprojmod->edit_project();
}
//if delete, call function to delete the current project
if(isset($_GET['delete'])){
	$proj_id = $_GET['delete'];
	$content_page = 'delete_project';
	$editprojmod->delete_project($proj_id);
}


//call views and pass the project data to the project_posts view
$view->show('header');
$view->show($content_page, $project, $data2);
$view->show('footer');