<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "expiringtoday"; ?>
	<title>KTCS - Availability</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php

			$vin = strtoupper(mysql_real_escape_string($_POST["vin"]));
			
			$result = mysqli_query($conn, "SELECT * FROM Reservation NATURAL JOIN Location WHERE C_VIN = '".$vin."' AND Reservation.LOC_ID = Location.LOC_ID;");

			?>
			<table class="table">
				<thead>
					<tr>
						<td>Reservation Number</td>
						<td>Member</td>
						<td>Date</td>
						<td>Pick Up Time</td>
						<td>Length</td>
						<td>Address</td>
					</tr>
				</thead>
				<tbody>


			<?php


			//1P3BP49K7JFLLL966
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["RES_NUM"]."</td><td>".$row["MEM_ID"]."</td><td>".$row["DATE"]."</td><td>".$row["PICK_UP"]."</td><td>".$row["LENGTH"]."</td><td>".$row["ADDRESS"]."</td></tr>";
			}

			$result = mysqli_query($conn, "SELECT * FROM RentalHistory NATURAL JOIN Location WHERE C_VIN = '".$vin."' AND RentalHistory.LOC_ID = Location.LOC_ID;");

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["RES_NUM"]."</td><td>".$row["MEM_ID"]."</td><td></td><td>".$row["PICK_TIME"]."</td><td>".$row["DROP_TIME"]."</td><td>".$row["ADDRESS"]."</td></tr>";
			}

		?>
	</tbody>
	</table>
	</div>

</body>