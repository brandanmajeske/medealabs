<?php

require_once('inc/UserProfileHelper.php');
require_once('inc/Database.php');
require_once('inc/ProjectDatabaseHelper.php');


class UserProfileModel {

	// user profile CRUD functions


	public function new_profile(){

		// --  error checking  -- //
		$errors = array();
				

				if(empty($_POST) === false){
					$required_fields = array('user_bio');


					foreach($_POST as $key=>$value) {
						if (empty($value) && in_array($key, $required_fields) === true) {
							$errors[] = 'Please fill out all fields';
					
							return $errors;
							break;
						}
					}
				}
		// if no errors found add user_profile data to the database.
				if(empty($errors) === true){

					//get username for logged in user
					$user_name = $_SESSION['username'];
					// get user id for the logged in user
					$user_id = Database::user_id_query($user_name);
					$user_bio = isset($_POST['user_bio'])? $_POST['user_bio'] : null;
					// put profile data into array 
					$user_profile_data = array(
						'user_bio' => $user_bio,
						'user_id' => $user_id,
						'join_date' => ''
						);
					//call static function to insert profile data array into the database
					UserProfileHelper::new_profile($user_profile_data);
				}
	} // end new_profile

	// function to check if user already has a profile
	public function check_for_profile(){

				//get username for logged in user
				$user_name = $_SESSION['username'];
				// get user id for the logged in user
				$user_id = Database::user_id_query($user_name);
				//call static fucntion to check if user profile already exists
				UserProfileHelper::check_profile($user_id);

	}

}