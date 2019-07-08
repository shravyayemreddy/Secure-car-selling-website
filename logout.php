<!DOCTYPE html>
<html>
<head>
	<title>Car Selling website</title>
</head>
<body>
	<h1>CAR SELLING WEBSITE</h1>
	
<?php 
	session_start();
	session_destroy();
	echo "Current time: " . date("Y-m-d h:i:sa") . "<br>\n";
?>
	<p>You are logged out. Please click <a href="userlogin.php">here</a> to login again.</p>
</body>
</html>

