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
		<!-- Model, Date, Pick up time, Drop off time, Search -->
		<form method="post" action="search.php">
		  <div class="form-group">
		    <label for="model">Model</label><br />
		    <select id="model" name="model">
		    	<?php
		    		$result = mysqli_query($conn, "SELECT * FROM CarInfo;");

		    		while ($row = mysqli_fetch_assoc($result)) {
		    			echo "<option value='".$row["YEAR"]."~".$row["MAKE"]."~".$row["MODEL"]."'>".$row["YEAR"]."<p> </p>".$row["MAKE"]."<p> </p>".$row["MODEL"]."</option>";
		    		}
		    	?>
			</select>
		  </div>
		  <?php $date = date("Y-m-d"); ?>
		  <div class="form-group">
		    <label for="date">Date</label>
		    <?php echo "<input type='date' class='form-control' min='".$date."' name='date' id='date' placeholder='Date'>"; ?>
		  </div>
		  <div class="form-group">
		    <label for="pick_up">Pickup Time</label>
		    <input type="time" class="form-control" name="pick_up" id="pick_up" placeholder="Pickup Time">
		  </div>
		  <div class="form-group">
		    <label for="drop_off">How Long (In Hours):</label>
		    <input type="number" class="form-control" name="drop_off" id="drop_off" placeholder="Drop Off Time">
		  </div>
		  <button type="submit" class="btn btn-default">Search</button>
		</form>

	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>