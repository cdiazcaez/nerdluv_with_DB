<?php
	
	require('classes/user.php');

	$user = new User();

	$name = empty($_GET["name"]) ? "" : $_GET["name"];
	
	$matches = $user->match($name);

?>
