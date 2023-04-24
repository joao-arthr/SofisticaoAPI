<?php
    namespace app\controllers;
    require_once __DIR__."/../../vendor/autoload.php";

    use app\models\User;

    class UserController
    {
        public function __construct(){
            $u = new User();
        }

        public function get($id = null){
            try{
                if($id){
                    $document = User::findOne($id);
                    echo json_encode($document ,JSON_UNESCAPED_UNICODE);
                } else{
                    $documentList = User::find();
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
            User::insert(json_decode(file_get_contents('php://input'), true));
        }

        public static function put($id){
            User::update( $id, json_decode(file_get_contents('php://input'), true));
        }

        public static function delete($id){
            User::delete($id);
        }
    }
?>