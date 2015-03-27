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
	
	
		if($submit){
			if($TITLE&$COMMENT){
				$insert=mysql_query("INSERT INTO COMMENTS (TITLE,COMMENT) VALUES ('$TITLE','$COMMENT') ");
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
	<center>
	<form action="index.php" method="POST">
	<table>
	<tr><td>Title: <br><input type="text" Title ="Title"/></td></tr>
	<tr><td colspan="2">Comment: </td></tr>
	<tr><td colspan="5"><textarea Title="comment" rows="10" cols="50"></textarea></td></tr>
	<tr><td colspan="2"><input type="submit" Title="submit" value="Comment"></td></tr>
	</table>
	</form>
		
	<?php

	$getquery=mysqli_query($conn, "SELECT * FROM COMMENTS GROUP BY COM_ID ASC LIMIT 10;");
	while($row=mysqli_fetch_assoc($getquery)){
	
		$TITLE=$row['TITLE'];
		$COMMENT=$row['COMMENT'];

		echo $TITLE . '<br/>' . '<br/>' . $COMMENT . '<br/>' . '<br/>' . '<hr size="1"/>';
	}
	
	?>

	
	</body>
	</html>
	
		


</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>