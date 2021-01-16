<?php

    class Knjiga {
        private $naslov;
        private $autor;
        private $godIzdanja;
        private $brojStrana;
        private $cena;


        public function __construct($n, $a, $gi, $bs, $c) {
            $this->setNaslov($n);
            $this->setAutor($a);
            $this->setGodIzdanja($gi);
            $this->setBrojStrana($bs);
            $this->setCena($c);
        }

        public function setNaslov($n) {
            $this->naslov = $n;
        }

        public function setAutor($a) {
            $this->autor = $a;
        }

        public function setGodIzdanja($gi) {
            $this->godIzdanja = $gi;
        }

        public function setBrojStrana($bs) {
            $this->brojStrana = $bs;
        }

        public function setCena($c) {
            $this->cena = $c;
        }

        public function getNaslov() {
            return $this->naslov;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function getGodIzdanja() {
            return $this->godIzdanja;
        }

        public function getBrojStrana() {
            return $this->brojStrana;
        }

        public function getCena() {
            return $this->cena;
        }


        public function stampaj() {
            echo "<p>Naslov knjige: $this->naslov, Autor: $this->autor, Godina izdanja: $this->godIzdanja, Broj strana: $this->brojStrana, Cena: $this->cena</p>";
        }

        public function obimna() {
            if($this->brojStrana > 600) {
                return true;
            }
            else {
                return false;
            }
        }

        public function skupa() {
            if($this->cena > 8000) {
                return true;
            }
            else {
                return false;
            }
        }

        public function dugackoIme() {
            if(strlen($this->autor) > 18) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    function horizontalnaLinija() {
        echo "<hr>";
    }

    $k = new Knjiga("Hari Poter i kamen mudrosti", "Džoan K. Rouling", 2010, 265, 6000);
    $k->stampaj();
    echo "<p>Knjiga ";
    if($k->obimna()) {
        echo " je obimna";
    }
    else {
        echo " nije obimna";
    }
    if($k->skupa()) {
        echo " , skupa";
    }
    else {
        echo " , nije skupa";
    }
    if($k->dugackoIme()) {
        echo " i autor ima dugacko ime.";
    }
    else {
        echo " i autor nema dugacko ime.";
    }
    
    horizontalnaLinija();

    $k1 = new Knjiga("Ana Karenjina", "Lav Nikolajevič Tolstoj", 2012, 792, 9000);
    $k1->stampaj();
    echo "<p>Knjiga ";
    if($k1->obimna()) {
        echo " je obimna";
    }
    else {
        echo " nije obimna";
    }
    if($k1->skupa()) {
        echo " , skupa";
    }
    else {
        echo " , nije skupa";
    }
    if($k1->dugackoIme()) {
        echo " i autor ima dugacko ime.";
    }
    else {
        echo " i autor nema dugacko ime.";
    }
    
    horizontalnaLinija();

    







    



?>