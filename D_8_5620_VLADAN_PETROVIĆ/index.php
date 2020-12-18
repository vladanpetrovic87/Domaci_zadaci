<?php
// Zadatak 1
$n = 52;
$v = 137;
$dozv = 3;
$maxdozv = $v / $dozv;
$visak = (ceil($n - $maxdozv));
if($n <= $maxdozv) {
    echo "<p> <font color=green> DA </font> </p>";
}
else {
    echo "<p> <font color=red> NE </font> </p>";
    echo "<p><font color=red> Potebno je da lokal napusti $visak gosta </font></p>";
}



// Zadatak 2 

$god = date("Y");
$godrodj = 2001;
if($god - $godrodj >= 18) {
    echo "<p> Osoba je punoletna </p>";
}
else {
    echo "<p> Osoba je maloletna </p>";
}

?>