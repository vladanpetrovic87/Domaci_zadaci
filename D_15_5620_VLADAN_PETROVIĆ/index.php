<?php

    class Autobus{
        var $registarskiBroj;
        var $brojSedista;

        function __construct($r, $b){
            $this->setRegistarskiBroj($r);
            $this->setBrojSedista($b);
        }

        function setRegistarskiBroj($r){
            $this->registarskiBroj = $r;
        }

        function setBrojSedista($b){
            $this->brojSedista = $b;
        }

        function getRegistarskiBroj(){
            return $this->registarskiBroj;
        }

        function getBrojSedista(){
            return $this->brojSedista;
        }

        function stampaj(){
            echo 
            "<ul>
            <li>Registarski broj: {$this->getRegistarskiBroj()}</li>
            <li>Broj sedista: {$this->getBrojSedista()}</li>
            </ul>";
        }

    }

    
    $a1 = new Autobus("NI-123-BG", 50);
    $a2 = new Autobus("VR-456-NI", 52);
    $a3 = new Autobus("BG-789-NI", 55);

    $autobusi = array($a1, $a2, $a3);

    function ispisAutobusa($autobusi){
        foreach($autobusi as $a){
            $a->stampaj();
        }
    }
    echo "<p>Podaci o autobusima:</p>";
    ispisAutobusa($autobusi);

    echo "<hr>";

    function ukupnoSedista($autobusi){
        $suma = 0;
        foreach($autobusi as $sedista){
            $suma += $sedista->getBrojSedista();
        }
        return $suma;
    }
    echo "<p>Svi autobusi imaju ukupno sedista:</p>";
    echo ukupnoSedista($autobusi);

    echo "<hr>";

    function maksSedista($autobusi){
        $maksSed = $autobusi[0]->getBrojSedista();
        foreach($autobusi as $sedista){
            if($sedista->getBrojSedista() >= $maksSed){
                $maksSed = $sedista->getBrojSedista();
            }
        }
        foreach($autobusi as $sedista){
            if($sedista->getBrojSedista() == $maksSed){
                $sedista->stampaj();
            }
        }
    }
    echo "<p>Najveci broj sedista ima autobus: </p>";
    maksSedista($autobusi);

    echo "<hr>";

    function ljudi($brLjudi, $autobusi){
        $ukupnoSed = ukupnoSedista($autobusi);
            if($ukupnoSed >= $brLjudi) {
                return true;
            }
            else {
                return false;
            }
    }

    if(ljudi(150, $autobusi)) {
        echo "Moguce je sve ljude smestiti u autobuse";
    }
    else {
        echo "Nemoguce je sve ljude smestiti u autobuse";
    }




?>