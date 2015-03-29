<html>
<head>
	<?php require_once("template/header.php");
	$_SESSION["CURR_PAGE"] = "RETURNCAR" ?>	
</head>
<body>
	<?php require_once("template/top.php"); ?>

	<div class="container">
		<?php
			$res = strtoupper(mysql_real_escape_string($_POST["returned"]));
			$odom = strtoupper(mysql_real_escape_string($_POST["odom"]));

			$result = mysqli_query($conn, "SELECT * FROM Reservation NATURAL JOIN Car WHERE Reservation.C_VIN = Car.C_VIN AND MEM_ID = '".$_SESSION['USER_ID']."' AND RES_NUM ='".$res."';");

			$vin;
			$date;
			$pickup;
			$location;
			$length;
			$last_odom;
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$vin = $row["C_VIN"];
					$date = $row["DATE"];
					$pickup = $row["PICK_UP"];
					$location = $row["LOC_ID"];
					$length = $row["LENGTH"];
					$last_odom = $row["LAST_ODOM"];
				}

				$pick_time = $date . " " . $pickup;

				$drop_off = date("Y-m-d H:i:s");

				$result = mysqli_query($conn, "INSERT INTO RentalHistory(C_VIN, MEM_ID, LOC_ID, PICK_TIME, DROP_TIME, ODOM_PICK, ODOM_RETURN) VALUES('".$vin."','".$_SESSION["USER_ID"]."','".$location."','".$pick_time."','".$drop_off."','".$last_odom."','".$odom."');");

				// It is now in the history.
				// So delete record from Reservation.

				$result = mysqli_query($conn, "DELETE FROM Reservation WHERE RES_NUM = '".$res."' AND MEM_ID ='".$_SESSION["USER_ID"]."';");

				if ($result) {
					echo "<h4>Vehicle was successfully returned.</h4>";
				} else {
					echo "<h4>Error. Please try again or contact support.</h4>";
				}

			}

		?>
	</div>

</body>
</html>