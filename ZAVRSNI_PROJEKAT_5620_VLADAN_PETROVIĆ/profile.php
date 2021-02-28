<?php

    require_once "header.php";
    require_once "connection.php";

    $id = $_GET['user_id'];

    if(empty($id)){
        echo "<p class='error poruka'>Pogresan id</p>";
    }
    else {
        $sql = "SELECT id FROM users WHERE id = $id";

        $result=$conn->query($sql);
        if($result->num_rows == 0) {
            echo "<p class='error poruka'>Mreza nema takvog korisnika</p>";
        }
        else {
            $q = "SELECT u.id, u.username, p.name, p.surname, p.dob, p.gender, p.bio
                FROM users AS u
                INNER JOIN profiles AS p
                ON u.id = p.user_id
                WHERE u.id = $id";

            $result = $conn->query($q);

            if($result->num_rows == 0) {
                echo "<p class='error poruka'>Mreza nema takvog korisnika</p>";
        }
            else {
                echo "<table class='tabela'>";
                echo "<tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>About me</th>
                </tr>";
                foreach($result as $row) {
                    if($row['gender'] == 'm') {
                        $color = 'blue';
                    }
                    elseif ($row['gender'] == 'f') {
                        $color = 'pink';
                    }
                    else {
                        $color = 'grey';
                    }
                    echo "<tr style='color:$color'>";
                    echo "<td>" . $row['name'] . ' ' .  $row['surname'] ."</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['bio'] . "</td>";
                    echo "</tr>";
                    echo "</table>";
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
</head>
<body>
    
    <p class='dugme'>
        <a href="followers.php">Go to the followers page</a>
    </p>
</body>
</html>