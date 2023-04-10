<?php
    namespace app\models;
    use MongoDB;
    
    require_once "../../vendor/autoload.php";
    
    class Conexao
    {
        private $nomedb = "Sofisticao";

        public function __construct()
        {
            $con = $this->connectDb();
            return $con;
        }

        private function connectDb(){
            $db = $this->nomedb;
            
            $client = new MongoDB\Client;
            $con = $client->$db;
            return $con;
        }
    }
    
?>