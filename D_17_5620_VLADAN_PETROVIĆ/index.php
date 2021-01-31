<?php

    require_once "student.php";
    require_once "samofinansirajuciStudent.php";
    require_once "budzetskiStudent.php";

    $s1 = new SamofinansirajuciStudent("Dejan", 150, 6.5);
    $s2 = new BudzetskiStudent("Marko", 100, 7.8);
    $s3 = new BudzetskiStudent("Milos", 250, 7);
    $s4 = new SamofinansirajuciStudent("Dragan", 200, 9);

    $s = array($s1, $s2, $s3, $s4);

    $espb = rand(35, 60);

    foreach($s as $student){
        $student->ispisi();
        echo "<p>Skolarina: " . $student->skolarina($espb) . "</p>";
        echo "<p>Prijava ispita: " . $student->prijavaIspita() . "</p>";
    }

    echo "<hr>";

    function najvecaSkolarina($s, $espb){
        $max = $s[0];
        $maxSkolarina = $max->skolarina($espb);
        foreach($s as $student){
            $skolarinaSvi = $student->skolarina($espb);
            if($skolarinaSvi >= $maxSkolarina){
                $maxSkolarina = $skolarinaSvi;
                $max = $student;
            }
        }
        return $max;
    }
    echo "<p>Najvecu skolarinu placa student: </p>";
    najvecaSkolarina($s, $espb)->ispisi();


    echo "<hr>";

    function prosecnaSkolarina($s, $espb){
        $suma = 0;
        foreach($s as $student){
            $suma += $student->skolarina($espb);
        }
        $prosek = $suma / count($s);
        return $prosek;
    }
    echo "<p>Prosecna skolarina svih studenata je: </p>";
    echo prosecnaSkolarina($s, $espb);

    echo "<hr>";

    function prosecanOdnos($s, $espb){
        $prosekSkolarina = prosecnaSkolarina($s, $espb);
        $sumaESPB = 0;
        foreach($s as $student){
            $sumaESPB += $student->getOsvojeniESPB();
        }
        $prosekEspb = $sumaESPB / count($s);
        return $prosekSkolarina / $prosekEspb;
    }
    echo "<p>Prosecan odnos je: </p>";
    echo prosecanOdnos($s, $espb);

    echo "<hr>";

    function najmanjeESPB($s, $espb){
        $min = $s[0];
        $minESPB = $min->getOsvojeniESPB();
        foreach($s as $student){
            $espbSvi = $student->getOsvojeniESPB();
            if($espbSvi < $minESPB){
                $minESPB = $espbSvi;
                $min = $student;
            }
        }
        $niz = array();
        foreach($s as $student){
            if($student->getOsvojeniESPB() == $minESPB){
                $niz[] = $student;
            } 
        }
        if(count($niz) == 1){
            return $min;
        }
        else{
            return  najvecaSkolarina($niz, $espb);
        }   
    }
    
    echo "<p>Najmanje osvojenih ESPB bodova ima student: </p>";
    najmanjeESPB($s, $espb)->ispisi();
    







?>