<?php 

require_once 'db.php';


class Database {


private $db;
		

public function __construct($dsn, $user, $pass) {
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	
	} // END __construct

public function user_exists($username) {

	$this->db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$statement = $this->db->prepare("
		SELECT * FROM users WHERE user_name = :user_name;
		");

	try {
		$statement->bindValue("user_name", $username, PDO::PARAM_STR);
		if ($statement->execute()){
			$result = $statement->fetch(\PDO::FETCH_BOUND);
			return $result;
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		}
}


public function email_exists($email) {

	$this->db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$statement = $this->db->prepare("
		SELECT * FROM users WHERE email ='$email';
		");

	try {
		if ($statement->execute(array(':email' => $email))){
			$result = $statement->fetch(\PDO::FETCH_BOUND);
			return $result;
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';		
		}

}

public function register_user($register_data){
	$this->db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	
	$user_name =  strtolower($register_data['user_name']);
	$salt = $register_data['salt'];
	$password = $register_data['password'];
	$email = strtolower($register_data['email']);
	$full_name = strtolower($register_data['full_name']);

	$fields = '`'. implode('`, `', array_keys($register_data)) . '`';


	$statement = $this->db->prepare("
		INSERT INTO users ($fields) 
		VALUES (:user_name, :password, :full_name, :salt, :email);
		");

	try {
		$statement->bindValue("user_name", $user_name, PDO::PARAM_STR);
		$statement->bindValue("password", hash("MD5",$salt.$password), PDO::PARAM_STR);
		$statement->bindValue("full_name", $full_name, PDO::PARAM_STR);
		$statement->bindValue("salt", $salt, PDO::PARAM_STR);
		$statement->bindValue("email", $email, PDO::PARAM_STR);
		if ($statement->execute()){		


			//header('Location: home.php?welcome_new_user');
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
	}
}

}