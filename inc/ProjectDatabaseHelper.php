<?php 

require_once 'inc/db.php';


// Helpers //

class ProjectDatabaseHelper {

private $db;

public static function show_project($user_id, $proj_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$user_id = $user_id;
	$proj_id = $proj_id;

	$statement = $db->prepare("
			SELECT `proj_id`, `proj_title`, `proj_cat`, `proj_desc`, `user_name`
			FROM projects RIGHT OUTER JOIN users
			on users.user_id = projects.user_id
			WHERE projects.user_id = :user_id
			AND projectS.proj_id = :proj_id;
		");
	
	try{

		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		$statement->bindValue("proj_id", $proj_id, PDO::PARAM_STR);

		if($statement->execute()){
			$rows = $statement->fetch(\PDO::FETCH_ASSOC);
			return $rows;
			}
	}
	
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
	}


}// end get_project


} //end Project_Database_Helper