<?php
    namespace app\controllers;
    require_once __DIR__."/../../vendor/autoload.php";

    use app\models\Product;

    class ProductController
    {
        public function __construct(){
            $u = new Product();
        }

        public function get($id = null){
            try{
                if($id){
                    $document = Product::findOne($id);
                    echo json_encode($document ,JSON_UNESCAPED_UNICODE);
                } else{
                    $documentList = Product::find();
                    $documentos = [];

                    foreach($documentList as $doc){
                        $documentos[] = $doc;
                    }
                    echo json_encode(array($documentos),JSON_UNESCAPED_UNICODE);
                }
            } catch(\Exception $e){
                echo $e->getMessage();
            }
            
        }
        
        public function post(){
            Product::insert($_POST);
        }

        public static function put($id){
            Product::update( $id, json_decode(file_get_contents('php://input'), true));
        }

        public static function delete($id){
            Product::delete($id);
        }
    }

?>