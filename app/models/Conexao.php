<?php
    namespace app\models;
    use MongoDB;
    
    require_once __DIR__."/../../vendor/autoload.php";
    
    class Conexao
    {
        private static $nomedb = "Sofisticao";

        protected static function connectDb(){
            $db = self::$nomedb;
            $client = new MongoDB\Client;
            $con = $client->$db;
            return $con;
        }

        protected static function selectCollection(string $nameCollection){
            $con = self::connectDb();
            return $con->$nameCollection;
        }
    }
    
?>