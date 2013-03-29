<?php

require_once('models/View.php');
require_once('models/SearchModel.php');

$view = new View();
$model = new SearchModel();
$content_page = '';

// if user is searching projects get the project
if(isset($_GET['your_projects'])){
// set the content page to be the user project search page
// and call the single user project search method
$content_page = 'search_user_projects_posts';
$model->single_user_project_search();
// if user is searching single user posts
}else if(isset($_GET['your_posts'])){
// set content page to be the search user posts page
$content_page = 'search_user_projects_posts';
//call the single user post search method
$model->single_user_post_search();

}else{
// set content page to be the search page and call the project search method
$content_page = 'search';
$model->project_search();
}

//show views of header, content page and footer

$view->show('header');
$view->show($content_page);
$view->show('footer');

