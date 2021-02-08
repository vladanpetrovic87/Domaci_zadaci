<?php

    require_once "knjiga.php";
    require_once "index.php";

    class Udzbenik extends Knjiga{

        private $tiraz;

        public function __construct($naslov, $autori, $brojStrana, $cena, $tiraz){
            parent::__construct($naslov, $autori, $brojStrana, $cena);
            $this->setTiraz($tiraz);
        }

        public function setTiraz($tiraz){
            if($tiraz > 0){
                $this->tiraz = $tiraz;
            }
            else{
                $this->tiraz = 0;
            }
        }

        public function getTiraz(){
            return $this->tiraz;
        }

        public function stampa(){
            echo "<p>Naslov: {$this->getNaslov()}</p>";
            echo "Autori: " . implode(", ", $this->getAutori());
            echo "<p>Broj strana: {$this->getBrojStrana()}</p>";
            echo "<p>Cena: {$this->getCena()}</p>";
            echo "<p>Tiraz: {$this->getTiraz()}</p>"; 
        }

        public function skupa($niz){
            $suma1 = 0;
            foreach($niz as $n){
                $suma1 = $n->getCena();
            }
            $suma2 = 0;
            foreach($niz as $n){
                $suma1 = $n->getTiraz();
            }


            $kolicnik = $suma1 / $suma2;
            if($kolicnik > 200){
                return true;
            }
            else {
                return false; 
            }
        }
    }





?>