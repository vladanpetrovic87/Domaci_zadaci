<?php

    require_once "sportista.php";
    require_once "kosarkas.php";


    $s = new Sportista("Novak", "Djokovic", 1987, "Beograd");
    $s->stampaj();

    echo "<hr>";

    $k = new Kosarkas("Nikola", "Jokic", 1995, "Sombor", [35, 40, 26, 31, 43, 30, 28, 40]);
    $k->ispisi();



?>