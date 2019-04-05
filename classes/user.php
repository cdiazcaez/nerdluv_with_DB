
<?php

require(__DIR__ . '/../connection.php');

class User {

	public $conn = null;

	public function __construct() {
		$this->conn = Database::getConnection();		
	}


	public function add($user) {

		try {

			$this->conn->beginTransaction();

			$stmt = $this->conn->prepare("INSERT INTO users (name, gender, age) VALUES (:name, :gender, :age)");
			$stmt->execute([
				$user["name"],
				$user["gender"],
				$user["age"]
			]);

			$stmt = $this->conn->prepare("SET @userId = LAST_INSERT_ID();");
			$stmt->execute();

			$stmt = $this->conn->prepare("INSERT INTO user_personality (user, type) VALUES (@userId, :type)");
			$stmt->execute([ $user["type"] ]);

			$stmt = $this->conn->prepare("INSERT INTO user_os (user, name) VALUES (@userId, :os)");
			$stmt->execute([ $user["os"] ]);

			$stmt = $this->conn->prepare("INSERT INTO user_seeking_age (user, smin, smax) VALUES (@userId, :min, :max)");
			$stmt->execute([ $user["min"], $user["max"] ]);


		    return $this->conn->commit();
		} catch(Exception $e) {
		    //An exception has occured, which means that one of our database queries failed.
		    //Print out the error message.
		    echo $e->getMessage();
    		//Rollback the transaction.
    		$this->conn->rollBack();

    		return false;
		}

	}

	private function getByName($name) {

		$stmt = $this->conn->prepare("SELECT u.id, u.name, u.age, u.gender, up.type, uo.name os, usa.smin min, usa.smax max FROM `users` u 
			INNER JOIN user_personality up ON up.user = u.id
			INNER JOIN user_os uo ON uo.user = u.id
			INNER JOIN user_seeking_age usa ON usa.user = u.id WHERE u.name = ?");

		$stmt->execute([ $name ]);

		$user = $stmt->fetch();

		return $user;

	}


	public function match($name) {

		$user = $this->getByName($name);

		$stmt = $this->conn->prepare("SELECT u.name, u.age, u.gender, up.type, uo.name os, usa.smin min, usa.smax max FROM `users` u 
			INNER JOIN user_personality up ON up.user = u.id
			INNER JOIN user_os uo ON uo.user = u.id
			INNER JOIN user_seeking_age usa ON usa.user = u.id
			WHERE 
				up.type = ? AND uo.name = ? AND u.id != ? 
				AND (? BETWEEN usa.smin AND usa.smax)
				AND (u.age BETWEEN ? AND ?)
			");

		$stmt->execute([
			$user["type"],
			$user["os"],
			$user["id"],
			$user["age"],
			$user["min"],
			$user["max"]
		]);

		$matches = $stmt->fetchAll();

		return $matches;

	}

}
