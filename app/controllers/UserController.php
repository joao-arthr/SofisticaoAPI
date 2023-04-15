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
                    var_dump($document);
                } else{
                    $documentList = User::find();
                    foreach($documentList as $doc){
                        var_dump($doc);
                    }
                }
            } catch(\Exception $e){
                echo $e->getMessage();
            }
            
        }

        public function post(){
            User::insert($_POST);
        }

        public static function put(){
            User::update($_PUT);
        }

        public static function delete(){

        }
    }
?>