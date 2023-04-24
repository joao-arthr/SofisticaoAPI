<?php
    namespace app\models;
    require_once __DIR__."/../../vendor/autoload.php";
    use MongoDB;

    use app\models\Conexao;

    class Product extends Conexao
    {
        private static $con;
        private static $nameCollection = 'Product';


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

            $resultInsert = $con->insertOne([ "nome" => $post['nome'], "preco" => $post['preco'], "preco_desc" => $post['preco_desc'], "porte" => $post['porte'], "quantidade" => $post['quantidade'], "categoria" => $post['categoria'], "cores" => $post['cores'], "imagem" => $post['imagem']]);
            $countInsert = $resultInsert->getInsertedCount();
            
            if($countInsert= 1){
                echo "Produto cadastrado com sucesso!";
            } else{
                throw new \Exception("Falha ao cadastrar produto");
            }
        }

        public static function update($id, $put){
            $con = self::$con;

            if($put['imagem']){
                $resultUpdate = $con->updateOne(["_id" => new MongoDB\BSON\ObjectId("$id") ],['$set' => [ "nome" => $put['nome'], "preco" => $put['preco'], "preco_desc" => $put['preco_desc'], "porte" => $put['porte'], "quantidade" => $put['quantidade'], "categoria" => $put['categoria'], "cores" => $put['cores'], "imagem" => $put['imagem']]]);
            } else{
                $resultUpdate = $con->updateOne(["_id" => new MongoDB\BSON\ObjectId("$id") ],['$set' => [ "nome" => $put['nome'], "preco" => $put['preco'], "preco_desc" => $put['preco_desc'], "porte" => $put['porte'], "quantidade" => $put['quantidade'], "categoria" => $put['categoria'], "cores" => $put['cores']]]);
            }

           
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