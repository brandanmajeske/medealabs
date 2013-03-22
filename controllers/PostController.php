<?php 

require_once('models/View.php');
require_once('models/ProjectPostsModel.php');

$view = new View();
$model = new ProjectPostsModel();
$content_page = '';
//assign to variable the proj id from the url
$proj_id = isset($_GET['proj_id'])? $_GET['proj_id'] : null;
$post_data = isset($post_data)? $post_data : null;

// Check if adding a new post add to DB
if(isset($_GET['proj_id'])){
	$content_page = 'post';
	$proj_id = $_GET['proj_id'];
	$model->add_post($proj_id);
	$errors = $model->add_post('errors',$proj_id);	
}

// Edit post change content page to show the edit form
if(isset($_GET['edit'])){
	$post_id = $_GET['edit'];
	$content_page = 'edit_post';
	$post_data = $model->get_single_post($post_id);
	$proj_id = $post_data['proj_id'];
	$model->edit_post($post_id,$proj_id);
	
	//print_r($post_data);

	$errors = $model->edit_post('errors',$proj_id);
}


$view->show('header');
$view->show($content_page, $errors, $post_data);
$view->show('footer');


?>

<!-- $postmod = new ProjectPostsModel();
$posts = array();
$postmod->get_posts($posts);
$posts = $postmod::get_posts('posts'); -->