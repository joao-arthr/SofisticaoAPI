<?php
    namespace app\models;
    use MongoDB;
    
    require_once __DIR__."/../../vendor/autoload.php";
    
    class Conexao
    {
        private $nomedb = "Sofisticao";

        public function __construct()
        {
            
        }

        protected function connectDb(){
            $db = $this->nomedb;
            $client = new MongoDB\Client;
            $con = $client->$db;
            return $con;
        }

        protected function selectCollection(string $nameCollection){
            $con = $this->connectDb();
            $con->$nameCollection;
        }
    }
    
?>