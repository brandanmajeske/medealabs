<?php 

require_once('inc/Database.php');
require_once('inc/ProjectDatabaseHelper.php');

class ProjectPostsModel {


	public function show_project_posts(){
		$proj_id = $_GET['id'];
		//$user_id = Database::user_id_query($_SESSION['username']);
		$project = ProjectDatabaseHelper::show_project($proj_id);
		return $project;

	} // end display_posts
	


	public function add_post($proj_id){
		$proj_id = $proj_id;
		$errors = array();

		//post_title
		//post_text
		//proj_id
		//user_id
		//image_id

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
			$post_file = basename($saveddate."-".$uploadfilename);

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

			echo '<pre>',print_r($post_data),'</pre>';
			ProjectDatabaseHelper::new_post($post_data);

		}


	} // end add_post

	// retrieve posts for a single project 
	public function get_posts($posts){

		$proj_id = $_GET['id'];

		$posts = ProjectDatabaseHelper::show_posts($proj_id);
		
		return $posts;

	} // end get_posts

		

	public function update_post(){

	} // end update_post


	public function delete_post(){

	} // end delete_post




} // end ProjectPostsModel