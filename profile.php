<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "profile"; ?>
	<title>KTCS - Profile</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php
			$result = mysqli_query($conn, "SELECT * FROM Member WHERE MEM_ID = '".$_SESSION["USER_ID"]."';");

			$name; $email; $address; $phone; $license;
			if (mysqli_num_rows($result) == 1) {
				while ($row = mysqli_fetch_assoc($result)) {
					$name = $row["FIRSTNAME"] . " " . $row["LASTNAME"];
					$email = $row["EMAIL"];
					$address = $row["ADDRESS"];
					$phone = $row["PHONE"];
					$license = $row["LICENSE_NUM"];
				}
			} else {
				header("Location: logout.php");
				exit();
			}
		?>
		<div class="row">
			<div class="col-md-6">
				<?php
					echo "<h4>Name: ".$name."</h4>";
					echo "<h4>Email: ".$email."</h4>";
					echo "<h4>Address: ".$address."</h4>";
					echo "<h4>Phone Number: ".$phone."</h4>";
					echo "<h4>License Number: ".$license."</h4>";
				?>
			</div>
			<div class="col-md-6">
				<h4>Rental History</h4>
				<?php

				$result = mysqli_query($conn, "SELECT * FROM Reservation NATURAL JOIN Car NATURAL JOIN CarInfo NATURAL JOIN Location WHERE Reservation.LOC_ID = Location.LOC_ID AND Reservation.C_VIN = Car.C_VIN AND Car.CI_ID = CarInfo.CI_ID AND Reservation.MEM_ID = '".$_SESSION["USER_ID"]."';");
				$history = mysqli_query($conn, "SELECT * FROM RentalHistory NATURAL JOIN Car NATURAL JOIN CarInfo NATURAL JOIN Location WHERE RentalHistory.LOC_ID = Location.LOC_ID AND RentalHistory.C_VIN = Car.C_VIN AND Car.CI_ID = CarInfo.CI_ID AND MEM_ID = '".$_SESSION["USER_ID"]."';");

				if (mysqli_num_rows($result) > 0 || mysqli_num_rows($history) > 0) { ?>
					<table class="table">
						<thead>
							<tr>
								<th>Reservation Number</th>
								<th>Car</th>
								<th>Address</th>
								<th>Pick Up</th>
								<th>Drop Off</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr><td>".$row["RES_NUM"]."</td><td>".$row["MAKE"] . " " . $row["MODEL"] ."</td><td>".$row["ADDRESS"]."</td><td>".$row["PICK_UP"]."</td><td>".$row["LENGTH"]." Hours</td></tr>";
								}
								while ($row = mysqli_fetch_assoc($history)) {
									echo "<tr><td>".$row["RES_NUM"]."</td><td>".$row["MAKE"] . " " . $row["MODEL"] ."</td><td>".$row["ADDRESS"]."</td><td>".$row["PICK_UP"]."</td><td>".$row["DROP_TIME"]."</td></tr>";	
								}
							?>
						</tbody>
					</table>
				<?php
				} else { ?>
					<h4>No Rentals have been made.</h4>
				<?php } ?>
			</div>	
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>