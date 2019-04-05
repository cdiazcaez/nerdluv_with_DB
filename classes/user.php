
<?php

require(__DIR__ . '/../connection.php');

class User {

	public $conn = null;

	public function __construct() {
		$this->conn = Database::getConnection();		
	}


	public function add($user) {
