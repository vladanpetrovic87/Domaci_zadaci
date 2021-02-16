<?php

    require_once "connection.php";

    $r = "INSERT INTO reziseri (id, ime, prezime, pol) 
    VALUES 
    (1, 'Miloš', 'Avramović', 'M'), 
    (2, 'Dragan', 'Bjelogrlić', 'M'), 
    (3, 'Srdjan', 'Dragojević', 'M'), 
    (4, 'Zdravko', 'Šotra', 'M'),
    (5, 'Miroslav', 'Terzić', 'M'),
    (6, 'Darko', 'Bajić', 'M'),
    (7, 'Dejan', 'Zečević', 'M'),
    (8, 'Vladimir', 'Blaževski', 'M'),
    (9, 'Emir', 'Kusturica', 'M'),
    (10, 'Ljubisa', 'Samardžić', 'M')";


    if($conn->query($r)) {
        echo "<p>Uspesno dodati redovi u tabelu reziseri</p>";
    }
    else {
        echo "<p>Greska prilikom dodavanja redova u tabelu reziseri: " . $conn->error . "</p>";
    }


    $f = "INSERT INTO filmovi (id, naslov, godina, ocena, reziser_id) 
    VALUES 
    (1, 'Južni vetar', 2019, 9.3, 1), 
    (2, 'Montevideo, Bog te video!', 2010, 9.3, 2), 
    (3, 'Parada', 2011, 3.9, 3), 
    (4, 'Šešir profesora Koste Vujića', 2012, 8.2, 4),
    (5, 'Šavovi', 2019, 5.6, 5),
    (6, 'Crni bombarder', 1992, 4.6, 6),
    (7, 'Vojna akademija 5', 2019, 7.5, 7),
    (8, 'Bulevar revolucije', 1992, 6.4, 8),
    (9, 'Crna mačka, beli mačor', 1998, 7.8, 9),
    (10, 'Nebeska udica', 2000, 8.4, 10)";


    if($conn->query($f)) {
        echo "<p>Uspesno dodati redovi u tabelu filmovi</p>";
    }
    else {
        echo "<p>Greska prilikom dodavanja redova u tabelu filmovi: " . $conn->error . "</p>";
    }



    $z = "INSERT INTO zanrovi (id, naziv) 
    VALUES 
    (1, 'triler'), 
    (2, 'drama'), 
    (3, 'komedija'), 
    (4, 'ljubavni'),
    (5, 'ratni')";


    if($conn->query($z)) {
        echo "<p>Uspesno dodati redovi u tabelu zanrovi</p>";
    }
    else {
        echo "<p>Greska prilikom dodavanja redova u tabelu zanrovi: " . $conn->error . "</p>";
    }


    $fz = "INSERT INTO film_zanr (film_id, zanr_id) 
    VALUES 
    (1, 1), 
    (2, 2), 
    (3, 3), 
    (4, 3),
    (5, 2),
    (6, 2),
    (7, 3),
    (8, 4),
    (9, 3),
    (10, 5)";


    if($conn->query($fz)) {
        echo "<p>Uspesno dodati redovi u tabelu film_zanr</p>";
    }
    else {
        echo "<p>Greska prilikom dodavanja redova u tabelu film_zanr: " . $conn->error . "</p>";
    }





?>