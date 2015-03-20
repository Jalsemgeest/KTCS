<?php

	session_start();
	require_once("config/config.php");

	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	if (mysqli_connect_errno()) {
		die("Failed to connect to the database.");
	}

	$email = strtoupper(mysql_real_escape_string($_POST["r_email"]));

	$password = hash('sha256', mysql_real_escape_string($_POST["r_pass"]));

	$conf_pass = hash('sha256', mysql_real_escape_string($_POST["r_pass_conf"]));

	$f_name = strtoupper(mysql_real_escape_string($_POST["first_name"]));

	$l_name = strtoupper(mysql_real_escape_string($_POST["last_name"]));

	$address = strtoupper(mysql_real_escape_string($_POST["address"]));

	$l_num = strtoupper(mysql_real_escape_string($_POST["license"]));

	$cc_num = strtoupper(mysql_real_escape_string($_POST["cc_num"]));

	$cc_date = strtoupper(mysql_real_escape_string($_POST["cc_exp"]));


	// Checking to ensure the user does not already exist.
	$result = mysqli_query($conn, "SELECT * FROM Member WHERE EMAIL ='".$email."';");

	if (mysqli_num_rows($result) == 1) {
		echo "Registration failed.  The email provided already exists. Please try <a href='login.php'>again</a>.";
	}

	echo $email . " " . $password . " " . $conf_pass . " " . $f_name . " " . $l_name  . " " . $address . " " . $l_num . " " . $cc_num  . " " . $cc_date;

	//$result = mysqli_query($conn, "INSERT INTO Member(")

	echo "Login failed.  Please go back to the <a href='login.php'>Login Page</a> to try again.";

?>