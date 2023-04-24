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

            $resultInsert = $con->insertOne([ "name" => $post['name'], "email" => $post['email'], "senha" => $post['password']]);
            $countInsert = $resultInsert->getInsertedCount();
            
            if($countInsert= 1){
                echo "Usuário cadastrado com sucesso!";
            } else{
                throw new \Exception("Falha ao cadastrar usuário");
            }
        }

        public static function update($id, $put){
            $con = self::$con;

            $resultUpdate = $con->updateOne(["_id" => new MongoDB\BSON\ObjectId("$id") ],['$set' => ["nome" => $put['name'], "email" => $put['email'], "senha" => password_hash($put['password'], PASSWORD_DEFAULT)]]);
            $countUpdate = $resultUpdate->getModifiedCount();

            if($countUpdate = 1){
                echo "Usuário alterado com sucesso!";
            } else{
                throw new \Exception("Falha ao atualizar usuário");
            }
        }

        public static function delete($id){
            $con = self::$con;
            $resultDelete = $con->deleteOne(["_id" => new MongoDB\BSON\ObjectId("$id") ]);
            $countDelete = $resultDelete->getDeletedCount();

            if($countInsert= 1){
                echo "Usuário". $id ." deletado com sucesso!";
            } else{
                throw new \Exception("Falha ao deletar usuário");
            }
        }
    }
?>