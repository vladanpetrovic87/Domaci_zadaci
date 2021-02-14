<?php
    require_once "povezivanje.php";
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

    <?php
        $q = "SELECT kompozicije.naziv AS 'naziv', kompozicije.god AS 'godina', sec_to_time(kompozicije.trajanje) AS 'trajanje', periodi.naziv AS 'periodi'
        FROM kompozicije
        INNER JOIN periodi 
        ON kompozicije.periodi_id = periodi.id
        ORDER BY naziv;";
        $result = $conn->query($q);
        if(!$result->num_rows) {
            echo "<p>Trenutno ne postoji kompozicija u bazi!!!</p>";
        }
        else{
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Naziv kompozicije</th>
                <th>Godina</th>
                <th>Trajanje</th>
                <th>Naziv perioda</th>
                </tr>";
                foreach($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['naziv'] . "</td>";
                    echo "<td>" . $row['godina'] . "</td>";
                    echo "<td>" . $row['trajanje'] . "</td>";
                    echo "<td>" . $row['periodi'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
    ?>
    
</body>
</html>