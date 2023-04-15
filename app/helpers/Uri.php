<?php
    namespace app\helpers;
    require_once __DIR__."/../../vendor/autoload.php";

    class Uri
    {
        public static function getUri($type):string
        {
            return parse_url($_SERVER['REQUEST_URI'])[$type];
        }

        public static function getId()
        {
            return explode("/", $_SERVER['REQUEST_URI']);
        }
    }



?>