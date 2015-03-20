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

	$phone = strtoupper(mysql_real_escape_string($_POST["phone"]));

	$l_num = strtoupper(mysql_real_escape_string($_POST["license"]));

	$cc_num = strtoupper(mysql_real_escape_string($_POST["cc_num"]));

	$cc_date = strtoupper(mysql_real_escape_string($_POST["cc_exp"]));

	// Checking to ensure the user does not already exist.
	$result = mysqli_query($conn, "SELECT * FROM Member WHERE EMAIL ='".$email."';");

	if (mysqli_num_rows($result) == 1) {
		echo "Registration failed.  The email provided already exists. Please try <a href='login.php'>again</a>.";
	}

	$result = mysqli_query($conn, "SELECT * FROM CreditCard WHERE CC_NUM='".$cc_num."';");

	$cc_id = -1;

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$cc_id = $row["CC_ID"];
		}
	} else {
		$result = mysqli_query($conn, "INSERT INTO CreditCard(CC_NUM, CC_EXP) VALUES('".$cc_num."','".$cc_date."-00');");

		$result = mysqli_query($conn, "SELECT * FROM CreditCard WHERE CC_NUM='".$cc_num."';");
		while ($row = mysqli_fetch_assoc($result)) {
			$cc_id = $row["CC_ID"];
		}
	}

	$date = date('Y-m-d');

	$result = mysqli_query($conn, "INSERT INTO Member(FIRSTNAME, LASTNAME, ADDRESS, PHONE, EMAIL, PASSWORD, LICENSE_NUM, CC_ID, REG_DATE) VALUES(
		'".$f_name."', '".$l_name."', '".$address."', '".$phone."', '".$email."', '".$password."', '".$l_num."', '".$cc_id."', '".$date."');");

	$result = mysqli_query($conn, "SELECT * FROM Member WHERE EMAIL = '".$email."';");

	while ($row = mysqli_fetch_assoc($result)) {
		$_SESSION['USER_ID'] = $row["MEM_ID"];
		header("Location: index.php");
		exit();
	}	


	echo "Registration failed.  Please go back to the <a href='login.php'>Registration Page</a> to try again.";

?>