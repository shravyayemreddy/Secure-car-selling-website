
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
<h2>New post to sell a car</h2>
</div>

</div>
<div class= "right">
<a href= "index.php" >My Account</a> |
<a href= "frontpage.php" >Home</a>


</div><?php
  session_start();

 //echo "I am here";
  $title = $_POST["title"];
  $text = $_POST["text"];
  $owner = $_SESSION["username"];
  if (isset($title) and isset($text) ){

     if(new_post($owner,$title,$text))
        echo "add new post";
      else
	 echo "cannot add the new post";
   } else {
	echo "no title / content";
	}


?>

<form action="sellacar.php" method="POST" class="form post">
	<input type="hidden" name="nocsrftoken" value="<?php echo $rand;?>"/>
	title:<input type="text" name="title" /> <br>
	text: <textarea name= "text" required cols="100" rows="10"></textarea><br>
	<button class="button" type="submit">
		Add Post to sell a car 
	</button>
</form>

<?php
function new_post($owner,$title,$text) {

	$dbconnection = mysqli_connect("localhost", "root", "seedubuntu","ss_lbs_f18");
                if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
                }
	 $sql = "INSERT INTO posts (owner,title,text) VALUES ('";
	 $owner .= mysqli_real_escape_string($dbconnection, htmlspecialchars($_POST["owner"]));
        $title .= mysqli_real_escape_string($dbconncetion, htmlspecialchars($_POST["title"]));
        $text .= mysqli_real_escape_string($dbconnection, htmlspecialchars($_POST["text"]));
	$sql .= $owner."','".$title."','".$text;
        $sql.= "')";
	if ($dbconnection->query($sql) === TRUE) {
    echo "New record created successfully";
 return TRUE;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
 $dbconnection->close();      

}

?>
</body>
</html>

