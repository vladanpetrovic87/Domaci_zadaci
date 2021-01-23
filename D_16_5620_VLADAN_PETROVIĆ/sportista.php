<?php

    class Sportista{
        private $ime;
        private $prezime;
        private $godinaRodjenja;
        private $gradRodjenja;


        public function __construct($ime, $prezime, $godinaRodjenja,$gradRodjenja){
            $this->setIme($ime);
            $this->setPrezime($prezime);
            $this->setGodinaRodjenja($godinaRodjenja);
            $this->setGradRodjenja($gradRodjenja);
        }

        public function setIme($ime){
            $this->ime = $ime;
        }
        public function setPrezime($prezime){
            $this->prezime = $prezime;
        }
        public function setGodinaRodjenja($godinaRodjenja){
            $this->godinaRodjenja = $godinaRodjenja;
        }
        public function setGradRodjenja($gradRodjenja){
            $this->gradRodjenja = $gradRodjenja;
        }

        public function getIme(){
            return $this->ime;
        }
        public function getPrezime(){
            return $this->prezime;
        }
        public function getGodinaRodjenja(){
            return $this->godinaRodjenja;
        }
        public function getGradRodjenja(){
            return $this->gradRodjenja;
        }

        public function stampaj(){
            echo "<p>Ime: {$this->getIme()}</p>";
            echo "<p>Prezime: {$this->getPrezime()}</p>";
            echo "<p>Godina rodjenja: {$this->getGodinaRodjenja()}</p>";
            echo "<p>Grad rodjenja: {$this->getGradRodjenja()}</p>";
        }
    }

    


?>