<?php
    namespace app\controllers;
    require_once __DIR__."/../../vendor/autoload.php";

    class ProductController
    {
        public function get(){
            echo "Get product controller<br>";
        }

        public static function post(){
            echo "Post product controller<br>";
        }

        public static function put(){

        }

        public static function delete(){

        }
    }

?>