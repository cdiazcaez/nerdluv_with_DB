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


<?php include("top.html"); ?>

<?php if($valid) { ?>
	<h1>Thank you!</h1>
	<p>Welcome to NerdLub, <?=$_POST["name"];?></p>
	<p>Now <a href="matches.php">log in to see your matches!</a></p>
<?php } else { ?>

	<ul>
	<?php foreach($errors as $error) { ?>
		<li><?=$error;?></li>
	<?php } ?>

	</ul>
<?php } ?>




<?php include("bottom.html"); ?>



