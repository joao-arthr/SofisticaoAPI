<?php
    namespace app\models;
    require_once __DIR__."/../../vendor/autoload.php";
    
    use app\models\Conexao;

    class User extends Conexao
    {
        private $con;
        private $nameCollection = 'User';

        public function __construct(){          
            $this->con = Conexao::selectCollection($this->nameCollection);
        }

        public function findOne(int $id){
            $con = $this->con;
            $document = $con->findOne(['_id' => $id]);

            if($document){
                return $document;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção". $this->nameCollection);
            }
        }

        /*public function find(){
            $con = $this->con;
            $document = $con->find();

            if($document){
                return $document;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção". $this->nameCollection);
            }
        }*/

        public static function post(){

        }

        public static function put(){

        }

        public static function delete(){

        }
    }
?>