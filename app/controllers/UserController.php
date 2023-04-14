<?php
    namespace app\controllers;
    require_once __DIR__."/../../vendor/autoload.php";

    use app\models\User;

    class UserController
    {
        public function __construct(){
            return $u = new User();
        }

        public function get($id = null){
            try{
                if($id){
                    $document = User::findOne($id);
                } else{
                    $documentList = User::find();
                }
            } catch(\Exception $e){
                echo $e->getMessage();
            }
            
        }

        public function post(){
            $u = self::__construct();
            $u->insert($_POST);
        }

        public static function put(){

        }

        public static function delete(){

        }
    }


?>