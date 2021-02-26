<?php
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
</head>
<body>
    
        <?php
            $ime = $prezime = $datum = $pol = $username = $password = $repassword = "";
            $imeErr = $prezimeErr = $datumErr = $usernameErr = $passwordErr = $repasswordErr = "";
            $prikazi = true;

            if($_SERVER["REQUEST_METHOD"] == "POST") {
               if(empty($_POST["ime"])) {
                   $prikazi = false;
                   $imeErr="Morate uneti ime";
               }
               elseif(ctype_alpha(str_replace(' ', '', $_POST["ime"]))==false && preg_match('/[ĐđŽžĆćČčŠš]/m',$_POST["ime"])==false){
                    $prikazi = false;
                    $imeErr="Polje mora da sadrzi slova i praznine";
                }
               elseif(strlen($_POST["ime"])>50) {
                    $prikazi = false;
                    $imeErr = "Predugacak unos";
               }
               else {
                    $ime = trim($_POST["ime"]);
                    $ime = preg_replace('/\s\s+/', ' ', $ime);
               }


               if(empty($_POST["prezime"])) {
                    $prikazi = false;
                    $prezimeErr="Morate uneti prezime";
                }
                elseif(ctype_alpha(str_replace(' ', '', $_POST["prezime"]))==false && preg_match('/[ĐđŽžĆćČčŠš]/m',$_POST["prezime"])==false){
                    $prikazi = false;
                    $prezimeErr="Polje mora da sadrzi slova i praznine";
                }
                elseif(strlen($_POST["prezime"])>50) {
                    $prikazi = false;
                    $prezimeErr = "Predugacak unos";
                }
                else {
                    $prezime = trim($_POST["prezime"]);
                    $prezime = preg_replace('/\s\s+/', ' ', $prezime);
               }
            

                    // $pol = $_POST["pol"];
            

                if(empty($_POST["datum"])) {
                    $prikazi = true;
                }
                elseif($_POST["datum"] < "1900-01-01") {
                    $prikazi = false;
                    $datumErr = "Neispravan datum";
                }
                else {
                    $datum = $_POST["datum"];
                }


                if(empty($_POST["username"])) {
                    $prikazi = false;
                    $usernameErr="Morate uneti username";
                }
                elseif(strpos(($_POST["username"]), " ") !== false) {
                    $prikazi = false;
                    $usernameErr="Unos ne moze da sadrzi razmake";
                }
                elseif(strlen($_POST["username"])<5 || strlen($_POST["username"])>50) {
                    $prikazi = false;
                    $usernameErr = "Polje mora da sadrzi izmedju 5 i 50 karaktera";
                }
                else {
                    $username = $_POST["username"];
                }


                if(empty($_POST["password"])) {
                    $prikazi = false;
                    $passwordErr="Morate uneti password";
                }
                elseif(strpos(($_POST["password"]), " ") !== false) {
                    $prikazi = false;
                    $passwordErr="Unos ne moze da sadrzi razmake";
                }
                elseif(strlen($_POST["password"])<5 || strlen($_POST["password"])>25) {
                    $prikazi = false;
                    $passwordErr = "Polje mora da sadrzi izmedju 5 i 25 karaktera";
                }
                else {
                    $password = $_POST["password"];
                }

                
                if(empty($_POST["repassword"])) {
                    $prikazi = false;
                    $repasswordErr="Morate uneti password";
                }
                elseif(strlen($_POST["repassword"])<5 || strlen($_POST["repassword"])>25) {
                    $prikazi = false;
                    $repasswordErr = "Polje mora da sadrzi izmedju 5 i 25 karaktera";
                }
                elseif($_POST["password"] != $_POST["repassword"]) {
                    $prikazi = false;
                    $repasswordErr="Password i ponovljeni password moraju biti isti";
                }
                else {
                    $repassword = $_POST["repassword"];
                }

                if($prikazi) {
                    $ime = $conn->real_escape_string($ime);
                    $prezime = $conn->real_escape_string($prezime);
                    $username = $conn->real_escape_string($username);
                    $password = $conn->real_escape_string($password);

                $sql = "SELECT *
                    FROM users
                    WHERE username LIKE '$username'";

                $result = $conn->query($sql);
                $br = $result->num_rows;
                if($br != 0){
                $usernameErr = "Korisnicko ime vec postoji";
                }
                $q = "INSERT INTO `users`(`username`, `pass`) 
                    VALUES ('$username', md5('$password'));";
    
                if($conn->query($q)) {
                    //echo "<p class='success'>Uspesno dodat novi korisnik</p>";
                    $q = "SELECT `id` 
                        FROM `users` 
                        WHERE `username` LIKE '$username'";
    
                    $result = $conn->query($q);
                    $red = $result->fetch_assoc();
                    $id = $red['id'];
    
                    $pol = $_POST["pol"];

                    $q = "INSERT INTO `profiles`(`name`, `surname`, `gender`, `dob`, `user_id`) 
                            VALUES ('$ime', '$prezime', '$pol', '$datum', '$id')";
    
                    if($conn->query($q)) {
                        //echo "<p class='success'>Uspesno dodat profil u tabeli profili</p>";
                    }
                    else {
                        echo "<p class='error'>Greska prilikom dodavanja profila u tabelu: " . $conn->error . "</p>";
                    }
                }
                else {
                    // echo "<p>Greska prilikom unosa u tabelu users: " . $conn->error . "</p>";
                }
            }
        }
        ?>

    <div class="container w3-card-4">
        <form action="#" method="post">
            <div class="row">
                <div class="col-25"> 
                    <label class="font1" for="">Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="ime" id="" value="<?php echo $ime; ?>">
                    <span class="error">* <?php echo $imeErr; ?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="">Surname:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="prezime" id="" value="<?php echo $prezime; ?>">
                    <span class="error">* <?php echo $prezimeErr; ?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                <label for="">Gender:</label>
                </div>
                <div class="col-75">
                    <input type="radio" name="pol" id="" value="m" <?php if($pol=="m"){echo 'checked';} ?>>Male
                    <input type="radio" name="pol" id="" value="f" <?php if($pol=="f"){echo 'checked';} ?>>Female
                    <input type="radio" name="pol" id="" value="o"<?php if($pol!="m" && $pol!="f"){echo 'checked';} ?>>Other
                </div>
            </div>

            <div class="row">
                <div class="col-25"> 
                    <label for="">Date of birth:</label>
                </div>
                <div class="col-75">
                    <input type="date" min="1900-01-01" name="datum" id="" value="<?php   echo $datum; ?>">
                    <span class="error">* <?php echo $datumErr; ?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-25">  
                    <label for="">Username:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="username" id="" value="<?php   echo $username; ?>">
                    <span class="error">* <?php echo $usernameErr; ?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-25"> 
                    <label for="">Password:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" id="">
                    <span class="error">* <?php echo $passwordErr; ?></span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-25"> 
                    <label for="">Retype password:</label>
                </div>   
                <div class="col-75">
                    <input type="password" name="repassword" id="">
                    <span class="error">* <?php echo $repasswordErr; ?></span>
                </div>
            </div>

            <div class="row">
                <input type="submit" name="submit" value="Sign Up">
            </div>
        </form>


</body>
</html>