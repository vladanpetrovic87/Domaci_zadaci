<?php

    abstract class Student{
        protected $ime;
        protected $osvojeniESPB;
        protected $prosOcena;


        public abstract function skolarina($espb);
        public abstract function prijavaIspita();

        public function __construct($ime, $osvojeniESPB, $prosOcena){
            $this->setIme($ime);
            $this->setOsvojeniESPB($osvojeniESPB);
            $this->setProsOcena($prosOcena);
        }

        public function setIme($ime){
            if(is_string($ime)){
                $this->ime = $ime;
            }
            else{
                $this->ime = "";
            }
        }
        public function setOsvojeniESPB($osvojeniESPB){
            if($osvojeniESPB > 0){
                $this->osvojeniESPB = ceil($osvojeniESPB);
            }
            else{
                $this->osvojeniESPB = 0;
            }
        }
        public function setProsOcena($prosOcena){
            if(is_numeric($prosOcena)){
                $this->prosOcena = $prosOcena;
            }
            else{
                $this->prosOcena = 0;
            }
        }

        public function getIme(){
            return $this->ime;
        }
        public function getOsvojeniESPB(){
            return $this->osvojeniESPB;
        }
        public function getProsOcena(){
            return $this->prosOcena;
        }

        public function ispisi(){
            echo "<p>Ime: {$this->getIme()}</p>";
            echo "<p>Osvojeni ESPB: {$this->getOsvojeniESPB()}</p>";
            echo "<p>Prosecna ocena: {$this->getProsOcena()}</p>";
        }

    }






?>