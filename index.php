<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'bootstrap.php';

use App\Application;
use App\Router;
use App\Controllers\IndexController;

$router = new Router();

$router->setNewRoute('GET', '/test/*/test2/*', function ($param1, $param2) {
    echo "Test page with param1=$param1 param2=$param2";
});

$router->setNewRoute('GET', '/', function () {
    return 'Все работает!';
});
$router->setNewRoute('POST', '/test/*/test3/*', function ($param1, $param2) {
    echo "Test page with param1=$param1 param2=$param2";
});
$router->setNewRoute('GET', '/test/*/test3/*', function ($param1, $param2) {
    echo "Test page with param1=$param1 param2=$param2";
});
$router->setNewRoute('GET', '/index', IndexController::class . '@index');

$router->setNewRoute('GET', '/getBooks', IndexController::class . '@getBooks');

$application = new Application($router);

$application->run();
