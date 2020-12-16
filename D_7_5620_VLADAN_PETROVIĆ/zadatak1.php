<?php
    $far = 125;
    $cel = ($far - 32) * 5/9;
    $kel = $cel + 273.15;
    echo $kel;
    echo "<br>";
    $kel = 270;
    $cel = $kel - 273.15;
    $far = $cel / 0.5555555555555556 + 32;
    echo $far;
?>