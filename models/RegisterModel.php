<?php

require_once('inc/Database.php');

class RegisterModel { 


	public function registerCheck(){
				
				$errors = array();
				

				if(empty($_POST) === false){
					$required_fields = array('user_name', 'password', 'password_confirm', 'full_name', 'email');


					foreach($_POST as $key=>$value) {
						if (empty($value) && in_array($key, $required_fields) === true) {
							$errors[] = 'Please fill out all fields';
							break;
						}
					}

				}
				
				if(empty($errors) === true){

				$username = (isset($_POST['user_name'])) ? $_POST['user_name'] : null;
				if(isset($username)){
					$user_check = Database::user_exists($_POST['user_name']);
				
					if($user_check === true){
					$errors[] = "Sorry the username '".$_POST['user_name']."' already exists";
					}
				} // end username isset
		
				$passwd = (isset($_POST['password'])) ? $_POST['password'] : null;
				$passwd_confirm = (isset($_POST['password_confirm'])) ? $_POST['password_confirm'] : null;

				if((isset($passwd)) && isset($passwd_confirm)){
					if (strlen($passwd) < 6) {
						$errors[] = 'Your password must contain at least 6 characters';
					}

					if ($passwd !== $passwd_confirm) {
						$errors[] = 'Your passwords do not match';
					}

				}// end password isset



				$email = (isset($_POST['email'])) ? $_POST['email'] : null;
				if(isset($email)){

					if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
						$errors[] = 'A valid email address is required';
					}

					$email_check = Database::email_exists($email);
					if($email_check === true){
						$errors[] = "Sorry the email '".$email."'' is already in use";
					}
				}// end isset email
				
				// check if user acknowledged the terms of service
				if(empty($_POST) === false && empty($_POST['tos'])){
					$errors[] = 'Please read and agree to the Terms of Service';
					}
				} // end terms of service

		//Start Register User
		if(empty($_POST) === false && empty($errors) === true) {
			$salt = getdate();
			$register_data = array(
				'user_name' =>  $_POST['user_name'],
				'password'  =>  $_POST['password'],
				'full_name' =>  $_POST['full_name'],
				'salt'      =>  $salt[0],
				'email'     =>  $_POST['email']
				);
			
			Database::register_user($register_data);
			exit();
		} 

		// End Register User

		if (empty($errors) === false) {
			return $errors;
		}
	}
			

} // end RegisterModel