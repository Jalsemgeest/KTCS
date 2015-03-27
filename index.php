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
	
	


</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>