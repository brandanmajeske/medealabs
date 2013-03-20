<?php 

require_once('models/UserProfileModel.php');
require_once('models/View.php');

$view = new View();
$model = new UserProfileModel();

$content_page = '';
// check if user profile exists then change view appropriately
if($model->check_for_profile() === false){
	$content_page = 'create_user_profile';
	$model->new_profile();
}else{
	$content_page = 'edit_user_profile';
}



$view->show('header');
$view->show($content_page);
$view->show('footer');
