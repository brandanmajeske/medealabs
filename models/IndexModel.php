<?php

require_once('inc/IndexDatabaseHelper.php');

class IndexModel {

	// method to show most recent activity on Medea Labs
	public function get_latest_activity(){

		$projects = IndexDatabaseHelper::get_latest_projects();	
		return $projects;

	}// end get_latest_activity

	public function get_category_count(){

		$category_count = IndexDatabaseHelper::get_category_count();
		return $category_count;
	}

	public function get_by_category($category){
		$by_category = IndexDatabaseHelper::get_by_category($category);
		return $by_category;
	}

} // end IndexModel