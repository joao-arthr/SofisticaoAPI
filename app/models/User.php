<?php
    namespace app\models;
    require_once __DIR__."/../../vendor/autoload.php";
    use MongoDB;

    use app\models\Conexao;

    class User extends Conexao
    {
        private static $con;
        private static $nameCollection = 'User';


        public function __construct(){          
            self::$con = Conexao::selectCollection(self::$nameCollection);
        }

        public static function findOne(string $id)
        {
            $con = self::$con;
            $document = $con->findOne(["_id" => new MongoDB\BSON\ObjectId("$id")]);

            if($document){
                return $document;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção ". self::$nameCollection);
            }
        }

        public static function find()
        {
            $con = self::$con;
            $documentList = $con->find();

            if($documentList){
                return $documentList;
            } else{
                throw new \Exception("Nenhum registro encontrado na coleção ". self::$nameCollection);
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

        public static function put($put){
            $con = self::$con;
            $resultUpdate = $con->updateOne(["_id" => new MongoDB\BSON\ObjectId("$put['id']")],["name" => $put['name'], "email" => $put['email'], "senha" => password_hash($put['password'], PASSWORD_DEFAULT)]);
        }

        public static function delete(){

        }
    }
?>