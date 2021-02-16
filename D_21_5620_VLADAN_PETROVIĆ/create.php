<?php

    $servername = "localhost";
    $username = "admin";
    $password = "admin123";


    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $database = "CREATE DATABASE videoteka_domaci CHARACTER SET utf16 COLLATE utf16_slovenian_ci;";

    if($conn->query($database)) {
        echo "<p>Uspesno izvrseno kreiranje baze</p>";
    }
    else {
        echo "<p>Greska prilikom kreiranja baze: " . $conn->error . "</p>";
    }

    require_once "connection.php";

    $r = "CREATE TABLE IF NOT EXISTS reziseri(
        id INT UNSIGNED, 
        ime VARCHAR(50), 
        prezime VARCHAR(150),
        pol CHAR(1), 
        PRIMARY KEY(id)
    )ENGINE=InnoDB;";

    $kreiranjeReziseri = $conn->query($r);

    if($kreiranjeReziseri) {
        echo "<p>Tabela reziseri je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele reziseri: $err</p>";
    }


    $f = "CREATE TABLE IF NOT EXISTS filmovi(
        id INT UNSIGNED,
        naslov VARCHAR(150),
        godina SMALLINT UNSIGNED,
        ocena DECIMAL(6,2),
        reziser_id INT UNSIGNED,
        FOREIGN KEY(reziser_id) REFERENCES reziseri(id),
        PRIMARY KEY(id)
    )ENGINE=InnoDB;";

    $kreiranjeFilmovi = $conn->query($f);

    if($kreiranjeFilmovi) {
    echo "<p>Tabela filmovi je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele filmovi: $err</p>";
    }


    $z = "CREATE TABLE IF NOT EXISTS zanrovi(
        id INT UNSIGNED,
        naziv VARCHAR(50),
        PRIMARY KEY(id)
    )ENGINE=InnoDB;";

    $kreiranjeZanrovi = $conn->query($z);

    if($kreiranjeZanrovi) {
    echo "<p>Tabela zanrovi je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele zanrovi: $err</p>";
    }



    $fz = "CREATE TABLE IF NOT EXISTS film_zanr(
        film_id INT UNSIGNED,
        zanr_id INT UNSIGNED,
        FOREIGN KEY(film_id) REFERENCES filmovi(id),
        FOREIGN KEY(zanr_id) REFERENCES zanrovi(id),
        PRIMARY KEY (film_id, zanr_id)
    )ENGINE=InnoDB;";

    $kreiranjeFilmZanr = $conn->query($fz);

    if($kreiranjeFilmZanr) {
    echo "<p>Tabela film_zanr je uspesno dodata u bazu!</p>";
    }
    else{
        $err = $conn->error;
        echo "<p>Doslo je do greske prilikom kreiranja tabele film_zanr: $err</p>";
    }








?>