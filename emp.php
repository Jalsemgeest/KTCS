<html>
<head>
	<?php
	 require_once("template/header.php");
	 $_SESSION["CURR_PAGE"] = "login"; ?>
	<title>KTCS - Employee Log in</title>
</head>
<body>
	<?php require_once("template/top.php"); ?>
	
	<div class="container">
		<h3>Employee Log In</h3>
		<form action="emp_log_in.php" method="post">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>