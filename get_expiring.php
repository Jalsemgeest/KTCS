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

		$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

		if (mysqli_connect_errno()) {
			die("Failed to connect to the database.");
		}

		$date = date("m-d");


		$result = mysqli_query($conn, "SELECT * FROM Member WHERE REG_DATE LIKE '%-".$date."';");

		 ?>
			<table class="table">

				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td>".$row["MEM_ID"]."</td><td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td><td>".$row["EMAIL"]."</td></tr>";
							}
						} else {
							echo "<tr><td>No users have to renew today</td></tr>";
						}
					?>
				</tbody>
			</table>

</div>
</body>