<?php
    namespace app\models;
    require_once __DIR__."/../../vendor/autoload.php";
    
    use app\models\Conexao;

    class User extends Conexao
    {
        private static $con;
        private $nameCollection = 'User';

        public function __construct(){          
            self::$con = Conexao::selectCollection(self::$nameCollection);
        }

        public function findOne(int $id){
            $con = $this->con;
            $document = $con->findOne(['_id' => $id]);

            if($document){
                return $document;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção". self::$nameCollection);
            }
        }

        public function find(){
            $con = $this->con;
            $documentList = $con->find();

            if($documentList){
                return $documentList;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção". self::$nameCollection);
            }
        }

        public static function insert($post){
            $con = self::$con;
            $resultInsert = $con->insertOne([ "name" => $post['name'], "email" => $post['email'], "senha" => password_hash($post['password'], PASSWORD_DEFAULT)]);
            $countInsert = $resultInsert->getInsertedCount();
            
            if($countInsert= 1){
                echo "Usuário cadastrado com sucesso!";
            } else{
                throw new \Exception("Falha ao cadastrar usuário");
            }
        }

        public static function put(){

        }

        public static function delete(){

        }
    }
?>