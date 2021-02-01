<?php

    require_once "student.php";
    
    class BudzetskiStudent extends Student{

        public function __construct($ime, $osvojeniESPB, $prosOcena){
            parent::__construct($ime, $osvojeniESPB, $prosOcena);
        }

        function skolarina($espb){
            return (300 - $this->osvojeniESPB) * 200;
        }

        function prijavaIspita(){
            return 100;
        }
    }






?>