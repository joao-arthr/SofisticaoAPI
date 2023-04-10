<?php
    namespace app\controllers;
    require_once __DIR__."/../../vendor/autoload.php";

    class UserController
    {
        public function get(){
            echo "Get user controller<br>";
        }

        public static function post(){
            echo "Post user controller<br>";
        }

        public static function put(){

        }

        public static function delete(){

        }
    }


?>