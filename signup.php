<?php include("top.html"); ?>


<form action="signup-submit.php" method="POST">

	<fieldset>
		<div>
			<strong>Name:</strong>
			<input type="text" name="name" size="16" />
		</div>

		<div>
			<strong>Gender:</strong>
			<label><input type="radio" name="gender" value="M" /> Male</label>
			<label><input type="radio" name="gender" value="F" checked="checked" /> Female</label>
		</div>


		<div>
			<strong>Age:</strong>
			<input type="number" name="age" size="5" min="1" max="99" />
		</div>
