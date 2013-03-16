<?php 

class ItemViewModel {

	private $db;
	private $result;


	public function __construct($dsn, $user, $pass){
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	} //end __construct






}//end ItemViewModel