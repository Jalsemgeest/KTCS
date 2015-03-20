<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "login"; ?>
	<title>KTCS - Log in</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Login</h3>
				<form method="post" action="user_login.php">
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="password">Password:</label>
				    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			<div class="col-md-6">
				<h3>Register</h3>
				<form method="post" action="register.php">
				  <div class="form-group">
				    <label for="r_email">Email:</label>
				    <input type="email" class="form-control" name="r_email" id="r_email" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label for="r_pass">Password:</label>
				    <input type="password" class="form-control" name="r_pass" id="r_pass" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label for="r_pass_conf">Confirm Password:</label>
				    <input type="password" class="form-control" name="r_pass_conf" id="r_pass_conf" placeholder="Confirm Password">
				  </div>
				  <div class="form-group">
				    <label for="first_name">First Name:</label>
				    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
				  </div>
				  <div class="form-group">
				    <label for="last_name">Last Name:</label>
				    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="First Name">
				  </div>
				  <div class="form-group">
				    <label for="address">Address:</label>
				    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
				  </div>
				  <div class="form-group">
				    <label for="phone">Phone Number:</label>
				    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
				  </div>
				  <div class="form-group">
				    <label for="license">License Number:</label>
				    <input type="text" class="form-control" name="license" id="license" placeholder="License Number">
				  </div>
				  <div class="form-group">
				    <label for="cc_num">Credit Card Number:</label>
				    <input type="number" class="form-control" name="cc_num" id="cc_num" placeholder="Credit Card Number">
				  </div>

				  <div class="form-group">
				    <label for="cc_exp">Expiry Year:</label>
				    <input type="month" class="form-control" name="cc_exp" id="cc_exp" placeholder="Expiry">
				  </div>

				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>	
		</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>