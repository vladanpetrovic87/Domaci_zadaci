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
    <h1>Najbolje rangirani filmovi</h1>

    <?php


    $nf = "SELECT filmovi.id, filmovi.naslov AS 'naziv', reziseri.ime AS 'ime', reziseri.prezime AS 'prezime', filmovi.godina AS 'godina', filmovi.ocena AS 'ocena', zanrovi.naziv AS 'zanr' 
    FROM reziseri
    INNER JOIN filmovi
    ON reziseri.id = filmovi.reziser_id
    INNER JOIN film_zanr
    ON filmovi.id = film_zanr.film_id
    INNER JOIN zanrovi
    ON film_zanr.zanr_id = zanrovi.id
    WHERE ocena = (SELECT MAX(ocena) FROM filmovi)
    ORDER BY naziv;";
    $result = $conn->query($nf);
    if(!$result->num_rows) {
        echo "<p class='info'>Trenutno u bazi nemate filmova!</p>";
    }
    else {
        echo "<table class='tabela'>";
        echo "<tr>
            <th>Naziv filma</th>
            <th>Ime rezisera</th>
            <th>Prezime rezisera</th>
            <th>Godina filma</th>
            <th>Ocena filma</th>
            <th>Zanr filma</th>
            </tr>";
            foreach($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['naziv'] . "</td>";
                echo "<td>" . $row['ime'] . "</td>";
                echo "<td>" . $row['prezime'] . "</td>";
                echo "<td>" . $row['godina'] . "</td>";
                echo "<td>" . $row['ocena'] . "</td>";
                echo "<td>" . $row['zanr'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
    }






?>
</body>
</html>