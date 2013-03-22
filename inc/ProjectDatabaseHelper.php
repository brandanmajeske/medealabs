<?php 

require_once 'inc/db.php';


// Helpers //

class ProjectDatabaseHelper {

private $db;

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
		VALUES (:proj_title, :proj_cat, :proj_desc, :user_id, CURRENT_TIMESTAMP, :proj_file);
		");


	try {
		$statement->bindValue("proj_title", $proj_title, PDO::PARAM_STR);
		$statement->bindValue("proj_cat", $proj_cat, PDO::PARAM_STR);
		$statement->bindValue("proj_desc", $proj_desc, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		$statement->bindValue("proj_file", $proj_file, PDO::PARAM_STR);
		if ($statement->execute()){		
			//$_SESSION['username'] = $user_name;
			header('Location: home.php?most_recent_activity');
			}
		}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p>Something is wrong. We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: '.$e->getMessage().'</div>';
	}

}// end new_project

public static function show_project($proj_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	//$user_id = $user_id;
	$proj_id = $proj_id;

	$statement = $db->prepare("
			SELECT `proj_file`, `proj_date`, `proj_id`, `proj_title`, `proj_cat`, `proj_desc`, `user_name`
			FROM projects RIGHT OUTER JOIN users
			on users.user_id = projects.user_id
			WHERE projectS.proj_id = :proj_id
			ORDER BY `proj_id` DESC;
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
	$post_date = $post_data['post_date'];
	$post_file = $post_data['post_file'];
	$fields = '`'. implode('`, `', array_keys($post_data)) . '`';

	$statement = $db->prepare("
		INSERT INTO posts ($fields) 
		VALUES (:post_title, :post_text, :proj_id, :user_id, CURRENT_TIMESTAMP, :post_file);
		");


	try {
		$statement->bindValue("post_title", $post_title, PDO::PARAM_STR);
		$statement->bindValue("post_text", $post_text, PDO::PARAM_STR);
		$statement->bindValue("proj_id", $proj_id, PDO::PARAM_STR);
		$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
		$statement->bindValue("post_file", $post_file, PDO::PARAM_STR);
		if ($statement->execute()){		
			//$_SESSION['username'] = $user_name;
			//header("Location: project.php?id='.$proj_id.'"); <-- something is wrong - Bug
			header('Location: home.php');
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
			SELECT posts.post_file, posts.post_date, posts.post_id, posts.post_title, posts.post_text, posts.user_id, projects.proj_id, users.user_name
			FROM posts
    		JOIN projects
       		ON projects.proj_id = posts.proj_id
    		JOIN users
       		ON users.user_id = posts.user_id
   			WHERE projects.proj_id = :proj_id
   			ORDER BY `post_id` DESC;

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

} // end show_posts

public static function show_single_post($post_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$post_id = $post_id;
	$statement = $db->prepare("
		SELECT * FROM posts
		WHERE post_id = :post_id;
		");

	try{
		$statement->bindValue("post_id", $post_id, PDO::PARAM_STR);
		if($statement->execute()){
			$rows = $statement->fetch(PDO::FETCH_ASSOC);
			return $rows;
		}
	}
	catch(\PDOException $e){
		echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
	}

}// end show_single_post

public static function update_post($post_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	$post_id = $post_data['post_id'];
	$post_title = $post_data['post_title'];
	$post_text = $post_data['post_text'];
	//$user_id = $post_data['user_id'];
	$proj_id = $post_data['proj_id'];
	$post_date = isset($post_data['post_date'])? $post_data['post_date'] : null;
	$post_file = isset($post_data['post_file'])? $post_data['post_file'] : null;

	//$fields = '`'. implode('`, `', array_keys($post_data)) . '`';

	//check if there is a new post_file (image) and execute this update statement if so 
	if(!is_null($post_file)){
		
		$statement = $db->prepare(" 
			UPDATE posts
			SET `post_title` = :post_title, `post_text` = :post_text, 
			`post_date` = CURRENT_TIMESTAMP, `post_file` = :post_file
			WHERE `post_id` = :post_id;
		");


		try {
			$statement->bindValue("post_id", $post_id, PDO::PARAM_STR);
			$statement->bindValue("post_title", $post_title, PDO::PARAM_STR);
			$statement->bindValue("post_text", $post_text, PDO::PARAM_STR);
			//$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
			$statement->bindValue("post_file", $post_file, PDO::PARAM_STR);
			if ($statement->execute()){		
				//$_SESSION['username'] = $user_name;
				header('Location: project.php?id='.$proj_id);
				}
			}

		catch(\PDOException $e){
			echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
		}

	} else {

		$statement = $db->prepare(" 
				UPDATE posts
				SET `post_title` = :post_title, 
					`post_text` = :post_text, 
					`post_date` = CURRENT_TIMESTAMP 
				WHERE `post_id` = :post_id;
			");


		try {
			$statement->bindValue("post_id", $post_id, PDO::PARAM_STR);
			$statement->bindValue("post_title", $post_title, PDO::PARAM_STR);
			$statement->bindValue("post_text", $post_text, PDO::PARAM_STR);
			//$statement->bindValue("user_id", $user_id, PDO::PARAM_STR);
			//$statement->bindValue("post_file", $post_file, PDO::PARAM_STR);
			if ($statement->execute()){		
				//$_SESSION['username'] = $user_name;
				header('Location: project.php?id='.$proj_id);
				}
			}

		catch(\PDOException $e){
			echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
		}
	}

}// end update_post


public static function delete_post($post_id){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


	$statement = $db->prepare("
			DELETE FROM posts
			WHERE post_id = :post_id;
		");

	try {
			$statement->bindValue("post_id", $post_id, PDO::PARAM_STR);
			if ($statement->execute()){		
				
				header('Refresh:3 ; URL=home.php');
				}
			}

		catch(\PDOException $e){
			echo '<div class="alert alert-error"><p><strong>Something is wrong!</strong><br />We have dispatched a pack of trained monkeys to fix the problem. If you see them, show them this: <br />'.$e->getMessage().'</p></div>';
		}

}// end delete_post	


} //end Project_Database_Helper