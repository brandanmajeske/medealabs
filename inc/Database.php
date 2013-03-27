<?php 

require_once('inc/db.php');
require_once('inc/error_log.php');

// Helpers //

class Database {

//private $db;

//private $db;
private $db_error = '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: ';	

/*public function __construct($dsn, $user, $pass) {
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	
	} // END __construct*/

public static function user_exists($username) {

	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$statement = $db->prepare("
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
		echo $db_error.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
		}
} // end user_exists


public static function email_exists($email) {

	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$statement = $db->prepare("
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
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
		}

} // end email_exists

public static function register_user($register_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	
	$user_name =  strtolower($register_data['user_name']);
	$salt = $register_data['salt'];
	$password = $register_data['password'];
	$email = strtolower($register_data['email']);
	$full_name = strtolower($register_data['full_name']);

	$fields = '`'. implode('`, `', array_keys($register_data)) . '`';


	$statement = $db->prepare("
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
			$_SESSION['username'] = $user_name;
			header('Location: home.php?welcome');
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	}
} // end register_user

public static function user_id_query($user_name){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$user_name = $user_name;
	// get the user id for the user currently signed in

	$statement = $db->prepare("
		SELECT user_id AS id 
		FROM users 
		WHERE (user_name = :user_name);
		");
	
	try {
		$statement->bindValue("user_name", $user_name, PDO::PARAM_STR);
		if($statement->execute()){
			$row = $statement->fetchAll(\PDO::FETCH_ASSOC);
			return $row[0]['id'];
		}
	}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	}
}// end user_id_query

public static function new_project($proj_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$fields = '`'. implode('`, `', array_keys($proj_data)) . '`';
	$proj_title = $proj_data['proj_title'];
	$proj_cat = $proj_data['proj_cat'];
	$proj_desc = $proj_data['proj_desc'];
	$user_id = $proj_data['user_id'];
	$proj_date = $proj_date['proj_date'];
	$proj_file = $proj_data['proj_file'];
	
	$statement = $db->prepare("
		INSERT INTO projects ($fields) 
		VALUES (:proj_title, :proj_cat, :proj_desc, :user_id);
		");


	try {
		$statement->bindValue("proj_title", $proj_title, PDO::PARAM_STR);
		$statement->bindValue("proj_cat", $proj_cat, PDO::PARAM_STR);
		$statement->bindValue("proj_desc", $proj_desc, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if ($statement->execute()){		
			//$_SESSION['username'] = $user_name;
			header('Location: home.php?most_recent_activity');
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	}


}// end new_project


public static function get_projects($user_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$user_id = $user_id;

	$statement = $db->prepare("
			SELECT `proj_id`, `proj_title`, `proj_cat`, `proj_desc`, `proj_date`, `proj_file`, `user_name`
			FROM projects RIGHT OUTER JOIN users
			on users.user_id = projects.user_id
			WHERE projects.user_id = :user_id;
		");
	try {
			$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
			if($statement->execute()){
			$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
			return $rows;
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	}
} // end get_projects




public function test_image_uploader() {
	$this->db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$image_data = file_get_contents($filename);
	$size = getimagesize($filename);

	$statement = $this->db->prepare("
		INSERT INTO test_imageblob ( image_type, image, image_size, image_cat, image_name) 
		VALUES ( :image_type, :image, :image_size, :image_cat, :image_name);
		");
	try {
		$statement->bindValue("image_type", $image_type, PDO::PARAM_STR);
		$statement->bindValue("user_name", $image, PDO::PARAM_STR);
		$statement->bindValue("user_name", $image_size, PDO::PARAM_STR);
		$statement->bindValue("user_name", $image_cat, PDO::PARAM_STR);
		$statement->bindValue("user_name", $image_name, PDO::PARAM_STR);
		if ($statement->execute()){		
			
			// some code here
		}
	}// end try
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	} // end catch

}// end test_image_uploader


}