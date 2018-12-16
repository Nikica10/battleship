<?php

include 'classes/Game.php';

$game = new Game();

if (isset($_POST['submit'])) {
	
	$return = $game->newGame();

	if ($return) {
		header('Location: game.php');

	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="">
	<input type="submit" name="submit" value="Send">
</form>




</body>
</html>