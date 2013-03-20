<?php 

require_once('models/UserProfileModel.php');
require_once('models/View.php');

$view = new View();
$model = new UserProfileModel();
$errors = array();
$content_page = '';
// check if user profile exists then change view appropriately
if($model->check_for_profile() === false){
	$content_page = 'create_user_profile';
	$model->new_profile();
}else{
	$content_page = 'edit_user_profile';
	$user_profile_data = $model->get_profile('user_profile_data');

}
// if the updated bio has been submitted via the form call update_profile
if(isset($_GET['update'])){
	$model->update_profile();
}



$view->show('header');
$view->show($content_page, $errors, $user_profile_data);
$view->show('footer');
