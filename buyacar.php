
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>



body {
    font-family: Arial;
    padding: 20px;
    background: #f1f1f1;
}


.header {
    padding: 30px;
    font-size: 40px;
    text-align: center;
    background: white;
}


.rightcolumn {   
    float:right;
    width: 100%;
}

.right {
    text-align: right;
    float: right;
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
  <h2>Car Selling Website</h2>
</div>
  
<div class= "left">
<h2>buy car on your own terms</h2>
</div>

</div>
<div class= "right">
<a href= "index.php" >My Account</a> |
<a href= "frontpage.php" >Home</a>


</div>


<?php

$dbconnection = mysqli_connect("localhost", "root", "seedubuntu","ss_lbs_f18");
                if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
                }
$sql = "select * from posts";
$result = $dbconnection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	$str = $row["text"];
	//echo htmlentities($str);
        echo "Ownername: " . $row["owner"]. " -Title: " . $row["title"]. "  Text " .htmlentities($row["text"]). "<br>";
    }
} else {
    echo "0 results";
}
$dbconnection->close();
?>
</body>
</html>

