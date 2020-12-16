<?php
    $p = 2890;
    $m = 2590;
    $k = 450;
    $kusurPera = $p - ($p + $m - $k) / 2; 
    $kusurMika = $k - $kusurPera;
    echo $kusurPera;
    echo "<br>"; 
    echo $kusurMika;
?>