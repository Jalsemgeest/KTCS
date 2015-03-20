<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "availability"; ?>
	<title>KTCS - Availability</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	<div class="container">
		<?php
			$result = mysqli_query($conn, "SELECT * FROM Reservation WHERE RES_NUM = '".$_SESSION["NEW_RES"]."';");

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<h3>Your reservation has been successful on: " . $row["DATE"];
			}
		?>

	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>