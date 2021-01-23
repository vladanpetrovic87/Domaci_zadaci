<?php

    require_once "sportista.php";

    class Kosarkas extends Sportista{
      
        private $poeni;

        public function __construct($ime, $prezime, $godinaRodjenja,$gradRodjenja, $poeni){
            parent::__construct($ime, $prezime, $godinaRodjenja,$gradRodjenja);
            $this->setPoeni($poeni);
        }

        public function setPoeni($poeni){
            $this->poeni = $poeni;
        }

        public function getPoeni(){
            return $this->poeni;
        }

        public function ispisi(){
            $this->stampaj();
            echo "<p>Poeni: " . implode(", ", $this->poeni) . "</p>";
        }
    }

?>