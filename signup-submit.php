<?php
	
	require('classes/user.php');

	$fields = ["name", "gender", "age", "type", "os", "min", "max"];

	$valid = true;
	$errors = [];

	foreach($fields as $field) {
		if(empty($_POST[$field])) {
			$valid = false;

			$errors[] = "$field is required";
		
		} else 	if($field === "type" && strlen($_POST["type"]) != 4) {
			$valid = false;
			$errors[] = "type is not valid";
		}
	}


	if($valid) {

		$data = array(
			"name" => $_POST["name"],
			"gender" => strtoupper($_POST["gender"]),
			"age" => $_POST["age"],
			"type" => $_POST["type"],
			"os" => $_POST["os"],
			"min" => $_POST["min"],
			"max" => $_POST["max"]
		);

		$user = new User();
		$user->add($data);
	}

?>

