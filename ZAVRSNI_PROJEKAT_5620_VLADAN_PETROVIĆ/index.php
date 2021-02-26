<?php
    session_start();
    require_once "connection.php";

    if(isset($_SESSION['id'])) {
        header("Location: followers.php");
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
    
    
    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-tag w3-padding w3-round-xlarge w3-red w3-xlarge w3-animate-top"><a href="login.php"><b>Log In</b></a></button>
            <button class="w3-button w3-tag w3-padding w3-round-xlarge w3-red w3-xlarge w3-animate-bottom"><a href="register.php"><b>Create New Account</b></a></button>
        </div>
    </div>
    

</body>
</html>