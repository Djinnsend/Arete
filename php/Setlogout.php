<?php
class Setlogout{
    
    //Instance variables
        private $location;          //Represent file location to jump to after logout
        private $checker;           //Represent checking value || is a boolean
        private $checkee;           //Represent associative index of session to be checked as a string

        function __construct($location = "../test1.html",$checkee = "noIndex"){
            session_start();
            $this->checkee = $checkee;
            $this->location = $location;
            $checker = false;
        }
        function setCheckee($newCheckee){
            $this->checkee = $newCheckee;
            return TRUE;
        }

        function setLocation($newLocation){
            $this->location = $newLocation;
            return true;
        }

        function getLocation(){
            return $this->location;
        }

        function getCheckee(){
            return $this->checkee;
        }

        function check(){
            $this->checker = isset($_SESSION[$this->checkee]);
            return $this->checker;
        }

        function logout(){
            if(!$this->checker){
                session_destroy();
                die("Session destroyed but logout failed");
            }else{
                $temp = "location:" . $this->location;
                session_destroy();
                header($temp);
            }
        }

}


?>