<?php

//Access the Database here... 

require_once 'inc/db.php';


// Helpers //

class UserProfileHelper {

private $db;

public static function new_profile($new_user_profile){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$fields = '`'. implode('`, `', array_keys($new_user_profile)) . '`';
	$full_name = $new_user_profile['full_name'];
	$location = $new_user_profile['location'];
	$user_bio = $new_user_profile['user_bio'];
	$user_id = $new_user_profile['user_id'];
	$join_date = $new_user_profile['join_date'];
	$user_file = $new_user_profile['user_file'];
	
	$statement = $db->prepare("
			INSERT INTO user_profiles ($fields) 
			VALUES (:full_name, :location, :user_bio, :user_id, CURRENT_TIMESTAMP, :user_file);
			");
	try {
		$statement->bindValue("full_name", $full_name, PDO::PARAM_STR);
		$statement->bindValue("location", $location, PDO::PARAM_STR);
		$statement->bindValue("user_bio", $user_bio, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		$statement->bindValue("user_file", $user_file, PDO::PARAM_STR);
		if ($statement->execute()){		
			header('Refresh:0 ; URL=home.php');
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
	//echo $user_id;
	$statement = $db->prepare("
		SELECT user_id 
		FROM user_profiles
		WHERE user_id = :user_id;
	");
	try{
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if($statement->execute()){
			$rows = $statement->fetch(\PDO::FETCH_BOUND);
			
			if($rows != 0){
				//echo 'Yes there is a profile';
				return true;
			}
		}
		return false;
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
		select *
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
	$full_name = $user_profile_data['full_name'];
	$location = $user_profile_data['location'];
	$user_bio = $user_profile_data['user_bio'];
	$user_id = $user_profile_data['user_id'];
	$user_file = $user_profile_data['user_file'];

	if(!is_null($user_file)){

	$statement = $db->prepare("
			UPDATE user_profiles
			SET full_name = :full_name, 
				location = :location,
				user_bio = :user_bio,
				user_file = :user_file
			WHERE user_id = :user_id;
			");
	try {
		$statement->bindValue("full_name", $full_name, PDO::PARAM_STR);
		$statement->bindValue("location", $location, PDO::PARAM_STR);
		$statement->bindValue("user_bio", $user_bio, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		$statement->bindValue("user_file", $user_file, PDO::PARAM_STR);
		if ($statement->execute()){		
			header('Refresh:0 ; URL=home.php');
			}
		}

	catch(\PDOException $e){
			echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		}
	} else {

		$statement = $db->prepare("
			UPDATE user_profiles
			SET full_name = :full_name, 
				location = :location,
				user_bio = :user_bio
			WHERE user_id = :user_id;
			");
	try {
		$statement->bindValue("full_name", $full_name, PDO::PARAM_STR);
		$statement->bindValue("location", $location, PDO::PARAM_STR);
		$statement->bindValue("user_bio", $user_bio, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if ($statement->execute()){		
			header('Refresh:0 ; URL=home.php');
			}
		}

	catch(\PDOException $e){
			echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		}

	}

	}// end update_profile



}// End UserProfileHelper

?>