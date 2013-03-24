<?php 

require_once('models/UserProfileModel.php');
require_once('models/View.php');

$view = new View();
$model = new UserProfileModel();
$errors = array();
$content_page = '';
$user_profile_data = null;

// check if user profile exists then change view appropriately
//$model->check_for_profile();
$result = $model->check_for_profile('result');


if(!$result){
	//echo 'its false';
	$content_page = 'create_user_profile';
	$errors = $model->new_profile('errors');
}else{
	//echo 'its true';
	$content_page = 'edit_user_profile';
	//echo $_SESSION['username'];
	//$model->get_profile();
	$user_profile_data = $model->get_profile('user_profile_data');
}
	

// if the updated bio has been submitted via the form call update_profile
if(isset($_GET['update'])){
	$model->update_profile();
}

if(isset($_GET['delete'])){
	$model->delete_user_profile();
}

$view->show('header');
$view->show($content_page, $errors, $user_profile_data);
$view->show('footer');