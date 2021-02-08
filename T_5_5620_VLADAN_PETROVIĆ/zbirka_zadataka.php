<?php

    require_once "knjiga.php";
    require_once "index.php";

    class ZbirkaZadataka extends Knjiga{

        private $brojZadataka;

        public function __construct($naslov, $autori, $brojStrana, $cena, $brojZadataka){
            parent::__construct($naslov, $autori, $brojStrana, $cena);
            $this->setBrojZadataka($brojZadataka);
        }


        public function setBrojZadataka($brojZadataka){
            if($brojZadataka > 0){
                $this->brojZadataka = $brojZadataka;
            }
            else{
                $this->brojZadataka = 0;
            }
        }

        public function getBrojZadataka(){
            return $this->brojZadataka;
        }

        public function stampa(){
            echo "<p>Naslov: {$this->getNaslov()}</p>";
            echo "Autori: " . implode(", ", $this->getAutori());
            echo "<p>Broj strana: {$this->getBrojStrana()}</p>";
            echo "<p>Cena: {$this->getCena()}</p>";
            echo "<p>Broj zadataka: {$this->getBrojZadataka()}</p>"; 
        }

        public function skupa($niz){
            $suma1 = 0;
            foreach($niz as $br){
                $suma1 += $br->getBrojZadataka();
            }
            $kolicnik = $suma1 / count($this->getAutori());

            $suma2 = 0;
            foreach($niz as $n){
                $suma2 += $n->getCena();
            }

            $suma3 = 0;
            foreach($niz as $n){
                $suma3 += $n->getBrojStrana();
            }
            $prosCenaStrane = $suma2 / $suma3;
            
            if($kolicnik > $prosCenaStrane){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        






            // $sumaZadatak = 0;
            // foreach($this->getBrojZadataka() as $bz){
            //     $sumaZadatak += $bz; 
            // }
            // $kol = $sumaZadatak / count($this->getAutori());
            // $sumaCena = 0;
            // foreach($this->getCena() as $c){
            //     $sumaCena += $c;
            // }
            // $sumaStrana = 0;
            // foreach($this->getBrojStrana() as $bs){
            //     $sumaStrana += $bs;
            // }
            // $prosekStrana = $sumaCena / $sumaStrana;

            // if($kol > $prosekStrana){
            //     return true;
            // }
            // else{
            //     return false;
            



            
       
    
    




?>