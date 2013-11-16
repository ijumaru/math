<?php
$cos = null;
$degree = null;
if (isset($_POST["cos"])) {
	$cos = $_POST["cos"];
	if (!is_nan($cos)) {
		if ($cos >= 0 && $cos <= 1) {
			switch ($cos) {
			case 1:
				$degree = 0;
				break;
			case 0:
				$degree = 90;
				break;
			default:
				$degree = 45;
				$degree = calculate($cos, $degree, 1);
			}
		}
	}
}

function calculate($cos, $degree, $step) {
	echo $step, '<br>';
	echo $deg2cos = cos(deg2rad($degree)), '<br>';
	$dif = $cos - $deg2cos;
	$error = 0.0001;
	if (abs($dif) > $error) {
		echo 'difdig', $difdig = 45 / pow(2, $step), '<br>';
		if ($difdig > $error) {
			if ($dif > 0) {
				echo 'deg', $degree = $degree - $difdig, '<br>';
				$degree = calculate($cos, $degree, $step + 1);
			} else if ($dif < 0) {
				echo 'deg', $degree = $degree + $difdig, '<br>';
				$degree = calculate($cos, $degree, $step + 1);
			}
		}
	}
	return $degree;
}
?>
<form action="index.php" method="post">
	<input type="submit" value="登録">
	<table>
		<tbody>
			<tr>
				<th>cos</th>
				<td>
					<input type="text" name="cos" value="<?=$cos ?>">
				</td>
			</tr>
			<tr>
				<th>degree</th>
				<td>
					<input type="text" name="degree" value="<?=$degree?>">
				</td>
			</tr>
		</tbody>
	</table>
	<input type="submit" value="登録">
</form>