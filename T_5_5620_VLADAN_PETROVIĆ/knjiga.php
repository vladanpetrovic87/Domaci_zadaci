<?php

    abstract class Knjiga{
        private $naslov;
        private $autori;
        private $brojStrana;
        private $cena;

        public function __construct($naslov, $autori, $brojStrana, $cena){
            $this->setNaslov($naslov);
            $this->setAutori($autori);
            $this->setBrojStrana($brojStrana);
            $this->setCena($cena);
        }

        public function setNaslov($naslov){
            if(strlen($naslov) > 1){
                $this->naslov = $naslov;
            }
            else{
                $this->naslov = "";
            }
        }
        public function setAutori($autori){
            $this->autori = $autori;
        }
        public function setBrojStrana($brojStrana){
            if($brojStrana > 0){
                $this->brojStrana = $brojStrana;
            }
            else{
                $this->brojStrana = 0;
            }
        }
        public function setCena($cena){
            if($cena > 0){
                $this->cena = $cena;
            }
            else{
                $this->cena = 0;
            }
        }

        public function getNaslov(){
            return $this->naslov;
        }
        public function getAutori(){
            return $this->autori;
        }
        public function getBrojStrana(){
            return $this->brojStrana;
        }
        public function getCena(){
            return $this->cena;
        }

        public function stampa(){
            echo "<p>Naslov: {$this->getNaslov()}</p>";
            echo "Autori: " . implode(", ", $this->getAutori());
            echo "<p>Broj strana: {$this->getBrojStrana()}</p>";
            echo "<p>Cena: {$this->getCena()}</p>";
        }

        public abstract function skupa($niz);

        
    }





?>