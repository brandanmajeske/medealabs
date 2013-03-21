<?php

class ContactModel {

	public function __construct() {
		
	}

	public function postCheck(){

		if(empty($_POST) === false ){
			//echo '<pre>', print_r($_POST, true), '</pre>';

			$errors = array();

			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			//echo $name, ' ', $email, ' ', $message;  

			if(empty($name) === true || empty($email) === true || empty($message) === true) {
				$errors[] = 'Name, Email and Message are required!';
			}else{
				if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
					$errors[] = 'Please enter a valid email address!';
				}
				if (ctype_alpha($name) === false){
					$errors[] = 'Name must only contain letters!';
				}		
			}

			//print_r($errors);

		}

		if(empty($errors) === false){
			return $errors;
		}

	
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			mail('some_fake_email@testemailX.com', 'Contact Form', $message, 'From: . $email');
			header('Location: contact.php?sent');
			exit();		
		}

	}
}