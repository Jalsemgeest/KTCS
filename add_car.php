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
			$make = strtoupper(mysql_real_escape_string($_POST["make"]));
			$model = strtoupper(mysql_real_escape_string($_POST["model"]));
			$year = strtoupper(mysql_real_escape_string($_POST["year"]));

			$cost = strtoupper(mysql_real_escape_string($_POST["cost"]));
			$loc = strtoupper(mysql_real_escape_string($_POST["location"]));
			$odom = strtoupper(mysql_real_escape_string($_POST["odom"]));
			$gas = strtoupper(mysql_real_escape_string($_POST["gas"]));

			//echo $vin . " " . $make . " " . $model . " " . $year . " " . $cost  . " " . $loc . " " . $odom . " " . $gas;

			// Checking to see if the car exists already.
			$result = mysqli_query($conn, "SELECT * FROM CarInfo WHERE MAKE = '".$make."' AND MODEL = '".$model."' AND YEAR = '".$year."';");

			$carInfoId = 0;
			// Then it exists
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$carInfoId = $row["CI_ID"];
				}
			} else {
				$result = mysqli_query($conn, "INSERT INTO CarInfo(MAKE, MODEL, YEAR, RENTAL_FEE) VALUES('".$make."','".$model."','".$year."','$".$cost."');");

				$result = mysqli_query($conn, "SELECT * FROM CarInfo WHERE MAKE = '".$make."' AND MODEL = '".$model."' AND YEAR = '".$year."';");

				while ($row = mysqli_fetch_assoc($result)) {
					$carInfoId = $row["CI_ID"];
				}
			}

			$result = mysqli_query($conn, "INSERT INTO Car(C_VIN, CI_ID, LOC_ID, STATUS, LAST_ODOM, LAST_GAS, DATE_OF_MAIN, ODOM_MAIN)".
				"VALUES('".$vin."','".$carInfoId."','".$loc."','AVAILABLE','".$odom."','".$gas."','".date("Y-m-d")."','".$odom."';");

			echo "<h3>Car was successfully added to the database.</h3>";

		?>
	</div>
</body>