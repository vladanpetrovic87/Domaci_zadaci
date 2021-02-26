<?php

    require_once "header.php";

    if(empty($_SESSION['id'])) {
        header('Location: login.php');
    }

    $id = $_SESSION['id']; //ID logovanog korisnika

    $q = "SELECT u.id, u.username, p.name, p.surname
    FROM users AS u
    INNER JOIN profiles AS p
    ON u.id = p.user_id
    WHERE u.id != $id
    ORDER BY p.name, p.surname";
    
    $result = $conn->query($q);
    if($result->num_rows == 0) {
        echo "<p class='error'>Mreza nema nijednog korisnika</p>";
    }
    else {
        echo "<table class='tabela'>";
        echo "<tr>
        <th>Ime i prezime</th>
        <th>Korisnicko ime</th>
        <th>Akcije</th>
        </tr>";
        foreach($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['name'] . $row['surname'] ."</td>";
            echo "<td>" . $row['username'] . "</td>";
            $friendId = $row['id'];
            echo "<td><a href='follow.php?friend_id=$friendId'>Follow</a>";
            echo "&nbsp;";
            echo "<a href='unfollow.php?friend_id=$friendId'>Unfollow</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }



?>