<?php

require_once('inc/Database.php');
require_once('inc/ProjectDatabaseHelper.php');

class EditProjectModel {


	public function get_single_project(){
		$proj_id = $_GET['edit'];
		$project_data = ProjectDatabaseHelper::show_project($proj_id);
		return $project_data;
		//echo '<pre>',print_r($project_data, true),'</pre>';


	}// end get_single_project


	public function edit_project(){
		
		$errors = array();

		if(empty($_POST) === false){
			$required_fields = array('proj_title', 'proj_cat', 'proj_desc');

			foreach($_POST as $key=>$value) {
				if (empty($value) && in_array($key, $required_fields) === true){
					$errors[] = 'Please fill out all fields';
					return $errors;
					break;

				}
			}	
		} // end if

		//if errors are empty 
		if(empty($_POST) === false && empty($errors) === true){
			
			$tmp_name = $_FILES['images']['tmp_name'];
			$uploadfilename = $_FILES['images']["name"];
			$saveddate=date("mdy-Hms");
			$newfilename = "./uploads/".basename($saveddate."-".$uploadfilename);
			$proj_file = '';
			if($_FILES['images']['name']){
				$proj_file = basename($saveddate."-".$uploadfilename);
			}
			move_uploaded_file($tmp_name, $newfilename);

			//get user_id for the username logged in
			$user_id = Database::user_id_query($_SESSION['username']);


			$proj_id = $_GET['edit'];
			//create array for the project data to be inserted into database
			$proj_data = array(
				'proj_id' => $proj_id,
				'proj_title' => $_POST['proj_title'],
				'proj_cat' => $_POST['proj_cat'],
				'proj_desc' => $_POST['proj_desc'],
				'user_id' => $user_id,
				'proj_date' => ''
				);

		
			if($_FILES['images']['name']){
				$proj_data['proj_file'] = $proj_file;
			}
			//echo '<pre>',print_r($proj_data, true),'</pre>';
			ProjectDatabaseHelper::update_project($proj_data);

		}

	}






}// end CreateProjectModel