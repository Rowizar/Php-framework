<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function myAutoLoader(string $className)
{
    require_once '../' . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('myAutoLoader');

$route = $_GET['route'] ?? '';

$routes = require '../src/routes.php';

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);

    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);