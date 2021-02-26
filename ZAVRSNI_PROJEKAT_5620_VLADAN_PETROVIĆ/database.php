<?php

    require_once "connection.php";


    $u = "CREATE TABLE IF NOT EXISTS users (
        id INT UNSIGNED AUTO_INCREMENT,   
        username VARCHAR(50) UNIQUE NOT NULL,
        pass VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )ENGINE=InnoDB;";

    $result = $conn->query($u);

    if($result) {
        echo "<p>Tabela users je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele users: $err</p>";
    }


    $p = "CREATE TABLE IF NOT EXISTS profiles (
        id INT UNSIGNED AUTO_INCREMENT,   
        `name` VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        gender CHAR(1),
        dob DATE,
        user_id INT UNSIGNED UNIQUE,
        FOREIGN KEY(user_id) REFERENCES users(id),
        PRIMARY KEY (id)
    )ENGINE=InnoDB;";

    $result = $conn->query($p);

    if($result) {
        echo "<p>Tabela profiles je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele profiles: $err</p>";
    }


    $f = "CREATE TABLE IF NOT EXISTS followers (
        id INT UNSIGNED AUTO_INCREMENT,   
        sender_id INT UNSIGNED NOT NULL,
        receiver_id INT UNSIGNED NOT NULL,
        FOREIGN KEY(sender_id) REFERENCES users(id),
        FOREIGN KEY(receiver_id) REFERENCES users(id),
        PRIMARY KEY (id)
    )ENGINE=InnoDB;";

    $result = $conn->query($f);

    if($result) {
        echo "<p>Tabela followers je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele followers: $err</p>";
    }





?>