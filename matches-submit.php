<?php
	
	require('classes/user.php');

	$user = new User();

	$name = empty($_GET["name"]) ? "" : $_GET["name"];
	
	$matches = $user->match($name);

?>


<?php include("top.html"); ?>


<h1>Matches for <?=$name;?></h1>
<?php
	
	if(empty($matches)) { ?>
		<p>No match is found.</p>

	<?php } else {

		foreach($matches as $match) { ?>

			<div class="match">
				<p>
					<img src="public/user.jpg" alt="avatar" />
					<?=$match["name"];?>
				</p>
				<ul>
					<li>gender: <?=$match["gender"];?></li>
					<li>age: <?=$match["age"];?></li>
					<li>type: <?=$match["type"];?></li>
					<li>OS: <?=$match["os"];?></li>
				</ul>	

			</div>

		<?php } 
	} ?>


<?php include("bottom.html"); ?>