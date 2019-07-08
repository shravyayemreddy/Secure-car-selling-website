<!DOCTYPE html>
<html>
<head>
        <title>Car selling website</title>
<style>



body {
    font-family: Arial;
    padding: 20px;
    background:  #f1f1f1;
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

<div class= "right">
	<a href= "buyacar.php" >Buy a car </a>&nbsp;|&nbsp;
	<a href="sellacar.php">Sell a car</a>&nbsp;|&nbsp;
	 <a href="logout.php">Logout</a>&nbsp;|&nbsp;
	</div>
	<br>
	<br>

<?php
        session_start();
        $welcome = "Welcome back "; //default message for return users
        $username = $_POST["username"]; //username input from the user via HTTP Request POST
        $password = $_POST["password"]; //password input from the user via HTTP Request POST
        ///*for debug only*/echo "DEBUG>Received: username=\"" . $username .  "\" and password=\"" . $password . "\"<br>\n";
        if (isset($username) and isset($password) ){
        //the case username and password is provided
        if ( checklogin($username,$password)){
                /*TODO for TASK 1.a*/ $_SESSION["logged"] = TRUE;
                        $_SESSION["username"] = $username;
                        $welcome = "Welcome "; //not previously logged-in
        }else{//failed
                        redirect_login('Invalid username/password');
                }
        }else{//no username/password is provided
                //check if the session has NOT been logged in, redirect to the login page
                /*TODO for TASK 1.b*/ {
                redirect_login('You have not logged in. Please login first!');
                }
        }
        //the main business logic implementation of the page
        //echo "Current time: " . date("Y-m-d h:i:sa") . "\n";
        echo "<h2>" .  $welcome . "<font color='blue'>" . $_SESSION["username"] . "</font>!</h2>\n";
?>
       
<?php   
        //supporting functions 
        
        function checklogin($username, $password) {
                //access the real database to check the username/password
                $dbconnection = mysqli_connect("localhost", "root", "seedubuntu","ss_lbs_f18");
                if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
                }
                /*TODO for TASK 3.a*/

                $sql = "SELECT * FROM users where username='" . $username .
                     "' AND password=password('" . $password . "')";
                 // echo "DEBUG>sql=" . $sql . "<br>\n";
                   $result = mysqli_query($dbconnection,$sql);
                  if($result) {
                     $row = mysqli_fetch_assoc($result);
                   if($username === $row['username']) {
                      return TRUE;
                      }
                   }     
                return FALSE;
        }
?>
</body>
</html>


