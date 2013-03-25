<?php 

require_once('inc/Database.php');
require_once('inc/ProjectDatabaseHelper.php');
require_once('inc/TwitterHelper.php');

class ProjectPostsModel {


	public function show_project_posts(){
		$proj_id = isset($_GET['id'])? $_GET['id'] : null;
		//$user_id = Database::user_id_query($_SESSION['username']);
		$project = ProjectDatabaseHelper::show_project($proj_id);
		return $project;

	} // end display_posts
	


	public function add_post($proj_id){
		$proj_id = $proj_id;
		$errors = array();

		if(empty($_POST) === false){
			$required_fields = array('post_title', 'post_text');

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
			$post_file ='';
			if($_FILES['images']['name']){

				$post_file = basename($saveddate."-".$uploadfilename);
			}
			move_uploaded_file($tmp_name, $newfilename);

			$user_id = Database::user_id_query($_SESSION['username']);

			$post_data = array(
				'post_title' => $_POST['post_title'],
				'post_text' => $_POST['post_text'],
				'proj_id' => $proj_id,
				'user_id' => $user_id,
				'post_date' => '',
				'post_file' => $post_file
				);

		
			ProjectDatabaseHelper::new_post($post_data);

		}


	} // end add_post

	// retrieve posts for a single project 
	public function get_posts($posts){

		$proj_id = $_GET['id'];

		$posts = ProjectDatabaseHelper::show_posts($proj_id);
		
		return $posts;

	} // end get_posts

	
	public function get_single_post($post_id){
		$post_id = $post_id;
		$post_data = ProjectDatabaseHelper::show_single_post($post_id);
		return $post_data;
	}// end get_single_post


	public function edit_post($post_id,$proj_id){
		$proj_id = $proj_id;
		$post_id = $post_id;
		//check if post data is empty and validate form data
		if(empty($_POST) === false){
		$required_fields = array('post_title', 'post_text');
			//check each required field return errors 
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

		//check for image upload
			

			$tmp_name = $_FILES['images']['tmp_name'];
			$uploadfilename = $_FILES['images']["name"];
			$saveddate=date("mdy-Hms");
			$newfilename = "./uploads/".basename($saveddate."-".$uploadfilename);
			//$post_file = null;
			if($_FILES['images']['name']){
				
				$post_file = basename($saveddate."-".$uploadfilename);
			}
			//move uploaded file to the uploads folder
			move_uploaded_file($tmp_name, $newfilename);
			//get user_id of the logged in user
			$user_id = Database::user_id_query($_SESSION['username']);
			//put post data into an array
			$post_data = array(
				'post_id' => $post_id,
				'post_title' => $_POST['post_title'],
				'post_text' => $_POST['post_text'],
				'proj_id' => $proj_id, 
				'user_id' => $user_id,
				'post_date' => '',
				
				);
			if($_FILES['images']['tmp_name']){
				$post_data['post_file'] = $post_file;
			}
			

			ProjectDatabaseHelper::update_post($post_data);
		
		} // end if

	} // end edit_post


	public function delete_post($post_id){

		ProjectDatabaseHelper::delete_post($post_id);

	} // end delete_post




} // end ProjectPostsModel