<?php

ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

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
$map->get('addJobs', '/add/jobs', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->post('saveJobs', '/add/jobs', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->get('addProjects', '/add/projects', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
$map->post('saveProjects', '/add/projects', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
$map->get('addUsers', '/add/users', [
    'controller' => 'App\Controllers\UserController',
    'action' => 'getAddUserAction' 
]);
$map->post('saveUsers', '/add/users', [
    'controller' => 'App\Controllers\UserController',
    'action' => 'getAddUserAction' 
]);
$map->get('loginForm', '/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin' 
]);
$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout' 
]);
$map->post('auth', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin' 
]);
$map->get('admin', '/admin', [
    'controller' => 'App\Controllers\BriefcaseController',
    'action' => 'accessBriefcase',
    'auth' => true
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
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;


    // $sessionUserId devuelve el primer operando que no sea null o sino envía el que le sucede después del ??
    if (!$sessionUserId && $needsAuth ) {
        # code...
        echo 'Protected route';
        var_dump($sessionUserId);
        var_dump($needsAuth);
        die;
    }else{
        var_dump($sessionUserId);
        var_dump($needsAuth);
    }

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    foreach ($response->getHeaders() as $name => $values) {
        # code...
        foreach ($values as $value) {
            # code...
            header(sprintf('%s: %s', $name, $value), false);
        }
    }

    http_response_code($response->getStatusCode());
    echo $response->getBody(); // getBody, es la función que muestra el cuerpo del archivo HTML o el de la vista
    
}
//var_dump($route->handler); // handler es el manejador de la ruta
?>