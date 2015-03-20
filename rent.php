<?php
	
	session_start();
	require_once("config/config.php");

	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	if (mysqli_connect_errno()) {
		die("Failed to connect to the database.");
	}

	$c_vin = strtoupper(mysql_real_escape_string($_POST["car_vin"]));
	$pick_up = strtoupper(mysql_real_escape_string($_POST["pick_up"])).":00";
	$length = strtoupper(mysql_real_escape_string($_POST["drop_off"]));
	$date = strtoupper(mysql_real_escape_string($_POST["date"]));
	$mem_id = $_SESSION['USER_ID'];


	$result = mysqli_query($conn, "SELECT * FROM Car WHERE C_VIN = '".$c_vin."';");

	$loc = -1;

	while ($row = mysqli_fetch_assoc($result)) {
		$loc = $row["LOC_ID"];
	}

	//$qry = "INSERT INTO Reservation(MEM_ID, C_VIN, DATE, PICK_UP, LOC_ID, LENGTH) VALUES('".$mem_id."', '".$c_vin."','".$date."','".$pick_up."','".$loc."','".$length."';";

	//echo $qry;

	$result = mysqli_query($conn, "INSERT INTO Reservation(MEM_ID, C_VIN, DATE, PICK_UP, LOC_ID, LENGTH) VALUES('".$mem_id."', '".$c_vin."','".$date."','".$pick_up."','".$loc."','".$length."');");

	$result = mysqli_query($conn, "SELECT * FROM Reservation WHERE DATE = '".$date."' AND C_VIN = '".$c_vin."' AND MEM_ID = '".$mem_id."';");

	while ($row = mysqli_fetch_assoc($result)) {
		echo "HERE";
		$_SESSION['NEW_RES'] = $row["RES_NUM"];
	}

	//echo $length . " " . $loc . " " . $date;

	header("Location: confirmation.php");
	exit();

?>