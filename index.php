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

		$result = mysqli_query($conn, "SELECT * FROM COMMENTS GROUP BY COM_ID ASC LIMIT 10;");

		while ($row = mysqli_fetch_assoc($result)) {
			echo $row["TITLE"];
		}


	?>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>