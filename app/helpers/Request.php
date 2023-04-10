<?php
    namespace app\helpers;
    require_once __DIR__."/../../vendor/autoload.php";

    class Request
    {
        public static function getRequest():string
        {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }
    }



?>