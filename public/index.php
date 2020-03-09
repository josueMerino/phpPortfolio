<?php

ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use App\Controllers\Database;
use Laminas\Diactoros\ServerRequestFactory;

Database::connectDatabase();

/*$route = $_GET['route'] ?? '/';

if ($route == '/') {
    require '../index.php';
}
elseif ($route == 'addJob')
{
    require '../addJob.php';
}*/

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

use Aura\Router\RouterContainer;

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();
$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('addJobs', '/jobs/add', '../addJob.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    # code...
    echo 'No route';
}
else{
    $handlerData = $route-> handler;
    $actionName = $handlerData['action'];
    $controllerName = $handlerData['controller'];


    $controller = new $controllerName;
    $controller->$actionName();

    
}
//var_dump($route->handler); // handler es el manejador de la ruta
?>