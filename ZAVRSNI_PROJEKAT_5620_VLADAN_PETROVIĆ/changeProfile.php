<?php
    require_once "header.php";
    require_once "connection.php";
    require_once "db_update1.php";

    $id = $_SESSION['id'];

    $validated = true;
    $ime = $prezime = $pol = $datum = $bio =  "";
    $imeErr = $prezimeErr = $datumErr = $bioErr =  "";

    $q = "SELECT * FROM profiles WHERE user_id = $id";
    $result = $conn->query($q);
    $red = $result->fetch_assoc();
    $ime = $red['name'];
    $prezime = $red['surname'];
    $pol = $red['gender'];
    $datum = $red['dob'];
    $bio = $red['bio'];


    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Uzimamo podatke iz forme
        $ime = ($_POST['ime']);
        $prezime = ($_POST['prezime']);
        $datum = ($_POST['datum']);
        $pol = $_POST['pol'];
        $bio = $_POST['bio'];

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
     
             $pol = $_POST["pol"];

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

         if(empty($_POST["bio"])) {
             $prikazi = false;
             $bioErr =  "Morate uneti biografiju";
         }
         else {
             $bio = $_POST["bio"];
         }
    }

    if($validated) {
        $sql = "UPDATE profiles SET name = '$ime', surname = '$prezime', dob = '$datum', gender = '$pol', bio = '$bio' WHERE user_id = $id;";
        $result = $conn->query($sql);
        

        $sql = "SELECT CONCAT(`name`, ' ', `surname`) AS 'full_name' 
                FROM profiles
                INNER JOIN users
                ON users.id = profiles.user_id
                WHERE user_id = $id";

                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $_SESSION['full_name'] = $row['full_name'];
    }
        
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <form class='forma' action="#" method="post">
        <p>
            <label class="font" for="">Name:</label>
            <input type="text" name="ime" value="<?php echo $ime; ?>">
            <span class="error">* <?php echo $imeErr; ?></span>
        </p>
        <p>
            <label class="font" for="">Surname:</label>
            <input type="text" name="prezime" value="<?php echo $prezime; ?>">
            <span class="error">* <?php echo $prezimeErr; ?></span>
        </p>
        <p>
            <label class="font" for="">Gender:</label>
            <input type="radio" name="pol" value="m" <?php if($pol=="m"){echo 'checked';} ?>>Male
            <input type="radio" name="pol" value="f" <?php if($pol=="f"){echo 'checked';} ?>>Female
            <input type="radio" name="pol" value="o" <?php if($pol!="m" && $pol!="f"){echo 'checked';} ?>>Other
        </p>
        <p>
            <label class="font" for="">Date of birth:</label>
            <input type="date" name="datum" value="<?php echo $datum; ?>">
            <span class="error"><?php echo $datumErr; ?></span>
        </p>
        <p>
            <label class="font" for="">Biografija: </label>
            <textarea name="bio" id="" cols="60" rows="5"><?php echo $bio; ?></textarea>
            <span class="error"><?php echo $bioErr; ?></span>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>

</body>
</html>