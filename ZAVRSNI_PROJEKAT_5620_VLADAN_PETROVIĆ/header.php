<?php
    session_start();
    require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <header>
        <nav>
            <ul class="topnav">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="followers.php">Friends</a></li>
                <li><a href="changeProfile.php">Change profile</a></li>
                <li><a href="changePass.php">Change password</a></li>
                <li class="right text-light font-weight-bolder font-italic"><h5>Hello, <?php echo $_SESSION['full_name']; ?>!</h5></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    
