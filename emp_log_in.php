<?php

	session_start();
	require_once("config/config.php");

	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	if (mysqli_connect_errno()) {
		die("Failed to connect to the database.");
	}

	$email = strtoupper(mysql_real_escape_string($_POST["email"]));

	$password = hash('sha256', mysql_real_escape_string($_POST["password"]));

	$result = mysqli_query($conn, "SELECT * FROM Employee WHERE EMAIL ='".$email."' AND PASSWORD = '".$password."';");

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$_SESSION["EMP_ID"] = $row["EMP_ID"];
		}
		header("Location: index.php");
		exit();
	}

	echo "Login failed.  Please go back to the <a href='emp.php'>Employee Login Page</a> to try again.";



?>