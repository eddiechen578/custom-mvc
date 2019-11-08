<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/Config/database.php';
//spl_autoload_register(function($class){
//    $root = dirname(__DIR__);
//    $files = $root.'/'.str_replace('\\', '/', $class).'.php';
//
//    if(is_readable($files))
//    {
//        require  $root.'/'.str_replace('\\', '/', $class).'.php';
//    }
//});

$router = new Core\Router();

$router::$config = $CONFIG;
// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);