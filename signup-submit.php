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

