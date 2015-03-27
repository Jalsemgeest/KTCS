<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "carsneedingmaintenance"; ?>
	<title>KTCS - Needing Maintenance</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php
			$result = mysqli_query($conn, "SELECT * FROM Car NATURAL JOIN CarInfo WHERE (LAST_ODOM - ODOM_MAIN) > 5000 AND Car.CI_ID = CarInfo.CI_ID;");
		?>
		<table class="table">
			<thead>
				<tr>
					<td>VIN</td>
					<td>Make</td>
					<td>Model</td>
					<td>Odom Since Maintenace</td>
				</tr>
			</thead>
			<tbody>

		<?php

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["C_VIN"]."</td><td>".$row["MAKE"]."</td><td>".$row["MODEL"]."</td><td>".($row["LAST_ODOM"] - $row["ODOM_MAIN"])."</td></tr>";
			}

		?>
		</tbody>
	</table>

	</div>
</body>