<?php

require_once('inc/ProjectDatabaseHelper.php');
require_once('inc/Database.php');

class SearchModel {

	public function project_search(){

		$rows = ProjectDatabaseHelper::get_projects();
		//return $rows;

	} // end project search


	public function single_user_project_search(){

		$user_id = Database::user_id_query($_SESSION['username']);
		ProjectDatabaseHelper::get_user_projects($user_id);

	}

	public function single_user_post_search(){

		$user_id = Database::user_id_query($_SESSION['username']);
		ProjectDatabaseHelper::get_user_posts($user_id);

	}
	
} // end SearchModel