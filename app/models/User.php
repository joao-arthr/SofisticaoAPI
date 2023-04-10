<?php
    namespace app\models;
    require_once "../../vendor/autoload.php";
    require_once 'Conexao.php';

    class User extends Conexao
    {
        private $col;
        private $nameCollection = 'User';

        public function __construct(){          
            $con = parent::__construct();

            $nameCollection = $this->nameCollection;
            $con->createCollection($nameCollection);
            
            $this->col = $con->$nameCollection;
        }

        public function get(int $id){
            $col = $this->col;
            $document = $col->findOne(['_id' => $id]);

            if($document){
                return $document;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção". $this->nameCollection);
            }
        }

        public static function post(){

        }

        public static function put(){

        }

        public static function delete(){

        }
    }
?>