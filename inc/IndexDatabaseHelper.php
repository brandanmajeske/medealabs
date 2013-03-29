<?php

require_once('inc/db.php');
require_once('inc/error_log.php');

class IndexDatabaseHelper {

	//function to get the most recent projects from the database
	public static function get_latest_projects(){
		$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		$statement = $db->prepare("
			SELECT * 
			FROM projects
			WHERE proj_id > 
			((SELECT COUNT(*) FROM projects)-5)
			ORDER BY `proj_id` DESC;
			");
		
		try {
			if($statement->execute()){		
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $rows;
			}
		}
		catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	}


	} // end get_latest_projects


	public static function get_category_count(){

		$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		$statement = $db->prepare("
			SELECT COUNT(*) as count, `proj_cat` 
			FROM projects 
			GROUP BY proj_cat;
			");
		
		try {
			if($statement->execute()){		
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $rows;
			}
		}
		catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
	}
		
	} // end get_category_count

	public static function get_by_category($category){
		$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		$statement = $db->prepare("
			SELECT * 
			FROM projects
			WHERE `proj_cat`  = :category
			GROUP BY proj_id DESC;
			");
		try {
			$statement->bindValue("category", $category, PDO::PARAM_STR);
			if($statement->execute()){
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $rows;
			}
		}
		catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
		}
		
	}


	public static function register_newsletter($email){
		$db = new PDO(MY_DSN, MY_USER, MY_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $db->prepare("
				INSERT INTO newsletter_subscribers (`email`) 
				VALUES (:email);
			");

		try{
			$statement->bindValue("email", $email, PDO::PARAM_STR);
			if($statement->execute()){
				
				header('Refresh:0 ; URL=index.php?subscribed');
			}
			return FALSE;
		}
		catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
		$msg =  $db_error.$e->getMessage();
		Log::general($msg);
		}

	} // end register newsletter

} // end IndexDatabaseHelper


