<?php 

require_once('models/IndexModel.php');
require_once('models/View.php');

$view = new View();
$model = new IndexModel();
$data = array();
$content_page = '';

if(isset($_GET['category'])){
	$content_page = 'by_categories';
	$category = $_GET['category'];
	$projects = $model->get_by_category($category);
	$categories = $model->get_category_count();
	$data['categories'] = $categories;

}else{
	$content_page = 'index';
	// get the 5 latest projects from the database
	$projects = $model->get_latest_activity('projects');
	// get a list of all the categories 
	$categories = $model->get_category_count();
	$data['categories'] = $categories;
}




//echo '<pre>',print_r($data),'</pre>';

$view->show('header');
$view->show($content_page, $projects, $data);
$view->show('footer');
