<?php

    // 1. Zadatak
    function digitron($br1, $br2, $aritmOperacija) {
        if($aritmOperacija == "+") {
            $rezultat = $br1 + $br2;
        } 
        if($aritmOperacija == "-") {
            $rezultat = $br1 - $br2;
        } 
        if($aritmOperacija == "*") {
            $rezultat = $br1 * $br2;
        } 
        if($aritmOperacija == "/") {
            $rezultat = $br1 / $br2;
        } 

        $rez = $br1 . "&nbsp" . $aritmOperacija . "&nbsp" .  $br2 . "&nbsp" .  "=" . "&nbsp" . $rezultat;
        return $rez;
    }

        echo digitron(5, 8, "*");


?>