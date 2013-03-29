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

	public function newsletter(){

		$errors = array();
				

				if(empty($_POST) === false){
					$required_fields = array('newsletter');


					foreach($_POST as $key=>$value) {
						if (empty($value) && in_array($key, $required_fields) === true) {
							$errors[] = 'Please enter an email address';
							
							break;
						}
					}

				}
				// newsletter form validation
				if(empty($errors) === true){

					$email = (isset($_POST['newsletter'])) ? $_POST['newsletter'] : null;
					if(isset($email)){

						if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
							$errors[] = 'A valid email address is required';
							echo '<pre>',print_r($errors, true),'</pre>';

						}
					}
				}

				if(empty($_POST) === false && empty($errors) === true) {
				
				$email = $_POST['newsletter'];
				
				//echo '<pre>',print_r($newsletter_reg_user, true),'</pre>';
				IndexDatabaseHelper::register_newsletter($email);

		} 

				





	} // end newsletter

} // end IndexModel