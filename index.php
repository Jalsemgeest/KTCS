<html>
<head>
	<?php require_once("template/header.php");
	$_SESSION["CURR_PAGE"] = "MAIN" ?>	
</head>
<body>
	<?php require_once("template/top.php"); ?>

	<div class="container">
		<?php
			if (isset($_SESSION["USER_ID"])) {
				// User is logged in
				// Check if there are any outstanding reservations that they currently have.
				$date = date("Y-m-d");
				$now = date("H:i:s");

				$result = mysqli_query($conn, "SELECT * FROM Reservation NATURAL JOIN Car NATURAL JOIN CarInfo WHERE Reservation.C_VIN = Car.C_VIN AND Car.CI_ID = CarInfo.CI_ID AND MEM_ID = '".$_SESSION["USER_ID"]."' AND DATE < '".$date."' OR (DATE = '".$date."' AND PICK_UP <= '".$now."');");
				
				if (mysqli_num_rows($result) > 0) {
					?>
					<table class="table">
						<thead>
							<tr>
								<th>Reservation Number</th>
								<th>Car</th>
								<th>Picked Up</th>
								<th>Return</th>
							</tr>
						</thead>
						<tbody>
					<?php
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>".$row["RES_NUM"]."</td>";
							echo "<td>".$row["MAKE"]. " " . $row["MODEL"] ."</td>";
							echo "<td>".$row["DATE"]. " " . $row["PICK_UP"]."</td>";
							echo "<td>";
							?>
								<form action="return_car.php" method="post">
									<div class="form-group">
										<label for="odom">Odometer</label>
									<?php echo "<input type='number' class='form-control' min='".$row["LAST_ODOM"]."' name='odom' id='odom' placeholder='Odometer' >"; ?>
									</div>
								  <div class="form-group">
								    <?php echo "<input type='hidden' class='form-control' name='returned' id='returned' value='".$row["RES_NUM"]."'>"; ?>
								  </div>
								  <button type="submit" class="btn btn-default">Return Rental</button>
								</form>
							<?php
							echo "</td>";
							echo "</tr>";
						}
					?>
						</tbody>
					</table>
					<?php
				}
			}	
		?>

		<div style="max-height:200px;" class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">

		  	<div class="item">
			  <img style="max-height:510px;" src="img/corvette.jpg" alt="Corvette 2015">
			  <br><br>
			  <div class="carousel-caption">
			    <h3>Corvette 2015</h3>
			    <p>You know you'll want to rent this baby!</p>
			  </div>
			</div>
		    <div class="item active">
		      <img style="max-height:510px;" src="img/ferrari.jpg" alt="Ferrari Enzo">
		      <br><br><br>
			  <div class="carousel-caption">
		      	<h3><font color = 'black'>Ferrari Enzo 2014</font></h3>
		      	<p><font color = 'black'>Show up everyone else with this car!</font></p>
		      </div>
		    </div>
		    <div class="item">
		      <img style="max-height:510px;" src="img/rover.jpg" alt="Range Rover 2015">
			  <br><br><br>
		      <div class="carousel-caption">
		        <h3><font color = 'black'>Range Rover Turbo Sport 2014</font></h3>
		        <p><font color = 'black'>Want to do some offroading in style?</font></p>
		      </div>
		    </div>
		    <div class="item">
		      <img style="max-height:510px;" src="img/aston.jpg" alt="Aston Martin Vantage 2015">
			  <br><br>
		      <div class="carousel-caption">
		        <h3>Aston Martin Vantage 2015</h3>
		        <p>James... James Bond.</p>
		      </div>
		    </div>
		  </div>
	  	</div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	<!-- Show comments here -->
	

	<?php

	require_once("config/config.php");

	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	if (mysqli_connect_errno()) {
		die("Failed to connect to the database.");
	}
	
	
	$name = "";
	if (isset($_POST['title'])){
		$name = $_POST['title'];
	}

	$comment = "";
	if (isset($_POST['comment'])){
		$comment = $_POST['comment'];
	}
	
	$submit = "";
	if (isset($_POST['submit'])){
		$submit = $_POST['submit'];
	}


	
	if($submit){
		if($name&&$comment){
 		$result =mysqli_query($conn,"INSERT INTO Comments (TITLE, COMMENT) VALUES ('".$name."', '".$comment."') ");
			//echo "Thank you for your feedback.";
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=index.php'>";
		}
	 	else{
	 		echo "<h2><br><center><strong><font color = 'red'> Please Fill Out All Fields</font></strong></h2>";
 		}
	}


	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
	<br></br>
	<h3> <center> Please leave us feedback :)</h3><hr size="2"/>
	<center>
	<form action="index.php" method="POST">
	<table>
	<tr><td><strong>Title:</strong> <br><input type="text" name ="title"/></td></tr>
	<tr><td colspan="2"><strong>Comment:</strong> </td></tr>
	<tr><td colspan="5"><textarea name ="comment" rows="15" cols="100"></textarea></td></tr>
	<tr><td colspan="2"><br><input type="submit" name="submit" value="Add Your Comment"></td></tr>
	
	</table>
	<hr size = "1">
	</form>

	
	
    <?php
	$getquery=mysqli_query($conn, "SELECT * FROM COMMENTS GROUP BY COM_ID ASC LIMIT 10;");
	while($row=mysqli_fetch_assoc($getquery)){

		$TITLE=$row['TITLE'];
		$COMMENT=$row['COMMENT'];
	

		// if ($row['MEM_ID'] == 1 && $EMP_ID == 0) {
		// 	echo 
		// }
		// echo "<strong>Title:</strong>", $TITLE . '<br/>' . '<br/>' . "<strong>Comment:</strong>" ,$COMMENT . '<br/>' . '<br/>' . '<hr size="1"/>';
	
		echo "<strong>Title:</strong>", $TITLE . '<br/>' .  $COMMENT . '<br/>' . '<hr size="1"/>';
	}
	?>

	</body>
	</html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>