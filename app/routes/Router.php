<?php
    namespace app\routes;
    require_once __DIR__."/../../vendor/autoload.php";

    use app\helpers\Request;
    use app\helpers\Uri;

    

    class Router
    {
        const CONTROLLER_NAMESPACE = 'app\\controllers';

        public static function load(string $controller, string $method)
        {
            $controllerNamespace = self::CONTROLLER_NAMESPACE.'\\'.$controller;
            
            try{
                if(!class_exists($controllerNamespace)){
                    throw new \Exception("O controller {$controller} não existe<br>");
                }

                $controllerInstance = new $controllerNamespace;

                if(!method_exists($controllerInstance, $method)){
                    throw new \Exception("O controller {$method} não existe no controller {$controller} <br>");
                }
                
                $controllerInstance->$method();

            }catch(\Exception $e){
                echo $e->getMessage();
            }
        }

        public static function routes():array
        {
            return [
                'get' => [
                    '/user' => fn() => self::load('UserController', 'get'), 
                    '/product' => fn() => self::load('ProductController', 'get'), 
                    '/cart' => fn() => self::load('CartController', 'get') 
                ],
                
                'post' => [
                    '/user' => fn() => self::load('UserController', 'post'), 
                    '/product' => fn() => self::load('ProductController', 'post'), 
                    '/cart' => fn() => self::load('CartController', 'post')  
                ],
                
                'put' => [

                ],
                
                'delete' => [

                ]
            ];
        }

        public static function execute()
        {
            try{
                $routes = self::routes();
                $request = Request::getRequest();
                $uri = Uri::getUri('path');

                if(!isset($routes[$request])){
                    throw new \Exception("A rota não existe");
                }

                if(!array_key_exists($uri, $routes[$request])){
                    throw new \Exception("A rota não existe");
                }

                $router = $routes[$request][$uri];

                $router();

            }catch(\Exception $e){
                echo $e->getMessage();
            }
        }
    }

?>