<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "showatlocation"; ?>
	<title>KTCS - Availability</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php

			$loc = strtoupper(mysql_real_escape_string($_POST["location"]));

			$result = mysqli_query($conn, "SELECT * FROM Location NATURAL JOIN Car NATURAL JOIN CarInfo WHERE Location.LOC_ID = '".$loc."' AND Car.LOC_ID = Location.LOC_ID AND Car.CI_ID = CarInfo.CI_ID AND Car.STATUS = 'AVAILABLE';")
		?>
		<table class="table">
				<thead>
					<tr>
						<th>VIN</th>
						<th>Make</th>
						<th>Model</th>
						<th>Reservations</th>
					</tr>
				</thead>
				<tbody>


			<?php


			//1P3BP49K7JFLLL966
			while ($row = mysqli_fetch_assoc($result)) {

				echo "<tr><td>".$row["C_VIN"]."</td><td>".$row["MAKE"]."</td><td>".$row["MODEL"]."</td><td>";

				$date = date("Y-m-d");

				$reservations = mysqli_query($conn, "SELECT * FROM Reservation WHERE C_VIN = '".$row["C_VIN"]."' AND DATE > '".$date."';");
				$count = 0;
				while ($resRow = mysqli_fetch_assoc($reservations)) {
					if ($count == 0) { ?>
						<table class='table'>
						<thead><tr><td>ID</td><td>Member</td><td>Date</td><td>Pick Up</td></tr></thead>
					<?php }
					echo "<tr><td>".$resRow["RES_NUM"]."</td>";
					echo "<td>".$resRow["MEM_ID"]."</td>";
					echo "<td>".$resRow["DATE"]."</p>";
					echo "<td>".$resRow["PICK_UP"]."</td>";
					echo "</tr>";
					$count++;
				}
				if ($count > 0) {
					echo "</table>";
				}
				echo "</td></tr>";
			}

		?>
			</tbody>
		</table>

	</div>
</body>