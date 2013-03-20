<?php 

require_once('inc/Database.php');
require_once('inc/ProjectDatabaseHelper.php');

class ProjectPostsModel {


	public function show_project_posts(){
		$proj_id = $_GET['id'];
		$user_id = Database::user_id_query($_SESSION['username']);
		$project = ProjectDatabaseHelper::show_project($user_id, $proj_id);
		return $project;

	} // end display_posts
	


	public function add_post(){

	} // end add_post




	public function update_post(){

	} // end update_post




	public function delete_post(){

	} // end delete_post




} // end ProjectPostsModel