<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		session_start();
		require_once("config/config.php");

		$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

		if (mysqli_connect_errno()) {
			die("Failed to connect to the database.");
		}
		
	?>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">