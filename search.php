<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "availability"; ?>
	<title>KTCS - Search</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php
			$model = explode("~", strtoupper($_POST["model"]));
			$date = strtoupper(mysql_real_escape_string($_POST["date"]));

			$format = 'H:i:s';
			$pick_up = DateTime::createFromFormat($format, strtoupper(mysql_real_escape_string($_POST["pick_up"])).":00");

			$drop_off = DateTime::createFromFormat($format, strtoupper(mysql_real_escape_string($_POST["pick_up"])).":00");;

			$drop_off2 = strtoupper(mysql_real_escape_string($_POST["drop_off"]));

			$drop_off->add(new DateInterval('PT'.strtoupper(mysql_real_escape_string($_POST["drop_off"])).'H'));


			$no_cars = true;
			//$newdate = ($pick_up + $drop_off);

			//echo $model[0];//. " " . $date . " " . $pick_up . " " . $drop_off;

			// Find the CI_ID.

			$result = mysqli_query($conn, "SELECT C_VIN FROM Car NATURAL JOIN CarInfo WHERE Car.CI_ID = CarInfo.CI_ID AND CarInfo.MODEL = '".$model[2]."' AND CarInfo.YEAR = '".$model[0]."';");

			$ci_id = -1;

			$vins = array();

			while ($row = mysqli_fetch_assoc($result)) {
				array_push($vins, $row["C_VIN"]);
			}

			echo $vins[0];

			// Find VIN number
			//$vins = array();
			//$result = mysqli_query($conn, "SELECT * FROM Car WHERE CI_ID = '".$ci_id."';");

			$qry = "SELECT COUNT(*) as NUM FROM Reservation WHERE '".$pick_up->format('H:i:s')."' < PICK_UP AND '".$drop_off->format('H:i:s')."' < PICK_UP AND";

			for ($i = 0; $i < sizeof($vins); $i++) {
				if ($i == 0) {
					$qry = $qry . " C_VIN = '".$vins[$i]."'";
				}
				else {
					$qry = $qry . " OR C_VIN = '".$vins[$i]."'";
				}
			}

			$qry = $qry .";";
			echo $qry;

			$result = mysqli_query($conn, $qry);

				// The vehicle is available!
				
				while ($row = mysqli_fetch_assoc($result)) {
					// Then we can rent.
					if ($row["NUM"] == 0) { ?>
						<table class="table">
						<caption>Cars Available</caption>
						<tbody>
						<thead>
							<tr>
								<th>Year</th><th>Make</th><th>Model</th><th>Rent</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$result = mysqli_query($conn, "SELECT * FROM Car NATURAL JOIN CarInfo NATURAL JOIN Location WHERE Car.CI_ID = CarInfo.CI_ID AND Car.LOC_ID = Location.LOC_ID AND C_VIN = '".$vins[0]."';");

							?>
						</tbody>
					</table>
					<?php } 
						

					// We cannot rent.
					else {
						echo "<h4>No cars are available.  Please <a href='check_availability.php'>search</a> again.</h4>";
					}
				}


				?>
				<table class="table">
					<caption>Cars Available</caption>
					<tbody>
						<thead>
							<tr>
								<th>Year</th><th>Make</th><th>Model</th><th>Rent</th>
							</tr>
						</thead>
					<?php
						$result = mysqli_query($conn, "SELECT * FROM Car NATURAL JOIN CarInfo NATURAL JOIN Location WHERE Car.CI_ID = CarInfo.CI_ID AND Car.LOC_ID = Location.LOC_ID AND C_VIN = '".$vins[0]."';");
						while ($row = mysqli_fetch_assoc($result)) {
							$no_cars = false;
							echo "<tr>";
								echo "<td>".$row["YEAR"]."</td>";
								echo "<td>".$row["MAKE"]."</td>";
								echo "<td>".$row["MODEL"]."</td>";
								echo "<td>";
								echo "<form method='post' action='rent.php'>";
								echo "<input type='hidden' name='date' value='".$date."' />";
								echo "<input type='hidden' name='drop_off' value='".$drop_off2."' />";
								echo "<input type='hidden' name='pick_up' value='".$pick_up->format('H:i:s')."' />";
								echo "<input type='hidden' name='car_vin' value='".$row["C_VIN"]."'/>";
								echo "<button type='submit' value='Submit'>Rent</button>";
								echo "</td>";
							echo "</tr>";
						}
					?>
					</tbody>
				</table>
				<?php
			
				if ($no_cars) {
					echo "<h4>No cars are available.  Please <a href='check_availability.php'>search</a> again.</h4>";
				}
				/*$used_vins = array();

				while ($row = mysqli_fetch_assoc($result)) {
					array_push($used_vins, $row["C_VIN"]);
				}*/
			// Look in reservation,
			//$result = mysqli_query($conn, "");

				
		?>

	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>