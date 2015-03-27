<html>
<head>
	<?php require_once("template/header.php");
	$_SESSION["CURR_PAGE"] = "MAIN" ?>	
</head>
<body>
	<?php require_once("template/top.php"); ?>

	<div class="container">
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
			  <div class="carousel-caption">
			    <h3>Corvette 2015</h3>
			    <p>You know you'll want to rent this baby!</p>
			  </div>
			</div>
		    <div class="item active">
		      <img style="max-height:510px;" src="img/ferrari.jpg" alt="Ferrari Enzo">
		      <div class="carousel-caption">
		      	<h3>Ferrari Enzo 2014</h3>
		      	<p>Show up everyone else with this car!</p>
		      </div>
		    </div>
		    <div class="item">
		      <img style="max-height:510px;" src="img/rover.jpg" alt="Range Rover 2015">
		      <div class="carousel-caption">
		        <h3>Range Rover Turbo Sport 2014</h3>
		        <p>Want to do some offroading in style?</p>
		      </div>
		    </div>
		    <div class="item">
		      <img style="max-height:510px;" src="img/aston.jpg" alt="Aston Martin Vantage 2015">
		      <div class="carousel-caption">
		        <h3>Aston Martin Vantage 2015</h3>
		        <p>James... James Bond.</p>
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
	
	
	$submit = $_POST['submit'];
	$title = $_POST['title'];
	$comment = $_POST['Comment'];
	
	
	if($submit){
		if($title&$comment){
			$insert=mysqli_query($conn,"INSERT INTO COMMENTS (COM_ID, MEM_ID, EMP_ID, TITLE, COMMENT) VALUES (''.''.'','$title','$comment') ");
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=index.php'>";
		}
		else{
			echo "please fill out all fields";
		}
	}
	
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
	<br></br>
	<h2> Comments </h2>
	<left>
	<form action="index.php" method="POST">
	<table>
	<tr><td><strong>Title:</strong> <br><input type="text" name ="title"/></td></tr>
	<tr><td colspan="2"><strong>Comment:</strong> </td></tr>
	<tr><td colspan="5"><textarea name ="comment" rows="10" cols="50"></textarea></td></tr>
	<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
	</table>
	<hr size = "1">
	</form>

	
	
    <?php
	$getquery=mysqli_query($conn, "SELECT * FROM COMMENTS GROUP BY COM_ID ASC LIMIT 10;");
	while($row=mysqli_fetch_assoc($getquery)){

		$COM_ID = $row['COM_ID'];
		$TITLE=$row['TITLE'];
		$COMMENT=$row['COMMENT'];

		echo "<strong>Title:</strong>", $TITLE . '<br/>' . '<br/>' . "<strong>Comment:</strong>" ,$COMMENT . '<br/>' . '<br/>' . '<hr size="1"/>';
}
	?>


	</body>
	</html>
	
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>