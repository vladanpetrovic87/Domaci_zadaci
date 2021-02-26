<?php
    require_once "header.php";
    require_once "connection.php";

    if(empty($_SESSION['id'])) {
        header('Location: login.php');
    }

    $id = $_SESSION['id']; //ID logovanog korisnika
    

    if(!empty($_GET['follow'])){
        $friendId = $conn->real_escape_string($_GET['follow']);
    
        $sql = "SELECT * FROM followers
                WHERE sender_id = $id
                AND receiver_id = $friendId";
    
        $result = $conn->query($sql);
        if($result->num_rows == 0) {
            $sql = "INSERT INTO followers(sender_id, receiver_id) VALUE ($id, $friendId)";
            $result1 = $conn->query($sql);
            if(!$result1) {
                echo "<div class='error'>Greska: " . $conn->error . "</div>";
            }
        }
    }

    if(!empty($_GET['unfollow'])){
        $friendId = $conn->real_escape_string($_GET['unfollow']);
    
        $sql = "DELETE FROM followers
                WHERE sender_id = $id
                AND receiver_id = $friendId;";
    
        $result = $conn->query($sql); 
        if(!$result) {
        echo "<div class='error'>Greska: " . $conn->error . "</div>";
        }
    }


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

            //Ispitujemo da li pratim korisnika
            $sql1 = "SELECT * FROM followers
                    WHERE sender_id = $id
                    AND receiver_id = $friendId";
            $result1 = $conn->query($sql1);
            $f1 = $result1->num_rows; // 0 ili 1

            // Ispitujemo da li korisnik prati mene
            $sql2 = "SELECT * FROM followers
                    WHERE sender_id = $friendId
                    AND receiver_id = $id";
            $result2 = $conn->query($sql2);
            $f2 = $result2->num_rows; // 0 ili 1

            if($f1 == 0) {
                if($f2 == 0){
                    $text = "Follow";
                }
                else {
                    $text = "Follow back";
                }
                echo "<td><a href='followers.php?follow=$friendId'>$text</a></td>";
            }
            else {
                echo "<td><a href='followers.php?unfollow=$friendId'>Unfollow</a></td>";
            }

            echo "</tr>";
        }
        echo "</table>";
    }
    
    
    



?>