<?php 

require_once 'inc/db.php';


// Helpers //

class ProjectDatabaseHelper {

private $db;

public static function show_project($proj_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	//$user_id = $user_id;
	$proj_id = $proj_id;

	$statement = $db->prepare("
			SELECT `proj_id`, `proj_title`, `proj_cat`, `proj_desc`, `user_name`
			FROM projects RIGHT OUTER JOIN users
			on users.user_id = projects.user_id
			WHERE projectS.proj_id = :proj_id;
		");
	
	try{

		//$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
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


public static function new_post($post_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	
	$post_title = $post_data['post_title'];
	$post_text = $post_data['post_text'];
	$user_id = $post_data['user_id'];
	$proj_id = $post_data['proj_id'];
	//$image_id = null;
	$fields = '`'. implode('`, `', array_keys($post_data)) . '`';

	$statement = $db->prepare("
		INSERT INTO posts ($fields) 
		VALUES (:post_title, :post_text, :proj_id, :user_id);
		");


	try {
		$statement->bindValue("post_title", $post_title, PDO::PARAM_STR);
		$statement->bindValue("post_text", $post_text, PDO::PARAM_STR);
		$statement->bindValue("proj_id", $proj_id, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		if ($statement->execute()){		
			//$_SESSION['username'] = $user_name;
			header('Location: project.php?id='.$proj_id);
			}
		}

	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
	}


}// end new_post


public static function show_posts($proj_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$proj_id = $proj_id;
	$statement = $db->prepare("
			SELECT posts.post_title, posts.post_text, posts.user_id, projects.proj_id, users.user_name
			FROM posts
    		JOIN projects
       		ON projects.proj_id = posts.proj_id
    		JOIN users
       		ON users.user_id = posts.user_id
   			WHERE projects.proj_id = :proj_id;
		");
	
	try{
		$statement->bindValue("proj_id", $proj_id, PDO::PARAM_STR);

		if($statement->execute()){
			$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
			return $rows;
			}
	}
	
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
	}
}


} //end Project_Database_Helper