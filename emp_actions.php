<html>
<head>
	<?php require_once("template/header.php");
	$_SESSION["CURR_PAGE"] = "EMP_ACTIONS" ?>	
</head>
<body>
	<?php require_once("template/top.php"); ?>

	<div class="container">

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          Find All Users Whose Subscription Expires Today
		        </a>
		      </h4>
		    </div>
		    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
		        <form method="post" action="get_expiring.php">
					<buttom type="submit" class="btn btn-default">Get Users</button>
				</form>
		      </div>
		    </div>
		  </div>

		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          Add a Car
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		        <form method="post" action="add_car.php">
				  <div class="form-group">
				    <label for="vin">VIN Number:</label>
				    <input type="text" class="form-control" name="vin" id="vin" placeholder="Vin Number">
				  </div>
				  <div class="form-group">
				    <label for="make">Make:</label>
				    <input type="text" class="form-control" name="make" id="make" placeholder="Make">
				  </div>
				  <div class="form-group">
				    <label for="model">Model:</label>
				    <input type="text" class="form-control" name="model" id="model" placeholder="Model">
				  </div>
				  <div class="form-group">
				    <label for="year">Year:</label>
				    <input type="number" class="form-control" name="year" id="year" placeholder="Year">
				  </div>
				  <div class="form-group">
				    <label for="cost">Cost:</label>
				    <input type="number" class="form-control" name="cost" id="cost" placeholder="Cost in $">
				  </div>
				  <div class="form-group">
				    <label for="location">Location:</label>
				    <select name="location">
				    	<?php
				    		$result = mysqli_query($conn, "SELECT * FROM Location;");
				    		while ($row = mysqli_fetch_assoc($result)) {
				    			echo "<option value='".$row["LOC_ID"]."'><p>".$row["ADDRESS"]."</p></option>";
				    		}
				    	?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="odom">Odometer:</label>
				    <input type="number" class="form-control" name="odom" id="odom" placeholder="Odometer">
				  </div>
				  <div class="form-group">
				    <label for="gas">Gas:</label>
				    <input type="number" class="form-control" name="gas" id="gas" placeholder="Gas">
				  </div>
				  <buttom type="submit" class="btn btn-default">Create New Car</button>
				</form>
		      </div>
		    </div>
		  </div>

		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          Show Rental History for a Car
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="panel-body">
		       	<form method="post" action="get_rental_history.php">
		       		<div class="form-group">
			       		<select name="car">
			       			<?php
					    		$result = mysqli_query($conn, "SELECT * FROM Car NATURAL JOIN CarInfo WHERE Car.CI_ID = CarInfo.CI_ID");
					    		while ($row = mysqli_fetch_assoc($result)) {
					    			echo "<option value='".$row["C_VIN"]."'><p>".$row["MODEL"]." ".$row["MAKE"]."</p></option>";
					    		}
					    	?>
			       		</select>
		       		</div>
		       		<button type="submit" class="btn btn-default">Get Car History</button>
		       	</form>
		      </div>
		    </div>
		  </div>

		

		<div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingFour">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
		          Show All Cars Available at Location
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      <div class="panel-body">
		        <form method="post" action="show_all_at_loc.php">
				  <div class="form-group">
				    <label for="location">Location:</label>
				    <select name="location">
				    	<?php
				    		$result = mysqli_query($conn, "SELECT * FROM Location;");
				    		while ($row = mysqli_fetch_assoc($result)) {
				    			echo "<option value='".$row["LOC_ID"]."'><p>".$row["ADDRESS"]."</p></option>";
				    		}
				    	?>
				    </select>
				  </div>
				  <buttom type="submit" class="btn btn-default">Get All Cars From Location</button>
				</form>
		      </div>
		    </div>
		  </div>



		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingFive">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
		          Get All Cars That Need Maintenance
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
		      <div class="panel-body">
		        <form action="get_cars_needing_main.php" method="post">
		        	<button type="submit" class="btn btn-default">Get Cars</button>
		        </form>
		      </div>
		    </div>
		  </div>


		<div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSix">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
		          Highest and Lowest Number of Rentals
		        </a>
		      </h4>
		    </div>
		    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		      <div class="panel-body">
		        <form action="get_high_low.php" method="post">
		        	<button type="submit" class="btn btn-default">Get High and Low</button>
		        </form>
		      </div>
		    </div>
		  </div>

		<div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSeven">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
		          Get Reservations for a Given Day
		        </a>
		      </h4>
		    </div>
		    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
		      <div class="panel-body">
		        <form action="get_res_for_day.php" method="post">
		          <div class="form-group">
				    <label for="day">Rental Date:</label>
				    <input type="date" class="form-control" name="day" id="day">
				  </div>
				  <button type="submit" class="btn btn-default">Get Reservations</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
		
	</div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>