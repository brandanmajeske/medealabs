<?php

//Access the Database here... 

require_once 'inc/db.php';


// Helpers //

class UserProfileHelper {

private $db;

public static function new_profile($user_profile_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$fields = '`'. implode('`, `', array_keys($user_profile_data)) . '`';
	$user_bio = $user_profile_data['user_bio'];
	$user_id = $user_profile_data['user_id'];
	$join_date = $user_profile_data['join_date'];

	$statement = $db->prepare("
			INSERT INTO user_profiles ($fields) 
			VALUES (:user_bio, :user_id, CURRENT_TIMESTAMP);
			");
	try {
		$statement->bindValue("user_bio", $user_bio, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if ($statement->execute()){		
			//$_SESSION['username'] = $user_name;
			header('Location: home.php?most_recent_activity');
			}
		}
	catch(\PDOException $e){
			echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		}

	}// end new_profile

public static function check_profile($user_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$user_id = $user_id;

	$statement = $db->prepare("
		SELECT COUNT(*) 
		FROM user_profiles
		WHERE `user_id` = :user_id;
	");
	try{
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if($statement->execute()){
		}
	}
	catch(\PDOException $e){
			echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
	}

} // end check_profile

public static function get_user_profile($user_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$user_id = $user_id;

	$statement = $db->prepare("
		select user_bio
		from user_profiles
		where `user_id` = :user_id;
	");
	try{
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if($statement->execute()){
			$rows = $statement->fetch(\PDO::FETCH_ASSOC);
			return $rows;
		}
	}
	catch(\PDOException $e){
			echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
	}

}

public static function update_profile($user_profile_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$fields = '`'. implode('`, `', array_keys($user_profile_data)) . '`';
	$user_bio = $user_profile_data['user_bio'];
	$user_id = $user_profile_data['user_id'];

	$statement = $db->prepare("
			UPDATE user_profiles
			SET user_bio = :user_bio
			WHERE user_id = :user_id;
			");
	try {
		$statement->bindValue("user_bio", $user_bio, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if ($statement->execute()){		
			header('Location: home.php?most_recent_activity');
			}
		}
	catch(\PDOException $e){
			echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		}

	}// end new_profile



}// End UserProfileHelper

?>