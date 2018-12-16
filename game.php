<?php

include 'classes/Game.php';

$game = new Game();

$sea = $game->getSea();

?>
<table>
<form method="post" action="">
<?php

		foreach ($sea as $key => $row) {
			echo "<tr>";
			foreach ($row as $k => $column) {
				echo "<td>";
	 			echo '<input type="checkbox" name="ship[]" value="'.$column.'">';
 	 			echo "</td>";
			} 
			 echo "</tr>";
	}

?>
<tr><input type="submit" name="shoot" value="Shoot"></tr>
</form>
</table>

<?php
if (isset($_POST['shoot'])) {
		//$game->shoot(xy);
		$game->shoot();
}
?>





