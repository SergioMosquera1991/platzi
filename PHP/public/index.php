<?php
    namespace App\Controllers;
   
    use Laminas\Diactoros\Response\HtmlResponse;
    //use Laminas\Diactoros\ServerRequestFactory;
    ini_set('display_errors', 1);
    ini_set('display_startup_error', 1);
    error_reporting(E_ALL);

    require_once '../vendor/autoload.php';

    use Illuminate\Database\Capsule\Manager as Capsule;
    use Aura\Router\RouterContainer;
    //use Zen\Diactoros;

    $capsule = new Capsule;
    
    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'php-platzi',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();

    // esto se copio de diatoros
    $request = \Laminas\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER,
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES
    );

    $routerContainer = new RouterContainer();

    $map = $routerContainer->getMap();

    $map->get('index', '/Platzi/PHP/sergio', [
        'controller' => 'App\Controllers\IndexController',
        'action' => 'indexAction'
    ]);
    $map->get('addJobs', '/Platzi/PHP/jobs/add', [
        'controller' => 'App\Controllers\JobsController',
        'action' => 'getAddJobAction'
    ]);
    $map->post('saveJobs', '/Platzi/PHP/jobs/add', [
        'controller' => 'App\Controllers\JobsController',
        'action' => 'getAddJobAction'
    ]);

    $matcher = $routerContainer->getMatcher();

    $route = $matcher->match($request);

    function printElement($job){

        /*if($job->visible == false){
          return;
        }*/
    
        echo '<li class="work-position">';
        echo  '<h5>' . $job->title . '</h5>';
        echo  '<p>' . $job->description .'</p>';
        echo  '<p>' . $job->getDuration() .'</p>';
        echo  '<strong>Achievements:</strong>';
        echo  '<ul>';
        echo    '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo    '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo    '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo  '</ul>';
        echo'</li>';
    }

    if(!$route){
        echo 'No Route';
    }else{

        $handlerData = $route->handler;
        $controllerName = $handlerData['controller'];
        $actionName = $handlerData['action'];
        
        $controller = new $controllerName;
        $response = $controller->$actionName($request);

        echo $response->getBody();

        //require $route->handler;
    }
    //var_dump($route->handler);
    
    /*$route = $_GET['route'] ?? '/';

    if($route == '/'){
        require '../index.php';
    }elseif($route == 'addJob'){
        require '../addJob.php';
    }
    */