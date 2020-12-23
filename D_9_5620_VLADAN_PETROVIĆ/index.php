<?php
    // Zadatak 1.
    $dan = date("N");
    $vreme = date("G");
    if($dan <= 5) {
        if($vreme < 9) {
            echo "<p>Butik je zatvoren</p>";
        }
        elseif($vreme >= 20) {
            echo "<p>Butik je zatvoren</p>";
        }
        else {
            echo "<p>Butik je otvoren</p>";
        }
     }

      if($dan >= 6) {
        if($vreme < 10) {
            echo "<p>Butik je zatvoren</p>";
        }
        elseif($vreme >= 18) {
            echo "<p>Butik je zatvoren</p>";
        }
        else {
            echo "<p>Butik je otvoren</p>";
        }
     }



    // Zadatak 2.
    $stan = 10000;
    $testDan = 1600;
    $pozTestDan = 400;
    if(($pozTestDan / $testDan) * 100 >= 30 || ($pozTestDan / $stan) * 100 >= 10) {
        echo "<p style='color: red'> VANREDNO STANJE</p>";
    }
   
    
?>