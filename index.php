<?php
require_once("Cos.php");
$cos = null;
$degree = null;
if (isset($_POST["cos"])) {
	$cos = $_POST["cos"];
	if (!is_nan($cos)) {
		$coss = new Cos($cos);
		$degree = $coss->toDegree();
		echo $coss->getLog();
	}
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
					<input type="text" name="degree" value="<?=$degree ?>">
				</td>
			</tr>
		</tbody>
	</table>
	<input type="submit" value="登録">
</form>