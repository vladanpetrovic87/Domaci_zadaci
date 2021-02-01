<?php

    require_once "student.php";

    class SamofinansirajuciStudent extends Student{

        public function __construct($ime, $osvojeniESPB, $prosOcena){
            parent::__construct($ime, $osvojeniESPB, $prosOcena);
        }

        function skolarina($espb) {
           if($this->prosOcena < 8){
               return 1900 * $espb;
           }
           else {
               return 1600 * $espb;
           }
        }

        function prijavaIspita(){
            return 400;
        }
    }

    



?>