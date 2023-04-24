<?php
    include "../vendor/autoload.php";
    use app\routes\Router;
    
    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");
    
    Router::execute();

    ?>