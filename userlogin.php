<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>



body {
    font-family: Arial;
    padding: 20px;
    background:  #f1f1f1;
}

.header {
    padding: 30px;
    font-size: 40px;
    text-align: center;
    background: white;
}


.right {
    text-align: right;
    
}


@media screen and (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
}
</style>
</head>
<body>
	<div class="header">
	<h2>Welcome to Car selling website</h2>
</div>

   	<h2>SELL YOUR CARS AT YOUR TERMS</h2>
<?php
	session_start();
	if (isset($_SESSION["logged"]) and $_SESSION["logged"] === TRUE) {
		echo "<script>alert('You have been logged in. Welcome back!');</script>";
		header("Refresh:0; url=index.php");
		exit();
  	}
	echo "Current time: " . date("Y-m-d h:i:sa") . "<br>\n";
?>
    <form action="index.php" method="POST">
    	Username:<input type="text" name="username" /> <br/>
		Password: <input type="password" name="password" /> <br/>
		<button type="submit">Login</button>
	</form>
</body>
 </html>

