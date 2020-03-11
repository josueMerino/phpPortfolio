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
    'action' => 'indexAction' //La tercera expresión que ponemos es handler
]);
$map->get('addJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->post('saveJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->get('addProjects', '/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
$map->post('saveProjects', '/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


function printElement($job){
    //contenido de la función
    /*if ($job->visible == false) {
      # code...
      return;
    }*/
  
  
    echo '<li class="work-position">';
    echo '<h5>'.$job->title.'</h5>';
    echo '<p>'.$job->description.'</p>';
    echo '<p>'.$job->getDurationAsString().'</p>';
    echo '<strong>Achievements:</strong>';
    //echo '<p>'.$totalMonths.'</p>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
    echo '<ul>';
  
  }

if (!$route) {
    # code...
    echo 'No route';
}
else{
    $handlerData = $route-> handler;
    $actionName = $handlerData['action'];
    $controllerName = $handlerData['controller'];


    $controller = new $controllerName;
    $controller->$actionName($request);

    
}
//var_dump($route->handler); // handler es el manejador de la ruta
?>