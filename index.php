<html>
<head>
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (isset($_SESSION['username'])) {
header('Location: main.php');
}

?>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.bootstrap-theme-min.css">
<<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
</head>

<body>
<div id="outerdiv" >
	<div id="div1">
		<p id="p1" >Sign In </p>
		<p id="p1" style="font-size:15px">Logging System Account</p>
		<form action="log.php" method="POST">
			<input type="text" id="textbox" name="username" placeholder="Username"><br>
			<input type="password" id="textbox" name="password" placeholder="Password">
			<input type="submit" id="submit" value="Submit" style="margin-top:30px;">
		</form>
	
	</div>

	<img id="divimage" src="myimage.jpg"></img>
</div>	


</body>

<footer id="footer"><p align="center">&copy; OJT</p></footer>
</html>