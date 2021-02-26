<?php
    require_once "header.php";
    require_once "connection.php";

    $id = $_SESSION['id'];

    $validated = true;
    $oldPasswordErr = $newPasswordErr = $retypePasswordErr = "";
    $oldPassword = $newPassword = $retypePassword = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST["newPassword"])) {
            $prikazi = false;
            $newPasswordErr="Morate uneti novi password";
        }
        elseif(strpos(($_POST["newPassword"]), " ") !== false) {
            $prikazi = false;
            $newPasswordErr="Unos ne moze da sadrzi razmake";
        }
        elseif(strlen($_POST["newPassword"])<5 || strlen($_POST["newPassword"])>25) {
            $prikazi = false;
            $newPasswordErr = "Polje mora da sadrzi izmedju 5 i 25 karaktera";
        }
        else {
            $newPassword = $_POST["newPassword"];
        }


        if(empty($_POST["retypePassword"])) {
            $prikazi = false;
            $retypePasswordErr="Morate uneti novi password";
        }
        elseif(strpos(($_POST["retypePassword"]), " ") !== false) {
            $prikazi = false;
            $retypePasswordErr="Unos ne moze da sadrzi razmake";
        }
        elseif(strlen($_POST["retypePassword"])<5 || strlen($_POST["retypePassword"])>25) {
            $prikazi = false;
            $retypePasswordErr = "Polje mora da sadrzi izmedju 5 i 25 karaktera";
        }
        else {
            $retypePassword = $_POST["retypePassword"];
        }
        if($validated) {
            $oldPassword = $conn->real_escape_string($_POST['oldPassword']);
            $newPassword = $conn->real_escape_string($_POST['newPassword']);
            $retypePassword = $conn->real_escape_string($_POST['retypePassword']);
            if ($newPassword != $retypePassword) {
                $newPasswordErr = "Sifre moraju biti iste!";
                $retypePasswordErr = "Sifre moraju biti iste!";
            }
            else {
                $sql = "SELECT pass
                    FROM users
                    WHERE id = $id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $sifra = $row['pass']; 
                if(md5($oldPassword) != $sifra) {
                    $oldPasswordErr = "Uneli ste pogresnu lozinku";
                }
                else {
                    $sql = "UPDATE users
                        SET pass = md5('$newPassword')
                        WHERE id = $id";
                    $result = $conn->query($sql);
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form class='forma' action="" method="post">
        <p>
            <label class="font" for="">Old password:</label>
            <input type="password" name="oldPassword" id="">
            <span class="error">* <?php echo $oldPasswordErr; ?></span>
        </p>
        <p>
            <label class="font" for="">New password:</label>
            <input type="password" name="newPassword" id="">
            <span class="error">* <?php echo $newPasswordErr; ?></span>
        </p>
        <p>
            <label class="font" for="">Retype new password:</label>
            <input type="password" name="retypePassword" id="">
            <span class="error">* <?php echo $retypePasswordErr; ?></span>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>

    </form>
    

</body>
</html>