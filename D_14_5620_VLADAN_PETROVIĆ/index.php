<?php

    class Video{
        private $naslov;
        private $trajanje;
    

        public function __construct($n, $t){
            $this->setNaslov($n);
            $this->setTrajanje($t);
    }

        public function setNaslov($n){
            $this->naslov = $n;
        }
        public function setTrajanje($t){
            $this->trajanje = $t;
        }

        public function getNaslov(){
            return $this->naslov;
        }
        public function getTrajanje(){
            return $this->trajanje;
        }


        public function stampaj(){
            echo 
                "<ul>
                    <li>Naslov:{$this->getNaslov()}</li>
                    <li>Trajanje:{$this->getTrajanje()} min</li>
                </ul>";
        }
    }

    $v1 = new Video("Ivkova slava", 121);
    $v2 = new Video("Zona Zamfirova", 100);
    $v3 = new Video("Šešir profesora Koste Vujića", 110);
    $v4 = new Video("Pljačka Trećeg rajha", 98);

    $video = array($v1, $v2, $v3, $v4);


    function prosek($video){
        $ukupno = 0;
        $br = count($video);
        for($i = 0; $i < count($video); $i++) {
            $t = $video[$i];
            $ukupno += $t->getTrajanje();
        }
        return $ukupno / $br;
    }

    echo "Prosečno trajanje filmova je " . prosek($video) . " minuta";

    function najbliziProseku($video){
        $prosek = prosek($video);
        $film = $video[0];
        $trPrviFilm = $film->getTrajanje();
        $min = (abs($trPrviFilm - $prosek));
        
        foreach($video as $t){
            $ostali = abs($t->getTrajanje() - $prosek);
            if($ostali < $min) {
               $min = $ostali;
               $film = $t; 
           }
        }
        $film->stampaj();   
    }
    echo "<p>Najbizi prosecnom trajanju filma je film:</p>";
    najbliziProseku($video);

    
?>