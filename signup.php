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


		<div>
			<strong>Personality type</strong>
			<input type="text" name="type" size="5" maxlength="4" />
			(<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>): <br />
		</div>

		<div>
			<strong>Favorite OS:</strong>
			<select name="os">
				<option value="Windows">Windows</option>
				<option value="Mac OS X">Mac OS X</option>
				<option value="Linux">Linux</option>
				<option value="other">other</option>
			</select>
		</div>

		<div>
			<strong>Seeling age:</strong>
			<input type="number" name="min" placeholder="min" size="5" min="1" max="99" /> and
			<input type="number" name="max" placeholder="max" size="5" min="1" max="99" />
		</div>

		<input type="submit" value="Sign Up" />
	</fieldset>
</form>

<?php include("bottom.html"); ?>

