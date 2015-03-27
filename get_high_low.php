<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "high_low"; ?>
	<title>KTCS - Needing Maintenance</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<h4 style="text-align:center">Note: Vehicles that have not yet been rented will not be considered.</h4>
		<div class="row">
			<div class="col-md-6">
				<h3 style="text-align:center;"><u>Highest Rentals</u></h3>
			<?php
				$result = mysqli_query($conn, "SELECT Car.C_VIN, COUNT(Reservation.C_VIN) as NUM FROM Reservation NATURAL JOIN Car WHERE Reservation.C_VIN = Car.C_VIN GROUP BY Reservation.C_VIN;");

				$low = -1;
				$lowVin;
				$high = -1;
				$highVin;

				while ($row = mysqli_fetch_assoc($result)) {
					if ($low == -1) {
						$low = $row["NUM"];
						$lowVin = $row["C_VIN"];
						$high = $low;
						$highVin = $lowVin;
					} else {
						$newNum = $row["NUM"];
						if ($newNum <= $low) {
							$low = $newNum;
							$lowVin = $row["C_VIN"];
						}
						if ($newNum > $high) {
							$high = $newNum;
							$highVin = $row["C_VIN"];
						}
					}
				}

				if ($lowVin == $highVin) {
					echo "There are no vehicles that have highest or lowest rentals.";
				} else {
					$result = mysqli_query($conn, "SELECT * FROM Car NATURAL JOIN CarInfo WHERE Car.CI_ID = CarInfo.CI_ID AND Car.C_VIN = '".$highVin."';");
					?>
					<table class="table">
						<thead>
							<tr>
								<th>VIN</th>
								<th>Make</th>
								<th>Model</th>
								<th>Rentals</th>
							</tr>
						</thead>
						<tbody>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>".$row["C_VIN"]."</td><td>".$row["MAKE"]."</td><td>".$row["MODEL"]."</td><td>".$high."</td></tr>";
					}
					?>
					</tbody>
					</table>
					<?php
				}
			?>
			</div>
			<div class="col-md-6">
				<h3 style="text-align:center;"><u>Lowest Rentals</u></h3>
				<?php

					if ($lowVin == $highVin) {
						echo "There are no vehicles that have highest or lowest rentals.";
					} else {

						$result = mysqli_query($conn, "SELECT * FROM Car NATURAL JOIN CarInfo WHERE Car.CI_ID = CarInfo.CI_ID AND Car.C_VIN = '".$lowVin."';");				

						?>
						<table class="table">
						<thead>
							<tr>
								<td>VIN</td>
								<td>Make</td>
								<td>Model</td>
								<td>Rentals</td>
							</tr>
						</thead>
						<tbody>

						<?php
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>".$row["C_VIN"]."</td><td>".$row["MAKE"]."</td><td>".$row["MODEL"]."</td><td>".$low."</td></tr>";
						}
						?>
						</tbody>
						</table>
						<?php
					}

				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>