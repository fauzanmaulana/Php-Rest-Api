<?php
    header("Content-Type: application/json; charset=UTF-8");
    Class Connection {
        public $dbconn;
        function getConn($dbname, $user, $password){
            try{
                $pdoconn = new PDO("mysql:host=localhost;dbname=$dbname","$user","$password");
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->dbconn = $pdoconn;
        }
    }

    $conn = new Connection();
    $db = $conn->getConn("tugasapi", "root", "");
?>