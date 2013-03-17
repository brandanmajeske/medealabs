<?php


/*
* MySQLi database; only one connection is allowed.
*
*/

class Database {
	private $_connection;

	// Store the single instance
	private static $_instance;

	/*	Get instance of the Database
	*	return Database
	*/
	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/*
	*	Constructor
	*/

	public function __construct() {

		$this->_connection = new PDO("mysql:host=localhost;dbname=mldb", 'mldb_user', 'password');
		$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Error handling

	/*	try {
		if ($statement->execute()){
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result;
			}
		}*/

		if (PDOException $e){
		echo "Something is wrong. We've dispatched a pack of trained monkeys to fix the problem. If you see them, show them this:". '<pre>'.$e->getMessage().'</pre>';
		}
	}

	/*
	*	empty clone magic method to prevent duplication.
	*/
	private function __clone() {}

	/*
	*	Get the db connection
	*/

	public function getConnection() {
		return $this->_connection;
	}

}