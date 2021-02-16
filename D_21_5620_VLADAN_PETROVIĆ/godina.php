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
    
    <p><a href="index.php">Povratak na pocetnu stranicu</a></p>
    <h1>Tabelarni prikaz svih filmova po godini izlaska</h1>

    <?php


    $g = "SELECT DISTINCT godina AS god FROM filmovi"; 
    
    $result = $conn->query($g);
    if(!$result->num_rows) {
        echo "<p class='info'>Trenutno u bazi nemate filmova!</p>";
    }
    else {
        foreach($result as $row) {
            $godina = $row['god'];
            echo "<h3>$godina. godina</h3>";
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Naziv filma</th>
                <th>Ime rezisera</th>
                <th>Prezime rezisera</th>
                <th>Godina filma</th>
                <th>Ocena filma</th>
                <th>Zanr filma</th>
                </tr>";
            $g2 = "SELECT filmovi.naslov AS 'naziv', reziseri.ime AS 'ime', reziseri.prezime AS 'prezime', filmovi.godina AS 'godina', filmovi.ocena AS 'ocena', zanrovi.naziv AS 'zanr' 
            FROM reziseri
            INNER JOIN filmovi
            ON reziseri.id = filmovi.reziser_id
            INNER JOIN film_zanr
            ON filmovi.id = film_zanr.film_id
            INNER JOIN zanrovi
            ON film_zanr.zanr_id = zanrovi.id
            WHERE filmovi.godina = '$godina'
            ORDER BY ime";
            $sviFilmovi = $conn->query($g2);
        foreach($sviFilmovi as $film) {
            echo "<tr>";
            echo "<td>" . $film['naziv'] . "</td>";
            echo "<td>" . $film['ime'] . "</td>";
            echo "<td>" . $film['prezime'] . "</td>";
            echo "<td>" . $film['godina'] . "</td>";
            echo "<td>" . $film['ocena'] . "</td>";
            echo "<td>" . $film['zanr'] . "</td>";
            echo "</tr>";
        }
            echo "</table>";
        }
    }
       




?>
</body>
</html>