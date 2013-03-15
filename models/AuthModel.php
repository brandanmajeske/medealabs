<?php

class AuthModel {
	
	public $db;
	public $username;

	public function __construct($dsn, $user, $pass){
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}

	public function getUserByNamePass($name, $pass) {
		$stmt = $this->db->prepare("
			SELECT user_id AS id, user_name AS name, full_name AS fullname
			FROM users
			WHERE (user_name = :name)
			  AND (password = MD5(CONCAT(salt, :pass)))
			");
		if ($stmt->execute(array(':name' => $name, ':pass' => $pass))) {
			$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			if (count($rows) === 1){
				return $rows[0];
			}
		}
		return FALSE;
	}

} // End AuthModel