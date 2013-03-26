<?php

require_once('models/View.php');
require_once('models/SearchModel.php');

$view = new View();
$model = new SearchModel();
$content_page = '';
// some search code

if(isset($_GET['your_projects'])){

$content_page = 'search_user_projects_posts';
$model->single_user_project_search();

}else if(isset($_GET['your_posts'])){

$content_page = 'search_user_projects_posts';
$model->single_user_post_search();

}else{

$content_page = 'search';
$model->project_search();
}



$view->show('header');
$view->show($content_page);
$view->show('footer');

