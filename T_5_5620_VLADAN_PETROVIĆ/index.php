<?php

    require_once "knjiga.php";
    require_once "udzbenik.php";
    require_once "zbirka_zadataka.php";


    $u1 = new Udzbenik("Matematika", array("Marko", "Milan"), 200, 800, 2000);
    $u2 = new Udzbenik("Srpski jezik", array("Milos", "Branko"), 250, 700, 1000);

    $z1 = new ZbirkaZadataka("Zbirka iz matematike", array("Marko", "Milan"), 400, 950, 1500);
    $z2 = new ZbirkaZadataka("Zbirka iz Srpkog jezika", array("Milos", "Branko"), 200, 600, 800);

    $niz = array($u1, $u2, $z1, $z2);


    function stampaKnjige($knjige){
        foreach($knjige as $k){
            $k->stampa();
        }
    }
    stampaKnjige($niz);


    function stampaSkupe($knjige){
        foreach($knjige as $k){
            if($k->skupa($niz)){
                $k->stampa();
            }
        }
    }
    stampaSkupe($niz);

    // function najviseAutora($knjige){
    //     foreach($knjige as $k){
    //         $autori = $k->getAutori();
    //     }
    // }


    





?>