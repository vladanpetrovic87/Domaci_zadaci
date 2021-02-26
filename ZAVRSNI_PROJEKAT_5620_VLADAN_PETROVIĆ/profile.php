<?php

    require_once "header.php";
    require_once "connection.php";

    $id = $_SESSION['id'];

    // if(!empty($_GET['id'])){
    //     $id = $conn->real_escape_string($_GET['id']);
    // }
    $q = "SELECT u.id, u.username, p.name, p.surname, p.dob, p.gender, p.bio
    FROM users AS u
    INNER JOIN profiles AS p
    ON u.id = p.user_id
    WHERE u.id != $id";
    

    $result = $conn->query($q);
    if($result->num_rows == 0) {
        echo "<p class='error poruka'>Mreza nema takvog korisnika</p>";
    }
    else {
        // if($row['gender'] == 'm') 
        echo "<table class='tabela'>";
        echo "<tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Date of birth</th>
        <th>Gender</th>
        <th>About me</th>
        </tr>";
        foreach($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['name'] ."</td>";
            echo "<td>" . $row['surname'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['bio'] . "</td>";
            echo "</tr>";
            echo "</table>";
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
</head>
<body>
    
    <p>
        <a href="followers.php">Idi na stranicu followers</a>
    </p>
</body>
</html>