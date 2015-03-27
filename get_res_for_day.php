<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "reservationsforday"; ?>
	<title>KTCS - Needing Maintenance</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php

			$day = strtoupper(mysql_real_escape_string($_POST["day"]));

			$result = mysqli_query($conn, "SELECT * FROM Reservation NATURAL JOIN Location WHERE Reservation.LOC_ID = Location.LOC_ID AND DATE = '".$day."';");

		?>
		<table class="table">
			<thead>
				<tr>
					<th>VIN</th>
					<th>Pick Up</th>
					<th>Length</th>
					<th>Location</th>
				</tr>
			</thead>
			<tbody>
				<?php

					// For Reservations

					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>".$row["C_VIN"]."</td><td>".$row["PICK_UP"]."</td><td>".$row["LENGTH"]." Hours</td><td>".$row["ADDRESS"]."</td></tr>";
						}
					}


					// For Rental History

					$result = mysqli_query($conn, "SELECT * FROM RentalHistory NATURAL JOIN Location WHERE RentalHistory.LOC_ID = Location.LOC_ID AND PICK_TIME LIKE '".$day."%'");

					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>".$row["C_VIN"]."</td><td>".$row["PICK_TIME"]."</td><td>".$row["DROP_TIME"]."</td><td>".$row["ADDRESS"]."</td></tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>