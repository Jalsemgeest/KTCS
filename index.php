<html>
<head>
	<?php require_once("template/header.php");
	$_SESSION["CURR_PAGE"] = "MAIN" ?>	
</head>
<body>
	<?php require_once("template/top.php"); ?>

	<div class="container">

	<!-- Show comments here -->
	<?php

		$result = mysqli_query($conn, "SELECT * FROM Comments GROUP BY COM_ID ASC LIMIT 10;");

		while ($row = mysqli_fetch_assoc($result)) {
			// We now know the Last 10.
			// So grab them
		}


	?>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>