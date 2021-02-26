<?php
    //Otvaranje sesije na pocetku stranice
    session_start();

    require_once "connection.php";
    $usernameError = $passError = "*";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Korisnik je poslao username i pass i pokusava logovanje
        $username = $conn->real_escape_string($_POST['username']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $val = true;
        if(empty($username)) {
            $val = false;
            $usernameError = "Username cannot be left blank!";
        }
        if(empty($pass)) {
            $val = false;
            $passError = "Password cannot be left blank!";
        }
        if($val) {
            //Pokusamo da ulogujemo korisnika samo ako su sva polja forme neprazna
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);
            if($result->num_rows == 0) {
                $usernameError = "This username doesn't exist!";
            }
            else {
                //Postoji korisnicko ime, treba proveriti sifre
                $row = $result->fetch_assoc();
                $dbPass = $row['pass'];
                if($dbPass != md5($pass)) {
                    $passError = "Incorrect password";
                }
                else {
                    //ovde vrsimo logovanje
                    $_SESSION['id'] = $row['id'];
                    

                    $sql = "SELECT CONCAT(`name`, ' ', `surname`) AS 'full_name' FROM profiles
                    INNER JOIN users
                    ON users.id = profiles.user_id
                    WHERE username = '$username'";

                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $_SESSION['full_name'] = $row['full_name'];

                    header('Location: followers.php');
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to the site</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    
    <form class="forma w3-container w3-card-4" action="#" method="post">
        <p>
            <label class="font w3-text-blue" for="username"><b>Username: </b></label>
            <input class="w3-input w3-border" type="text" name="username" id="username" placeholder="Enter your username">
            <span class='error'><?php echo $usernameError ?></span>
        </p>

        <p>
            <label class="font w3-text-blue" for="pass"><b>Password: </b></label>
            <input class="w3-input w3-border" type="password" name="pass" id="pass" placeholder="Enter your password">
            <span class='error'><?php echo $passError ?></span>
        </p>

        <p>      
            <button class="button w3-btn w3-blue">Log in!</button>
        </p>
    </form>

</body>
</html>


