<?php

require_once('inc/Database.php');

class DisplayProjectsModel {

public function display_projects(){

	$user_id = Database::user_id_query($_SESSION['username']);

	
	$projects = Database::get_projects($user_id);
	return $projects;

}




}// end DisplayProjectsModel