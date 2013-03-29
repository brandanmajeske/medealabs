<?php 

require_once('models/View.php');
require_once('models/ProjectPostsModel.php');

$view = new View();
$model = new ProjectPostsModel();
$content_page = '';


if(!isset($_SESSION['username'])){
	header('Location: auth.php');
	exit;
}


//assign to variable the proj id from the url
$proj_id = isset($_GET['proj_id'])? $_GET['proj_id'] : null;
$post_data = isset($post_data)? $post_data : null;
$errors = null;
// Check if adding a new post add to DB
if(isset($_GET['proj_id'])){
	$content_page = 'post';
	$proj_id = $_GET['proj_id'];
	$errors = $model->add_post($proj_id);
}

// Edit post change content page to show the edit form
if(isset($_GET['edit'])){
	//get the post id from the url
	$post_id = $_GET['edit'];
	//change content page to edit post
	$content_page = 'edit_post';
	//get the post contents to 
	$post_data = $model->get_single_post($post_id);
	$proj_id = $post_data['proj_id'];
	$model->edit_post($post_id,$proj_id);
	// get errors and assign to a variable to be passed to the view
	$errors = $model->edit_post($post_id, $proj_id);
}
// Delete post 
if(isset($_GET['delete'])){
	$post_id = $_GET['delete'];
	$content_page = 'delete_post';
	$post_data = $model->get_single_post($post_id);
	$proj_id = $post_data['proj_id'];
	$model->delete_post($post_id);
}

// show header content page and footer
$view->show('header');
$view->show($content_page, $errors, $post_data);
$view->show('footer');


?>

