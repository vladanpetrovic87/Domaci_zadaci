<?php

    // Zadatak 1.

    // a)
    $n = 10;
    $m = 30;
    $proizvod = 1;
    $suma = 0;
    
    while($n <= $m) {
        if($n % 7 == 0 && $n % 3 != 0) {
            $proizvod *= $n;
        }
        $n++;
    }
    echo "<p>Proizvod brojeva je broj $proizvod</p>";

    $n = 10;
    $m = 30;
    while($n <= $m) {
        if($n % 3 == 0 && $n % 7 != 0) {
            $suma += $n;
        }
        $n++;
    }
    echo "<p>Zbir brojeva je broj $suma</p>";
    $razlika = $proizvod - $suma;
    echo "<p>Razlika proizvoda i zbira brojeva je broj $razlika </p>";

    echo "<hr>";

    // b)
    $n = 45;
    $m = 70;
    $proizvod = 1;
    $suma = 0;
    for($i = $n; $i <= $m; $i++) {
        if($i % 7 == 0 && $i % 3 != 0) {
            $proizvod *= $i;
        }
    }
    echo "<p>Proizvod brojeva je broj $proizvod</p>";
    $n = 45;
    $m = 70;
    for($i = $n; $i <= $m; $i++) {
        if($i % 3 == 0 && $i % 7 != 0) {
            $suma += $i;
        }
    }
    echo "<p>Zbir brojeva je broj $suma</p>";
    $razlika = $proizvod - $suma;
    echo "<p>Razlika proizvoda i zbira brojeva je broj $razlika </p>";

    echo "<hr>";



    // Zadatak 2.

    // a)
    $n = 10;
    $m = 15;
    $suma = 0;
    while($n <= $m) {
        if($n % 2 != 0) {
            $suma += $n**3;
        }
        $n++;
    }
    echo "<p>Suma kubova neparnih brojeva je broj $suma</p>";

    echo "<hr>";

    // b)
    $n = 15;
    $m = 20;
    $suma = 0;
    for($i = $n; $i <= $m; $i++) {
        if($i % 2 != 0) {
            $suma += $i**3;
        }
    }
    echo "<p>Suma kubova neparnih brojeva je broj $suma</p>";

    echo "<hr>";

?>