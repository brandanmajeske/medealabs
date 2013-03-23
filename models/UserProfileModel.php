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
					$required_fields = array('full_name','location', 'user_bio');


					foreach($_POST as $key=>$value) {
						if (empty($value) && in_array($key, $required_fields) === true) {
							$errors[] = 'Please fill out all fields';
					
							return $errors;
							break;
						}
					}
				}
		// if no errors found add user_profile data to the database.
				if(empty($_POST) === false && empty($errors) === true){

					$tmp_name = $_FILES['images']['tmp_name'];
					$uploadfilename = $_FILES['images']["name"];
					$saveddate=date("mdy-Hms");
					$newfilename = "./uploads/user_image/".basename($saveddate."-".$uploadfilename);
					$user_file = '';
					
					if($_FILES['images']['name']){
					$user_file = basename($saveddate."-".$uploadfilename);
					}
					//move file to storage
					move_uploaded_file($tmp_name, $newfilename);
					
					//get current user
					$user_name = $_SESSION['username'];
					// get user id for the logged in user
					$user_id = Database::user_id_query($user_name);
					$full_name = isset($_POST['full_name'])? $_POST['full_name'] : null;
					$location = isset($_POST['location'])? $_POST['location'] : null;
					$user_bio = isset($_POST['user_bio'])? $_POST['user_bio'] : null;
					
					// put profile data into array 
					$new_user_profile = array(
						'full_name' => $full_name,
						'location' => $location,
						'user_bio' => $user_bio,
						'user_id' => $user_id,
						'join_date' => ''
						);

					if($_FILES['images']['name']){
						$new_user_profile['user_file'] = $user_file;
					}
					//call static function to insert profile data array into the database
					UserProfileHelper::new_profile($new_user_profile);
				}
	} // end new_profile

	// function to check if user already has a profile
	public function check_for_profile(){
		
		//get username for logged in user
		$user_name = $_SESSION['username'];
		// get user id for the logged in user
		$user_id = Database::user_id_query($user_name);
		//call static fucntion to check if user profile already exists
		$result = UserProfileHelper::check_profile($user_id);
		//var_dump($result);
		return $result;
	}



	public function get_profile($user_profile_data){
		//get username for logged in user
		$user_name = $_SESSION['username'];
		// get user id for the logged in user
		$user_id = Database::user_id_query($user_name);
		//call static fucntion to get contents of user profile
		$user_profile_data = UserProfileHelper::get_user_profile($user_id);
		return $user_profile_data;
	}



	public function update_profile(){
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
				if(empty($_POST) === false && empty($errors) === true){

					$tmp_name = $_FILES['images']['tmp_name'];
					$uploadfilename = $_FILES['images']["name"];
					$saveddate=date("mdy-Hms");
					$newfilename = "./uploads/user_image/".basename($saveddate."-".$uploadfilename);
					$user_file = '';
					
					if($_FILES['images']['name']){
					$user_file = basename($saveddate."-".$uploadfilename);
					}
					//move file to storage
					move_uploaded_file($tmp_name, $newfilename);

					//get username for logged in user
					$user_name = $_SESSION['username'];
					// get user id for the logged in user
					$user_id = Database::user_id_query($user_name);
					$full_name = isset($_POST['full_name'])? $_POST['full_name'] : null;
					$location = isset($_POST['location'])? $_POST['location'] : null;
					$user_bio = isset($_POST['user_bio'])? $_POST['user_bio'] : null;
					// put profile data into array 
					$user_profile_data = array(
						'full_name' => $full_name,
						'location' => $location,
						'user_bio' => $user_bio,
						'user_id' => $user_id,
						);
					//if profile image is being updated push the file into the array
					if($_FILES['images']['name']){
						$user_profile_data['user_file'] = $user_file;
					}
					//call static function to insert profile data array into the database
					//echo '<pre>',print_r($user_profile_data, true),'</pre>';
					UserProfileHelper::update_profile($user_profile_data);
	}
}// end update_profile

}