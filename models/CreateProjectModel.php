<?php

require_once('inc/Database.php');

class CreateProjectModel {


	public function new_project(){
		
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

			$user_id = Database::user_id_query($_SESSION['username']);

			$proj_data = array(
				'proj_title' => $_POST['proj_title'],
				'proj_cat' => $_POST['proj_cat'],
				'proj_desc' => $_POST['proj_desc'],
				'user_id' => $user_id
				);

			//echo '<pre>',print_r($proj_data),'</pre>';
			Database::new_project($proj_data);

		}

		
	}






}// end CreateProjectModel